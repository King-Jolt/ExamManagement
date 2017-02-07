<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/DML.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\DML;
use App\Model\Admin\Question;
use App\System\System;

class Exam extends Admin
{
	private $selected_id = NULL;
	private $question = NULL;
	public function __construct()
	{
		$this->question = new Question($this);
		parent::__construct();
	}
	protected function on_get()
	{
		$this->selected_id = System::input_get('id');
		$this->question->exam_ID($this->selected_id);
		if (($id = System::input_get('delete')))
		{
			DML::delete_Question($id);
			unset($_GET['delete']);
			System::redirect();
		}
		elseif (($type = System::input_get('add-question')))
		{
			$this->question->add($type);
		}
		elseif (($id = System::input_get('get_question')))
		{
			// code to get question
		}
		elseif (($action = System::input_get('action')))
		{
			switch ($action)
			{
				case 'preview':
				{
					$this->question->preview();
					$this->interrupt();
					exit;
				}
				case 'view':
				{
					$this->question->view();
					break;
				}
				case 'manage':
				{
					$this->question->manage();
					break;
				}
				default:
				{
					System::show_404();
				}
			}
		}
	}
	protected function on_post()
	{
		if (($add_q = System::input_post('add-question')))
		{
			$data = System::input_post('q');
			DML::insert_Question($this->selected_id, $data);
			unset($_GET['add-question']);
			System::redirect();
		}
	}
	protected function main()
	{
		// use CKEditor for Input
		// $this->load_view('view/common/ckeditor.php');
	}
}

?>