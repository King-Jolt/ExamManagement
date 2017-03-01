<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Route.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Navigation.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/DML.php';

use App\System\Controller;
use App\System\System;
use App\System\Route;
use App\System\Library\Auth;
use App\System\Library\Navigation;
use App\Model\Super\DML;

abstract class Super extends Controller
{
	protected $user = NULL;
	protected $DML = NULL;
	protected $nav = NULL;
	protected $menu = array(
		'manage' => array(
			'href' => '/super/course.php',
			'active' => ''
		),
		'chpw' => array(
			'href' => '/super/chpw.php',
			'active' => ''
		),
		'logout' => array(
			'href' => '/super/logout.php',
			'active' => ''
		)
	);
	public function __construct()
	{
		Auth::set_Key('super');
		Auth::redirect_Auth(Route::current_path() . '/index.php'); // redirect to Login page if have not login
		Auth::validate();
		$this->user = Auth::get();
		try
		{
			$this->DML = new DML();
		}
		catch (\Exception $e)
		{
			echo System::get_exception_msg($e);
			exit;
		}
		$this->nav = new Navigation();
		$this->nav->add('Danh sách môn học', Route::current_path() . '/course.php');
		if ($this->request_get('course_id'))
		{
			$this->nav->add('Danh sách tài khoản', '');
		}
		parent::__construct();
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