<?php

namespace Application\Controller\Admin;

use Application\Model\Misc;
use System\Libraries\View;
use System\Libraries\Request;
use Application\Model\Admin\Exam\Model;

class Exam extends Admin
{
	private $model = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->nav->add('Quản lý danh mục', '/admin/category');
		$this->nav->add('Quản lý đề thi', sprintf('/admin/category/%s/exam', Request::params('category_id')));
		$this->model = new Model();
	}
	public function index()
	{
		if (Request::post('delete'))
		{
			$this->model->deleteExams(Request::post('eid'));
			$this->redirectToTable();
		}
		else
		{
			View::add('admin/exam/page.php', array(
				'add' => Request::current_uri() . '/create',
				'table' => $this->model->getTable(),
				'msg' => Misc::get_msg()
			));
		}
	}
	public function createExam()
	{
		if (Request::post('insert'))
		{
			$this->model->insertExam(
				Request::post('title'),
				Request::post('header'),
				Request::post('footer'),
				Request::post('set-date') ? \DateTime::createFromFormat('d-m-Y H:i A', Request::post('date'))->format('Y-m-d H:i:s') : NULL
			);
			$this->redirectToTable();
		}
		else
		{
			$this->nav->add('Tạo mới đề thi');
			View::add('admin/plugin/ckeditor.php');
			View::add('admin/exam/insert.php');
		}
	}
	public function editExam()
	{
		if (Request::post('update'))
		{
			$this->model->updateExam(
				Request::params()['exam_id'],
				Request::post('title'),
				Request::post('header'),
				Request::post('footer'),
				Request::post('set-date') ? \DateTime::createFromFormat('d-m-Y H:i A', Request::post('date'))->format('Y-m-d H:i:s') : NULL
			);
			$this->redirectToTable();
		}
		else
		{
			$this->nav->add('Chỉnh sửa đề thi');
			$data = $this->model->getExamById(Request::params('exam_id'));
			View::add('admin/plugin/ckeditor.php');
			View::add('admin/exam/update.php', array(
				'title' => $data->title,
				'header' => $data->header,
				'footer' => $data->footer,
				'set_checked' => $data->date ? 'checked' : '',
				'date' => $data->date
			));
		}
	}
	public function setVisible()
	{
		if (Request::post('share'))
		{
			$this->model->setVisible(
				Request::params('exam_id'),
				Request::post('object')
			);
			$this->redirectToTable();
		}
		else
		{
			$this->nav->add('Chia sẻ đề thi');
			View::add('admin/exam/share.php', array(
				'master' => $this->user->id,
				'users' => $this->model->getAllUsers()
			));
		}
	}
	public function shuffleExam()
	{
		$this->model->shuffleExam(Request::params('exam_id'));
		$this->redirectToTable();
	}
	public function previewExam()
	{
		$this->send_response(View::get('admin/exam/preview.php', array(
			'mathjax' => View::get('admin/plugin/mathjax.php'),
			'content' => $this->model->getPreview()
		)));
	}
	public function deleteExam()
	{
		$this->model->deleteExams([(Request::params('exam_id'))]);
		$this->redirectToTable();
	}
	private function redirectToTable()
	{
		Request::redirect(sprintf('/admin/category/%s/exam', Request::params('category_id')));
	}
}
