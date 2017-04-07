<?php

namespace Application\Model\Admin\Group;

use System\Database\DB;

class Data
{
	private $query = NULL;
	public function __construct()
	{
		$all = DB::query()->select([
			'NULL AS a', "NULL AS b", 'NULL AS c', 'q.exam_id', 'COUNT(q.id) AS n'
		])
			->from('question', 'q')
			->where('q.exam_id', Model::$exam_id)->whereIsNull('q.group_id');
		$query = DB::query()->select(['g.*', 'COUNT(q.id) AS n_question'])
			->from('question_group', 'g')
			->innerJoin('exam', 'e', 'e.id = g.exam_id')
			->innerJoin('category', 'c', 'c.id = e.category_id')
			->leftJoin('question', 'q', 'q.group_id = g.id')
			->where([
				'c.user_id' => Model::$user_id,
				'e.category_id' => Model::$category_id,
				'g.exam_id' => Model::$exam_id
			])
			->group_by('g.id');
		echo $query->get_Query();
		$this->query = $query;
	}
	public function getQuery()
	{
		return $this->query;
	}
}