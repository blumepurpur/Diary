<?php
class Diary  
{
	private $DB=null;
	public function __construct()
	{
		$this->DB=new DB
		(
			$GLOBALS['config']['db']['host'],
			$GLOBALS['config']['db']['database'],
			$GLOBALS['config']['db']['username'],
			$GLOBALS['config']['db']['password']
		);	
	}
	
	//$insert=$connection->prepare("insert into users (name,lastname,username,password,id_profile,active) values(?,?,?,?,?,?)");
	//$insert->bindParam($parameter, $variable)
}
new Diary();
?>