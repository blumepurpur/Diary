<?php
/**
 * 
 * This class is used to manage the users
 * @author Johanna Hurtado
 * @since 10-march-2012 
 * @version 1.0
 */
class user implements CRUD,DB
{
	/**
	 * This function create a new user
	 * @param $parameters details of the new user
	 * @return void
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
	 * This function read the details of a specific user
	 * @param $parameter identificator of the user
	 * @return void
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
	public function update()
	{
		
	}
	/**
	 * This function delete a user
	 * @param $parameter identificator of the user
	 * @return void
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