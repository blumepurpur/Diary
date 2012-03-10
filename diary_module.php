<?php
/**
 * 
 * This class manage the type of diary
 * @author Johanna Hurtado
 * @since 10-march-2012 
 * @version 1.0
 *
 */
class TypeDiary implements CRUD,DB
{
	/**
	 * This function create a type of diary
	 * @param $parameter identificator of the diary
	 * @return void
	 * @see CRUD::create()
	 */
	public function create($parameters)
	{
		$query=<<<SQL
		insert into type_diary 
		(
			diary
			active
		)
		values(?,?)
SQL;
		$this->DB->$query($query,$parameters);
	}
	/**
	 * This function read a type of diary
	 * @param $parameter identificator of the diary
	 * @return void
	 * @see CRUD::read()
	 */
	public function read($parameter)
	{
		$query=<<<SQL
		select * from type_diary where id_type_diary=?
SQL;
		$this->DB->$query($query,$parameter);
	}
	
	public function update()
	{
		
	}
	/**
	 * This function delete a type of diary
	 * @param $parameter identificator of the diary
	 * @return void
	 * @see CRUD::delete()
	 */
	public function delete($parameter)
	{
		$query=<<<SQL
		delete from type_diary
		where id_type_diary=?
SQL;
		$this->DB->query($query, $parameter);
	}
}
?>