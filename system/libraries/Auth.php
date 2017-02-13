<?php

namespace App\System\Library;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Database\Sql_QueryCommand;
use App\System\Library\Session;
use App\System\System;

class Auth
{
	private static $SQL_QueryObj = NULL; // SQL check from Database
	private static $URI_redirect = array('success' => '', 'auth' => ''); // default redirect to current
	private static $Key = '__auth__'; // default key
	private static $Fail = 'Sai tên tài khoản hoặc mật khẩu'; // Fail Message
	public static function set_Key($key)
	{
		self::$Key = $key;
	}
	public static function SQL_Check($SQL_QueryObj)
	{
		self::$SQL_QueryObj = $SQL_QueryObj;
	}
	public static function redirect_Success($uri)
	{
		self::$URI_redirect['success'] = $uri;
	}
	public static function redirect_Auth($uri)
	{
		self::$URI_redirect['auth'] = $uri;
	}
	public static function attempt()
	{
		if (self::$SQL_QueryObj instanceof Sql_QueryCommand and ($result = self::$SQL_QueryObj->execute()->first()))
		{
			try
			{
				Session::set(self::$Key, $result);
			}
			catch (\Exception $e)
			{
				throw new \Exception('The <em>"Key"</em> is not set or invalid !', $e->getCode());
			}
		}
		else
		{
			throw new \Exception(self::$Fail);
		}
	}
	public static function validate()
	{
		if (Session::has(self::$Key))
		{
			if (self::$URI_redirect['success'])
			{
				System::redirect(self::$URI_redirect['success'], FALSE);
			}
		}	
		elseif (self::$URI_redirect['auth'])
		{
			System::redirect(self::$URI_redirect['auth'], FALSE);
		}
	}
	public static function get()
	{
		$ret = Session::get(self::$Key);
		if (is_object($ret))
		{
			return clone $ret;
		}
		return $ret;
	}
	public static function remove()
	{
		Session::remove(self::$Key);
		self::validate();
	}
}

?>
