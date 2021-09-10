<?php

define('serverIP', 'localhost');
define('user', 'root');
define('database', 'uttt');

$mysqlinstance = new mysqli(serverIP, user, '', database);
if ($mysqlinstance->connect_errno) {printf("connect error: " . $mysqlinstance->connect_error);}



if(!empty($_POST['usr']) && !empty($_POST['pwd'])){
	$sqlquery= 'select * from ' . database . 'where users.username ' . ' = ' . $_POST['usr'];
	if(!($result = $mysqlinstance->query($sqlquery))){exit($mysqlinstance->error);}
	
	
}


?>


<form id="mainform" name="mainform" method="post">
Usuario
<input type="text" name="usr" id="usr">
Contrasenia
<input type="password" name="pwd" id="pwd">
<input type="submit" name="sbt" id="sbt" value="submit">
</form>