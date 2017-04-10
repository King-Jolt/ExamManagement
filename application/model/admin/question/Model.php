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
			'position' => 65536
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
		if (!$query->execute())
		{
			Misc::put_msg('warning', 'Không thể xóa câu hỏi này');
			return FALSE;
		}
		DB::commit();
		Misc::put_msg('success', 'Đã xóa ' . DB::affected_rows() . ' câu hỏi');
	}
	public function getTable()
	{
		$table = new Table();
		return $table->get();
	}
}
