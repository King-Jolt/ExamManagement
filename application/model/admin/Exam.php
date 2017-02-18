<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/DML.php';

use App\Model\Admin\GetData;
use App\Model\Admin\DML;

class Exam
{
	private $id = NULL;
	public function __construct($id)
	{
		$this->id = $id;
	}
	public function clone_exam()
	{
		$list_question = GetData::list_Question($this->id);
		try
		{
			$list_question = $list_question->execute();
		}
		catch (\Exception $e)
		{
			
		}
	}
}

?>