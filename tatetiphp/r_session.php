<?php
session_start();
if (!isset($_SESSION["user"])){
?>

<form action="login.php" method="post">	
	<input type="submit" value="Login/Create Account">
</form>

<?php 
	exit();
}

if (isset($_SESSION["msg"])){
	echo($_SESSION["msg"]);
	$_SESSION["msg"]=null;
}

if (isset($_GET["a"])){
	if ($_GET["a"]=="logout"){
		session_destroy();
		session_start();
		header('Location: index.php');
	}
}

?>