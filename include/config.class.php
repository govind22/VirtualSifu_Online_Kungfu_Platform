<?php

class config
{
	private $dbase;
	public $properties;
	
	function __construct($db)
	{
		$this->dbase = $db;
		$this->properties = array();
		$this->load_from_db();
	}
	
	function load_from_db()
	{
		$result = $this->dbase->query("SELECT * FROM minty_config", true);
		
		if ($this->dbase->num_rows($result) > 0)
		{
			while ($row = $this->dbase->fetch_array($result))
			{
				$this->properties[$row['name']] = $row['value'];
			}
		}
	}
	
	public function __set($n, $v)
    {
        $this->properties[$n] = $v;
		
		$sql = sprintf(
		"UPDATE minty_config 
		SET value='%s' 
		WHERE name='%s'",
		$v,
		$n
		);
		
		$this->dbase->query($sql);
    }
	
	public function __get($n)
	{
		return $this->properties[$n];
	}
	
	public function __isset($n)
	{
		return isset($this->properties[$n]);
	}
}

?>