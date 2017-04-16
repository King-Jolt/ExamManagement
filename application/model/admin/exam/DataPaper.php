<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Auth;
use System\Libraries\Request;
use System\Database\DB;

class DataPaper
{
	private $query = NULL;
	public function __construct()
	{		
		$this->query = DB::query()->select(
			'question_group.id AS g_id', 'question_group.title AS g_title', 'question_group.content AS g_content',
			'(CASE WHEN @qid != question.id THEN question.a_title ELSE NULL END) AS link_a_title',
			'(CASE WHEN @qid != question.id THEN question.b_title ELSE NULL END) AS link_b_title',
			'(CASE WHEN @qid != question.id THEN question.score ELSE NULL END) AS q_score',
			'(CASE WHEN @qid != question.id THEN question.type ELSE NULL END) AS q_type',
			'(CASE WHEN @qid != question.id THEN question.content ELSE NULL END) AS q_content',
			'(CASE WHEN @qid != question.id THEN question.position ELSE NULL END) AS q_position',
			'link.a_content AS link_a_content', 'link.a_mark AS link_a_mark',
			'link.b_content AS link_b_content', 'CHAR(link.b_mark + 64) AS link_b_mark',
			'CHAR(link.answer + 64) AS link_answer',
			'multiple_choice.mark AS multiple_choice_mark',
			'multiple_choice.content AS multiple_choice_content',
			'multiple_choice.answer AS multiple_choice_answer',
			'(CASE WHEN @qid != question.id THEN question.id ELSE NULL END) AS question_id',
			'IF((@qid:=question.id), NULL, NULL) AS temp_a'
		)->from('question')
		->join(DB::query()->select("@qid:=''"), 'qvar', '')
		->leftJoin(
			DB::query()->select(
				'(CASE WHEN @mcid != _multiple_choice.question_id THEN @mcn:=1 ELSE @mcn:=@mcn + 1 END) AS mark',
				'_multiple_choice.content, _multiple_choice.answer',
				'(@mcid:=_multiple_choice.question_id) AS question_id'
			)->from('_multiple_choice')
			->join(DB::query()->select("@mcid:=''", "@mcn:=0"), 'mark', true)
			->orderBy('_multiple_choice.question_id', '_multiple_choice.position'),
		'multiple_choice', 'multiple_choice.question_id = question.id')
		->leftJoin(
			DB::query()->select(
				'a.question_id, a.mark AS a_mark', 'a.content AS a_content',
				'b.mark AS b_mark', 'b.content AS b_content',
				'(CASE WHEN a.content IS NULL THEN NULL ELSE c.mark END) AS answer'
			)->from(
				DB::query()->select(
					'_link_option.id', '_link_option.a_content AS content',
					'(CASE WHEN @id != _link_option.question_id THEN @n:=1 ELSE @n:=@n + 1 END) AS mark',
					'(@id:=_link_option.question_id) AS question_id'
				)->from('_link_option')
				->join(DB::query()->select("@id:=''", "@n:=0"), 'mark', '')
				->orderBy('_link_option.question_id', '_link_option.a_position'), 'a')
			->leftJoin(
				DB::query()->select(
					'_link_option.id', '_link_option.b_content AS content',
					'(CASE WHEN @id2 != _link_option.question_id THEN @n2:=1 ELSE @n2:=@n2 + 1 END) AS mark',
					'(@id2:=_link_option.question_id) AS question_id'
				)->from('_link_option')
				->join(DB::query()->select("@id2:=''", "@n2:=0"), 'mark', '')
				->orderBy('_link_option.question_id', '_link_option.b_position'), 'b', 'a.mark = b.mark AND a.question_id = b.question_id')
			->leftJoin(
				DB::query()->select(
					'_link_option.id',
					'(CASE WHEN @id3 != _link_option.question_id THEN @n3:=1 ELSE @n3:=@n3 + 1 END) AS mark',
					'(@id3:=_link_option.question_id) AS question_id'
				)->from('_link_option')
				->join(DB::query()->select("@id3:=''", "@n3:=0"), 'mark', '')
				->orderBy('_link_option.question_id', '_link_option.b_position'), 'c', 'c.id = a.id'),
		'link', 'link.question_id = question.id')
		->join('exam', 'exam.id = question.exam_id')
		->join('category', 'category.id = exam.category_id')
		->leftJoin('question_group', 'question_group.exam_id = question.exam_id AND question_group.id = question.group_id')
		->where([
			'category.user_id' => Auth::get()->id,
			'exam.category_id' => Request::params('category_id'),
			'question.exam_id' => Request::params('exam_id')
		])		
		->orderBy('question_group.id', 'question.position');
	}
	public function getData()
	{
		return $this->query->execute();
	}
}
