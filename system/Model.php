<?php

namespace App\System;

class Model
{
	private $_controller = NULL;
	public function __construct($controller)
	{
		if ($controller instanceof Controller)
		{
			$this->_controller = $controller;
		}
		else
		{
			throw new \Exception('Construct parameter is not Controller Object !', 2);
		}
	}
	public function controller()
	{
		return $this->_controller;
	}
}

?>
