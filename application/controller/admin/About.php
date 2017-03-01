<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';

class About extends Admin
{
	public function main()
	{
		$this->nav->clear()->add('Thông tin về ứng dụng', '');
		$this->menu['about']['active'] = 'active';
		$this->load_view('/application/view/about.php');
	}
}
