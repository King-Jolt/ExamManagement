<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Route.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/DML.php';

use App\System\Controller;
use App\System\System;
use App\System\Route;
use App\System\Library\Auth;
use App\Model\Super\DML;

abstract class Super extends Controller
{
	protected $user = NULL;
	protected $DML = NULL;
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
		parent::__construct();
	}
	/*
	protected $menu = array(
		'1' => array(
			'href' => '/index.php',
			'active' => 'active' // default
		),
		'2' => array(
			'href' => '#',
			'active' => ''
		)
	);
	 * 
	 */
	protected function output($html)
	{
		$header_data = array(
			'title' => 'Ứng dụng quản lý bài kiểm tra'
		);
		$frame_data = array(
			//'menu' => $this->menu,
			'content' => $html,
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