<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Request;

class Table extends \System\Libraries\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->columns = array('<input type="checkbox" />', 'No.', 'Đề kiểm tra', 'Số câu hỏi', 'Ngày thi', 'Chia sẻ', '');
	}
	protected function row($data, $index)
	{
		$visible = '';
		switch ($data->share)
		{
			case NULL:
				$visible = '<span class="text-success"> Tất cả giáo viên </span>';
				break;
			case $data->user_id:
				$visible = '<span class="text-primary"> Chỉ mình tôi </span>';
				break;
			default:
				$visible = "<span class=\"text-info\"> $data->share_user_name </span>";
		}
		$date = $data->date ? '<span class="glyphicon glyphicon-time"></span>&nbsp; ' . strftime("%A, %d %B %Y, %I:%M %p", strtotime($data->date)) : 'Không có ngày thi';
		return <<<EOF
		<tr>
			<td><input type="checkbox" name="eid[]" value="$data->id" /></td>
			<td> $index </td>
			<td><a href="/admin/category/$data->category_id/exam/$data->id/group"><span class="glyphicon glyphicon-paperclip"></span> $data->title </a></td>
			<td> $data->n_question </td>
			<td class="text-info"> $date </td>
			<td> $visible </td>
			<td>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>&nbsp;<span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li class="dropdown-header"> Danh mục tùy chọn <span class="caret"></span></li>
						<li class="divider"></li>
						<li><a href="/admin/category/$data->category_id/exam/$data->id/edit"><span class="glyphicon glyphicon-pencil"></span> Chỉnh sửa </a></li>
						<li><a href="/admin/category/$data->category_id/exam/$data->id/share"><span class="glyphicon glyphicon-share"></span> Chia sẻ </a></li>
						<li><a href=""><span class="glyphicon glyphicon-copy"></span> Sao chép </a></li>
						<li><a href=""><span class="glyphicon glyphicon-import"></span> Bốc câu hỏi </a></li>
						<li><a href="/admin/category/$data->category_id/exam/$data->id/shuffle"><span class="glyphicon glyphicon-random"></span> Xáo trộn </a></li>
						<li><a href="" target="_blank"><span class="glyphicon glyphicon-list-alt"></span> Xuất bản </a></li>
						<li><a href="/admin/category/$data->category_id/exam/$data->id/delete" class="be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a></li>
					</ul>
				</div>
			</td>
		</tr>
EOF;
	}
	protected function Source()
	{
		$data = new Data();
		return $data->getQuery();
	}
}

?>