<?php
	include 'database.php';

	$name = $_GET['names'];
	$pwd = $_GET['passwd'];

	$query = 'SELECT `name` , `password` FROM `chattable` WHERE `name` = :name AND `password` = :pwd';
	$statement1 = $db->prepare($query);
	$statement1->bindValue(':name', $name);
	$statement1->bindValue(':pwd', $pwd);
	$statement1->execute();
	
	if($row = $statement1->fetch())
	{
		echo "You are connected!";
	}
	else
	{
		echo "The name/password is invalid!";
	}
?>
