<?php

namespace Application\Controller\Admin;

use Application\Model\Misc;
use System\Libraries\View;
use System\Libraries\Route;
use System\Libraries\Request;
use Application\Model\Admin\Category\Model;

use System\Database\DB;

class Category extends Admin
{
	protected $model = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model($this->user->id);
	}
	protected function index()
	{
		Route::add(function(){
			View::add('admin/category/main.php', array(
				'msg' => Misc::get_msg()
			));
		});
	}
	protected function load()
	{
		$this->send_response(json_encode(
			$this->model->getTreeView()
		));
	}
	protected function create()
	{
		Route::add('post', 'action', function($value){
			$this->model->insertCategory(
				isset(Request::params()['category_id']) ? Request::params()['category_id'] : NULL,
				Request::post('name')
			);
			$this->back();
		});
		Route::add(function(){
			$this->nav->add('Thêm danh mục mới');
			View::add('admin/category/insert.php');
		});
	}
	protected function edit()
	{
		Route::add('post', 'action', function($value){
			$this->model->updateCategory(Request::params()['category_id'], Request::post('name'));
			$this->back();
		});
		Route::add(function(){
			$this->nav->add('Sửa danh mục');
			$data = $this->model->list_Category(array(
				'id' => Request::params()['category_id']
			))->execute()->fetch();
			View::add('admin/category/update.php', array(
				'value' => $data->name
			));
		});
	}
	protected function delete()
	{
		$this->model->deleteCategory(Request::params()['category_id']);
		$this->back();
	}
	protected function back()
	{
		Request::redirect('/admin/category');
	}
}

?>