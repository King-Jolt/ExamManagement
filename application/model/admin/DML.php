<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Model\Admin\GetData;
use App\System\Database\Mysql;
use App\System\Database\Sql_QueryCommand;
use App\System\System;

class DML
{
	private $connect = NULL;
	public function __construct()
	{
		$this->connect = new Mysql();
	}
	public function change_PASSWORD($user, $o_pass, $n_pass)
	{
		try
		{
			$this->connect->query('UPDATE user SET pass = SHA1(?) WHERE user = ? AND pass = SHA1(?)', array(
				$n_pass, $user, $o_pass
			));
			if ($this->connect->get_affected_rows())
			{
				System::put_msg('success', 'Đã đổi mật khẩu thành công, vui lòng đăng nhập lại để kiểm tra !');
			}
			else
			{
				throw new \Exception('Mật khẩu cũ không chính xác', 2);
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function insert_Category($user_id, $name)
	{
		try
		{
			$this->connect->query('INSERT INTO category(id, name, user_id) VALUES(?, ?, ?)', array(
				System::get_uid(), $name, $user_id
			));
			System::put_msg('success', "Đã thêm mới danh mục '<em>$name</em>'");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function delete_Category($user_id, $category_id)
	{
		try
		{
			$this->connect->query('CALL delete_category(?, ?)', array($user_id, $category_id));
			if ($this->connect->get_affected_rows())
			{
				System::put_msg('success', 'Đã xóa một danh mục !');
			}
			else
			{
				throw new \Exception('Danh mục này không tồn tại !', 2);
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function insert_Exam($title, $date, $category_id, $header = '', $footer = '')
	{
		try
		{
			$id = System::get_uid();
			$this->connect->query('INSERT INTO exam(id, category_id, title, header, footer, date) VALUES(?, ?, ?, ?, ?, ?)', array(
				$id, $category_id, $title, $header, $footer, $date
			));
			System::put_msg('success', "Đã thêm mới đề kiểm tra \"$title\" !");
			return $id;
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	private function _copy_Question($question_result, $dest_exam_id)
	{
		$id = 0;
		$new_q_id = 0;
		$question_result = $question_result->get_data();
		while ($question_result->valid() and $row = $question_result->current())
		{
			$id = $row->question_id;
			$new_q_id = System::get_uid();
			switch ($row->q_type)
			{
				case GetData::$types['link']:
				{
					$this->connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type, position) VALUES(?, ?, ?, ?, ?, ?, ?, ?)', array(
						$new_q_id,
						$row->q_content,
						$dest_exam_id,
						$row->q_a_title,
						$row->q_b_title,
						$row->q_score,
						GetData::$types['link'],
						$row->q_position
					));
					while ($question_result->valid() and $row = $question_result->current() and $row->question_id == $id)
					{
						$this->connect->query('INSERT INTO _link_option(id, question_id, a_content, a_position, b_content, b_position) VALUES(?, ?, ?, ?, ?, ?)', array(
							System::get_uid(),
							$new_q_id,
							$row->link_a_content,
							$row->link_a_position,
							$row->link_b_content,
							$row->link_b_position
						));
						$question_result->next();
					}
					break;
				}
				case GetData::$types['multiple-choice']:
				{
					$this->connect->query('INSERT INTO question(id, content, exam_id, score, type, position) VALUES(?, ?, ?, ?, ?, ?)', array(
						$new_q_id,
						$row->q_content,
						$dest_exam_id,
						$row->q_score,
						GetData::$types['multiple-choice'],
						$row->q_position
					));
					while ($question_result->valid() and $row = $question_result->current() and $row->question_id == $id)
					{
						$this->connect->query('INSERT INTO _multiple_choice(id, question_id, content, answer, position) VALUES(?, ?, ?, ?, ?)', array(
							System::get_uid(),
							$new_q_id,
							$row->multiple_choice_content,
							$row->multiple_choice_answer,
							$row->multiple_choice_position
						));
						$question_result->next();
					}
					break;
				}
				case GetData::$types['fill']:
				{
					$new_q_id = System::get_uid();
					$this->connect->query('INSERT INTO question(id, content, exam_id, score, type, position) VALUES(?, ?, ?, ?, ?, ?)', array(
						$new_q_id,
						$row->q_content,
						$dest_exam_id,
						$row->q_score,
						GetData::$types['fill'],
						$row->q_position
					));
					$question_result->next();
					break;
				}
			}
		}
	}
	public function copy_Shared($arr_exam, $exam_id)
	{
		try
		{
			$this->connect->begin();
			$temp_table = $this->connect->query('SELECT create_temp_table() AS temp_name')->first()->temp_name;
			foreach ($arr_exam as $id => $n)
			{
				$this->connect->query('CALL select_random_from_exam(?, ?)', array($id, $n));
			}
			$this->connect->commit();
			$result = $this->connect->query('CALL get_question_from_ref()');
			$this->connect->close();
			$this->connect = new Mysql();
			$this->connect->begin();
			$this->_copy_Question(
				$result,
				$exam_id
			);
			$this->connect->commit();
			System::put_msg('success', 'Đã sao chép thành công !');
		}
		catch (\Exception $e)
		{
			echo System::get_exception_msg($e);
			$this->connect->rollback();
			System::put_msg('warning', $e, FALSE);
			exit;
		}
	}
	public function share_Exam($user_id, $category_id, $exam_id, $share = TRUE)
	{
		try
		{
			$this->connect->query('CALL share_exam(?, ?, ?, ?)', array(
				$user_id, $category_id, $exam_id, ($share === TRUE ? 1 : 0)
			));
			if ($this->connect->get_affected_rows())
			{
				if ($share)
				{
					System::put_msg('success', "
						Đề thi này đang được chia sẻ <br />
						Các giáo viên khác có thể xem và copy các câu hỏi trong đề thi này
					", FALSE);
				}
				else
				{
					System::put_msg('success', "Đã hủy chia sẻ đề thi này !");
				}
			}
			else
			{
				throw new \Exception('Lỗi không thể cập nhật !', 2);
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function delete_Exam($user_id, $category_id, $exam_id)
	{
		echo $user_id . '<br />';
		echo $exam_id;
		try
		{
			$this->connect->query('CALL delete_exam(?, ?, ?)', array(
				$user_id, $category_id, $exam_id
			));
			if ($this->connect->get_affected_rows())
			{
				System::put_msg('success', "Đã xóa thành công !");
			}
			else
			{
				throw new \Exception('Đề thi này không tồn tại !', 2);
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function shuffle_Exam($user_id, $category_id, $exam_id)
	{
		try
		{
			$this->connect->query('CALL shuffle_question(?, ?, ?)', array($user_id, $category_id, $exam_id));
			if ($this->connect->get_affected_rows())
			{
				System::put_msg('success', 'Đã xáo trộn đề thi thành công !');
			}
			else
			{
				throw new \Exception('Không thể xáo trộn (Không có câu hỏi để xáo trộn)', 2);
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function insert_LinkQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = System::get_uid();
			$this->connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type, position) VALUES(?, ?, ?, ?, ?, ?, ?, ?)', array(
				$q_id,
				$data['q'],
				$exam_id,
				$data['title']['a'],
				$data['title']['b'],
				$data['score'],
				GetData::$types['link'],
				65535
			));
			foreach ($data['b'] as $index => $b_content)
			{
				$this->connect->query('INSERT INTO _link_option(id, question_id, a_content, a_position, b_content, b_position) VALUES(?, ?, ?, ?, ?, ?)', array(
					System::get_uid(),
					$q_id,
					isset($data['a'][$index]) ? $a_content = $data['a'][$index] : NULL,
					isset($data['a'][$index]) ? $index : 255,
					$b_content,
					rand(1, 254)
				));
			}
			$this->connect->commit();
			System::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function insert_MultipleChoiceQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = System::get_uid();
			$this->connect->query('INSERT INTO question(id, content, exam_id, score, type, position) VALUES(?, ?, ?, ?, ?, ?)', array(
				$q_id,
				$data['q'],
				$exam_id,
				$data['score'],
				GetData::$types['multiple-choice'],
				65535
			));
			foreach ($data['content'] as $index => $content)
			{
				if (!isset($data['bool'][$index]))
				{
					throw new \Exception('Lỗi dữ liệu nhập', 2);
				}
				$this->connect->query('INSERT INTO _multiple_choice(id, question_id, content, answer, position) VALUES(?, ?, ?, ?, ?)', array(
					System::get_uid(),
					$q_id,
					$content,
					intval($data['bool'][$index]),
					$index
				));
			}
			$this->connect->commit();
			System::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function insert_FillQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = System::get_uid();
			$this->connect->query('INSERT INTO question(id, content, exam_id, score, type, position) VALUES(?, ?, ?, ?, ?, ?)', array(
				$q_id,
				$data['q'],
				$exam_id,
				$data['score'],
				GetData::$types['fill'],
				65535
			));
			$this->connect->commit();
			System::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function delete_Question($user_id, $category_id, $exam_id, $question_id)
	{
		try
		{
			$this->connect->query('CALL delete_question(?, ?, ?, ?)', array(
				$user_id, $category_id, $exam_id, $question_id
			));
			if ($this->connect->get_affected_rows())
			{
				System::put_msg('success', 'Đã xóa một câu hỏi !');
			}
			else
			{
				throw new \Exception('Câu hỏi không tồn tại !', 2);
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
}

?>