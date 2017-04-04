<?php

namespace System\Database;

interface DB_ISQL
{
	public function __construct($db);
	public function raw_query();
	public function begin();
	public function commit();
	public function rollback();
	public function query($query_str, $param = NULL);
	public function get_affected_rows();
}

?>