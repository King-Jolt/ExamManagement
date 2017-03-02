<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/paper/View_Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Model\Admin\View_Question;
use App\System\System;

class Preview extends Admin
{
	private $view = NULL;
	private $script = NULL;
	protected function on_get()
	{
		$this->view = new View_Question(
			$this->user->id,
			$this->request_get('category_id'),
			$this->request_get('exam_id')
		);
		if ($this->request_get('show') == 'answer')
		{
			$this->script = '<script> obj_q.show(); </script>';
		}
	}
	protected function main()
	{
		$data = array(
			'content' => $this->view->get(TRUE),
			'script' => $this->script
		);
		$this->load_view('application/view/admin/question/preview.php', $data);
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