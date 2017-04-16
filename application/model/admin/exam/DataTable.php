<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Auth;
use System\Libraries\Request;
use System\Database\DB;

class DataTable
{
	/** @var \System\Database\DB_Query */
	private $query = NULL;
	public function __construct()
	{
		$query = DB::query()->select('c.user_id', 'u.name AS share_user_name', 'e.*', 'COUNT(q.id) AS n_question')
			->from('exam', 'e')
			->join('category', 'c', 'c.id = e.category_id')
			->leftJoin('user', 'u', 'u.id = e.share')
			->leftJoin('question', 'q', 'q.exam_id = e.id')
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id')
			])
			->groupBy('e.id');
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