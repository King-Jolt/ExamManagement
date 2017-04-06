<?php

namespace System\Database;

interface DB_Result extends \Iterator
{
	public function num_rows();
	public function get_Columns();
	public function fetch();
}
