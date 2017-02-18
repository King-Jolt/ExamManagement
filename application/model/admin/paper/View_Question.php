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
	private function _get_link($question_obj, $link_result)
	{			
		$head = <<<EOF
		<thead>
			<th> $question_obj->a_title </th>
			<th> Chọn đáp án </th>
			<th> $question_obj->b_title </th>
		</thead>
EOF;
		$body = '<tbody>';
		try
		{
			if (is_object($link_result))
			{
				while ($link_result->valid())
				{
					$result = $link_result->current();
					if ($result->question_id != $question_obj->id)
					{
						break;
					}
					$link_result->next();
					$a = $result->a_mark;
					$b = chr($result->b_mark + 64);
					$answer = '';
					if ($result->a_content)
					{
						$ab = chr($result->answer + 64);
						$answer = "answer=\"$ab\"";
					}
					$body .= <<<EOF
						<tr>
							<td class="A"> $a. $result->a_content </td>
							<td class="B" $answer> </td>
							<td class="C"> $b. $result->b_content </td>
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
	private function _get_multiple_choice($question_obj, $multiple_choice_result)
	{
		$html = '';
		try
		{
			if (is_object($multiple_choice_result))
			{
				$list = '<ol type="A" class="multiple-choice">';
				while ($multiple_choice_result->valid())
				{
					$result = $multiple_choice_result->current();
					if ($result->question_id != $question_obj->id)
					{
						break;
					}
					$multiple_choice_result->next();
					$list .= "<li><span class=\"choice\" answer=\"$result->answer\"> $result->content </span></li>";
					$html = $list;
				}
				$list .= '</ol>';
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
			$question_result = GetData::list_Question($this->_exam_id)->execute()->get_data();
			$link = GetData::get_Question($this->_exam_id, GetData::$types['link'])->execute()->get_data();
			$multiple_choice = GetData::get_Question($this->_exam_id, GetData::$types['multiple-choice'])->execute()->get_data();
			$no = 1;
			foreach ($question_result as $question)
			{
				$data = '';
				if ($question->type == GetData::$types['link'] and $link->valid() and $link->current()->question_id = $question->id)
				{
					$data = $this->_get_link($question, $link);
				}
				else if ($question->type == GetData::$types['multiple-choice'] and $multiple_choice->valid() and $multiple_choice->current()->question_id = $question->id)
				{
					$data = $this->_get_multiple_choice($question, $multiple_choice);
				}
				 /*
				if (GetData::$types['fill'])
				{
					$data = '';
					break;
				}
				  * 
				  */
				$score = $question->score ? '(' . sprintf('%.1f', $question->score) . ' điểm)  ' : '';
				$html .= <<<EOF
				<li>
					<strong> Câu $no $score:</strong>&nbsp; $question->content
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