<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';

use App\System\Library\Table;

class Question_Table extends Table
{
	public function __construct($id = '')
	{
		parent::__construct();
		$this->sql_query = GetData::list_Question($id);
		$this->arr_title = array(
			'No.', 'Câu hỏi', ''
		);
	}
	public function row($data, $index)
	{
		$delete = '?' . http_build_query(array_merge($_GET + array('action' => 'delete', 'id' => $data->id)));
		return <<<EOF
		<tr>
			<td class="nowrap"><strong class="text-muted"> Câu $index </strong></td>
			<td> $data->content </td>
			<td>
				<a href="$delete" class="btn btn-primary btn-xs be-care"><span class="glyphicon glyphicon-trash"></span> Xóa </a> &nbsp;
			</td>
		</tr>
EOF;
	}
}

?>