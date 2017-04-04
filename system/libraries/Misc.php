<?php

namespace System\Libraries;

class Misc
{
	public static function get_config($name = NULL)
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/config/Config.php';
		if ($name)
		{
			return $config[$name];
		}
		return $config;
	}
	public static function get_user_config($name = NULL)
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/config/UserConfig.php';
		if ($name)
		{
			return $userconfig[$name];
		}
		return $userconfig;
	}
	public static function show_error($code)
	{
		header("Location: ${_SERVER['DOCUMENT_ROOT']}/system/error/${code}.php", TRUE, $code);
	}
}

?>