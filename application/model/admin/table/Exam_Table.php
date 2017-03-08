<?php

namespace App\Model\Admin\Table;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Library\Table;
use App\Model\Admin\GetData;
use App\System\System;

class Exam_Table extends Table
{
	public function __construct($user_id, $category_id)
	{
		parent::__construct();
		$keyword = System::input_get('search');
		$this->sql_query = GetData::list_Exam($user_id, $category_id, $keyword ? $keyword : '');
		$this->arr_title = array(
			'No.', 'Đề kiểm tra', 'Số câu hỏi', 'Ngày thi', 'Chia sẻ', ''
		);
	}
	public function row($data, $index)
	{
		setlocale(LC_ALL, 'vi_VN');
		$base = array(
			'category_id' => $_GET['category_id'],
			'exam_id' => $data->id
		);
		$manage = System::current_path() . '/question.php?' . http_build_query($base);
		$preview = System::current_path() . '/preview.php?' . http_build_query($base);
		$select_random = '?' . http_build_query(array_merge($_GET, array('action' => 'select_random', 'id' => $data->id)));
		$share = $data->share ? "javascript:void(0)" : '?' . http_build_query(array_merge($_GET, array('action' => 'share', 'id' => $data->id)));
		$shuffle = '?' . http_build_query(array_merge($_GET, array('action' => 'shuffle', 'id' => $data->id)));
		$delete = '?' . http_build_query(array_merge($_GET, array('action' => 'delete', 'id' => $data->id)));
		$un_share = '?' . http_build_query(array_merge($_GET, array('action' => 'private', 'id' => $data->id)));
		$collect = $data->share == 1 ? "<a href=\"$un_share\" class=\"btn btn-info btn-xs\"> Bỏ chia sẻ </a>" : '<strong class="text-info">Not Share</strong>';
		$date = $data->date ? '<span class="glyphicon glyphicon-time"></span>&nbsp; ' . strftime("%A, %d %B %Y, %I:%M %p", strtotime($data->date)) : 'Không có ngày thi';
		return <<<EOF
		<tr>
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
}

?>