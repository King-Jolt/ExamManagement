<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/table/Category_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\Table\Category_Table;
use App\System\System;

class Category extends Admin
{
	protected function on_post()
	{
		$action = $this->request_post('action');
		switch ($action)
		{
			case 'add':
			{
				$this->DML->insert_Category(
					$this->request_post('name'), $this->user->id
				);
				System::redirect();
				break;
			}
		} 
	}
	protected function on_get()
	{
		$action = $this->request_get('action');
		if ($action)
		{
			$id = $this->request_get('id');
			switch ($action)
			{
				case 'delete':
				{
					$this->DML->delete_Category($id);
					break;
				}
			}
			unset($_GET['action'], $_GET['id']);
			System::redirect();
		}
	}
	protected function main()
	{
		$cat_table = new Category_Table($this->user->id);
		$this->load_view('/application/view/admin/category/table.php', array(
			'msg' => System::get_msg(),
			'table' => $cat_table->get()
		));
	}
}

?>