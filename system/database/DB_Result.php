<?php

namespace System\Database;

abstract class DB_Result implements \Iterator
{
	abstract public function num_rows();
	abstract public function get_Columns();
	abstract public function fetch();
}

?>