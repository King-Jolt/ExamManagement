<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';

class View_Question
{
	private $_exam_id;
	public function __construct($exam_id)
	{
		$this->_exam_id = $exam_id;
	}
	private function _get_link($id)
	{
		try
		{
			$html = '<tbody>';
			$result = GetData::get_Question($id, GetData::$types['link'])->execute();
			foreach ($result->get_data() as $row)
			{
				$la = $row->a_position;
				$lb = chr($row->b_position + 64);
				$html .= <<<EOF
				<tr>
					<td> $la. $row->a_content </td>
					<td> $lb. $row->b_content </td>
				</tr>
EOF;
			}
			$html .= '</tbody>';
			return $html;
		}
		catch (\Exception $e)
		{
			echo $e->getMessage();
		}
	}
	public function get()
	{
		try
		{
			$html = '<div class="question-preview"><ul>';
			$result = GetData::list_Question($this->_exam_id)->execute();
			$no = 1;
			foreach ($result->get_data() as $question)
			{
				$data = $this->_get_link($question->id);
				$score = $question->score ? '(' . sprintf('%.1f', $question->score) . ' điểm)  ' : '';
				$html .= <<<EOF
				<li>
					<div>
					<span style="float: left"><strong> Câu $no $score:&nbsp;</strong></span> $question->content
					<table class="link-table">
						<thead>
							<th> $question->a_title </th>
							<th> $question->b_title </th>
						</thead>
						$data
					</table>
					</div>
				</li>
EOF;
				$no++;
			}
			$html .= '</ul></div>';
			return $html;
		}
		catch (\Exception $e)
		{
			echo $e->getMessage();
		}
	}
}

?>