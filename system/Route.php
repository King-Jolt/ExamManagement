<?php

namespace App\System;

//require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

class Route
{
	public static function current_path()
	{
		return preg_replace('/\/([^\/]*$)/', '', $_SERVER['SCRIPT_NAME']);
	}
}

?>