<?php
try
{
	$connection=new PDO('mysql:host=localhost;dbname=diary','user_diary','h2rt4d0');
}
catch(Exception $exception) 
{
	print('Error: '.$exception->getMessage());
	die();
}
try{
	$connection->beginTransaction();
	$connection->exec("insert into profile (profile,active) values ('webmaster',1)");
	$connection->exec("insert into users (name,lastname,username,password,id_profile,active)values('Timothy', 'Chandler', 'tim','tim',1,1)");
	$connection->commit();
}catch(Exception $exception)
{
	$connection->rollBack();
	print('Error 2: '.$exception->getMessage());
	die();
}

?>