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