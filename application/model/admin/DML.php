<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Database\Mysql;
use App\System\System;

class DML
{
	private function __construct()
	{
		// no thing
	}
	public static function insert_Exam($title)
	{
		try
		{
			$connect = new Mysql();
			$id = System::generate_uniqid();
			$ret = $connect->query('INSERT INTO exam(id, title) VALUES(?, ?)', array($id, $title));
			$connect->close();
			if ($ret == FALSE)
			{
				throw new \Exception("Lỗi, không thể thêm mới đề kiểm tra");
			}
			System::put_msg('success', "Đã thêm mới đề kiểm tra \"$title\"");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage());
		}
	}
	public static function delete_Exam($id)
	{
		try
		{
			$connect = new Mysql();
			$ret = $connect->query('DELETE FROM exam WHERE exam.id = ?', array($id));
			$connect->close();
			if (!$ret)
			{
				throw new \Exception("Lỗi, không thể xóa đề kiểm tra này");
			}
			System::put_msg('success', "Đã xóa thành công");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage());
		}
	}
	public static function insert_Question($exam_id, &$data)
	{
		try
		{
			$connect = new Mysql();
			$n_a = count($data['a']);
			$n_b = count($data['b']);
			if ($n_b < $n_a) throw new \Exception('Lỗi sai dữ liệu nhập');
			$id = System::generate_uniqid();
			$connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type) VALUES(?, ?, ?, ?, ?, ?, ?)', array(
				$id, $data['q'], $exam_id, $data['title']['a'], $data['title']['b'], $data['score'], 1
			));
			for ($i = 0; $i < $n_b; $i++)
			{
				$b_id = System::generate_uniqid();
				$connect->query('INSERT INTO _link_option_b(id, question_id, content, position) VALUES(?, ?, ?, ?)', array(
					$b_id, $id, $data['b'][$i], 1
				));
				if ($i < $n_a)
				{
					$a_id = System::generate_uniqid();
					$connect->query('INSERT INTO _link_option_a(id, option_b, question_id, content, position) VALUES(?, ?, ?, ?, ?)', array(
						$a_id, $b_id, $id, $data['a'][$i], 1
					));
				}
			}
			System::put_msg('success', 'Đã thêm mới một câu hỏi');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage() . $e->getTraceAsString(), FALSE);
		}
	}
	public static function insert_MultipleChoiceQuestion($exam_id, &$data)
	{
		try
		{
			$connect = new Mysql();
			$n_a = count($data['content']);
			$n_b = count($data['bool']);
			if ($n_a != $n_b) throw new \Exception('Lỗi sai dữ liệu nhập');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage());
		}
	}
	public static function delete_Question($id)
	{
		try
		{
			$connect = new Mysql();
			if ($connect->query('DELETE FROM question WHERE question.id = ?', array($id)))
			{
				System::put_msg('success', 'Đã xóa một câu hỏi');
			}
			else
			{
				throw new \Exception('Lỗi không thế xóa câu hỏi này');
			}
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e->getMessage());
		}
	}
}

?>