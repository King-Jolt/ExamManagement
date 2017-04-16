<?php

namespace Application\Controller;

use System\Database\DB;

class Database extends \System\Core\Controller
{
	public function index()
	{
		$query = DB::query()->table('exam');
		echo $query->getQuery();
	}
}