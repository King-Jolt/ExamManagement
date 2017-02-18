<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/table/Question_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/paper/View_Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Model;
use App\Model\Admin\Question_Table;
use App\Model\Admin\View_Question;
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
	public function view($option = FALSE)
	{
		$view = new View_Question($this->exam_id);
		$data = array(
			'title' => 'Xem các câu hỏi',
			'content' => $view->get()
		);
		if ($option)
		{
			$data['ans_btn'] = <<<EOF
			<a href="javascript:void(0)" id="view-answer" class="btn btn-primary btn-xs" data-toggle="popover" data-content="Bấm vào đây để xem đáp án" data-click="show"><span class="glyphicon glyphicon-comment"></span>&nbsp;Xem đáp án </a>
EOF;
		}
		$this->controller()->load_view('application/view/admin/question/content.php', $data);
	}
	public function view_with_answer()
	{
		$view = new Question($this->exam_id);
		$data = array(
			'title' => 'Xem đề thi với đáp án',
			'content' => $view->get()
		);
		$this->controller()->load_view('application/view/admin/question/content.php', $data);
	}
	private function _add_button()
	{
		$url = array(
			'link' => '?' . http_build_query(array_merge($_GET, array('action' => 'add', 'type' => 'link'))),
			'mchoice' => '?' . http_build_query(array_merge($_GET, array('action' => 'add', 'type' => 'multiple-choice'))),
			'fill' => '?' . http_build_query(array_merge($_GET, array('action' => 'add', 'type' => 'fill'))),
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
		$table = new Question_Table($this->exam_id);
		$data = array(
			'title' => 'Quản lý các câu hỏi',
			'add' => $this->_add_button(),
			'content' => $table->get(),
			'msg' => System::get_msg()
		);
		$this->controller()->load_view('application/view/admin/question/content.php', $data);
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
				$form = $this->controller()->load_view('application/view/admin/question/add_form/link.php', $data, FALSE);
				break;
			}
			case 'multiple-choice':
			{
				$data = array(
					'title' => 'Thêm câu chọn đáp án',
					'action' => 'add-question', 'type' => 'multiple-choice'
				);
				$form = $this->controller()->load_view('application/view/admin/question/add_form/multiple_choice.php', $data, FALSE);
				break;
			}
		} 
		$data = array(
			'title' => 'Thêm câu hỏi mới',
			'content' => $form
		);
		$this->controller()->load_view('application/view/admin/ckeditor.php'); // use CKEditor for Input
		$this->controller()->load_view('application/view/admin/question/content.php', $data);
	}
}

?>