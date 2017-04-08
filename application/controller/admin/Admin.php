<?php

namespace Application\Controller\Admin;

use System\Core\Controller;
use System\Libraries\Auth;
use System\Libraries\View;
use System\Libraries\Navigation;

class Admin extends Controller
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
	}
	private function init()
	{
		$this->user = Auth::get();
		$this->nav = new Navigation();
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