<?php

namespace App\System\Library;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';

use App\System\Database\Sql_QueryCommand;

class Auth
{
	private static $obj = FALSE;
	public static function validate($user, $pass, $throw_ex = TRUE)
	{
		$query = new Sql_QueryCommand('SELECT user.* FROM user WHERE user.user = ? AND user.pass = SHA1(?)', array(
			$user, $pass
		));
		$result = $query->execute();
		if ($result->num_rows())
		{
			self::$obj = $result->get_data()->current();
		}
		else
		{
			self::$obj = FALSE;
			throw new \Exception('Lỗi đăng nhập : Tài khoản hoặc mật khẩu không chính xác !');
		}
	}
	public static function get()
	{
		return self::$obj;
	}
	private function __construct($user, $pass) { /* Not accept Construct this Class */ }
}

?>