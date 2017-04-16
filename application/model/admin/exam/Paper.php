<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Request;
use Application\Model\Admin\Question\Model as QModel;

class Paper
{
	private $html = '';
	private $data = NULL;
	private $q_number = 1;
	private function add_group_header()
	{
		$this->html .=
			'<div class="group">' .
				'<p><strong>' . $this->data->current()->g_title . '</strong></p>' .
				'<p>' . $this->data->current()->g_content . '</p>' .
			'</div>';
		;
	}
	private function get_exam_data()
	{
		$data = new \Application\Model\Admin\Exam\DataTable();
		$data->filterId(Request::params('exam_id'));
		return $data->getExam()->fetch();
	}
	private function get_QuestionHeader()
	{
		$text = "Câu $this->q_number ";
		$score = $this->data->current()->q_score;
		$this->q_number += 1;
		return '<strong>' . $text . ($score ? " ($score Điểm) : " : ' : ') . '</strong>';
	}

	private function add_MultipleChoice()
	{
		$this->html .= '<li class="multiple-choice">';
		$this->html .= "<div> {$this->get_QuestionHeader()} {$this->data->current()->q_content} </div>";
		$this->html .= '<div class="select">';
		while (true)
		{
			$this->html .= "<div class=\"option\" answer=\"{$this->data->current()->multiple_choice_answer}\"> {$this->data->current()->multiple_choice_content} </div>";
			$this->data->next();
			if (!$this->data->valid() or $this->data->current()->question_id !== NULL)
			{
				break;
			}
		}
		$this->html .= '<div>';
		$this->html .= '</li>';
	}
	private function add_Link()
	{
		$this->html .= '<li class="link">';
		$this->html .= "<div> {$this->get_QuestionHeader()} {$this->data->current()->q_content} </div>";
		$this->html .= '<table>';
		$this->html .=
			'<thead>' .
				'<tr>' .
					"<th> {$this->data->current()->link_a_title} </th>".
					"<th> Đáp án </th>".
					"<th> {$this->data->current()->link_b_title} </th>".
				'</tr>' .
			'</thead>';
		$this->html .= '<tbody>';
		while (true)
		{
			$this->html .=
			'<tr>' .
				"<td> {$this->data->current()->link_a_mark}. {$this->data->current()->link_a_content} </td>".
				"<td answer=\"{$this->data->current()->link_answer}\"> </td>".
				"<td> {$this->data->current()->link_b_mark}. {$this->data->current()->link_b_content} </td>".
			'</tr>';
			$this->data->next();
			if (!$this->data->valid() or $this->data->current()->question_id !== NULL)
			{
				break;
			}
		}
		$this->html .= '</tbody>';
		$this->html .= '</table>';
		$this->html .= '</li>';
	}
	private function add_Fill()
	{
		$this->html .= "<li class=\"fill\"><div> {$this->get_QuestionHeader()} {$this->data->current()->q_content} </div></li>";
		$this->data->next();
	}
	private function add_Essay()
	{
		$this->html .= "<li class=\"essay\"><div> {$this->get_QuestionHeader()} {$this->data->current()->q_content} </div></li>";
		$this->data->next();
	}
	public function get()
	{
		$exam_data = $this->get_exam_data();
		
		$this->html .= '<div class="exam-preview">';		
		$this->html .= "<div class=\"exam-header\"> $exam_data->header </div>";
		$this->html .= '<div class="exam-body">';
		$this->html .= '<ul class="list-question">';
		$this->data = (new DataPaper())->getData();
		
		while (($q = $this->data->current()))
		{
			if ($q->g_id)
			{
				// echo $q->g_id . '<br />';
			}
			switch ($q->q_type)
			{
			case QModel::QUESTION_MULTIPLE_CHOICE:
				$this->add_MultipleChoice();
				break;
			case QModel::QUESTION_FILL:
				$this->add_Fill();
				break;
			case QModel::QUESTION_LINK:
				$this->add_Link();
				break;
			case QModel::QUESTION_ESSAY:
				$this->add_Essay();
				break;
			}
		}
		$this->html .= '</ul>';
		$this->html .= '</div>';
		$this->html .= "<div class=\"exam-footer\"> $exam_data->footer </div>";
		$this->html .= '</div>';
		return $this->html;
	}
}