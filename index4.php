<?php
	include 'database.php';

	$name = $_GET['name1'];
		
	$query = 'SELECT  `chatContent` FROM `chattable` WHERE `name` = :name';
	$statement1 = $db->prepare($query);
	$statement1->bindValue(':name', $name);
	$statement1->execute();
	
	$count = 0;
	
	while($row = $statement1->fetch()){
		
		$result[$count] = $row[0];
		
		if(!empty($result[$count])){
			echo $result[$count];
		}
		else{
			echo "No message from "; echo $name;
		}
		
		$count++;
	}
?>
