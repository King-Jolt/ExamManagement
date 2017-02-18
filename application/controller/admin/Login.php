<?php

namespace App\Controller\Admin;

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
		Auth::set_Key('admin');
		Auth::redirect_Success('/admin/index.php');
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
				$course_id = $this->request_post('course');
				Auth::SQL_Check(new Sql_QueryCommand('SELECT * FROM user WHERE user = ? AND pass = SHA1(?) AND course_id = ?', array($user, $pass, $course_id)));
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
		$query = new Sql_QueryCommand('SELECT course.* FROM course');
		$c_data = '';
		try
		{
			$c_data = $query->execute()->get_data();
		}
		catch (\Exception $e)
		{
			$this->error($e);
		}
		$path = '/application/view/admin/login.php';
		$this->load_view($path, array(
			'course_data' => $c_data,
			'msg' => System::get_msg()
		));
	}
}

?>