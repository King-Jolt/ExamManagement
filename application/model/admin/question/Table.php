<?php

namespace Application\Model\Admin\Question;

class Table extends \System\Libraries\Table
{
	public function __construct()
	{
		parent::__construct();
		$this->columns = array('<input type="checkbox" />', 'No.', 'Nội dung câu hỏi', 'Loại câu hỏi', 'Điểm');
		$this->class[] = 'table-with-checkbox';
	}
	protected function Source()
	{
		$data = new Data();
		return $data->getQuery();
	}
	protected function row($data, $index)
	{
		return <<<EOF
		<tr>
			<td> <input type="checkbox" /> </td>
			<td> $index </td>
			<td> $data->content </td>
			<td> $data->type </td>
			<td> $data->score </td>
		</tr>
EOF;
	}
}