<?php

namespace App\System\Library;

class Session
{
	private static $_key = 'app';
	public static function start()
	{
		if (session_status() == PHP_SESSION_NONE)
		{
			session_start();
			if (!isset($_SESSION[self::$_key]))
			{
				$_SESSION[self::$_key] = array();
			}
		}
	}
	public static function destroy()
	{
		if (session_status() == PHP_SESSION_ACTIVE)
		{
			session_destroy();
		}
	}
	public static function set($key, $value)
	{
		self::start();
		$_SESSION[self::$_key][$key] = $value;
	}
	public static function has($key)
	{
		self::start();
		return isset($_SESSION[self::$_key][$key]);
	}
	public static function get($key)
	{
		self::start();
		return self::has($key) ? $_SESSION[self::$_key][$key] : NULL;
	}
	public static function remove($key)
	{
		self::start();
		unset($_SESSION[self::$_key][$key]);
	}
}

?>