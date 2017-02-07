<?php

namespace App\System;

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/UserConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Session.php';

use App\System\Library\Session;

class System
{
	public static function &get_config($name = NULL)
	{
		global $config;
		if ($name)
		{
			return $config[$name];
		}
		return $config;
	}
	public static function &get_user_config($name = NULL)
	{
		global $userconfig;
		if ($name)
		{
			return $userconfig[$name];
		}
		return $userconfig;
	}
	public static function input_get($attr)
	{
		return isset($_GET[$attr]) ? $_GET[$attr] : FALSE;
	}
	public static function input_post($attr)
	{
		return isset($_POST[$attr]) ? $_POST[$attr] : FALSE;
	}
	public static function redirect($location = NULL, $with_get = TRUE)
	{
		if ($with_get and $_GET)
		{
			$location .= '?' . http_build_query($_GET);
		}
		if (!$location)
		{
			$location = self::current_uri();
		}
		header('Location: ' . $location);
		exit;
	}
	public static function current_uri()
	{
		return $_SERVER['PHP_SELF'];
	}
	public static function show_404()
	{
		self::redirect('/system/error/404.php', TRUE, 404);
	}
	public static function alert($type, $msg)
	{
		$title = ucfirst($type);
		return <<<EOF
		<div class="alert alert-$type auto-close-msg">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong> $title! </strong> $msg
		</div>
EOF;
	}
	public static function put_msg($type, $msg)
	{
		$str = self::alert($type, $msg);
		Session::set('msg', $str);
	}
	public static function get_msg()
	{
		$r = Session::get('msg');
		Session::remove('msg');
		return $r;
	}
}

?>