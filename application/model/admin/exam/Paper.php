<?php

namespace Application\Model\Admin\Exam;

use System\Libraries\Auth;
use System\Libraries\Request;
use Application\Model\Misc;
use System\Database\DB;

class Paper
{
	private $html = '';
	private $data = NULL;
	private function add_group_header()
	{
		$this->html .=
			'<div class="group">' .
				'<p><strong>' . $this->data->current()->g_title . '</strong></p>' .
				'<p>' . $this->data->current()->g_content . '</p>' .
			'</div>';
		;
	}
	public function get()
	{
		$this->html = '';
		$this->data = new DataPaper();
		$this->data = $this->data->getData();
		foreach ($this->data as $q)
		{
			$this->add_group_header();
		}
		return $this->html;
	}
}