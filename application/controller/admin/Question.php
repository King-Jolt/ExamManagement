<?php

namespace Application\Controller\Admin;

use Application\Controller\Admin\Admin;
use Application\Model\Admin\Question\Model;
use System\Libraries\Request;
use System\Libraries\Route;
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
		$this->nav->add('Quản lý câu hỏi', '#');
		$this->model = new Model();
	}

	protected function index()
	{
		Route::add(function(){
			View::add('admin/question/page.php', array(
				'table' => $this->model->getTable()
			));
		});
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
