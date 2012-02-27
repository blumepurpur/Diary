<?php
class profile implements CRUD
{
	public function __construct()
	{
		
	}
	
	public function create($parameters)
	{
		$query=<<<SQL
		insert into profile
		(
			profile,
			active
		)values(?,?)
SQL;
		$this->DB->$query($query,$parameters);
	}
	
	public function read($parameter)
	{
		$query=<<<SQL
		select * from profile where id_profile=?
SQL;
		$this->DB->$query($query,array ($parameter));
	}
	
	public function update($id,$set)
	{
	        	$query=<<<SQL
				update profile
				set $set
				where id_profile=?
SQL;
				$this->DB->query($query,$id);
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