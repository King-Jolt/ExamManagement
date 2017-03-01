<?php

namespace App\Model\Admin\Table;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/Route.php';

use App\System\Library\Table;
use App\Model\Admin\GetData;
use App\System\Route;

class Category_Table extends Table
{
	public function __construct($user_id)
	{
		parent::__construct();
		$this->sql_query = GetData::list_Category($user_id);
		$this->arr_title = array(
			'No.', 'Tên danh mục', 'Số đề thi', ''
		);
	}
	public function row($data, $index)
	{
		$delete = '?' . http_build_query(array('action' => 'delete', 'id' => $data->id));
		$exam = Route::current_path() . '/exam.php?' . http_build_query(array('category_id' => $data->id));
		return <<<EOF
		<tr>
			<td class="text-muted"> $index </td>
			<td><a href="$exam"><span class="glyphicon glyphicon-file"></span> $data->name </a></td>
			<td class="text-muted"> Có $data->n_exam đề thi ($data->n_share được chia sẻ) </td>
			<td>
				<a href="$delete" class="btn btn-primary btn-xs be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a>
			</td>
		</tr>
EOF;
	}
}

?>