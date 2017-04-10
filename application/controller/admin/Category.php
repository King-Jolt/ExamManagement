<?php

namespace Application\Controller\Admin;

use Application\Model\Misc;
use System\Libraries\View;
use System\Libraries\Request;
use Application\Model\Admin\Category\Model;

class Category extends Admin
{
	protected $model = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->nav->add('Quản lý danh mục', '/admin/category');
		$this->model = new Model();
	}
	public function index()
	{
		View::add('admin/category/page.php', array(
			'msg' => Misc::get_msg()
		));
	}
	public function getTreeData()
	{
		$this->send_response(json_encode(
			$this->model->getTreeView()
		));
	}
	public function insertCategory()
	{
		if (Request::post('insert'))
		{
			$this->model->insertCategory(
				isset(Request::params()['category_id']) ? Request::params()['category_id'] : NULL,
				Request::post('name')
			);
			$this->redirectToIndex();
		}
		else
		{
			$this->nav->add('Thêm danh mục mới');
			View::add('admin/category/insert.php');
		}
	}
	public function editCategory()
	{
		if (Request::post('update'))
		{
			$this->model->updateCategory(Request::params()['category_id'], Request::post('name'));
			$this->redirectToIndex();
		}
		else
		{
			$this->nav->add('Chỉnh sửa danh mục');
			$data = $this->model->getCategoryById(Request::params('category_id'));
			View::add('admin/category/update.php', array(
				'value' => $data->name
			));
		}
	}
	public function deleteCategory()
	{
		$this->model->deleteCategory(Request::params()['category_id']);
		$this->redirectToIndex();
	}
	private function redirectToIndex()
	{
		Request::redirect('/admin/category');
	}
}
