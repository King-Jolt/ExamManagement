<?php

namespace System\Libraries;

use System\Core\Instance;

class View
{
	protected $view_path = NULL;

	private $_file = '';
	private $_data = array();
	public $parse_data = TRUE;
	private static $_share_data = array();
	private function __construct($file, $data)
	{
		$this->view_path = $_SERVER['DOCUMENT_ROOT'] . '/application/view';
		$this->_file = preg_replace('/\/{2,}/', '/', $this->view_path . '/' . $file);
		$this->_data = $data;
	}
	public static function add($file, $data = array())
	{
		Instance::get()->stack('view')->append(new self(
			$file, $data
		));
	}
	public static function get($file, $data = array())
	{
		$obj = new self($file, $data);
		return $obj->html();
	}
	public static function share_data($data)
	{
		if (is_array($data))
		{
			self::$_share_data = $data;
			return TRUE;
		}
		return FALSE;
	}
	public static function put(&$var)
	{
		echo $var;
	}
	public function html()
	{
		if (file_exists($this->_file))
		{
			ob_start();
			if (is_array($this->_data))
			{
				foreach (array_keys($this->_data) as $var)
				{
					$$var = &$this->_data[$var];
				}
			}
			eval ('?>' . file_get_contents($this->_file));
			$__html_result = ob_get_contents();
			ob_end_clean();
			if ($this->parse_data)
			{
				$data = &$this->_data;
				return preg_replace_callback('/(\{{2}\s*)(\w+)(\s*\}{2})/', function($m) use (&$data) {
					return isset($data[$m[2]]) ? $data[$m[2]] : $m[0];
				}, $__html_result);
			}
			return $__html_result;
		}
		else
		{
			throw new Exception\View_FileNotExist("View file \"$this->_file\" is not exist !", 2);
		}
		return '';
	}
}
