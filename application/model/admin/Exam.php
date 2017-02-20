<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/DML.php';

use App\Model\Admin\GetData;
use App\Model\Admin\DML;

class Exam
{
	public function get_shared_exam($course_id)
	{
		try
		{
			$html = '<ul class="my-treeview">';
			$result = GetData::get_SharedExam($course_id)->execute()->get_data();
			$c_id = 0;
			while ($result->valid() and $row = $result->current())
			{
				$c_id = $row->course_id;
				$html .= "<li> Môn học : $result->course_name <ul>";
				while ($result->valid() and $row2 = $result->current() and $row2->course_id === $c_id)
				{
					$html .= '';
					$result->next();
				}
				$html .= '</ul></li>';
				$result->next();
			}
			$html .= '</ul>';
			return $html;
		}
		catch (\Exception $e)
		{
			return $e->getMessage();
		}
	}
	
}

?>