<?php

namespace App\Model\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Database\Mysql;
use App\System\System;

class DML
{
	private $connect = NULL;
	public function __construct()
	{
		$this->connect = new Mysql();
	}
	public function insert_Course($name)
	{
		try
		{
			$this->connect->query('INSERT INTO course(name) VALUES(?)', array($name));
			System::put_msg('success', "Đã thêm bộ môn mới \"$name\"");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', $e, FALSE);
		}
	}
	public function delete_Course($id)
	{
		try
		{
			$this->connect->query('DELETE FROM course WHERE id = ?', array($id));
			System::put_msg('success', 'Đã xóa một bộ môn');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', 'Không thể xóa bộ môn này !', FALSE);
		}
	}
	public function insert_User($course_id, $user, $name)
	{
		try
		{
			$this->connect->query('INSERT INTO user(course_id, user, pass, name) VALUES(?, ?, ?, ?)', array(
				$course_id, $user, '12345678', $name
			));
			System::put_msg('success', "Đã thêm mới tài khoản \"$user\" !");
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', 'Tên tài khoản không được trùng với tài khoản khác', FALSE);
		}
	}
	public function delete_User($id)
	{
		try
		{
			$this->connect->query('DELETE FROM user WHERE id = ?', array($id));
			System::put_msg('success', 'Đã xóa một tài khoản !');
		}
		catch (\Exception $e)
		{
			System::put_msg('warning', 'Tài khoản này đang chứa dữ liệu => Không thể xóa !', FALSE);
		}
	}
}

?>