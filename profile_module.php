<?php
/**
 * 
 * Class profile that manage all refer to the profile
 * @author Johanna Hurtado
 *
 */
class Profile implements CRUD
{
	private $DB; 
	/**
	 * 
	 * This is the construct of the class
	 * @param DB $DB
	 * @return void
	 */
	public function __construct(DB $DB)
	{
		$this->DB=$DB;
	}
	/**
	 * 
	 * @see CRUD::create()
	 */	
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
	/**
	 * 
	 * @see CRUD::read()
	 * 
	 */
	public function read($parameter)
	{
		$query=<<<SQL
		select * from profile where id_profile=?
SQL;
		$this->DB->$query($query,array ($parameter));
	}
	/**
	 * @see CRUD::update()
	 * 
	 */
	public function update(Array $set=array(),Array $where=array())
	{
		$query='update profile set ';
		$sets=array();
		$where_array=array();
		foreach ($set as $key=>$value)
		{
			$sets[]=$key.'='.'"'.$value.'"';
		}
		$query.=implode(',',$sets);
		$query.=' where ';
		
		foreach ($where as $key=>$value)
		{
			$where_array[]=$key.'='.'"'.$value.'"';
		}
		$query.=implode(' and ',$where_array).'';
		$this->DB->$query($query);
	}
	/**
	 * 
	 * @see CRUD::delete()
	 */
	public function delete($parameter)
	{
		$query=<<<SQL
		delete from profile
		where id_profile=?
SQL;
		$this->DB->$query($query,$parameter);
	}
}
?>