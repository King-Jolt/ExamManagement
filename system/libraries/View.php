<?php

namespace App\System\Library;

class View
{
	private $_file = '';
	private $_data = array();
	public function __construct($file, $data)
	{
		$f = $this->get_AbsPath($file);
		if (!file_exists($f))
		{
			throw new \Exception("View file $f is not exist !");
		}
		$this->_file = $f;
		$this->_data = $data;
	}
	private function get_AbsPath($path)
	{
		$str = $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
		$pattern = '/\/{2,}/';
		$str = preg_replace($pattern, '/', $str);
		return $str;
	}
	public static function put(&$var)
	{
		echo $var;
	}
	public function get()
	{
		$__html_result = '';
		ob_start();
		if (is_array($this->_data))
		{
			foreach ($this->_data as $var => $value)
			{
				$$var = $value;
			}
		}
		eval ('?>' . file_get_contents($this->_file));
		$__html_result = ob_get_contents();
		ob_end_clean();
		return $__html_result;
	}
}

?>