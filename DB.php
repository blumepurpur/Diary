<?php
class DB
{
			private $connection=null;

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
			
			public function beginTransaction()
			{
				$this->connection->beginTransaction();
			}
			
			public function commit()
			{
				$this->connection->commit();
			}	
			
			public function rollback()
			{
				$this->connection->rollBack();
			}
			
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