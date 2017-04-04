<?php

namespace App\Model\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use System\Database\Mysql;
use System\Core\Misc;

class DML
{
	private $connect = NULL;
	public function __construct()
	{
		$this->connect = new Mysql();
	}
	public function update_ADMIN($o_user, $o_pass, $n_user, $n_pass)
	{
		try
		{
			$this->connect->query('UPDATE admin SET user = ?, pass = SHA1(?) WHERE user = ? AND pass = SHA1(?)', array(
				$n_user, $n_pass, $o_user, $o_pass
			));
			if ($this->connect->get_affected_rows())
			{
				Misc::put_msg('success', 'Đã cập nhật thành công, vui lòng đăng nhập lại !');
			}
			else
			{
				throw new \Exception('Mật khẩu và tài khoản cũ không chính xác', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function insert_Course($name)
	{
		try
		{
			$id = Misc::get_uid();
			$this->connect->query('INSERT INTO course(id, name) VALUES(?, ?)', array($id, $name));
			if ($this->connect->get_affected_rows())
			{
				Misc::put_msg('success', "Đã thêm bộ môn mới \"$name\"");
			}
			else
			{
				throw new \Exception('Không thể thêm mới bộ môn !', 2);
			}
			return $id;
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', $e->getMessage(), FALSE);
		}
	}
	public function delete_Course($id)
	{
		try
		{
			$this->connect->query('DELETE FROM course WHERE id = ?', array($id));
			if ($this->connect->get_affected_rows())
			{
				Misc::put_msg('success', 'Đã xóa một bộ môn');
			}
			else
			{
				throw new \Exception('', 2);
			}
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', 'Không thể xóa bộ môn này !', FALSE);
		}
	}
	public function insert_User($course_id, $user, $name)
	{
		try
		{
			$id = Misc::get_uid();
			$this->connect->query('INSERT INTO user(id, course_id, user, pass, name) VALUES(?, ?, ?, SHA1(?), ?)', array(
				$id, $course_id, $user, '12345678', $name
			));
			if ($this->connect->get_affected_rows())
			{
				Misc::put_msg('success', "Đã thêm mới tài khoản \"$user\" !");
			}
			else
			{
				throw new \Exception('Không thể thêm mới tài khoản !', 2);
			}
			return $id;
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', 'Tên tài khoản không được trùng với tài khoản khác', FALSE);
		}
	}
	public function delete_User($id)
	{
		try
		{
			$this->connect->query('DELETE FROM user WHERE id = ?', array($id));
			Misc::put_msg('success', 'Đã xóa một tài khoản !');
		}
		catch (\Exception $e)
		{
			Misc::put_msg('warning', 'Tài khoản này đang chứa dữ liệu => Không thể xóa !', FALSE);
		}
	}
}

?>