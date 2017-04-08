<?php

namespace Application\Model\Admin\Question;

class Model
{
	
	public function getTable()
	{
		$table = new Table();
		return $table->get();
	}
}
