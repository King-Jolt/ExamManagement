<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/View.php';

use App\Model\Admin\GetData;
use App\System\Library\View;

class Model_Exam
{
	private $current_exam_id = NULL;
	public function select_Exam($id)
	{
		$this->current_exam_id = $id;
		return $this;
	}
	private function get_shared_exam($course_id)
	{
		try
		{
			$html = '<ul class="my-treeview tv-checkbox">';
			$result = GetData::get_SharedExam($course_id, $this->current_exam_id)->execute();
			$c_id = $course_id;
			if ($result->num_rows())
			{
				$result = $result->get_data();
				while ($result->valid() and $row2 = $result->current() and $row2->course_id === $c_id)
				{
					$u_id = $row2->user_id;
					$html .= "<li><input type=\"checkbox\" class=\"tv-item-checkbox\" /> Giáo viên : $row2->user_user ($row2->user_name) <ul>";
					while ($result->valid() and $row3 = $result->current() and $row3->user_id === $u_id)
					{
						$cat_id = $row3->category_id;
						$html .= "<li><input type=\"checkbox\" class=\"tv-item-checkbox\" /> Danh mục : $row3->category_name <ul>";
						while ($result->valid() and $row4 = $result->current() and $row4->category_id === $cat_id)
						{
							$e_id = $row4->exam_id;
							$html .= "<li><input type=\"checkbox\" class=\"tv-item-checkbox\" /> Đề thi : $row4->exam_title <ul></li>";
							$i = 1;
							while ($result->valid() and $row5 = $result->current() and $row5->exam_id === $e_id)
							{
								$html .= "<li><input type=\"checkbox\" class=\"tv-item-checkbox\" name=\"q[]\" value=\"$row5->question_id\" /><label><strong> Câu $i </strong></label> : $row5->question_content </li>";
								$i++;
								$result->next();
							}
							$html .= '</ul></li>';
						}
						$html .= '</ul></li>';
					}
					$html .= '</ul></li>';
				}
			}
			$html .= '</ul>';
			return $html;
		}
		catch (\Exception $e)
		{
			return $e->getMessage();
		}
	}
	public function list_Shared($course_id)
	{
		return new View('/application/view/admin/exam/copy_from_share.php', array(
			'data' => $this->get_shared_exam($course_id)
		));
	}
}

?>