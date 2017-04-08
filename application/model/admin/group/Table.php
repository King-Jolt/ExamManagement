<?php

namespace Application\Model\Admin\Group;

class Table extends \System\Libraries\Table
{
	protected $arr_title = ['No.', 'Nhóm câu hỏi', 'Nội dung', 'Số câu hỏi', 'Action'];
	protected function Source()
	{
		$data = new Data();
		return $data->getQuery();
	}
	protected function row($data, $index)
	{
		if (!$data->content) $data->content = '<span class="text-muted"><em> Không có nội dung </em></span>';
		$delete = '#';
		$edit = '#';
		$btn_disable = ' disabled';
		if ($data->id)
		{
			$delete = "/admin/category/$data->category_id/exam/$data->exam_id/group/$data->id/delete";
			$edit = "/admin/category/$data->category_id/exam/$data->exam_id/group/$data->id/edit";
			$btn_disable = '';
		}
		return <<<EOF
		<tr>
			<td> $index </td>
			<td> $data->title </td>
			<td> $data->content </td>
			<td> $data->n_question </td>
			<td>
				<a href="/admin/category/$data->category_id/exam/$data->exam_id/group/$data->id/question" class="btn btn-primary btn-xs"> Câu hỏi </a> &nbsp;
				<a href="$edit" class="btn btn-success btn-xs{$btn_disable}"> Sửa </a> &nbsp;
				<a href="$delete" class="btn btn-warning btn-xs{$btn_disable}"> Xóa </a>
			</td>
		</tr>
EOF;
	}
}