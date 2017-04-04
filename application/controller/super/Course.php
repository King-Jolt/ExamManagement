<?php

namespace App\Controller\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/super/Super.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/table/Course_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use Controller\Super\Super;
use Model\Super\Table\Course_Table;
use System\Core\Misc;

class Course extends Super
{
	protected function on_post()
	{
		$action = $this->request_post('action');
		if ($action)
		{
			switch ($action)
			{
				case 'add':
				{
					$this->DML->insert_Course($this->request_post('name'));
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
				case 'delete':
				{
					$this->DML->delete_Course($this->request_get('id'));
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
		$table = new Course_Table();
		$this->load_view('/application/view/super/course/table.php', array(
			'msg' => Misc::get_msg(),
			'table' => $table->get()
		));
	}
}

?>