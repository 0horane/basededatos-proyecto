<?php

require_once("r_sqlinit.php");



if(!empty($_POST['usr']) && !empty($_POST['pwd'])){
	
	$sqlquery= 'select * from users where users.username = "' . $_POST['usr'] . '"';
	if(!($result = $mysqlinstance->query($sqlquery))){exit($mysqlinstance->error);}
	
	if (mysqli_num_rows($result) == 0) { 
	$mysqlinstance->query("insert into users VALUES(null,'" . $_POST['usr'] . "' , md5('" . $_POST['pwd'] . "'))");
		//echo("account created");
		session_start();
		$_SESSION["user"]=$_POST['usr'];
		$_SESSION["msg"]="account created";
		$sqlquery='select * from users where users.username = "' . $_SESSION["user"] . '"';
		$_SESSION["id"]=mysqli_fetch_assoc($mysqlinstance->query($sqlquery))["id"];
		header('Location: index.php');
		exit;
	} else { 
		if  (md5($_POST['pwd']) == mysqli_fetch_assoc($result)["password"]){
		//   echo("logged in");
		   session_start();
		   $_SESSION["user"]=$_POST['usr'];
		   $_SESSION["msg"]="logged in";
		   $sqlquery='select * from users where users.username = "' . $_SESSION["user"] . '"';
		   $_SESSION["id"]=mysqli_fetch_assoc($mysqlinstance->query($sqlquery))["id"];
			header('Location: index.php');
			exit;
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