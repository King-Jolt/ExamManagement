<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/Table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';

use App\System\Library\Table;

class Exam_Table extends Table
{
	public function __construct($id = NULL)
	{
		parent::__construct();
		$this->_query_str = 'SELECT * FROM list_exam ';
		$this->sql_query = GetData::list_Exam();
		$this->_arr_title = array(
			'No.', 'Tiêu đề', 'Số câu hỏi', ''
		);
	}
	public function row($data, $index)
	{
		$delete = '?' . http_build_query(array('action' => 'delete', 'id' => $data->id));
		$manage = '/admin/exam.php?' . http_build_query(array('action' => 'manage', 'id' => $data->id));
		$view = '/admin/exam.php?' . http_build_query(array('action' => 'view', 'id' => $data->id));
		$preview = '/admin/preview.php?' . http_build_query(array('action' => 'preview', 'id' => $data->id));
		return <<<EOF
		<tr>
			<td> $index </td>
			<td> $data->title </td>
			<td> $data->n_question </td>
			<td>
				<a href="$delete" class="be-care"><span class="glyphicon glyphicon-remove"></span> Xóa </a> &nbsp;
				<a href="$manage"><span class="glyphicon glyphicon-cog"></span> Quản lý </a> &nbsp;
				<a href="$view"><span class="glyphicon glyphicon-eye-open"></span> Xem </a> &nbsp;
				<a href="$preview"><span class="glyphicon glyphicon-eye-open"></span> Preview </a> &nbsp;
			</td>
		</tr>
EOF;
	}
}

?>