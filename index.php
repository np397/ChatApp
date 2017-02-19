<?php
	include 'database.php';

	$query = 'SELECT `name` , `password` FROM `chattable`';
	$result = $db->query($query);
	$names = array();
	$passwords = array();
	$count = 0;
	while($row = $result->fetch()){
		$names[$count] = $row[0];
		$passwords[$count] = $row[1];
		$count++;
	}

?>
<html>
	<head>
		<title>IT202 Assignment4</title>
			<script>
				function myfunction(obj){
					
					var val = obj.value;
					var len = val.length;
					
					if(len >= 3){
						
						var xmlhttp;
						
						if(window.XMLHttpRequest){
							xmlhttp = new XMLHttpRequest();						
						}
						else{
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						var n = document.getElementById("names").value;
						var p = document.getElementById("passwd").value;
						
						xmlhttp.onreadystatechange = function() {
							
							if (xmlhttp.readyState == 4){
								document.getElementById("warning").innerHTML = xmlhttp.responseText;
								
								if(xmlhttp.responseText = "You are connected!"){
									document.getElementById("messageLabel").style.visibility = "visible";
									document.getElementById("button1").style.visibility = "visible";
									document.getElementById("message").style.visibility = "visible";
								}
							}
						};
						
						url = "index2.php?names="+n+"&passwd="+p;
						xmlhttp.open("GET", url, true);
						xmlhttp.send();
					}
				}
				
				function sendFunction(){
					
					var message = document.getElementById("message").value;
					var n = document.getElementById("names").value;
					var xmlhttp;
					
						if(window.XMLHttpRequest){
							xmlhttp = new XMLHttpRequest();						
						}
						else{
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						xmlhttp.onreadystatechange = function() {
							
							if (xmlhttp.readyState == 4){
								document.getElementById("warning").innerHTML = xmlhttp.responseText;
							}
						};
						
						url = "index3.php?message="+message+"&names="+n;
						xmlhttp.open("GET", url, true);
						xmlhttp.send();
				}
				
				function getFunction(){
					
					var n = document.getElementById("name1").value;
					var xmlhttp;
					
						if(window.XMLHttpRequest){
							xmlhttp = new XMLHttpRequest();						
						}
						else{
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						xmlhttp.onreadystatechange = function() {
							
							if (xmlhttp.readyState == 4){
								document.getElementById("msg").innerHTML = xmlhttp.responseText;
							}
						};
						
						url = "index4.php?name1="+n;
						xmlhttp.open("GET", url, true);
						xmlhttp.send();
				}
			</script>
			<style>
				body{
					background-color:#99FFCC;
				}
				#mainContent{
					border:2px solid black;
					width:39%;
					margin: 0 auto;
					margin-top:4%;
					background-color:#FDFDFF;
					border-radius:10px 10px 5px 5px;
					padding-top: 15px;
					box-shadow: 1px 1px 2px black, 0 0 25px blue,0 0 5px darkblue;
				}
				#menu{
					height: 53px;
					margin: 0 auto;
					width: 506px;
					padding-top: 3px;
					padding-left: 12px;
				}
				h4{
					display: inline;
				}
				li{
					display: inline;
					padding-right: 10px;
                }
				#main{
					height: 171px;
					padding-top: 18px;
					width: 506px;
					padding-left: 12px;
					margin: 0 auto;
				}
				#output{
					height: 171px;
					padding-top: 18px;
					width: 506px;
					padding-left: 12px;
					margin: 0 auto;
					background-color: aliceblue;
				}
				#messageLabel{
					visibility:hidden;
				}
				#button1{
					visibility:hidden;
				}
				#message{
					visibility:hidden;
				}
			</style>
	</head>
	<body>
		<div id="mainContent">
			<div id="menu">
				<h4>Current Users:</h4>
				<ul>
					<?php for($i=0; $i < sizeof($names); $i++):?>
						<li><?php echo $names[$i];?></li>
					<?php endfor; ?>
				</ul>
			</div>
			<div id="main">
				<table>
					<tr><td>Name:</td><td><input type="text" name="names" id="names"></td></tr>
					<tr><td>Password:</td><td><input type="password" name="passwd" id="passwd" onkeyup="myfunction(this)"></td></tr>
					<tr><td id="messageLabel">Message:</td><td><textarea rows="5" cols="50" id="message"></textarea></td>
					<td><input type="button" value="Send" id="button1" onclick="sendFunction()"></td></tr>
					<tr><td>Warning:</td><td><textarea rows="1" cols="50" id="warning">Please enter Name and Password to connect.</textarea></td></tr>
				</table>
			</div>
			<div id="output">
				<table>
					<tr><td>Name:</td><td><input type="text" name="name1" id="name1"></td>
					<td><input type="button" value="Listen" id="button2" onclick="getFunction()"></td></tr>
					<tr><td>Message:</td><td><textarea rows="5" cols="50" id="msg"></textarea></td></tr>
				</table>
			</div>
		</div>
	
	</body>
</html>