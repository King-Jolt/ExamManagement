<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Database\Mysql;
use App\System\System;

class DML
{
	public function __construct()
	{
		// later add
	}
	public static function insert_Exam($title)
	{
		try
		{
			$connect = new Mysql();
			$id = uniqid();
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
	private static function _gen_pos($length)
	{
		$arr = range(1, $length);
		shuffle($arr);
		return $arr;
	}
	public static function insert_Question($exam_id, &$data)
	{
		try
		{
			$connect = new Mysql();
			$n_a = count($data['a']);
			$n_b = count($data['b']);
			$a_pos = self::_gen_pos($n_a);
			$b_pos = self::_gen_pos($n_b);
			if ($n_b < $n_a) throw new Exception('Lỗi sai dữ liệu nhập');
			$id = uniqid();
			if (!$connect->query('INSERT INTO question(id, content, exam_id, a_title, b_title, score, type) VALUES(?, ?, ?, ?, ?, ?, ?)', array(
				$id, $data['q'], $exam_id, $data['title']['a'], $data['title']['b'], $data['score'], 1
			)))
			{
				throw new Exception('Lỗi không thể thêm mới câu hỏi');
			}
			for ($i = 0; $i < $n_b; $i++)
			{
				$b_id = uniqid();
				if (!$connect->query('INSERT INTO _option_b(id, question_id, content, position) VALUES(?, ?, ?, ?)', array(
					$b_id, $id, $data['b'][$i], $b_pos[$i]
				)))
				{
					throw new Exception('Lỗi dữ liệu nhập');
				}
				if ($i < $n_a)
				{
					$a_id = uniqid();
					if (!$connect->query('INSERT INTO _option_a(id, option_b, question_id, content, position) VALUES(?, ?, ?, ?, ?)', array(
						$a_id, $b_id, $id, $data['a'][$i], $a_pos[$i]
					)))
					{
						throw new Exception('Lỗi dữ liệu nhập');
					}
				}
			}
			System::put_msg('success', 'Đã thêm mới một câu hỏi');
		}
		catch (Exception $e)
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
				throw new Exception('Lỗi không thế xóa câu hỏi này');
			}
		}
		catch (Exception $e)
		{
			System::put_msg('warning', $e->getMessage());
		}
	}
}

?>