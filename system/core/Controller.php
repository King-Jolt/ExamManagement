<?php

namespace System\Core;

use System\Libraries\Request;

class Controller
{
	public function __call($name, $arguments)
	{
		if (method_exists($this, $name))
		{
			call_user_func_array(array($this, $name), $arguments);
			$this->load_routes();
			$this->send_response();
		}
		else
		{
			throw new Exception\Controller_MethodNotExist("Method \"$name()\" not exists");
		}
	}
	private function load_routes()
	{
		$list = Instance::get()->stack('route');
		foreach ($list as $obj)
		{
			if ($obj->confirm())
			{
				$args = array();
				switch ($obj->method())
				{
					case 'get':
					{
						array_push($args, Request::get($obj->name()));
						break;
					}
					case 'post':
					{
						array_push($args, Request::post($obj->name()));
						break;
					}
				}
				$f = $obj->func();
				if (is_callable($f))
				{
					call_user_func_array($f, $args);
				}
				else if (is_string($f))
				{
					call_user_func_array(array($this, $f), $args);
				}
			}
		}
	}
	private function load_views()
	{
		$html = '';
		$list = Instance::get()->stack('view');
		foreach ($list as $view)
		{
			$html .= $view->html();
		}
		return $html;
	}
	final protected function send_response($data = NULL)
	{
		if ($data)
		{
			echo $data;
		}
		else
		{
			$this->output($this->load_views());
		}
		exit;
	}
	protected function output($html)
	{
		echo $html;
	}
}

?>