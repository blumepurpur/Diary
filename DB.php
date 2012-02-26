<?php
class DB{
			private $connection=null;

			public function __construct($host,$database,$username,$password)
			{
				try
				{
					$connection=new PDO('mysql:host=$host;dbname=$database','$username','$password');
				}
				catch(Exception $exception) 
				{
					print('Error: '.$exception->getMessage());
					die();
				}
			}
			public function query($query,Array $params=array())
			{
				try
				{
					for($i=0,$j=count($params) ; $i<$j ; $i++)
					{
						$query=$connection->prepare($query);
						$query->bindParam($params[$i]);
					}
					if($query->execute())
					{
						return $query->fecthAll();
					}
					
				}catch(Exception $exception)
				{
					die('Error 2: '.$exception->getMessage());
				}
			}
}
?>