<?php

namespace Application\Model\Admin\Group;

class Table extends \System\Libraries\Table
{
	protected $arr_title = ['No.', 'Nhóm câu hỏi', 'Nội dung', 'Số câu hỏi', 'Action'];
	protected function Source()
	{
		return Model::listGroup();
	}
	protected function row($data, $index)
	{
		$base = Model::baseUri();
		if (!$data->content) $data->content = '<span class="text-info"> Không có nội dung </span>';
		return <<<EOF
		<tr>
			<td> $index </td>
			<td> $data->title </td>
			<td> $data->content </td>
			<td> $data->n_question </td>
			<td>
				<a href="" class="btn btn-primary btn-xs"> Câu hỏi </a> &nbsp;
				<a href="$base/$data->id/delete" class="btn btn-warning btn-xs"> Xóa </a>
			</td>
		</tr>
EOF;
	}
}