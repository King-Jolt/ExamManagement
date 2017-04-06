<?php

namespace Application\Controller\Test;

use System\Core\Controller;
use System\Database\DB;
use System\Database\DB_Query;

class Main extends Controller
{
	private function _show(DB_Query $query)
	{
		echo '<pre>';
		echo $query->get_Query() . '<br />';
		var_dump($query->get_Param());
		echo '</pre>';
	}
	protected function index()
	{
		$select = DB::query()->select()->from('question', 'q')
			->join('exam', '', 'q.exam_id = e.id')
			->join('exam', '', 'q.exam_id = e.id');
		$this->_show($select);
	}
}