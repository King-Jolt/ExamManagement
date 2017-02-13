<?php

namespace App\System\Library;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/System.php';

use App\System\System;

class Navigation
{
	private $data = array();
	public function __construct()
	{
		array_push($this->data, (object)array(
			'title' => 'Home',
			'uri' => System::get_config('base_url'),
			'active' => FALSE
		));
	}
	public function add($title, $uri, $active = FALSE)
	{
		array_push($this->data, (object)array(
			'title' => $title,
			'uri' => $uri,
			'active' => $active
		));
	}
	public function get()
	{
		$html = '<ol class="breadcrumb">';
		foreach ($this->data as $index => $value)
		{
			if ($value->active)
			{
				$html .= "<li class=\"active\"> $value->title </li>"; 
			}
			else
			{
				$html .= "<li><a href=\"$value->uri\"> $value->title </a></li>";
			}
		}
		$html .= '</ol>';
		return $html;
	}
}

?>