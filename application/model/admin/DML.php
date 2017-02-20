<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Model\Admin\GetData;
use App\System\Database\Mysql;
use App\System\System;

class DML
{
	private $connect = NULL;
	public function __construct()
	{
		$this->connect = new Mysql();
	}
	private function generate_id()
	{
		$result = $this->connect->raw_query('SELECT generate_uid() AS uid');
		return $result->fetch_object()->uid;
	}
	public function insert_Category($name, $user_id)
	{
		try
		{
			$this->connect->query('INSERT INTO category(name, user_id) VALUES(?, ?)', array(
				$name, $user_id
			));
			System::put_msg('success', "Đã thêm mới danh mục '<em>$name</em>'");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function delete_Category($id)
	{
		try
		{
			$this->connect->query('DELETE FROM category WHERE category.id = ?', array($id));
			System::put_msg('success', 'Đã xóa một danh mục !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function insert_Exam($title, $date, $category_id, $header = '', $footer = '')
	{
		try
		{
			$id = $this->generate_id();
			$this->connect->query('INSERT INTO exam(id, category_id, title, header, footer, date) VALUES(?, ?, ?, ?, ?, ?)', array(
				$id, $category_id, $title, '<strong> Exam Header </strong>', '<em> Exam Footer </em>', $date
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
			switch ($row->q_type)
			{
				case GetData::$types['link']:
				{
					$new_q_id = $this->generate_id();
					$this->connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type) VALUES(?, ?, ?, ?, ?, ?, ?)', array(
						$new_q_id,
						$row->q_content,
						$dest_exam_id,
						$row->q_a_title,
						$row->q_b_title,
						$row->q_score,
						GetData::$types['link']
					));
					while ($question_result->valid() and $row = $question_result->current() and $row->question_id == $id)
					{
						$this->connect->query('INSERT INTO _link_option(question_id, a_content, b_content) VALUES(?, ?, ?)', array(
							$new_q_id,
							$row->link_a_content,
							$row->link_b_content
						));
						$question_result->next();
					}
					break;
				}
				case GetData::$types['multiple-choice']:
				{
					$new_q_id = $this->generate_id();
					$this->connect->query('INSERT INTO question(id, content, exam_id, score, type) VALUES(?, ?, ?, ?, ?)', array(
						$new_q_id,
						$row->q_content,
						$dest_exam_id,
						$row->q_score,
						GetData::$types['multiple-choice']
					));
					while ($question_result->valid() and $row = $question_result->current() and $row->question_id == $id)
					{
						$this->connect->query('INSERT INTO _multiple_choice(question_id, content, answer) VALUES(?, ?, ?)', array(
							$new_q_id,
							$row->multiple_choice_content,
							$row->multiple_choice_answer
						));
						$question_result->next();
					}
					break;
				}
			}
		}
	}
	public function copy_Exam($exam_id)
	{
		try
		{
			$this->connect->begin();
			$exam_result = GetData::get_Exam($exam_id)->execute();
			if ($exam_result->num_rows())
			{
				$exam_result = $exam_result->first();
				$new_exam_id = $this->insert_Exam(
					"$exam_result->title - " . rand(),
					$exam_result->date,
					$exam_result->category_id,
					$exam_result->header,
					$exam_result->footer
				);
				$this->_copy_Question(
					GetData::get_Question($exam_id)->execute(),
					$new_exam_id
				);
				$this->connect->commit();
			}
		}
		catch (\Exception $e)
		{
			$this->connect->rollback();
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function share_Exam($id, $share = TRUE)
	{
		try
		{
			$this->connect->query('UPDATE exam SET share = ? WHERE exam.id = ?', array(
				$share === TRUE ? 1 : 0,
				$id
			));
			System::put_msg('success',
				"Đề thi này đang ở trạng thái đề thi chung <br />
				các giáo viên có thể gửi các câu hỏi của họ vào đây nhưng chỉ có bạn mới có thể xem được các câu hỏi đã được gửi vào đây.",
			FALSE);
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function delete_Exam($id)
	{
		try
		{
			$this->connect->query('DELETE FROM exam WHERE exam.id = ?', array($id));
			System::put_msg('success', "Đã xóa thành công !");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function shuffle_Exam($id)
	{
		try
		{
			$this->connect->query('CALL shuffle_question(?)', array($id));
			System::put_msg('success', 'Đã xáo trộn đề thi thành công !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function insert_LinkQuestion($exam_id, &$data)
	{
		try
		{
			$this->connect->begin();
			$q_id = $this->generate_id();
			$this->connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type) VALUES(?, ?, ?, ?, ?, ?, ?)', array(
				$q_id,
				$data['q'],
				$exam_id,
				$data['title']['a'],
				$data['title']['b'],
				$data['score'],
				GetData::$types['link']
			));
			foreach ($data['b'] as $index => $b_content)
			{
				$this->connect->query('INSERT INTO _link_option(question_id, a_content, b_content) VALUES(?, ?, ?)', array(
					$q_id,
					isset($data['a'][$index]) ? $a_content = $data['a'][$index] : NULL,
					$b_content
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
			$q_id = $this->generate_id();
			$this->connect->query('INSERT INTO question(id, content, exam_id, score, type) VALUES(?, ?, ?, ?, ?)', array(
				$q_id,
				$data['q'],
				$exam_id,
				$data['score'],
				GetData::$types['multiple-choice']
			));
			foreach ($data['content'] as $index => $content)
			{
				if (!isset($data['bool'][$index]))
				{
					throw new \Exception('Lỗi dữ liệu nhập', 2);
				}
				$this->connect->query('INSERT INTO _multiple_choice(question_id, content, answer) VALUES(?, ?, ?)', array(
					$q_id,
					$content,
					intval($data['bool'][$index])
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
	public function delete_Question($id)
	{
		try
		{
			$this->connect->query('DELETE FROM question WHERE question.id = ?', array($id));
			System::put_msg('success', 'Đã xóa một câu hỏi !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
}

?>