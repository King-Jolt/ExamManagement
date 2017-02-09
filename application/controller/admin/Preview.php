<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/View_Question.php';

use App\System\Controller;
use App\System\System;
use App\Model\Admin\View_Question;

class Preview extends Controller
{
	private $id = 0;
	protected function on_get()
	{
		$this->id = System::input_get('id'); 
	}
	protected function main()
	{
		$view = new View_Question($this->id);
		$data = array(
			'content' => $view->get()
		);
		$this->load_view('application/view/admin/preview_exam.php', $data);
		$this->interrupt();
		exit;
	}
	final protected function output($html)
	{
		$header_data = array('title' => 'Ứng dụng quản lý bài kiểm tra');
		$footer_data = NULL;
		$response = $this->load_view('application/view/admin/template/header.php', $header_data, FALSE);
		$response .= $html;
		$response .= $this->load_view('application/view/admin/template/footer.php', $footer_data, FALSE);
		echo $response;
	}
}

?>