<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Controller;
use App\System\Library\Auth;
use App\System\Database\Sql_QueryCommand;
use App\System\System;

class Login extends Controller
{
	public function __construct()
	{
		Auth::set_Key('super');
		Auth::redirect_Success('/super/course.php');
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
					System::put_msg('danger', $e->getMessage(), FALSE);
				}
				System::redirect();
				break;
			}
		}
	}
	protected function main()
	{
		$path = '/application/view/super/login.php';
		$this->load_view($path, array(
			'msg' => System::get_msg()
		));
	}
	protected function output($html)
	{
		echo $this->load_view('application/view/super/template/header.php', array('title' => 'Đăng nhập hệ thống'), FALSE);
		echo $html;
		echo $this->load_view('application/view/super/template/footer.php', NULL, FALSE);
	}
}

?>