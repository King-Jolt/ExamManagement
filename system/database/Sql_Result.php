<?php

namespace App\System\Database;

class Sql_Result
{
	private $_field = array();
	private $_data = array();
	private $_num_rows = 0;
	public function __construct($field, &$data, $n_row)
	{
		$this->_field = $field;
		$this->_data = new \ArrayIterator($data);
		$this->_num_rows = $n_row;
	}
	public function get_data()
	{
		return $this->_data;
	}
	public function get_field()
	{
		return $this->_field;
	}
	public function num_rows()
	{
		return $this->_num_rows;
	}
}

?>