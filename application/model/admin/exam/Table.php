<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Request;

class Table extends \System\Libraries\Table
{
	public $class = 'table table-striped table-hover table-with-checkbox';
	public $arr_title = array(
		'<input type="checkbox" />', 'No.', 'Đề kiểm tra', 'Số câu hỏi', 'Ngày thi', 'Chia sẻ', ''
	);
	protected function row($data, $index)
	{
		$id = (object)array(
			'category_id' => Model::$category_id,
			'exam_id' => $data->id
		);
		$preview = Request::current_path() . '/preview.php';
		$select_random = Request::build_get($_GET, array('action' => 'select_random', 'id' => $data->id));
		$share = $data->share ? "javascript:void(0)" : Request::build_get($_GET, array('action' => 'share', 'id' => $data->id));
		$shuffle = Request::build_get($_GET, array('action' => 'shuffle', 'id' => $data->id));
		$copy = Request::build_get($_GET, array('action' => 'copy', 'id' => $data->id));
		$delete = "/admin/category/$id->category_id/exam/$id->exam_id/delete";
		$un_share = Request::build_get($_GET, array('action' => 'private', 'id' => $data->id));
		$collect = $data->share == 1 ? "<a href=\"$un_share\" class=\"btn btn-info btn-xs\"> Bỏ chia sẻ </a>" : '<strong class="text-info">Not Share</strong>';
		$date = $data->date ? '<span class="glyphicon glyphicon-time"></span>&nbsp; ' . strftime("%A, %d %B %Y, %I:%M %p", strtotime($data->date)) : 'Không có ngày thi';
		return <<<EOF
		<tr>
			<td><input type="checkbox" name="eid[]" value="$data->id" /></td>
			<td> $index </td>
			<td><a href="/admin/category/$id->category_id/exam/$id->exam_id/question"><span class="glyphicon glyphicon-paperclip"></span> $data->title </a></td>
			<td> $data->n_question </td>
			<td class="text-info"> $date </td>
			<td> $collect </td>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>&nbsp;<span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li class="dropdown-header"> Danh mục tùy chọn <span class="caret"></span></li>
						<li class="divider"></li>
						<li><a href="/admin/category/$id->category_id/exam/$id->exam_id/edit"><span class="glyphicon glyphicon-pencil"></span> Chỉnh sửa </a></li>
						<li><a href="$share"><span class="glyphicon glyphicon-share"></span> Chia sẻ </a></li>
						<li><a href="$copy"><span class="glyphicon glyphicon-copy"></span> Sao chép </a></li>
						<li><a href="$select_random"><span class="glyphicon glyphicon-import"></span> Bốc câu hỏi </a></li>
						<li><a href="$shuffle"><span class="glyphicon glyphicon-refresh"></span> Xáo trộn </a></li>
						<li><a href="$preview" target="_blank"><span class="glyphicon glyphicon-list-alt"></span> Xuất bản </a></li>
						<li><a href="$delete" class="be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a></li>
					</ul>
				</div>
			</td>
		</tr>
EOF;
	}
	protected function Source()
	{
		return Model::list_Exam();
	}
}

?>