<?php

namespace Application\Controller\Admin;

use System\Core\Controller;
use System\Libraries\Request;
use System\Libraries\Auth;
use System\Libraries\View;
use System\Libraries\Navigation;
use System\Libraries\Search;

abstract class Admin extends Controller
{
	protected $nav = NULL;
	protected $user = NULL;
	protected $view_data = array();
	public function __construct()
	{
		Auth::set_Key('admin');
		Auth::redirect_Auth('/admin/login'); // redirect to Login page if have not login
		Auth::validate();
		$this->init();
		$query = array();
		if ($id = Request::get('category_id'))
		{
			$query += array('category_id' => $id);
			$this->nav->add('Danh sách đề thi', Request::current_path() . '/exam.php?' . http_build_query($query));
			if ($id = Request::get('exam_id'))
			{
				$query += array('exam_id' => $id);
				$this->nav->add('Danh sách câu hỏi', Request::current_path() . '/question.php?' . http_build_query($query));
			}
		}
	}
	private function init()
	{
		$this->user = Auth::get();
		$this->nav = new Navigation();
		$this->nav->add('Danh sách danh mục', Request::current_path() . '/index.php');
	}
	public static function logout()
	{
		Auth::set_Key('admin');
		Auth::redirect_Auth('/admin/login');
		Auth::remove();
	}
	protected function output($html)
	{
		$this->view_data += array(
			'title' => 'Ứng dụng quản lý bài kiểm tra',
			'nav' => $this->nav->get(),
			'content' => $html,
			'user' => $this->user
		);
		echo View::get('admin/template.php', $this->view_data);
	}
}


?>