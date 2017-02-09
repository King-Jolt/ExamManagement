<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/Question_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/View_Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Model;
use App\Model\Admin\Question_Table;
use App\Model\Admin\View_Question;
use App\Model\Admin\GetData;
use App\System\System;

class Question extends Model
{
	private $exam_id = 0;
	public function exam_ID($id)
	{
		$this->exam_id = $id;
	}
	public function preview()
	{
		$view = new View_Question($this->exam_id);
		$data = array(
			'content' => $view->get()
		);
		$this->controller()->load_view('application/view/admin/preview_exam.php', $data);
	}
	public function view()
	{
		$view = new View_Question($this->exam_id);
		$data = array(
			'title' => 'Xem các câu hỏi',
			'content' => $this->controller()->load_view('application/view/admin/view_question.php', array('view' => $view->get()), FALSE)
		);
		$this->controller()->load_view('application/view/admin/question.php', $data);
	}
	private function _add_button()
	{
		$url = array(
			'link' => '?' . http_build_query(array_merge($_GET, array('add-question' => 'link'))),
			'mchoice' => '?' . http_build_query(array_merge($_GET, array('add-question' => 'multiple-choice'))),
			'fill' => '?' . http_build_query(array_merge($_GET, array('add-question' => 'fill'))),
		);
		$btn = <<<EOF
		<div class="form-group">
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="color: #fff"> Thêm câu hỏi mới &nbsp;<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="$url[link]" class="add-choice"> Ghép nối </a></li>
					<li><a href="$url[mchoice]" class="add-link"> Chọn đáp án </a></li>
					<li><a href="$url[fill]" class="add-fill"> Điền khuyết </a></li>
				</ul>
			</div>
		</div>
EOF;
		return $btn;
	}
	public function manage()
	{
		$q_table = new Question_Table($this->exam_id);
		$data = array(
			'title' => 'Quản lý các câu hỏi',
			'add' => $this->_add_button(),
			'content' => $q_table->get(),
			'msg' => System::get_msg()
		);
		$this->controller()->load_view('application/view/admin/question.php', $data);
	}
	public function add($type)
	{
		$form = '';
		switch ($type)
		{
			case 'link':
			{
				$data = array(
					'title' => 'Thêm câu ghép nối',
					'action' => 'add-question', 'type' => 'link'
				);
				$form = $this->controller()->load_view('application/view/admin/question_type/link.php', $data, FALSE);
				break;
			}
			case 'multiple-choice':
			{
				$data = array(
					'title' => 'Thêm câu chọn đáp án',
					'action' => 'add-question', 'type' => 'multiple-choice'
				);
				$form = $this->controller()->load_view('application/view/admin/question_type/multiple_choice.php', $data, FALSE);
				break;
			}
		} 
		$data = array(
			'title' => 'Thêm câu hỏi mới',
			'content' => $form
		);
		$this->controller()->load_view('application/view/admin/ckeditor.php'); // use CKEditor for Input
		$this->controller()->load_view('application/view/admin/question.php', $data);
	}
}

?>