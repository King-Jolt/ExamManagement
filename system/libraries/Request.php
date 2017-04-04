<?php

namespace System\Libraries;

class Request
{
	private static $_params = FALSE;
	public static function params()
	{
		return self::$_params;
	}
	public static function get($attr = NULL)
	{
		if ($attr === NULL) return $_GET;
		return isset($_GET[$attr]) ? $_GET[$attr] : FALSE;
	}
	public static function post($attr = NULL)
	{
		if ($attr === NULL) return $_POST;
		return isset($_POST[$attr]) ? $_POST[$attr] : FALSE;
	}
	public static function get_request_uri()
	{
		$uri = self::current_uri();
		$get_routes = Misc::get_config('routes');
		$obj_ret = array(
			'class' => '',
			'static' => '',
			'method' => ''
		);
		foreach ($get_routes as $request => $controller)
		{
			$param = array();
			$regex_request = preg_replace_callback('/\{(\w+)\}/i', function($m) use (&$param) {
				foreach (array_slice($m, 1) as $k)
				{
					$param[$k] = NULL;
				}
				return '(\w+)';
			}, preg_replace('/\//i', '\/', $request));
			$matches = array();
			if (preg_match("/^$regex_request$/i", $uri, $matches))
			{
				if (count($matches) >= 2)
				{
					array_map(function($var, $value) use (&$param) {
						$param[$var] = $value;
						return TRUE;
					}, array_keys($param), array_slice($matches, 1));
					self::$_params = $param;
				}
				preg_match('/^([^\:]+)(\:*)([^\:]*)$/i', $controller, $matches);
				$obj_ret['class'] = "\\Application\\Controller\\$matches[1]";
				$obj_ret['static'] = $matches[2] == '::' ? TRUE : FALSE;
				$obj_ret['method'] = ($matches[3] == '' ? 'index' : $matches[3]);
				return $obj_ret;	
			}
		}
		return FALSE;
	}
	public static function redirect($location = NULL, $data = NULL)
	{
		if (!$location)
		{
			$location = self::current_uri();
		}
		$query = array();
		$n = func_num_args();
		if ($n >= 2)
		{
			for ($i = 1; $i < $n; $i++)
			{
				$arr = func_get_arg($i);
				if (is_array($arr) and !empty($arr))
				{
					$query = array_merge($query, $arr);
				}
			}
		}
		$location .= self::build_get($query);
		header('Location: ' . $location);
		exit;
	}
	public static function current_uri()
	{
		$file = preg_quote(basename($_SERVER["SCRIPT_FILENAME"]));
		return preg_replace("/(^\/{$file})*([^\?]+)(.*$)/", '$2', $_SERVER['REQUEST_URI']);
	}
	public static function current_path()
	{
		return preg_replace('/\/([^\/]*$)/', '', $_SERVER['SCRIPT_NAME']);
	}
	public static function build_get()
	{
		$data = array();
		foreach (func_get_args() as $index => $arr)
		{
			if (is_array($arr))
			{
				$data = array_merge($data, $arr);
			}
		}
		if (empty($data)) return '';
		return '?' . http_build_query($data);
	}
}

?>