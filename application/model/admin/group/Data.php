<?php

namespace Application\Model\Admin\Group;

use System\Libraries\Auth;
use System\Libraries\Request;
use System\Database\DB;

class Data
{
	private $query_a = NULL;
	private $query_b = NULL;
	public function __construct()
	{
		$cid = Request::params('category_id');
		$eid = Request::params('exam_id');
		$this->query_a = DB::query()->select([
			"'$cid' AS category_id",
			'0 AS id', "'Nhóm chung' AS title", 'NULL AS content',
			"'$eid' AS exam_id", 'COUNT(q.id) AS n_question'
			])
			->from('question', 'q')
			->where('q.exam_id', Request::params('exam_id'))->whereIsNull('q.group_id');
		$this->query_b = DB::query()->select(['e.category_id', 'g.*', 'COUNT(q.id) AS n_question'])
			->from('question_group', 'g')
			->innerJoin('exam', 'e', 'e.id = g.exam_id')
			->innerJoin('category', 'c', 'c.id = e.category_id')
			->leftJoin('question', 'q', 'q.group_id = g.id')
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => $cid,
				'g.exam_id' => $eid
			])
			->groupBy('g.id');
	}
	public function filterId($id)
	{
		$this->query_b->where('g.id', $id);
		return $this;
	}
	public function getQuery()
	{
		return $this->query_a->union($this->query_b);
	}
	public function getGroup()
	{
		return $this->query_b->execute();
	}
}