<?php

class Model {

	private $connection;
    private $stmt;

	public function __construct()
	{
		global $config;
		try{
			$this->connection = mysqli_connect($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name']) or die('Cannot Connect to DB' . mysqli_error($this->connection));
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

    function __destruct(){
        if ($this->stmt!==null) { $this->stmt = null; }
    }

	public function escapeString($string)
	{
		return mysqli_escape_string($string);
	}

	public function escapeArray($array)
	{
	    array_walk_recursive($array, create_function('&$v', '$v = mysqli_escape_string($v);'));
		return $array;
	}
	
	public function to_bool($val)
	{
	    return !!$val;
	}
	
	public function to_date($val)
	{
	    return date('Y-m-d', $val);
	}
	
	public function to_time($val)
	{
	    return date('H:i:s', $val);
	}
	
	public function to_datetime($val)
	{
	    return date('Y-m-d H:i:s', $val);
	}


	function query($sql)
	{
		$result = null;
		if (!is_array($this->connection)) {
			$result = mysqli_query($this->connection, $sql);

		} else{
			$result = $this->connection;
		}

		return $result;
	}

	public function execute($sql)
	{
		$exec = mysqli_query($sql) or die('MySQL Error: '. mysqli_query());
		return $exec;
	}
    
}

