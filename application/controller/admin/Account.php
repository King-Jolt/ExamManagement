<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/DML.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use Model\Admin\DML;
use System\Core\Misc;

class Account extends Admin
{
	protected function on_post()
	{
		$action = $this->request_post('btn-action');
		if ($action)
		{
			switch ($action)
			{
				case 'change':
				{
					$this->DML->change_PASSWORD(
						$this->user->user,
						$this->request_post('o_pass'),
						$this->request_post('n_pass')
					);
					break;
				}
			}
			Misc::redirect();
		}
	}
	protected function on_get()
	{
		$action = $this->request_get('action');
		if ($action)
		{
			switch ($action)
			{
				case 'chpw':
				{
					$this->load_view('application/view/admin/account/chpw.php', array(
						'msg' => Misc::get_msg()
					));
					break;
				}
			}
		}
	}
	protected function main()
	{
		$this->menu['account']['active'] = 'active';
		$this->nav->clear();
		$this->nav->add('Quản lý tài khoản', '');
		if (empty($_GET))
		{
			$this->load_view('application/view/admin/account/menu.php', array(
				'chpw' => '?' . http_build_query(array('action' => 'chpw'))
			));
		}
	}
}

?>