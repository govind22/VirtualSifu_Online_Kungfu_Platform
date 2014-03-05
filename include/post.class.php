<?php

class post
{
	private $properties = array();
	
	public function __construct($db)
	{
		foreach ($_POST as $k => $v)
		{
			//$v = $db->clean($v);
			$this->$k = $v;
			//echo "$k & $v  ";
		}
	}
	
	public function __set($n, $v)
    {
        $this->properties[$n] = $v;
    }
	
	public function __get($n)
	{
		return $this->properties[$n];
	}
	
	public function __isset($n)
	{
		return isset($this->properties[$n]);
	}
	
	public function __unset($n)
	{
		unset($this->properties[$n]);
	}
}

?>