<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';

use App\System\Controller;

abstract class Admin extends Controller
{
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