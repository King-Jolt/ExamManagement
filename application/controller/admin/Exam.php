<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/table/Exam_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/Model_Exam.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\Table\Exam_Table;
use App\Model\Admin\Model_Exam;
use App\System\System;

class Exam extends Admin
{
	protected $category_id = NULL;
	protected $view_table = TRUE;
	protected $model_exam;
	public function __construct()
	{
		$this->model_exam = new Model_Exam(
			$this->request_get('id')
		);
		parent::__construct();
	}
	protected function on_post()
	{
		$btn = $this->request_post('action');
		switch ($btn)
		{
			case 'add':
			{
				$this->DML->insert_Exam(
					$this->request_post('title'),
					$this->request_post('set-date') ? \DateTime::createFromFormat('d-m-Y H:i:s', $this->request_post('date'))->format('Y-m-d H:i:s') : NULL,
					$this->category_id,
					$this->request_post('header'),
					$this->request_post('footer')
				);
				System::redirect();
				break;
			}
			case 'select_random':
			{
				$this->DML->copy_Shared(
					$this->request_post('e'),
					$this->request_get('id')
				);
				unset($_GET['action'], $_GET['id']);
				System::redirect();
				break;
			}
		}
	}
	protected function on_get()
	{
		$this->category_id = $this->request_get('category_id'); 
		$request = $this->request_get('action');
		if ($request)
		{
			$exam_id = $this->request_get('id');
			switch ($request)
			{
				case 'select_random':
				{
					$this->view_table = FALSE;
					$this->nav->add('Bốc câu hỏi', '');
					$this->load_view(
						$this->model_exam->list_OtherExam($this->user->course_id, $this->user->id)
					);
					return;
				}
				case 'share':
				{
					$this->DML->share_Exam($this->user->id, $this->category_id, $exam_id, TRUE);
					break;
				}
				case 'private':
				{
					$this->DML->share_Exam($this->user->id, $this->category_id, $exam_id, FALSE);
					break;
				}
				case 'shuffle':
				{
					$this->DML->shuffle_Exam($this->user->id, $this->category_id, $exam_id);
					break;
				}
				case 'delete':
				{
					$this->DML->delete_Exam(
						$this->user->id,
						$this->category_id,
						$exam_id
					);
					break;
				}
			}
			unset($_GET['action'], $_GET['id']);
			System::redirect();
		}
	}
	protected function main()
	{
		$this->menu['manage']['active'] = 'active';
		if ($this->view_table)
		{
			$ex_table = new Exam_table($this->user->id, $this->category_id);
			$this->load_view('application/view/admin/exam/table.php', array(
				'msg' => System::get_msg(),
				'table' => $ex_table->get()
			));
			$this->load_view('application/view/admin/ckeditor.php'); // use CKEditor for Input
		}
	}	
}

?>