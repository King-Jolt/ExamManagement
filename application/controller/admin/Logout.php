<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Route.php';

use App\System\Controller;
use App\System\Library\Auth;
use App\System\Route;

class Logout extends Controller 
{
	protected function main()
	{
		Auth::set_Key('admin');
		Auth::redirect_Auth(Route::current_path() . '/index.php');
		Auth::remove();
	}
}

?>