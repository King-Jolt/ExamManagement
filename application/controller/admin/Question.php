<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/Model_Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\Model_Question;
use App\System\System;

class Question extends Admin
{
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
					System::redirect();
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
		if (($type = System::input_post('add-question')))
		{
			$data = System::input_post('q');
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
			System::redirect();
		}
	}
	protected function main()
	{
		$this->menu['manage']['active'] = 'active';
	}
}

?>