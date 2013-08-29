<?php
class User
{
	private $userid;
	private $username;
	private $emailaddress;
	private $password;
	
	public function _constructor($username, $emailaddress )
	{
		$this->username = "Thuso";
		$this->emailaddress = $emailaddress;
	}
	public function setPassword($password = "nomsa")
	{
		return md5($password);
	}
	public function displayUser()
	{
		return "username is :" . $this->username."user email address :".$this->emailaddress;
	}
}

?>