<?php

namespace Application\Controller\Admin;

use Application\Model\Admin\Group\Model;
use Application\Model\Misc;
use System\Libraries\Request;
use System\Libraries\Route;
use System\Libraries\View;

class Group extends Admin
{
	private $model = NULL;
	public function __construct()
	{
		parent::__construct();
		Model::$user_id = $this->user->id;
		Model::$category_id = Request::params('category_id');
		Model::$exam_id = Request::params('exam_id');
		$this->model = new Model();
	}
	protected function index()
	{
		Route::add(function(){
			View::add('group/content.php', array(
				'add' => Request::current_uri() . '/create',
				'table' => $this->model->getTable(),
				'msg' => Misc::get_msg()
			));
		});
	}
	protected function create()
	{
		Route::add('post', 'action', function($value){
			$title = Request::post('title');
			$content = Request::post('content');
			$this->model->insertGroup($title, $content ? $content : NULL);
			$this->redirectIndex();
		});
		Route::add(function(){
			View::add('group/insert.php');
		});
	}
	protected function delete()
	{
		$this->model->deleteGroup(Request::params()['group_id']);
		$this->redirectIndex();
	}
	private function redirectIndex()
	{
		Request::redirect(Model::baseUri());
	}
}