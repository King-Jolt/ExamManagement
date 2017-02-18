<?php

namespace App\Model\Super\Table;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/super/GetData.php';

use App\System\Library\Table;
use App\Model\Super\GetData;

class User_Table extends Table
{
	public function __construct($id)
	{
		parent::__construct();
		$this->sql_query = GetData::list_User($id);
		$this->arr_title = array(
			'No.', 'Tên tài khoản', 'Tên giáo viên', 'Số lượng đề thi', ''
		);
	}
	public function row($data, $index)
	{
		$delete = '?' . http_build_query(array_merge($_GET + array('action' => 'delete', 'id' => $data->id)));
		return <<<EOF
		<tr>
			<td> $index </td>
			<td> $data->user </td>
			<td> $data->name </td>
			<td> $data->n_category </td>
			<td><a href="$delete" class="btn btn-primary btn-xs be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a> &nbsp; </td>
		</tr>
EOF;
	}
}

?>