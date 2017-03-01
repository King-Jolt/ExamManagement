<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';

class Contact extends Admin
{
	public function main()
	{
		$this->nav->clear()->add('Liên hệ', '');
		$this->menu['contact']['active'] = 'active';
		$this->load_view('/application/view/contact.php');
	}
}
