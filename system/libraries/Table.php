<?php

namespace App\System\Library;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\System;

class Table
{
	public $class = 'table table-striped table-hover';
	
	protected $_arr_title = array(); // for custom title
	protected $sql_query = NULL;
	
	private $_page = 1;
	private $_page_size = 20;
	private $_use_db = TRUE;
	private $_total = 0;
	
	public function __construct($USE_DATABASE = TRUE)
	{
		if (!$USE_DATABASE)
		{
			$this->_use_db = FALSE;
		}
		if (isset($_GET['page']) and is_numeric($_GET['page']))
		{
			$this->_page = $_GET['page'];
		}
	}
	protected function row($data, $index) // custom your row item
	{
		$html = '<tr>';
		foreach ($data as $k => $v)
		{
			$html .= "<td> $v </td>";
		}
		$html .= '</tr>';
		return $html;
	}
	protected function no_Data()
	{
		return '<tr class="info"><td colspan="25"><b> Không có dữ liệu </b></td></tr>';
	}
	final public function page_Size($size)
	{
		$this->_page_size = $size;
	}
	final public function get()
	{
		$head = '';
		$body = '';
		$n_start = ($this->_page - 1) * $this->_page_size;
		$n_end = $n_start + $this->_page_size;		
		if ($this->_arr_title)
		{
			foreach ($this->_arr_title as $str)
			{
				$head .= "<th> $str </th>";
			}
		}
		if ($this->_use_db)
		{
			try
			{
				$result = $this->sql_query->limit($this->_page_size, $n_start)->execute();
				if (!$result)
				{
					return 'Table Error !';
				}
				$this->_total = $result->num_rows();
				if ($this->_total)
				{
					if ($n_start >= 0 and $n_start < $this->_total)
					{
						// fetch columns title if not set
						if (!$this->_arr_title)
						{
							foreach ($result->get_field() as $title)
							{
								$head .= "<th> $title </th>";
							}
						}
						// fetch rows
						$i = $n_start;
						foreach ($result->get_data() as $row)
						{
							$body .= $this->row($row, ++$i);
						}
					}
					else
					{
						unset($_GET['page']);
						System::redirect();
					}
				}
				else
				{
					$body .= $this->no_Data();
				}
			}
			catch (\Exception $ex)
			{
				return $ex->getMessage();
			}
		}
		// Return html
		return <<<EOF
		<table class="$this->class">
			<thead>
				$head
			</thead>
			<tbody>
				$body
			</tbody>
		</table>
EOF;
	}
}

?>