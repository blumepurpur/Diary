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
		$this->setUser();
	/*	try
		{			
			$this->DB->beginTransaction();
			$this->DB->exec($query);
			$this->DB->commit();
		}
		catch(Exception $exception)
		{
			$this->DB->rollBack();
			print('Error 2: '.$exception->getMessage());
			die();
		}
	*/	
	}
	
	private function setUser()
	{
		$query=<<<SQL
		insert into users 
		( 
		  name,
		  lastname,
		  username,
		  password,
		  id_profile,
		  active
		)
	    values(?,?,?,?,?,?)
SQL;
		$this->DB->query($query,array('Johanna','Hurtado','52','52',1,1));
	}
}

//which identation is better???
//$this->update(array('name'=>'','active'=>1),array('id'=>1));
//
//$this->update
//(
//	array
//	(
//		'name'=>'','active'=>1
//	)
//	,array('id'=>1)
//);

include_once('DB.php');
include_once('config.php');
new Diary();
?>