<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/View.php';

use App\Model\Admin\GetData;
use App\System\Library\View;

class Model_Exam
{
	private $current_exam_id = NULL;
	public function __construct($id)
	{
		$this->current_exam_id = $id;
	}
	public function list_OtherExam($course_id, $user_id)
	{
		return new View('application/view/admin/exam/select_random.php', array(
			'data' => $this->_create_List($course_id, $user_id, $this->current_exam_id)
		));
	}
	private function _create_List($c, $u, $e)
	{
		try
		{
			$html = '<ul class="list-group">';
			$result = GetData::list_PublicExam($c, $u, $e)->execute();
			foreach ($result->get_data() as $row)
			{
				$sel = "<span class=\"form-inline\"><select class=\"form-control\" name=\"e[$row->exam_id]\"><option value=\"0\"> Chọn số câu </option>";
				for ($i = 1; $i <= $row->n_question; $i++)
				{
					$sel .= "<option value=\"$i\"> $i </option>";
				}
				$sel .= '</span></select>';
				$html .= <<<EOF
				<li class="list-group-item text-muted"><strong>
				<span class="text-success"> Giáo viên</span>: $row->user_name <span class="glyphicon glyphicon-arrow-right"></span>
				<span class="text-success">Danh mục</span>: $row->category_name <span class="glyphicon glyphicon-arrow-right"></span>
				<span class="text-success">Đề thi</span>: $row->exam_title <span class="glyphicon glyphicon-arrow-right"></span>
				$sel
				</strong></li>
EOF;
			}
			$html .= "</ul>";
			return $html;
		}
		catch (\Exception $e)
		{
			return $e->getMessage();
		}
	}
}

?>