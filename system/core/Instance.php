<?php

namespace System\Core;

use System\Libraries\Misc;
use System\Libraries\Request;

class Instance
{
	private static $instance = FALSE;
	private $stack = array();
	private $controller = FALSE;
	private function __construct()
	{
		$request = Request::get_request_uri();
		if (!$request or !class_exists($request['class']))
		{
			throw new Exception\Controller_NotAvailable("Can not found controller !");
		}
		$this->controller = $request;
		$this->stack = array(
			'view' => new \ArrayObject(array()),
			'route' => new \ArrayObject(array())
		);
	}
	public static function create()
	{
		self::$instance = new self();
		return self::$instance->controller;
	}
	public static function get()
	{
		return self::$instance;
	}
	public function stack($type)
	{
		if (isset($this->stack[$type]))
		{
			return $this->stack[$type];
		}
		return FALSE;
	}
}

?>