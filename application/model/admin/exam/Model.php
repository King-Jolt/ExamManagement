<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Auth;
use System\Libraries\Request;
use Application\Model\Misc;
use System\Database\DB;

class Model
{
	public function getTable()
	{
		$table = new Table();
		return $table->get();
	}
	public function insertExam($title, $header, $footer, $date)
	{
		$data = array(
			'id' => Misc::get_uid(),
			'category_id' => Request::params('category_id'),
			'title' => $title,
			'header' => $header,
			'footer' => $footer,
			'share' => Auth::get()->id,
			'date' => $date
		);
		DB::query()->insert('exam', $data)->execute();
		Misc::put_msg('success', 'Đã tạo mới một đề thi');
	}
	public function getExamById($id)
	{
		$data = new Data();
		return $data->filterId($id)->getExam()->fetch();
	}
	public function updateExam($id, $title, $header, $footer, $date)
	{
		$query = DB::query()->update('exam', 'e')
			->join('category', 'c', 'c.id = e.category_id')
			->set([
				'e.title' => $title,
				'e.header' => $header,
				'e.footer' => $footer,
				'e.date' => $date
			])
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id'),
				'e.id' => $id
			]);
		if ($query->execute())
		{
			Misc::put_msg('success', 'Đã cập nhật thông tin đề thi thành công');
		}
		else
		{
			Misc::put_msg('warning', 'Không có thay đổi nào được cập nhật');
		}
	}
	public function getAllUsers()
	{
		return DB::query()->table('user')->where([
			['id', '!=', Auth::get()->id],
			['course_id', '=', Auth::get()->course_id]
		])->execute();
	}
	public function setVisible($id, $object)
	{
		$query = DB::query()->update('exam', 'e')
			->join('category', 'c', 'c.id = e.category_id')
			->set([
				'e.share' => $object ? $object : NULL
			])
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id'),
				'e.id' => $id
			]);
		if ($query->execute())
		{
			Misc::put_msg('success', 'Đã cập nhật chia sẻ đề thi này');
		}
		else
		{
			Misc::put_msg('warning', 'Không có thay đổi nào được cập nhật');
		}
	}

	public function deleteExams(array $eid)
	{
		$n = 0;
		DB::begin();
		foreach ($eid as $exam_id)
		{
			$query = DB::query()
				->delete('e')->from('exam', 'e')
				->join('category', 'c', 'c.id = e.category_id')
				->where([
					'c.user_id' => Auth::get()->id,
					'e.category_id' => Request::params('category_id'),
					'e.id' => $exam_id
				]);
			if ($query->execute())
			{
				$n++;
			}
			else
			{
				Misc::put_msg('warning', 'Có lỗi xảy ra khi xóa đề thi này, vui lòng thử lại', FALSE);
				return FALSE;
			}
		}
		DB::commit();
		Misc::put_msg('success', "Đã xóa $n đề thi !");
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