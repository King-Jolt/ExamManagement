<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Request;

class Table extends \System\Libraries\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->class = 'table table-striped table-hover table-with-checkbox';
		$this->db_query = Model::list_Exam();
		$this->arr_title = array(
			'<input type="checkbox" />', 'No.', 'Đề kiểm tra', 'Số câu hỏi', 'Ngày thi', 'Chia sẻ', ''
		);
		$this->callback = function($data, $index)
		{
			$base = array(
				'category_id' => Model::$category_id,
				'exam_id' => $data->id
			);
			$manage = Request::current_path() . '/question.php' . Request::build_get($base);
			$preview = Request::current_path() . '/preview.php' . Request::build_get($base);
			$select_random = Request::build_get($_GET, array('action' => 'select_random', 'id' => $data->id));
			$share = $data->share ? "javascript:void(0)" : Request::build_get($_GET, array('action' => 'share', 'id' => $data->id));
			$shuffle = Request::build_get($_GET, array('action' => 'shuffle', 'id' => $data->id));
			$copy = Request::build_get($_GET, array('action' => 'copy', 'id' => $data->id));
			$delete = Request::current_uri() . "/delete/$data->id";
			$un_share = Request::build_get($_GET, array('action' => 'private', 'id' => $data->id));
			$collect = $data->share == 1 ? "<a href=\"$un_share\" class=\"btn btn-info btn-xs\"> Bỏ chia sẻ </a>" : '<strong class="text-info">Not Share</strong>';
			$date = $data->date ? '<span class="glyphicon glyphicon-time"></span>&nbsp; ' . strftime("%A, %d %B %Y, %I:%M %p", strtotime($data->date)) : 'Không có ngày thi';
			return <<<EOF
			<tr>
				<td><input type="checkbox" name="eid[]" value="$data->id" /></td>
				<td> $index </td>
				<td><a href="$manage"><span class="glyphicon glyphicon-paperclip"></span> $data->title </a></td>
				<td> $data->n_question </td>
				<td class="text-info"> $date </td>
				<td> $collect </td>
				<td>
					<div class="dropdown">
	  					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>&nbsp;<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li class="dropdown-header"> Danh mục tùy chọn <span class="caret"></span></li>
							<li class="divider"></li>
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
		};
	}
}

?>