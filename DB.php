<?php
/**
 * 
 * Class DB is created to interact with the database
 * @author Johanna Hurtado
 * @since 26 January 2012
 * @version 1.0
 */
class DB
{
	/**
	 * @var PDO
	 * @access private
	 */
	private $connection=null;
	/**
	 * This method is the construct of the class and 
	 * establishes the connection to the database
	 *  
	 * @param $host the hostname of the connection
	 * @param $database the database name
	 * @param $username username of the database
	 * @param $password password of the user
	 * @access public
	 * @return void
	 * @throws Exception when the connection fails
	 */
	public function __construct($host,$database,$username,$password)
	{
		try
		{
			$this->connection=new PDO('mysql:host='.$host.';dbname='.$database,$username,$password);
		}
		catch(Exception $exception) 
		{
			print('Error: '.$exception->getMessage());
			die();
		}
	}
	
	/**
	 * 
	 * This method starts the transaction
	 * @access public
	 * @return void
	 */
	public function beginTransaction()
	{
		$this->connection->beginTransaction();
	}
	
	/**
	 * 
	 * This method commits the transaction
	 * @access public
	 * @return void
	 */
	public function commit()
	{
		$this->connection->commit();
	}	
	
	/**
	 * 
	 * This method rolls back the transaction
	 * @access public
	 * @return void
	 */
	public function rollback()
	{
		$this->connection->rollBack();
	}
	
	/**
	 * 
	 * This method executes the query
	 * @param  $query query to be executed
	 * @param array $params parameters necessesary to execute the query
	 * @throws Exception when the query cannot be executed
	 * @return PDOStatement
	 */
	public function query($query,Array $params=array())
	{
		try
		{
			$statement=$this->connection->prepare($query,array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true));
			for($i=0,$j=count($params) ; $i<$j ; $i++)
			{
				$statement->bindParam(($i+1),$params[$i]);
			}
			if($statement->execute())
			{
				return $statement->fetchAll();
			}
		else
		{
			@list(,,$error)=$statement->errorInfo();
			throw new Exception($error);
		}
		}catch(Exception $exception)
		{
			die('Error 2: '.$exception->getMessage());
		}
	}
}
?>