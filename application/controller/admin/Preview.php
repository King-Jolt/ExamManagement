<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/paper/View_Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Model\Admin\View_Question;
use App\System\System;

class Preview extends Admin
{
	private $id = 0;
	protected function on_get()
	{
		$this->id = System::input_get('exam_id'); 
	}
	protected function main()
	{
		$view = new View_Question($this->id);
		$data = array(
			'content' => $view->get()
		);
		$this->load_view('application/view/admin/question/preview.php', $data);
		$this->send_response();
		exit;
	}
	protected function output($html)
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