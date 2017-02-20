<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/table/Exam_Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\Table\Exam_Table;
use App\System\System;

class Exam extends Admin
{
	protected $category_id = NULL;
	protected $view_table = TRUE;
	protected function on_post()
	{
		$btn = $this->request_post('action');
		switch ($btn)
		{
			case 'add':
			{
				$this->DML->insert_Exam(
					$this->request_post('title'),
					$this->request_post('date'),
					$this->category_id
				);
				System::redirect();
				break;
			}
		}
	}
	protected function on_get()
	{
		$this->category_id = $this->request_get('category_id'); 
		$request = $this->request_get('action');
		if ($request)
		{
			$exam_id = $this->request_get('id');
			switch ($request)
			{
				case 'copy':
				{
					$this->DML->copy_Exam($exam_id);
					break;
				}
				case 'select_to':
				{
					$this->view_table = FALSE;
					$this->load_view('/application/view/admin/exam/copy_from_share.php');
					return;
				}
				case 'share':
				{
					$this->DML->share_Exam($exam_id, TRUE);
					break;
				}
				case 'shuffle':
				{
					$this->DML->shuffle_Exam($exam_id);
					break;
				}
				case 'delete':
				{
					$this->DML->delete_Exam($exam_id);
					break;
				}
			}
			unset($_GET['action'], $_GET['id']);
			System::redirect();
		}
	}
	protected function main()
	{
		$this->menu['1']['active'] = 'active';
		if ($this->view_table)
		{
			$ex_table = new Exam_table($this->category_id);
			$this->load_view('application/view/admin/exam/table.php', array(
				'msg' => System::get_msg(),
				'table' => $ex_table->get()
			));
		}
	}	
}

?>