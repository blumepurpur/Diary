<?php
interface CRUD
{
	/**
	 * 
	 * This function create a profile or diary or user
	 * @param $parameter
	 */
	public function create($parameter);
	/**
	 * 
	 * This function read a profile or diary or user
	 * @param $parameter
	 */
	public function read($parameter);
	/**
	 * 
	 * This function update a profile or diary or user
	 * @param $set
	 * @param $where
	 */
	public function update(Array $set=array(),Array $where=array());
	/**
	 * 
	 * This function delete a profile or diary or user
	 * @param $parameter
	 */
	public function delete($parameter);
}
?>