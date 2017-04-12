<?php

namespace Application\Model\Admin\Question;

use System\Libraries\Auth;
use System\Libraries\Request;
use System\Database\DB;

class DataTable
{
	private $query = NULL;
	public function __construct()
	{
		$query = DB::query()->select('q.*', 't.name AS typename')
			->from('question', 'q')
			->join('type_question', 't', 't.id = q.type');
		if (Request::params('group_id'))
		{
			$query->join('question_group', 'g', 'g.id = q.group_id');
		}
		else
		{
			$query->whereIsNull('q.group_id');
		}
		$query
			->join('exam', 'e', 'e.id = q.exam_id')
			->join('category', 'c', 'c.id = e.category_id')
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id'),
				'q.exam_id' => Request::params('exam_id')
			])
			->orderBy('position', 'ASC');
		$this->query = $query;
	}
	public function getQuery()
	{
		return $this->query;
	}
}