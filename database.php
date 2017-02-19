<?php

try{
	
	$db = new PDO('mysql:host=sql2.njit.edu;dbname=np397','np397','v9L5Hov6');
	
}catch(PDOException $e){
	
	echo $e->getMessage();	
	
}
?>