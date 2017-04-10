<?php

namespace System\Core;

class Bootstrap
{
	public static function load()
	{
		try
		{
			$controller = Instance::create();
			if ($controller['static'])
			{
				$controller['class']::$controller['method']();
			}
			else
			{
				$obj_controller = new $controller['class']();
				$obj_controller->{$controller['method']}();
				$obj_controller->send_response();
			}
		}
		catch (Exception\UndefinedController $e)
		{
			http_response_code(404);
			require $_SERVER['DOCUMENT_ROOT'] . '/system/page/404.html';
			exit;
		}
		catch (\Exception $e)
		{
			$error = ob_get_contents();
			ob_clean();
			require $_SERVER['DOCUMENT_ROOT'] . '/system/page/error.html';
			exit;
		}
	}
}
