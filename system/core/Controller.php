<?php

namespace System\Core;

use System\Libraries\Request;

class Controller
{
	private function load_views()
	{
		$html = '';
		$list = Instance::get()->stack('view');
		foreach ($list as $view)
		{
			$html .= $view->html();
		}
		return $html;
	}
	final public function send_response($data = NULL)
	{
		if ($data)
		{
			echo $data;
		}
		else
		{
			$this->output($this->load_views());
		}
		exit;
	}
	protected function output($html)
	{
		echo $html;
	}
}

?>