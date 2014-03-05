<?php

class user
{
	public $authenticated;

	function __construct($db)
	{
		$this->dbase = $db;
		
		if (isset($_SESSION['user_id']))
		{
		   // echo "session ID".$_SESSION['user_id'];
			$this->authenticate($_SESSION['user_id']);
		}
	}

	function login($username, $password)
	{
		$username = $this->dbase->clean($username);
		$password = hash('whirlpool', $password);
		
		$sql = sprintf(
			"SELECT * FROM minty_users 
			WHERE email='%s'",
			$username
		);
		
		$query = $this->dbase->query($sql);
		$result = $this->dbase->fetch_array($query);
		
		if ($result['password'] == $password)
		{
			$this->authenticate($result['ID']);
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function authenticate($id)
	{
		$sql = sprintf(
			"SELECT * FROM minty_users 
			WHERE ID=%d",
			$id
		);
		
		$query = $this->dbase->query($sql);
		$result = $this->dbase->fetch_array($query);
	
		session_regenerate_id();
		$_SESSION['user_id'] = $id;
		$this->user_id = $id;
		$this->authenticated = true;
		$this->username = $result['username'];
		$this->super = $result['super'];
	}
	
	function deauthenticate()
	{
		$this->authenticated = false;
		unset($_SESSION['user_id']);
		unset($this->user_id);
		unset($this->username);
	}
	
	function change_password($new_password)
	{	
		$sql = sprintf(
			"UPDATE minty_users 
			SET password='%s' 
			WHERE ID=%d",
			hash('whirlpool', $new_password),
			$this->user_id
		);
		
		$this->dbase->query($sql);
	}
}

?>