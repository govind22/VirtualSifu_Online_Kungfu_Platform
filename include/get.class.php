<?php
 error_reporting(0); 
class get
{
	private $properties = array();

	public function __construct($db)
	{
		foreach ($_GET as $k => $v)
		{
			$v = $db->clean($v);
			$this->$k = $v;
			//echo "get $k = $v"."\n";
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