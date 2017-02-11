<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Auth.php';

use App\System\Controller;
use App\System\Library\Auth;

abstract class Admin extends Controller
{
	public function __construct()
	{
		Auth::set_Key('admin');
		Auth::redirect_Fail('/index.php'); // redirect to Login page if have not login
		Auth::validate();
		parent::__construct();
	}
	protected $menu = array(
		'1' => array(
			'href' => '/application/admin/index.php',
			'active' => 'active' // default
		),
		'2' => array(
			'href' => '#',
			'active' => ''
		)
	);
	final protected function output($html)
	{
		$header_data = array('title' => 'Ứng dụng quản lý bài kiểm tra');
		$frame_data = array('menu' => $this->menu, 'content' => $html);
		$footer_data = NULL;
		$response = $this->load_view('application/view/admin/template/header.php', $header_data, FALSE);
		$response .= $this->load_view('application/view/admin/template/frame.php', $frame_data, FALSE);
		$response .= $this->load_view('application/view/admin/template/footer.php', $footer_data, FALSE);
		echo $response;
	}
}


?>