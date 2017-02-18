<?php

namespace App\Controller\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/controller/admin/Exam2.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\Controller\Admin\Admin;
use App\Model\Admin\Table\Exam_Table;
use App\System\System;

class Exam2 extends Admin
{
	protected function main()
	{
		$this->menu['2']['active'] = 'active';
	}
} 

?>