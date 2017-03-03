<?php

namespace App\System;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/libraries/View.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\Library\View;
use App\System\System;

/*
 * 
 * Life Cycle
 * 
 * 1. processing "get data" (if exist)
 * 2. processing "post data" (if exist)
 * 3. call "main" method (abstract)
 * 4. call "output" method -> return response and exit
 * 
 */

abstract class Controller
{
	private $views = array();
	public function __construct()
	{
		ini_set('display_errors', 1);
		if ($_GET)
		{
			$this->on_get();
		}
		if ($_POST)
		{
			$this->on_post();
		}
		$this->main();
		$this->send_response();
	}
	private function _get()
	{
		$html = '';
		foreach ($this->views as $view)
		{
			try
			{
				$html .= $view->html();
			}
			catch (\Exception $e)
			{
				$html .= System::get_exception_msg($e);
			}
		}
		return $html;
	}
	protected function on_get()
	{
		// handing get data
	}
	protected function on_post()
	{
		// handling post data
	}
	// Implement this method
	abstract protected function main();
	final protected function load_view($file, $data = array(), $put_to_stack = TRUE)
	{
		$view = $file instanceof View ? $file : new View($file, $data);
		if ($put_to_stack === TRUE)
		{
			// Push view to stack
			array_push($this->views, $view);
			return $put_to_stack;
		}
		else
		{
			// Return html string
			try
			{
				return $view->html();
			}
			catch (\Exception $e)
			{
				return System::get_exception_msg($e);
			}
		}
	}
	final protected function send_response()
	{
		$this->output($this->_get());
	}
	final protected function error($e)
	{
		if ($e instanceof \Exception)
		{
			$this->output(System::get_exception_msg($e));
		}
		$this->output($e);
		http_response_code(500);
		exit;
	}
	final protected function request_get($attr)
	{
		return System::input_get($attr);
	}
	final protected function request_post($attr)
	{
		return System::input_post($attr);
	}
	protected function output($html)
	{
		echo $html;
	}
}

?>