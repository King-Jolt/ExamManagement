<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/model/admin/GetData.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/View.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use System\Library\View;
use System\Core\Misc;

class View_Question
{
	private $user_id = NULL;
	private $category_id = NULL;
	private $exam_id = NULL;
	public $option = array(
		'show_question_checkbox' => FALSE,
		'return_only_answer' => FALSE
	);
	public function __construct($user_id, $category_id, $exam_id)
	{
		$this->user_id = $user_id;
		$this->category_id = $category_id;
		$this->exam_id = $exam_id;
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
				$answer = "answer=\"$a_mark - $answer\"";
			}
			$body .= <<<EOF
			<tr>
				<td class="A"> $a_mark. $row->link_a_content </td>
				<td class="B" $answer></td>
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
					<th> Đáp án </th>
					<th> $b_title </th>
				</thead>
				$body
			</table>
EOF;
		return $html;
	}
	private function _get_multiple_choice($id, $result, &$answer = NULL)
	{
		$html = '<div class="list-option">';
		while ($result->valid() and $row = $result->current() and $row->question_id == $id)
		{
			if ($row->multiple_choice_answer)
			{
				$answer = chr(64 + $row->multiple_choice_mark);
			}
			$html .= "<div class=\"option\" answer=\"$row->multiple_choice_answer\"> $row->multiple_choice_content </div>";
			$result->next();
		}
		$html .= '</ol>';
		return $html;
	}
	public function get($full_view = FALSE)
	{
		try
		{
			$header = '';
			$html = '';
			$footer = '';
			$script = '';
			$exam_data = GetData::get_Exam($this->user_id, $this->category_id, $this->exam_id)->execute()->first();
			if (!$exam_data)
			{
				throw new \Exception('Lỗi ! Đề thi không tồn tại');
			}
			if ($full_view)
			{
				$header .= "<div class=\"header\"> $exam_data->header </div>";
				$footer .= "<div class=\"footer\"> $exam_data->footer </div>";
			}
			$table_answer = "<div class=\"hide table-answer\"><h3 class=\"exam-title\"> $exam_data->title </h3>";
			$html .= '<div class="question-preview"><ul>';
			$question_result = GetData::get_Question($this->user_id, $this->category_id, $this->exam_id)->execute()->get_data();
			$no = 1;
			while ($question_result->valid() and $question = $question_result->current())
			{
				$id = $question->question_id;
				$score = $question->q_score ? '(' . sprintf('%.1f', $question->q_score) . ' điểm)  ' : '';
				$content = $question->q_content;
				$content_class = '';
				$checkbox = '';
				$data = '';
				$ans = '';
				switch ($question->q_type)
				{
					case GetData::$types['link']:
					{
						$data = $this->_get_link($id, $question_result);
						$content_class = 'link';
						break;
					}
					case GetData::$types['multiple-choice']:
					{
						$data = $this->_get_multiple_choice($id, $question_result, $ans);
						$content_class = 'multiple-choice';
						break;
					}
					case GetData::$types['fill']:
					{
						$data = '';
						$content_class = 'fill';
						$question_result->next();
						break;
					}
				}
				$table_answer .= "<div class=\"index\"> $ans </div>";
				if ($this->option['show_question_checkbox'])
				{
					$checkbox = "<input type=\"checkbox\" name=\"q[]\" value=\"$question->question_id\" />";
				}
				$html .= <<<EOF
				<li class="$content_class">
					<label>$checkbox Câu $no $score:</label>&nbsp; $content
					$data
				</li>
EOF;
				$no++;
			}
			$html .= '</ul></div>';
			$table_answer .= '</div>';
			if ($this->option['return_only_answer'])
			{
				$script = <<<EOF
				<script>
					obj_q.show_TableAnswer();
				</script>
EOF;
				$data = <<<EOF
				<div class="exam-wrap">
					$table_answer
				</div>
EOF;
			}
			else
			{
				$data = <<<EOF
				<div class="exam-wrap">
					$header
					$html
					$table_answer
					$footer
				</div>
EOF;
			}
		}
		catch (\Exception $e)
		{
			$data = '<div>' . $e->getMessage() . '</div>';
		}
		return new View('/application/view/admin/question/page/preview.php', array(
			'data' => $data,
			'script' => $script
		));
	}
}

?>