<?php

namespace App\Model\Admin\Table;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Route.php';

use App\System\Library\Table;
use App\Model\Admin\GetData;
use App\System\Route;

class Exam_Table extends Table
{
	public function __construct($id)
	{
		parent::__construct();
		$this->sql_query = GetData::list_Exam($id);
		$this->arr_title = array(
			'No.', 'Đề kiểm tra', 'Số câu hỏi', ''
		);
	}
	public function row($data, $index)
	{
		$base = array(
			'category_id' => $_GET['category_id'],
			'exam_id' => $data->id
		);
		$manage = Route::current_path() . '/question.php?' . http_build_query($base);
		$view = Route::current_path() . '/question.php?' . http_build_query($base + array('action' => 'view'));
		$preview = Route::current_path() . '/preview.php?' . http_build_query($base);
		$shuffle = '?' . http_build_query(array_merge($_GET, array('action' => 'shuffle', 'id' => $data->id)));
		$delete = '?' . http_build_query(array_merge($_GET, array('action' => 'delete', 'id' => $data->id)));
		return <<<EOF
		<tr>
			<td> $index </td>
			<td><a href="$manage"><span class="glyphicon glyphicon-paperclip"></span> $data->title </a></td>
			<td> $data->n_question </td>
			<td>
				<div class="dropdown">
  					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li class="dropdown-header"> Danh mục tùy chọn <span class="caret"></span></li>
						<li class="divider"></li>
						<li><a href="$shuffle"><span class="glyphicon glyphicon-refresh"></span> Xáo trộn </a></li>
						<li><a href="$view"><span class="glyphicon glyphicon-eye-open"></span> Xem </a></li>
						<li><a href="$preview" target="_blank"><span class="glyphicon glyphicon-list-alt"></span> Xuất bản </a></li>
						<li><a href="$delete" class="btn btn-primary btn-xs be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a></li>
					</ul>
				</div>
			</td>
		</tr>
EOF;
	}
}

?>