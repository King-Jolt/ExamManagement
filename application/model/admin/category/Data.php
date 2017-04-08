<?php

namespace Application\Model\Admin\Category;

use System\Libraries\Auth;
use System\Database\DB;

class Data
{
	/** @var \System\Database\DB_Query */
	private $query = NULL;
	public function __construct()
	{
		$s_query = DB::query()->select(['c.id', 'COUNT(e.id) AS n_exam', 'COUNT(IF(e.share = c.user_id, e.share, NULL)) AS n_share'])->from('category', 'c')
			->leftJoin('exam', 'e', 'e.category_id = c.id')
			->groupBy('c.id');
		$query = DB::query()->select(['c.*', 'COUNT(a.id) AS child', 's.n_exam', 's.n_share'])->from('category', 'c')
			->leftJoin('category', 'a', 'a.parent = c.id')
			->join($s_query, 's', 's.id = c.id')
			->where('c.user_id', Auth::get()->id)
			->groupBy('c.id');
		$this->query = $query;
	}
	public function filterId($id)
	{
		$this->query->where('c.id', $id);
		return $this;
	}
	public function filterParent($id)
	{
		if ($id === NULL)
		{
			$this->query->whereIsNull('c.parent');
		}
		else
		{
			$this->query->where('c.parent', $id);
		}
		return $this;
	}
	public function getCategory()
	{
		return $this->query->execute();
	}
}