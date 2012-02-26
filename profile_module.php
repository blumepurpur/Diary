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
	
	public function read($parameter)
	{
		$query=<<<SQL
		select * from profile where id_profile=?
SQL;
		$this->DB->$query($query,array ($parameter));
	}
	
	public function update($parameter,$option,$name)
	{
		//case 1 inactivate the profile
		//case 2 activate the profile
		//case 3 update the name of the profile
	
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
		delete from profile where id_profile=?
SQL;
		$this->DB->$query($query,$parameter);
	}
}
include_once ('config.php');
include_once ('DB.php');
new profile();
?>