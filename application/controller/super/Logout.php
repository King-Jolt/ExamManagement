<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use System\Controller;
use System\Library\Auth;
use System\Core\Misc;

class Logout extends Controller 
{
	protected function main()
	{
		Auth::set_Key('super');
		Auth::redirect_Auth(Misc::current_path() . '/index.php');
		Auth::remove();
	}
}

?>