<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Navigation.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/DML.php';

use System\Controller;
use System\Core\Misc;
use System\Library\Auth;
use System\Library\Navigation;
use Model\Super\DML;

abstract class Super extends Controller
{
	protected $user = NULL;
	protected $DML = NULL;
	protected $nav = NULL;
	protected $menu = array();
	public function __construct()
	{
		Auth::set_Key('super');
		Auth::redirect_Auth(Misc::current_path() . '/index.php'); // redirect to Login page if have not login
		Auth::validate();
		$this->init();
		$this->user = Auth::get();
		try
		{
			$this->DML = new DML();
		}
		catch (\Exception $e)
		{
			echo Misc::get_exception_msg($e);
			exit;
		}
		$this->nav = new Navigation();
		$this->nav->add('Danh sách môn học', Misc::current_path() . '/course.php');
		if ($this->request_get('course_id'))
		{
			$this->nav->add('Danh sách tài khoản', '');
		}
		parent::__construct();
	}
	private function init()
	{
		$this->menu = array(
			'manage' => array(
				'href' => Misc::current_path() . '/course.php',
				'active' => ''
			),
			'chpw' => array(
				'href' => Misc::current_path() . '/chpw.php',
				'active' => ''
			),
			'logout' => array(
				'href' => Misc::current_path() . '/logout.php',
				'active' => ''
			)
		);
	}
	protected function output($html)
	{
		$header_data = array(
			'title' => 'Ứng dụng quản lý bài kiểm tra'
		);
		$frame_data = array(
			'menu' => $this->menu,
			'content' => $html,
			'nav' => $this->nav->get(),
			'user' => $this->user
		);
		$footer_data = NULL;
		$response = $this->load_view('application/view/super/template/header.php', $header_data, FALSE);
		$response .= $this->load_view('application/view/super/template/frame.php', $frame_data, FALSE);
		$response .= $this->load_view('application/view/super/template/footer.php', $footer_data, FALSE);
		echo $response;
	}
}


?>