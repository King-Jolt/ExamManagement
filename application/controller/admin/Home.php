<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';

class Home extends Admin
{
	public function main()
	{
		$this->nav->clear()->add('Thông tin giáo viên', '');
		$this->menu['home']['active'] = 'active';
		$this->load_view('/application/view/home.php', array(
			'name' => $this->user->name
		));
	}
}
