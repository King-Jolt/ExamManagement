<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/DML.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/Exam_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\DML;
use App\Model\Admin\Exam_Table;
use App\System\System;

class Home extends Admin
{
	protected function on_post()
	{
		$btn = System::input_post('action');
		switch ($btn)
		{
			case 'add':
			{
				$title = System::input_post('title');
				DML::insert_Exam($title);
				System::redirect();
				break;
			}
		}		
	}
	protected function on_get()
	{
		$request = System::input_get('action');
		$id = System::input_get('id');
		if ($request)
		{
			switch ($request)
			{
				case 'shuffle':
				{
					DML::shuffle_Exam($id);
					break;
				}
				case 'delete':
				{
					DML::delete_Exam($id);
					break;
				}
			}
			unset($_GET['action'], $_GET['id']);
			System::redirect();
		}
	}
	protected function main()
	{
		$this->list_exam();	
	}
	protected function list_exam()
	{
		$ex_table = new Exam_table();
		$this->load_view('application/view/admin/exam.php', array(
			'msg' => System::get_msg(),
			'table' => $ex_table->get()
		));
	}
	
}

?>