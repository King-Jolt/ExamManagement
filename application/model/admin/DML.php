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
	private function __construct()
	{
		// prevent DML instance
	}
	public static function insert_Exam($title)
	{
		try
		{
			$connect = new Mysql();
			$connect->query('INSERT INTO exam(id, title) VALUES(?, ?)', array(System::generate_uniqid(), $title));
			$connect->close();
			System::put_msg('success', "Đã thêm mới đề kiểm tra \"$title\" !");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public static function delete_Exam($id)
	{
		try
		{
			$connect = new Mysql();
			$connect->query('DELETE FROM exam WHERE exam.id = ?', array($id));
			$connect->close();
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
			$connect = new Mysql();
			$connect->query('CALL shuffle_question(?)', array($id));
			$connect->close();
			System::put_msg('success', 'Đã xáo trộn đề thi thành công !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public static function insert_LinkQuestion($exam_id, &$data)
	{
		try
		{
			$connect = new Mysql();
			$id = System::generate_uniqid();
			$connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type) VALUES(?, ?, ?, ?, ?, ?, ?)', array(
				$id,
				$data['q'],
				$exam_id,
				$data['title']['a'],
				$data['title']['b'],
				$data['score'],
				GetData::$types['link']
			));
			foreach ($data['b'] as $index => $b_content)
			{
				$b_id = System::generate_uniqid();
				$connect->query('INSERT INTO _link_option_b(id, question_id, content) VALUES(?, ?, ?)', array(
					$b_id,
					$id,
					$b_content
				));
				if (isset($data['a'][$index]))
				{
					$a_id = System::generate_uniqid();
					$connect->query('INSERT INTO _link_option_a(id, option_b, question_id, content) VALUES(?, ?, ?, ?)', array(
						$a_id,
						$b_id,
						$id,
						$data['a'][$index]
					));
				}
			}
			System::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public static function insert_MultipleChoiceQuestion($exam_id, &$data)
	{
		try
		{
			$connect = new Mysql();
			$id = System::generate_uniqid();
			$connect->query('INSERT question(id, content, exam_id, score, type) VALUES(?, ?, ?, ?, ?)', array(
				$id,
				$data['q'],
				$exam_id,
				$data['score'],
				GetData::$types['multiple-choice']
			));
			foreach ($data['content'] as $index => $content)
			{
				if (!isset($data['bool'][$index]))
				{
					throw new \Exception('Lỗi dữ liệu nhập');
				}
				$connect->query('INSERT _multiple_choice(id, question_id, content, answer) VALUES(?, ?, ?, ?)', array(
					System::generate_uniqid(),
					$id,
					$content,
					intval($data['bool'][$index])
				));
			}
			System::put_msg('success', 'Đã thêm mới một câu hỏi !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public static function delete_Question($id)
	{
		try
		{
			$connect = new Mysql();
			$connect->query('DELETE FROM question WHERE question.id = ?', array($id));
			$connect->close();
			System::put_msg('success', 'Đã xóa một câu hỏi !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
}

?>