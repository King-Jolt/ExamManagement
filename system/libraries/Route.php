<?php

namespace System\Libraries;

use System\Core\Instance;

class Route
{
	private $_method;
	private $_name;
	private $_function;
	private function __construct()
	{
	}
	public static function add()
	{
		$argv = func_get_args();
		$argc = func_num_args();
		$obj = new self();
		switch ($argc)
		{
			case 1:
			case 2:
			{
				$obj->_method = TRUE;
				$obj->_name = TRUE;
				$obj->_function = $argv[0];
				break;
			}
			case 3:
			{
				$obj->_method = $argv[0];
				$obj->_name = $argv[1];
				$obj->_function = $argv[2];
				break;
			}
		}
		Instance::get()->stack('route')->append($obj);
	}
	public function method()
	{
		return $this->_method;
	}
	public function name()
	{
		return $this->_name;
	}
	public function func()
	{
		return $this->_function;
	}
	public function confirm()
	{
		return $this->_name === TRUE
		or ($this->_method == 'get' and array_key_exists($this->_name, $_GET))
		or ($this->_method == 'post' and array_key_exists($this->_name, $_POST));
	}
}

?>