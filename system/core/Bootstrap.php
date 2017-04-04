<?php

namespace System\Core;

class Bootstrap
{
	public static function load()
	{
		$controller = Instance::create();
		if ($controller['static'])
		{
			$controller['class']::$controller['method']();
		}
		else
		{
			$obj_controller = new $controller['class']();
			$obj_controller->$controller['method']();
		}
	}
}
