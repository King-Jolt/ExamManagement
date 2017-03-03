<?php

namespace App\System;

class Route
{
	public static function current_path()
	{
		return preg_replace('/\/([^\/]*$)/', '', $_SERVER['SCRIPT_NAME']);
	}
}

?>