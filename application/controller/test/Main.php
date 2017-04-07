<?php

namespace Application\Controller\Test;

use System\Database\DB;

class Main extends \System\Core\Controller
{
	protected function index()
	{
		echo '<pre>';
		echo DB::query('SELECT @@VERSION AS ver')->execute()->fetch()->ver . PHP_EOL;
		echo '</pre>';
	}
}