<?php

class Database{
	
	private $servidor = "10.153.27.221";
	private $user = "root";
	private $passwd = "Microdata2015";
	private $database = "testsecurity";
	
	public function getConexion(){
		$mysqli = new mysqli();
	}
	
	public function closeConexion(){
		$mysqli->close();
	}
	
}



?>