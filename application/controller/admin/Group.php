<?php

namespace Application\Controller\Admin;

use Application\Model\Admin\Group\Model;
use Application\Model\Misc;
use System\Libraries\Request;
use System\Libraries\View;

class Group extends Admin
{
	private $model = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->nav->add('Quản lý danh mục', '/admin/category');
		$this->nav->add('Quản lý đề thi', sprintf('/admin/category/%s/exam', Request::params('category_id')));
		$this->nav->add('Quản lý Nhóm câu hỏi', sprintf("/admin/category/%s/exam/%s/group", Request::params('category_id'), Request::params('exam_id')));
		$this->model = new Model();
	}
	public function index()
	{
		View::add('admin/group/page.php', array(
			'add' => Request::current_uri() . '/create',
			'table' => $this->model->getTable(),
			'msg' => Misc::get_msg()
		));
	}
	public function createGroup()
	{
		if (Request::post('insert'))
		{
			$title = Request::post('title');
			$has_ct = Request::post('has-content');
			$content = $has_ct ? Request::post('content') : NULL;
			$this->model->insertGroup($title, $content);
			$this->redirectIndex();
		}
		else
		{
			View::add('admin/group/insert.php');
		}
	}
	public function editGroup()
	{
		if (Request::post('update'))
		{
			$title = Request::post('title');
			$has_ct = Request::post('has-content');
			$content = $has_ct ? Request::post('content') : NULL;
			$this->model->updateGroup(Request::params('group_id'), $title, $content);
			$this->redirectIndex();
		}
		else
		{
			$data = $this->model->getGroupById(Request::params('group_id'));
			View::add('admin/group/update.php', array(
				'title' => $data->title,
				'has_content' => $data->content !== NULL ? 'checked' : '',
				'content' => $data->content !== NULL ? $data->content : ''
			));
		}
	}
	public function deleteGroup()
	{
		$this->model->deleteGroup(Request::params()['group_id']);
		$this->redirectIndex();
	}
	private function redirectIndex()
	{
		Request::redirect(sprintf("/admin/category/%s/exam/%s/group",
			Request::params('category_id'),
			Request::params('exam_id')
		));
	}
}