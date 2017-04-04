<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use System\Controller;
use System\Library\Auth;
use System\Database\Sql_QueryCommand;
use System\Core\Misc;

class Login extends Controller
{
	public function __construct()
	{
		Auth::set_Key('super');
		Auth::redirect_Success(Misc::current_path() . '/course.php');
		Auth::validate();
		parent::__construct();
	}
	protected function on_post()
	{
		$btn_action = $this->request_post('btn-action');
		switch ($btn_action)
		{
			case 'login':
			{
				$user = $this->request_post('user');
				$pass = $this->request_post('pass');
				Auth::SQL_Check(new Sql_QueryCommand('SELECT * FROM admin WHERE user = ? AND pass = SHA1(?)', array($user, $pass)));
				try
				{
					Auth::attempt();
					Auth::validate();
				}
				catch (\Exception $e)
				{
					Misc::put_msg('danger', $e->getMessage(), FALSE);
				}
				Misc::redirect();
				break;
			}
		}
	}
	protected function main()
	{
		$path = '/application/view/super/login.php';
		$this->load_view($path, array(
			'msg' => Misc::get_msg()
		));
	}
}

?>