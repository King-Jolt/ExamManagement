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
	private function _get_link($id, $result)
	{
		$a_title = '';
		$b_title = '';
		$body = '<tbody>';
		while ($result->valid() and $row = $result->current() and $row->question_id == $id)
		{
			if ($row->q_a_title !== NULL)
			{
				$a_title = $row->q_a_title;
			}
			if ($row->q_b_title !== NULL)
			{
				$b_title = $row->q_b_title;
			}
			$a_mark = $row->link_a_content !== NULL ? $row->link_a_mark : NULL;
			$b_mark = chr($row->link_b_mark + 64);
			$answer = '';
			if ($row->link_answer !== NULL)
			{
				$answer = chr($row->link_answer + 64);
				$answer = "answer=\"$answer\"";
			}
			$body .= <<<EOF
			<tr>
				<td class="A"> $a_mark. $row->link_a_content </td>
				<td class="B" $answer> </td>
				<td class="C"> $b_mark. $row->link_b_content </td>
			</tr>
EOF;
			$result->next();
		}
		$body .= '</tbody>';
		$html = <<<EOF
			<table class="link-table">
				<thead>
					<th> $a_title </th>
					<th> Chọn đáp án </th>
					<th> $b_title </th>
				</thead>
				$body
			</table>
EOF;
		return $html;
	}
	private function _get_multiple_choice($id, $result)
	{
		$html = '<ol type="A" class="multiple-choice">';
		while ($result->valid() and $row = $result->current() and $row->question_id == $id)
		{
			$html .= "<li><span class=\"choice\" answer=\"$row->multiple_choice_answer\"> $row->multiple_choice_content </span></li>";
			$result->next();
		}
		$html .= '</ol>';
		return $html;
	}
	public function get()
	{
		try
		{
			$html = '<div class="question-preview"><ul>';
			$question_result = GetData::get_Question($this->_exam_id)->execute()->get_data();
			$no = 1;
			while ($question_result->valid() and $question = $question_result->current())
			{
				$id = $question->question_id;
				$score = $question->q_score ? '(' . sprintf('%.1f', $question->q_score) . ' điểm)  ' : '';
				$content = $question->q_content;
				$data = '';
				switch ($question->q_type)
				{
					case GetData::$types['link']:
					{
						$data = $this->_get_link($id, $question_result);
						break;
					}
					case GetData::$types['multiple-choice']:
					{
						$data = $this->_get_multiple_choice($id, $question_result);
						break;
					}
					default:
					{
						//throw new \Exception('error');
						$question_result->next();
					}
				}
				$html .= <<<EOF
				<li>
					<strong> Câu $no $score:</strong>&nbsp; $content
					$data
				</li>
EOF;
				$no++;
			}
			$html .= '</ul></div>';
			return $html;
		}
		catch (\Exception $e)
		{
			return '<div>' . $e->getMessage() . '</div>';
		}
	}
}

?>