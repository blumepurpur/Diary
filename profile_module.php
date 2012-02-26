<?php
class profile implements CRUD
{
	public function __construct()
	{
		
	}
	
	public function create()
	{
		$query=<<<SQL
		insert into profile
		(
			profile,
			active
		)values(?,?)
SQL;
		$this->DB->$query($query,
		array
		(
			$_POST['profile'],
			1
		)
		);
	}
	
	public function read()
	{
		$query=<<<SQL
		select * from profile
SQL;
		$this->DB->$query($query);
	}
	
	public function update($parameter,$option,$name)
	{
	//case 1 to inactivate
	//case 2 to activate
	
		switch ($option) {
	        case 1:
	        	$query=<<<SQL
				update profile
				set active=0
				where id_profile=$parameter
SQL;
				$this->DB->query($query,8);
	        break;
	        case 2:
	        	$query=<<<SQL
				update profile
				set active=1
				where id_profile=$parameter
SQL;
				$this->DB->query($query,8);
	        break;
	        case 3:
	        	$query=<<<SQL
				update profile
				set profile=$name
				where id_profile=$parameter
SQL;
				$this->DB->query($query,8);
	        break;
	        default: echo 'Profile: This id does not exit';
	        break;
		}
	}
	
	public function delete($parameter)
	{
		$query=<<<SQL
		delete from profile where id_profile=$parameter
SQL;
		$this->DB->$query($query);
	}
}
include_once ('config.php');
include_once ('DB.php');
new profile();
?>