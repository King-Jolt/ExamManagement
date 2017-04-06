<?php

namespace System\Database\PDO;

use System\Database\DB_Result;

class Result implements DB_Result
{
	private $pdo_stmt = NULL;
	private $num_rows = NULL;
	private $row = NULL;
	private $key = -1;
	public function __construct($pdo_stmt, $num_rows)
	{
		$this->pdo_stmt = $pdo_stmt;
		$this->num_rows = $num_rows;
		$this->next();
	}
	public function get_Columns()
	{
		$cols = new \ArrayObject(array());
		$column_count = $this->pdo_stmt->columnCount();
		for ($i = 0; $i < $column_count; $i++)
		{
			$cols->append($this->pdo_stmt->getColumnMeta($i));
		}
		return $cols;
	}
	public function num_rows()
	{
		return $this->num_rows;
	}
	public function fetch()
	{
		$r = $this->current();
		$this->next();
		return $r;
	}
	public function current()
	{
		return $this->row;
	}
	public function key()
	{
		return $this->key;
	}
	public function next()
	{
		($this->row = $this->pdo_stmt->fetchObject()) and $this->key+=1;
	}
	public function rewind()
	{
		// not avaiable
	}
	public function valid()
	{
		return $this->row === FALSE ? FALSE : TRUE;
	}
}
