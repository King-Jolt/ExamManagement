<?php

namespace App\System\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_Result.php';

class Sql_QueryCommand
{
	private $_query = '';
	private $_parameter = NULL;
	private $_limit = -1;
	private $_offset = 0;
	public function limit($i, $offset)
	{
		$this->_limit = $i;
		$this->_offset = $offset;
		return $this;
	}
	public function __construct($query, $param = NULL)
	{
		$this->_query = $query;
		$this->_parameter = $param;
	}
	public function get_Query()
	{
		$query = $this->_query;
		$pattern = '/(^\s*SELECT(?=\s))/i';
		$replace = '${1} SQL_CALC_FOUND_ROWS';
		if ($this->_limit >= 0 and $this->_offset >= 0 and preg_match($pattern, $query) == 1)
		{
			$query = preg_replace($pattern, $replace, $query, 1);
			$query .= " LIMIT $this->_limit OFFSET $this->_offset";
		}
		return $query;
	}
	public function execute()
	{
		$connect = new Mysql();
		$result = $connect->query($this->get_Query(), $this->_parameter);
		$connect->close();
		if ($result instanceof Sql_Result)
		{
			return $result;
		}
		throw new \Exception('This query is DML or DDL statement !', 2);
	}
}

?>