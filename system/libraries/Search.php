<?php

namespace App\System\Library;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\System;

class Search
{
	public static function process()
	{
		if (System::input_post('action') === 'search')
		{
			if (($keyword = System::input_post('keyword')))
			{
				System::redirect(NULL, array_merge($_GET, array('search' => $keyword)));
			}
			else
			{
				unset($_GET['search']);
				System::redirect(NULL, $_GET);
			}
		}
	}
}

?>