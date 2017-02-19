<?php
	include 'database.php';

	$name = $_GET['names'];
	$msg = $_GET['message'];
		
	$query = 'UPDATE `chattable` SET `chatContent` = :msg  WHERE `name` = :name';
	$statement1 = $db->prepare($query);
	$statement1->bindValue(':msg', $msg);
	$statement1->bindValue(':name', $name);
	$statement1->execute();	
	
	echo "Message delivered.";
?>

