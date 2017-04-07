<?php

namespace System\Common;

class Config
{
	public static function &get($name = NULL)
	{
		require $_SERVER['DOCUMENT_ROOT'] . '/config/Config.php';
		if ($name) return $config[$name];
		return $config;
	}
}