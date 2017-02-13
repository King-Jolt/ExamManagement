<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/Question.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\Question as Question_Model;
use App\System\System;

class Question extends Admin
{
	private $exam_id = NULL;
	private $question = NULL;
	public function __construct()
	{
		try
		{
			$this->question = new Question_Model($this);
		}
		catch (\Exception $e)
		{
			$this->error($e);
		}
		parent::__construct();
	}
	protected function on_get()
	{
		$this->exam_id = $this->request_get('exam_id');
		$this->question->exam_ID($this->exam_id);
		$action = $this->request_get('action');
		if ($action)
		{
			switch ($action)
			{
				case 'add':
				{
					$this->question->add($this->request_get('type'));
					break;
				}
				case 'delete':
				{
					$this->DML->delete_Question($this->request_get('id'));
					unset($_GET['action'], $_GET['id']);
					System::redirect();
				}
				case 'view':
				{
					$this->question->view();
				}
			}
		}
		else
		{
			$this->question->manage();
		}
		/*
		if (($id = System::input_get('delete')))
		{
			$this->DML->delete_Question($id);
			unset($_GET['delete']);
			System::redirect();
		}
		elseif (($type = System::input_get('add-question')))
		{
			$this->question->add($type);
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
				}
				default:
				{
					$this->question->manage();
					break;
				}
			}
		}
		 * 
		 */
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
					break;
				}
			}
			unset($_GET['action'], $_GET['type']);
			System::redirect();
		}
	}
	protected function main()
	{
		//
	}
}

?>