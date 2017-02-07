<?php

class Auth
{
	private $_user = '';
	private $_name = '';
	private $_email = '';
	public function __construct($user, $pass)
	{
		
	}
	public function user()
	{
		return $this->_user;
	}
	public function name()
	{
		return $this->_name;
	}
	public function email()
	{
		return $this->email;
	}
}

?>