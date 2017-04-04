<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';

use System\Database\Sql_QueryCommand;

class Home extends Admin
{
	public function on_post()
	{
		if ($this->request_post('list'))
		{
			$command = new Sql_QueryCommand('SELECT title, date FROM list_exam WHERE user_id = ? AND date IS NOT NULL', array($this->user->id));
			$result = $command->execute();
			echo json_encode($result->get_data()->getArrayCopy());
			exit;
		}
	}
	public function main()
	{
		$this->nav->clear()->add('Xem lịch thi', '');
		$this->menu['home']['active'] = 'active';
		$this->load_view('/application/view/home.php', array(
			'name' => $this->user->name
		));
	}
}
