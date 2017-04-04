<?php

namespace Application\Model\Admin;

use System\Database\DB;
use System\Core\Misc;

class DML
{
	private $user_id = NULL;
	public function __construct($user_id)
	{
		$this->user_id = $user_id;
		DB::open();
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
				Misc::put_msg('success', 'Đã đổi mật khẩu thành công, vui lòng đăng nhập lại để kiểm tra !');
			}
			else
			{
				throw new \Exception('Mật khẩu cũ không chính xác', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function insert_Exam($title, $date, $category_id, $header = '', $footer = '')
	{
		try
		{
			$id = Misc::get_uid();
			$this->connect->query('INSERT INTO exam(id, category_id, title, header, footer, share, date) VALUES(?, ?, ?, ?, ?, ?, ?)', array(
				$id, $category_id, $title, $header, $footer, $this->user_id, $date
			));
			Misc::put_msg('success', "Đã thêm mới đề kiểm tra \"$title\" !");
			return $id;
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e, FALSE);
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
			$new_q_id = Misc::get_uid();
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
							Misc::get_uid(),
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
							Misc::get_uid(),
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
					$new_q_id = Misc::get_uid();
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
	public function copy_Exam($user_id, $category_id, $exam_id, $n = 1, $auto_shuffle = TRUE)
	{
		$exam_result = GetData::get_Exam($user_id, $category_id, $exam_id)->execute()->first();
		for ($i = 1; $i <= $n; $i++)
		{
			$new_title = sprintf('%s - %02d', $exam_result->title, $i);
			$new_id = $this->insert_Exam($new_title, $exam_result->date, $exam_result->category_id, $exam_result->header, $exam_result->footer);
			$this->copy_Shared(array($exam_result->id => $exam_result->n_question), $new_id);
			if ($auto_shuffle)
			{
				$this->shuffle_Exam($user_id, $category_id, $new_id);
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
			Misc::put_msg('success', 'Đã sao chép thành công !');
		}
		catch (\Exception $e)
		{
			echo Misc::get_exception_msg($e);
			$this->connect->rollback();
			Misc::put_msg('warning', $e, FALSE);
			exit;
		}
	}
	public function copy_Question($arr_q, $exam_id)
	{
		try
		{
			$this->connect->begin();
			$temp_table = $this->connect->query('SELECT create_temp_table() AS temp_name')->first()->temp_name;
			foreach ($arr_q as $id)
			{
				$this->connect->query("INSERT INTO $temp_table VALUES(?)", array($id));
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
			Misc::put_msg('success', 'Đã sao chép thành công !');
		}
		catch (\Exception $e)
		{
			echo Misc::get_exception_msg($e);
			$this->connect->rollback();
			Misc::put_msg('warning', $e, FALSE);
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
					Misc::put_msg('success', "
						Đề thi này đang được chia sẻ <br />
						Các giáo viên khác có thể xem và copy các câu hỏi trong đề thi này
					", FALSE);
				}
				else
				{
					Misc::put_msg('success', "Đã hủy chia sẻ đề thi này !");
				}
			}
			else
			{
				throw new \Exception('Lỗi không thể cập nhật !', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e, FALSE);
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
				Misc::put_msg('success', "Đã xóa thành công !");
			}
			else
			{
				throw new \Exception('Đề thi này không tồn tại !', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function shuffle_Exam($user_id, $category_id, $exam_id)
	{
		try
		{
			$this->connect->query('CALL shuffle_question(?, ?, ?)', array($user_id, $category_id, $exam_id));
			if ($this->connect->get_affected_rows())
			{
				Misc::put_msg('success', 'Đã xáo trộn đề thi thành công !');
			}
			else
			{
				throw new \Exception('Không thể xáo trộn (Không có câu hỏi để xáo trộn)', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function insert_LinkQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = Misc::get_uid();
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
					Misc::get_uid(),
					$q_id,
					isset($data['a'][$index]) ? $a_content = $data['a'][$index] : NULL,
					isset($data['a'][$index]) ? $index : 255,
					$b_content,
					rand(1, 254)
				));
			}
			$this->connect->commit();
			Misc::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			Misc::put_msg('warning', $e, FALSE);
		}
	}
	public function insert_MultipleChoiceQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = Misc::get_uid();
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
					Misc::get_uid(),
					$q_id,
					$content,
					intval($data['bool'][$index]),
					$index
				));
			}
			$this->connect->commit();
			Misc::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			Misc::put_msg('warning', $e, FALSE);
		}
	}
	public function insert_FillQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = Misc::get_uid();
			$this->connect->query('INSERT INTO question(id, content, exam_id, score, type, position) VALUES(?, ?, ?, ?, ?, ?)', array(
				$q_id,
				$data['q'],
				$exam_id,
				$data['score'],
				GetData::$types['fill'],
				65535
			));
			$this->connect->commit();
			Misc::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			Misc::put_msg('warning', $e, FALSE);
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
				Misc::put_msg('success', 'Đã xóa một câu hỏi !');
			}
			else
			{
				throw new \Exception('Câu hỏi không tồn tại !', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
}

?>