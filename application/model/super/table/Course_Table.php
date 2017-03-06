<?php

namespace App\Model\Super\Table;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Library\Table;
use App\Model\Super\GetData;
use App\System\System;

class Course_Table extends Table
{
	public function __construct()
	{
		parent::__construct();
		$this->sql_query = GetData::list_Course();
		$this->arr_title = array(
			'No.', 'Bộ môn', 'Số tài khoản', ''
		);
	}
	public function row($data, $index)
	{
		$delete = '?' . http_build_query(array('action' => 'delete', 'id' => $data->id));
		$link = System::current_path() . '/user.php?' . http_build_query(array('course_id' => $data->id));
		return <<<EOF
		<tr>
			<td> $index </td>
			<td><a href="$link"><span class="glyphicon glyphicon-file"></span> $data->name </a></td>
			<td> $data->n_user </td>
			<td>
				<a href="$delete" class="btn btn-primary btn-xs be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a>
			</td>
		</tr>
EOF;
	}
}

?>