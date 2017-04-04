<?php

namespace Application\Model\Admin\Exam;

use Application\Model\Misc;
use System\Libraries\View;
use System\Libraries\Request;
use System\Database\DB;

class Model
{
	public static $category_id = NULL;
	public static $user_id = NULL;
	public static function list_Exam($where = array())
	{
		$where += array(
			'user_id' => self::$user_id,
			'category_id' => self::$category_id
		);
		return DB::query()->select()->from('list_exam')->where($where);
	}
	public function __construct($user_id, $category_id)
	{
		DB::open();
		self::$category_id = $category_id;
		self::$user_id = $user_id;
	}
	public function insertExam($data)
	{
		$r = DB::query()->insert('exam', $data)->execute();
		Misc::put_msg('success', 'Đã tạo mới một đề thi');
		return $r;
	}
	public function deleteExams(array $eid)
	{
		$iret = 0;
		DB::begin();
		foreach ($eid as $exam_id)
		{
			if (DB::query()->delete()->from('exam')->where('id', $exam_id)->execute())
			{
				$iret++;
			}
			else
			{
				DB::rollback();
				Misc::put_msg('danger', 'Có lỗi xảy ra khi xóa đề thi này, vui lòng thử lại', FALSE);
				return FALSE;
			}
		}
		DB::commit();
		Misc::put_msg('success', "Đã xóa $iret đề thi !");
		return $eid;
	}
	/*
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
				$manual = sprintf('<a href="%s" class="select-manual btn btn-default"><span class="glyphicon glyphicon-ok"></span> Chọn câu hỏi </a>', Misc::current_path() . '/preview.php?' . http_build_query(
					array(
						'uid' => $row->user_id,
						'category_id' => $row->category_id,
						'exam_id' => $row->exam_id,
						'ajax' => TRUE
					))
				); 
				$sel = "<span class=\"form-inline\"><select class=\"hide form-control\" name=\"exam[$row->exam_id]\"><option value=\"0\"> Chọn số câu </option>";
				for ($i = 1; $i <= $row->n_question; $i++)
				{
					$sel .= "<option value=\"$i\"> $i </option>";
				}
				$sel .= "</select>&nbsp;$manual &nbsp; <span class=\"select-status hide text-success glyphicon glyphicon-ok\" style=\"margin-left: 8px;\"></span></span>";
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
	 * 
	 */
}

?>