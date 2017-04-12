<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Auth;
use System\Libraries\Request;
use System\Database\DB;

class DataPaper
{
	private $query = NULL;
	public function __construct()
	{
		$this->query = DB::query('CALL list_question_by_exam(?, ?, ?)', [
			Auth::get()->id,
			Request::params('category_id'),
			Request::params('exam_id'),
		]);
	}
	public function getData()
	{
		return $this->query->execute();
	}
}