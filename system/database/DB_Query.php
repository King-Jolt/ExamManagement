<?php

namespace System\Database;

class DB_Query
{
	private $_query = '';
	private $_parameter = array();
	private $_limit = -1;
	private $_offset = 0;
	private $_where_data = array();
	public function __construct($query = '', $param = NULL)
	{
		if ($query)
		{
			$this->_query = $query;
			$this->_parameter = $param;
		}
	}
	public function insert($table, array $data)
	{
		$this->_query = sprintf("INSERT INTO %s(%s) VALUES(%s) ",
			$table,
			implode(', ', array_keys($data)),
			implode(', ', array_fill(0, count($data), '?'))
		);
		$this->_parameter = array_values($data);
		return $this;
	}
	public function delete()
	{
		$this->_query .= 'DELETE ';
		return $this;
	}
	public function update($table)
	{
		$this->_query .= "UPDATE $table ";
		return $this;
	}
	public function set(array $data)
	{
		$p = (object)array(
			'param' => &$this->_parameter,
			'data' => &$data
		);
		$this->_query .= sprintf("SET %s ",
			implode(', ', array_map(function($column) use ($p) {
				array_push($p->param, $p->data[$column]);
				return "$column = ?";
			}, array_keys($data)))
		);
		return $this;
	}
	public function select($columns = '*')
	{
		if (is_string($columns))
		{
			$this->_query = "SELECT $columns ";
		}
		else if (is_array($columns))
		{
			$this->_query = sprintf("SELECT %s ", implode(', ', $columns));
		}
		return $this;
	}
	public function from($table)
	{
		$this->_query .= "FROM $table ";
		return $this;
	}
	private function _get_where()
	{
		$r_where = array();
		$r_param = array();
		$num_argc = func_num_args();
		switch ($num_argc)
		{
			case 1:
			{
				$data = func_get_arg(0);
				if (is_array($data))
				{
					foreach ($data as $where)
					{
						if (is_array($where))
						{
							switch (count($where))
							{
								case 2:
								{
									array_push($r_where, "$where[0] = ?");
									array_push($r_param, $where[1]);
									break;
								}
								case 3:
								{
									array_push($r_where, "$where[0] $where[1] ?");
									array_push($r_param, $where[2]);
									break;
								}
							}
						}
					}
				}
				break;
			}
			case 2:
			{
				array_push($r_where, sprintf('%s = ?', func_get_arg(0)));
				array_push($r_param, func_get_arg(1));
				break;
			}
			case 3:
			{
				array_push($r_where, sprintf('%s %s ?', func_get_arg(0), func_get_arg(1)));
				array_push($r_param, func_get_arg(2));
				break;
			}
		}
		return (object)array(
			'where' => $r_where,
			'param' => $r_param
		);
	}
	private function _add_where($operator, $data)
	{
		$add = function($operator, $column, $condition, $value)
		{
			array_push($this->_where_data, sprintf(
				'%s %s %s ?',
				empty($this->_where_data) ? 'WHERE' : $operator,
				$column,
				$condition
			));
			array_push($this->_parameter, $value);
		};
		switch (count($data))
		{
			case 1:
			{
				foreach ($data[0] as $key => $where)
				{
					if (is_array($where))
					{
						switch (count($where))
						{
							case 2:
							{
								$add($operator, $where[0], '=', $where[1]);
								break;
							}
							case 3:
							{
								$add($operator, $where[0], $where[1], $where[2]);
								break;
							}
						}
					}
					else
					{
						$add($operator, $key, '=', $where);
					}
				}
				break;
			}
			case 2:
			{
				$add($operator, $data[0], '=', $data[1]);
				break;
			}
			case 3:
			{
				$add($operator, $data[0], $data[1], $data[2]);
				break;
			}
		}
	}
	public function or_where($data)
	{
		$this->_add_where('OR', func_get_args());
		return $this;
	}
	public function where($data)
	{
		$this->_add_where('AND', func_get_args());
		return $this;
	}
	public function limit($i, $offset = 0)
	{
		$this->_limit = $i;
		$this->_offset = $offset;
		return $this;
	}
	public function offset($off)
	{
		$this->_offset = $off;
		return $this;
	}
	public function set_Param($param)
	{
		$this->_parameter = $param;
		return $this;
	}
	public function get_Query()
	{
		$query = $this->_query;
		if ($this->_where_data)
		{
			$query .= implode(' ', $this->_where_data);
		}
		if ($this->_limit >= 0 and $this->_offset >= 0)
		{
			switch (DB::$db_driver)
			{
				case 'mysql':
				{
					$query = preg_replace('/(^\s*SELECT(?=\s))/i', '${1} SQL_CALC_FOUND_ROWS', $query);
					break;
				}
			}
			$query .= " LIMIT $this->_limit OFFSET $this->_offset";
		}
		return $query;
	}
	public function get_Param()
	{
		return $this->_parameter;
	}
	public function execute()
	{
		return DB::get_connect()->query($this->get_Query(), $this->get_Param());
	}
}

?>