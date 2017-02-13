<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\System;

class View_Question
{
	private $_exam_id;
	public function __construct($exam_id)
	{
		$this->_exam_id = $exam_id;
	}
	private function _get_link($question, $show_answer = FALSE)
	{			
		$head = <<<EOF
		<thead>
			<th> $question->a_title </th>
			<th> Chọn đáp án </th>
			<th> $question->b_title </th>
		</thead>		
EOF;
		$body = '<tbody>';
		try
		{
			$result = GetData::get_Question($question->id, GetData::$types['link'])->execute();
			if (is_object($result))
			{
				foreach ($result->get_data() as $row)
				{
					$a = $row->a_position;
					$b = chr($row->b_position + 64);
					$fill = $row->a_content ? '.....' : NULL;
					$body .= <<<EOF
					<tr>
						<td> $a. $row->a_content </td>
						<td> $fill </td>
						<td> $b. $row->b_content </td>
					</tr>
EOF;
				}
			}
		}
		catch (\Exception $e)
		{
			$str = System::get_exception_msg($e);
			$body .= "<tr><td> $str </td></tr>";
		}
		$body .= '</tbody>';
		$html = <<<EOF
			<table class="link-table">
				$head
				$body
			</table>
EOF;
		return $html;
	}
	private function _get_multiple_choice($question, $show_answer = FALSE)
	{
		$html = '';
		try
		{
			$result = GetData::get_Question($question->id, GetData::$types['multiple-choice'])->execute();
			if (is_object($result))
			{
				$list = '<ol type="A" class="multiple-choice">';
				foreach ($result->get_data() as $row)
				{
					$list .= "<li><span class=\"choice\"> $row->content </span></li>";
				}
				$list .= '</ol>';
				$html = $list;
			}
		}
		catch (\Exception $e)
		{
			
		}
		return $html;
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
				$data = '';
				switch ($question->type)
				{
					case GetData::$types['link']:
					{
						$data = $this->_get_link($question);
						break;
					}
					case GetData::$types['multiple-choice']:
					{
						$data = $this->_get_multiple_choice($question);
						break;
					}
					case GetData::$types['fill']:
					{
						$data = '';
						break;
					}
				}
				$score = $question->score ? '(' . sprintf('%.1f', $question->score) . ' điểm)  ' : '';
				$html .= <<<EOF
				<li>
					<div>
						<span style="float: left"><strong> Câu $no $score:&nbsp;</strong></span> $question->content
						$data
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