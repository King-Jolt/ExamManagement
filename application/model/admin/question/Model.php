<?php

namespace Application\Model\Admin\Question;

use System\Database\DB;
use System\Database\DB_Exception;
use System\Libraries\Auth;
use System\Libraries\Request;
use Application\Model\Misc;

class Model
{
	CONST QUESTION_LINK = 1;
	CONST QUESTION_MULTIPLE_CHOICE = 2;
	CONST QUESTION_FILL = 4;
	CONST QUESTION_ESSAY = 8;
	private function getQuestionLastPosition()
	{
		return DB::query('SELECT MAX(position) AS pos FROM question')->execute()->fetch()->pos + 1;
	}
	public function insertMultipleChoiceQuestion($content, $data, $score = NULL)
	{
		DB::begin();
		$id = Misc::get_uid();
		DB::query()->insert('question', [
			'id' => $id,
			'content' => $content,
			'exam_id' => Request::params('exam_id'),
			'group_id' => Request::params('group_id') ? Request::params('group_id') : NULL,
			'score' => $score,
			'type' => self::QUESTION_MULTIPLE_CHOICE,
			'position' => $this->getQuestionLastPosition()
		])->execute();
		foreach ($data as $key => $option)
		{
			DB::query()->insert('_multiple_choice', [
				'id' => Misc::get_uid(),
				'question_id' => $id,
				'content' => $option['content'],
				'answer' => isset($option['boolean'])
			])->execute();
		}
		DB::commit();
		Misc::put_msg('success', 'Đã thêm mới câu hỏi thành công');
	}
	public function insertFillQuestion($content, $score)
	{
		$id = Misc::get_uid();
		DB::query()->insert('question', [
			'id' => $id,
			'content' => $content,
			'exam_id' => Request::params('exam_id'),
			'group_id' => Request::params('group_id') ? Request::params('group_id') : NULL,
			'score' => $score,
			'type' => self::QUESTION_FILL,
			'position' => $this->getQuestionLastPosition()
		])->execute();
		Misc::put_msg('success', 'Đã thêm mới một câu điền khuyết');
	}
	public function insertEssayQuestion($content, $score)
	{
		$id = Misc::get_uid();
		DB::query()->insert('question', [
			'id' => $id,
			'content' => $content,
			'exam_id' => Request::params('exam_id'),
			'group_id' => Request::params('group_id') ? Request::params('group_id') : NULL,
			'score' => $score,
			'type' => self::QUESTION_ESSAY,
			'position' => $this->getQuestionLastPosition()
		])->execute();
		Misc::put_msg('success', 'Đã thêm mới một câu điền khuyết');
	}
	public function insertLinkQuestion($content, $a_title, $b_title, $data, $score)
	{
		DB::begin();
		$id = Misc::get_uid();
		DB::query()->insert('question', [
			'id' => $id,
			'content' => $content,
			'exam_id' => Request::params('exam_id'),
			'group_id' => Request::params('group_id') ? Request::params('group_id') : NULL,
			'a_title' => $a_title,
			'b_title' => $b_title,
			'score' => $score,
			'type' => self::QUESTION_LINK,
			'position' => $this->getQuestionLastPosition()
		])->execute();
		foreach ($data as $option)
		{
			DB::query()->insert('_link_option', [
				'id' => Misc::get_uid(),
				'question_id' => $id,
				'a_content' => isset($option['a']) ? $option['a'] : NULL,
				'a_position' => rand(0, 255),
				'b_content' => $option['b'],
				'b_position' => rand(0, 255)
			])->execute();
		}
		DB::commit();
		Misc::put_msg('success', 'Đã thêm một câu hỏi mới');
	}
	public function deleteQuestion(array $ids)
	{
		DB::begin();
		$query = DB::query()->delete('q')->from('question', 'q')
			->innerJoin('exam', 'e', 'e.id = q.exam_id')
			->innerJoin('category', 'c', 'c.id = e.category_id')
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id'),
				'q.exam_id' => Request::params('exam_id')
			])
			->whereIn('q.id', $ids);
		if (Request::params('group_id'))
		{
			$query->where('q.group_id', Request::params('group_id'));
		}
		else
		{
			$query->whereIsNull('q.group_id');
		}
		$result = $query->execute();
		DB::commit();
		if ($result)
		{
			Misc::put_msg('success', "Đã xóa $result câu hỏi");
		}
		else
		{
			Misc::put_msg('warning', 'Không thể xóa câu hỏi này');
			return FALSE;
		}
	}
	public function getTable()
	{
		$table = new Table();
		return $table->get();
	}
}
