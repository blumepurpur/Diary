<?php
/**
 * 
 * This class is used to manage the users
 * @author Johanna Hurtado
 * @since 10-march-2012 
 * @version 1.0
 */
class user implements CRUD
{
	/**
	 * @see CRUD::create()
	 */
	public function create($parameters)
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
		$this->DB->query($query,$parameters);
	}
	/**
	 * @see CRUD::read()
	 */
	public function read($parameter)
	{
		$query=<<<SQL
		select * from users
		where id_user=?
SQL;
		$this->DB->$query($query,$parameter);
	}
	/**
	 * 
	 * @see CRUD::update()
	 */
	public function update()
	{
		$query='update users set ';
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
	 * @see CRUD::delete()
	 */
	public function delete($parameter)
	{
		$query=<<<SQL
		delete from users
		where id_user=?
SQL;
		$this->DB->query($query, $parameter);
	}
}
?>