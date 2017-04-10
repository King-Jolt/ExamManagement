<?php

namespace Application\Controller\Admin;

use Application\Controller\Admin\Admin;
use Application\Model\Admin\Question\Model;
use Application\Model\Misc;
use System\Libraries\Request;
use System\Libraries\View;

class Question extends Admin
{
	private $model = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->nav->add('Quản lý danh mục', '/admin/category');
		$this->nav->add('Quản lý đề thi', sprintf('/admin/category/%s/exam', Request::params('category_id')));
		$this->nav->add('Quản lý nhóm câu hỏi', sprintf("/admin/category/%s/exam/%s/group", Request::params('category_id'), Request::params('exam_id')));
		$this->nav->add('Quản lý câu hỏi', sprintf("/admin/category/%s/exam/%s/group/%s/question", Request::params('category_id'), Request::params('exam_id'), Request::params('group_id')));
		$this->model = new Model();
	}
	public function index()
	{
		if (Request::post('delete'))
		{
			var_dump(Request::post('id'));
			$this->model->deleteQuestion(Request::post('id'));
			$this->redirectToIndex();
		}
		$add = sprintf("/admin/category/%s/exam/%s/group/%s/question/insert", Request::params('category_id'), Request::params('exam_id'), Request::params('group_id'));
		View::add('admin/question/page.php', array(
			'add_a' => $add . '/multiple_choice',
			'add_b' => $add . '/link',
			'add_c' => $add . '/fill',
			'table' => $this->model->getTable(),
			'msg' => Misc::get_msg()
		));
	}
	public function insertQuestion()
	{
		if (Request::post('insert'))
		{
			switch (Request::params('question_type'))
			{
			case 'multiple_choice':
				$this->model->insertMultipleChoiceQuestion(
					Request::post('content'),
					Request::post('options'),
					is_numeric(Request::post('score')) ? Request::post('score') : NULL
				);
				break;
			}
			$this->redirectToIndex();
		}
		else
		{
			$this->nav->add('Thêm câu hỏi mới', '');
			View::add('admin/ckeditor.php');
			switch (Request::params('question_type'))
			{
			case 'multiple_choice':
				View::add('admin/question/insert/multiple_choice.php');
				break;
			case 'fill':
				View::add('admin/question/insert/fill.php');
				break;
			}
		}
	}
	private function redirectToIndex()
	{
		Request::redirect(sprintf("/admin/category/%s/exam/%s/group/%s/question",
			Request::params('category_id'),
			Request::params('exam_id'),
			Request::params('group_id')
		));
	}
	/*
	private $category_id = NULL;
	private $exam_id = NULL;
	private $question = NULL;
	public function __construct()
	{
		parent::__construct();
	}
	protected function on_get()
	{
		$this->category_id = $this->request_get('category_id');
		$this->exam_id = $this->request_get('exam_id');
		$this->question = new Model_Question($this->user->id, $this->category_id, $this->exam_id);
		// action
		$action = $this->request_get('action');
		if ($action)
		{
			switch ($action)
			{
				case 'add':
				{
					$this->load_view('application/view/admin/ckeditor.php'); // use CKEditor for Input
					$this->load_view($this->question->add($this->request_get('type')));
					$this->nav->add('Thêm câu hỏi', '');
					break;
				}
				case 'delete':
				{
					$this->DML->delete_Question(
						$this->user->id,
						$this->category_id,
						$this->exam_id,
						$this->request_get('id')
					);
					unset($_GET['action'], $_GET['id']);
					Misc::redirect();
				}
			}
		}
		else
		{
			$this->load_view($this->question->manage());
		}
	}
	protected function on_post()
	{
		if (($type = Misc::input_post('add-question')))
		{
			$data = Misc::input_post('q');
			switch ($type)
			{
				case 'link':
				{
					$this->DML->insert_LinkQuestion($this->exam_id, $data);
					break;
				}
				case 'multiple-choice':
				{
					$this->DML->insert_MultipleChoiceQuestion($this->exam_id, $data);
					break;
				}
				case 'fill':
				{
					$this->DML->insert_FillQuestion($this->exam_id, $data);
					break;
				}
			}
			unset($_GET['action'], $_GET['type']);
			Misc::redirect();
		}
	}
	protected function main()
	{
		$this->menu['manage']['active'] = 'active';
	}
	 * 
	 */
}
