<?php

namespace Application\Model\Admin\Exam;

use System\Database\DB;

class Data
{
	/** @var \System\Database\DB_Query */
	private $query = NULL;
	public function __construct()
	{
		$query = DB::query()->select(['e.*', 'COUNT(e.id) AS n_question'])->from('exam', 'e')
			->join('category', 'c', 'c.id = e.category_id')
			->leftJoin('question', 'q', 'q.exam_id = e.id')
			->where([
				'c.user_id' => Model::$user_id,
				'e.category_id' => Model::$category_id
			])
			->group_by('e.id');
		$this->query = $query;
	}
	public function filterId($id)
	{
		$this->query->where('e.id', $id);
		return $this;
	}
	public function getQuery()
	{
		return $this->query;
	}
	public function getExam()
	{
		return $this->query->execute();
	}
}