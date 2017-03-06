<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/super/Super.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/table/User_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Super\Super;
use App\Model\Super\Table\User_Table;
use App\System\System;

class User extends Super
{
	protected $course_id = NULL;
	protected function on_post()
	{
		$action = $this->request_post('action');
		if ($action)
		{
			switch ($action)
			{
				case 'add':
				{
					$this->DML->insert_User($this->course_id, $this->request_post('user'), $this->request_post('name'));
					break;
				}
			}
			System::redirect();
		}
	}
	protected function on_get()
	{
		$this->course_id = $this->request_get('course_id');
		$action = $this->request_get('action');
		if ($action)
		{
			switch ($action)
			{
				case 'delete':
				{
					$this->DML->delete_User($this->request_get('id'));
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
		$table = new User_Table($this->course_id);
		$this->load_view('/application/view/super/user/table.php', array(
			'msg' => System::get_msg(),
			'table' => $table->get()
		));
	}
}

?>