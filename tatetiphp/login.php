<?php

define('serverIP', 'localhost');
define('user', 'root');
define('database', 'uttt');

$mysqlinstance = new mysqli(serverIP, user, '', database);
if ($mysqlinstance->connect_errno) {printf("connect error: " . $mysqlinstance->connect_error);}

function done(){
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/horane/basededatos-proyecto/index.php');
	exit;
}

if(!empty($_POST['usr']) && !empty($_POST['pwd'])){
	
	$sqlquery= 'select * from users where users.username = "' . $_POST['usr'] . '"';
	if(!($result = $mysqlinstance->query($sqlquery))){exit($mysqlinstance->error);}
	
	if (mysqli_num_rows($result) == 0) { 
	$mysqlinstance->query("insert into users VALUES(null,'" . $_POST['usr'] . "' , '" . $_POST['pwd'] . "')");
		echo("account created");
		session_start();
		$_SESSION["user"]=$_POST['usr'];
	} else { 
	   if  ($_POST['pwd'] == mysqli_fetch_assoc($result)["password"]){
		   echo("logged in");
		   session_start();
		   $_SESSION["user"]=$_POST['usr'];
	   } else {
		   echo("incorrect password");
	   }
	}  
		
	
	
}


?>


<form id="mainform" name="mainform" method="post">
Usuario
<input type="text" name="usr" id="usr">
Contrasenia
<input type="password" name="pwd" id="pwd">
<input type="submit" name="sbt" id="sbt" value="submit">
</form>