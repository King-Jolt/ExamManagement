<?php

namespace System\Libraries;

class Auth
{
	private static $Callback = NULL; // SQL check from Database
	private static $URI_redirect = array('success' => '', 'auth' => ''); // default redirect to current
	private static $Key = '__auth__'; // default key
	public static $Fail = 'Sai tên tài khoản hoặc mật khẩu'; // Fail Message
	public static function set_Key($key)
	{
		self::$Key = $key;
	}
	public static function set_Function($cb)
	{
		self::$Callback = $cb;
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
		$f = self::$Callback;
		if (($data = $f()))
		{
			Session::set(self::$Key, $data);
		}
		else
		{
			throw new Exception\Auth_NotValidate(self::$Fail);
		}
	}
	public static function validate()
	{
		if (Session::has(self::$Key))
		{
			if (self::$URI_redirect['success'])
			{
				Request::redirect(self::$URI_redirect['success'], $_GET);
			}
		}	
		elseif (self::$URI_redirect['auth'])
		{
			Request::redirect(self::$URI_redirect['auth'], $_GET);
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
