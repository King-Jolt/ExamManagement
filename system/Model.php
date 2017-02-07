<?php

namespace App\System;

class Model
{
	private $_controller = NULL;
	public function __construct($controller = NULL)
	{
		$this->_controller = $controller;
	}
	public function controller()
	{
		return $this->_controller;
	}
}

?>