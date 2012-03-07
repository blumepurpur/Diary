<?php
/**
 * 
 * Class profile that manage all refer to the profile
 * @author Johanna Hurtado
 *
 */
class Profile implements CRUD
{	
/**
 * This function create a new profile 
 * @see CRUD::create()
 * @param $parameters 
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
 * this function read the specific profile based on the parameter
 * @see CRUD::read()
 * @param parameter indicates which profile is going to be read
 * @return void
 */
	public function read($parameter)
	{
		$query=<<<SQL
		select * from profile where id_profile=?
SQL;
		$this->DB->$query($query,array ($parameter));
	}
/**
 * (non-PHPdoc)
 * @see CRUD::update()
 */
	public function update(Array $set=array(),Array $id=array())
	{
		//IM NOT SURE IF IT WORKS FOR STRING VALUES AND NUMBERS
		for($i=0,$cont=count($set);$i<$cont;$i++)
		{
			$set_query=key($set);
			$id_query=key($id);
			$query='update profile set '.$set_query.' = '."'$set[$set_query]'".' where '.$id_query.' = '.$id[$id_query];
			next($set);
			var_dump($query);
		}
	}
/**
 * This function delete a profile 
 * @see CRUD::delete()
 * @param $parameter id of the profile to delete
 * @return void
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