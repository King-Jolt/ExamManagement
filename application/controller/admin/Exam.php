<?php

namespace Application\Controller\Admin;

use System\Libraries\Route;
use System\Libraries\View;
use System\Libraries\Request;
use Application\Model\Admin\Exam\Model;
use Application\Model\Misc;

class Exam extends Admin
{
	private $model = NULL;
	public function __construct()
	{
		parent::__construct();
		Model::$user_id = $this->user->id;
		Model::$category_id = Request::params('category_id');
		$this->model = new Model();
		View::add('admin/ckeditor.php'); // use CKEditor;
	}
	protected function index()
	{
		Route::add('post', 'action', function($value){
			switch ($value)
			{
				case 'delete':
					$this->model->deleteExams(Request::post('eid'));
					break;
			}
			$this->redirectToTable();
		});
		Route::add(function(){
			View::add('admin/exam/table.php', array(
				'add' => Request::current_uri() . '/create',
				'table' => $this->model->getTable(),
				'msg' => Misc::get_msg()
			));
		});
	}
	protected function create()
	{
		Route::add('post', 'action', function($value){
			if ($value == 'insert')
			{
				$this->model->insertExam(
					Request::post('title'),
					Request::post('header'),
					Request::post('footer'),
					Request::post('set-date') ? \DateTime::createFromFormat('d-m-Y H:i:s', Request::post('date'))->format('Y-m-d H:i:s') : NULL
				);
				$this->redirectToTable();
			}
		});
		Route::add(function(){
			View::add('admin/exam/insert.php');
		});
	}
	protected function edit()
	{
		Route::add('post', 'action', function($value){
			if ($value == 'update')
			{
				$this->model->updateExam(
					Request::params()['exam_id'],
					Request::post('title'),
					Request::post('header'),
					Request::post('footer'),
					Request::post('set-date') ? \DateTime::createFromFormat('d-m-Y H:i:s', Request::post('date'))->format('Y-m-d H:i:s') : NULL
				);
				$this->redirectToTable();
			}
		});
		Route::add(function(){
			$data = $this->model->getExamById(Request::params('exam_id'));
			View::add('admin/exam/update.php', array(
				'title' => $data->title,
				'header' => $data->header,
				'footer' => $data->footer,
				'set_checked' => $data->date ? 'checked' : '',
				'date' => $data->date
			));
		});
	}
	protected function delete()
	{
		$this->model->deleteExams([(Request::params('exam_id'))]);
		$this->redirectToTable();
	}
	private function redirectToTable()
	{
		Request::redirect(sprintf('/admin/category/%s/exam', Request::params('category_id')));
	}
	/*
	public function __construct()
	{
		
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
				Misc::redirect();
				break;
			}
			case 'copy':
			{
				$this->DML->copy_Exam(
					$this->user->id,
					$this->category_id,
					$this->request_get('id'),
					$this->request_post('quantity'),
					filter_var($this->request_post('shuffle'), FILTER_VALIDATE_BOOLEAN)
				);
				unset($_GET['action'], $_GET['id']);
				Misc::redirect();
			}
			case 'view_answer':
			{
				Misc::redirect(Misc::current_path() . '/preview.php', array(
					'category_id' => $this->category_id,
					'view_answer' => TRUE,
					'eid' => $this->request_post('eid')
				));
			}
			case 'delete':
			{
				foreach ($this->request_post('eid') as $id)
				{
					$this->DML->delete_Exam($this->user->id, $this->category_id, $id);
				}
				unset($_GET['action'], $_GET['id']);
				Misc::redirect();
			}
			case 'select_random':
			{
				if ($this->request_post('set_random'))
				{
					$this->DML->copy_Shared(
						$this->request_post('exam'),
						$this->request_get('id')
					);
				}
				else
				{
					$this->DML->copy_Question(
						$this->request_post('q'),
						$this->request_get('id')
					);
				}
				unset($_GET['action'], $_GET['id']);
				Misc::redirect();
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
				case 'copy':
				{
					$this->view_table = FALSE;
					$this->nav->add('Bốc câu hỏi', '');
					$this->load_view(
						//$this->model_exam->list_OtherExam($this->user->course_id, $this->user->id)
						'application/view/admin/exam/copy.php'
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
			Misc::redirect();
		}
	}
	protected function main()
	{
		$this->menu['manage']['active'] = 'active';
		$ex_table = new Table($this->user->id, $this->category_id);
		$this->load_view('admin/exam/table.php', array(
			'msg' => Misc::get_msg()
			//'table' => $ex_table->get()
		));
		$this->load_view('admin/ckeditor.php'); // use CKEditor for Input
	}
	*/
}

?>