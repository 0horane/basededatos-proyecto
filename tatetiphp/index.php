<?php 
	
	session_start();

	if (isset($_GET["a"])){
		if ($_GET["a"]=="logout"){
			session_destroy();
			session_start();
			header('Location: index.php');
		}
	}
	if (!isset($_SESSION["user"])){
?>

<form action="login.php" method="post">	
	<input type="submit" value="Login/Create Account">
</form>

<?php 
	exit();
	} else {

?>

<form action="index.php?a=logout" method="post">	<!-- estos forms que uso como botones se tienen que reemplazar con <a> mas adelante -->
	<input type="submit" value="Logout">
</form>

<?php 
	}

	if (isset($_SESSION["msg"])){
		echo($_SESSION["msg"]);
		$_SESSION["msg"]=null;
	}


	require("r_sqlinit.php");
	$sqlquery= 'select * from games where (games.result = 0) and (games.useridX = "' . $_SESSION['id'] . '" or games.useridO = "' . $_SESSION['id'] . '")';
	if(!($result = $mysqlinstance->query($sqlquery))){exit($mysqlinstance->error);}
	echo "<table border = 1><tr><th>Jugador 1</th><th>Jugador 2</th> <th>Turno</th></tr>";
	$gameidcounter=0;
	while ($reg=mysqli_fetch_assoc($result)){
		?>
		<tr onclick="location.href = '<?php echo "game.php?gameid=". ++$gameidcounter; ?>';">
		<?php
			$col=next($reg);//user1
			echo "<td>" . mysqli_fetch_assoc($mysqlinstance->query("select users.username from users where users.id = " . $col))["username"] . "</td>";
			$col=next($reg);//user2
			echo "<td>" . mysqli_fetch_assoc($mysqlinstance->query("select users.username from users where users.id = " . $col))["username"] . "</td>";
			$col=next($reg);//board
			$col=next($reg);//turn
			echo "<td>". ($col ? "O":"X")."</td>";
		echo "</tr>";
	}
		
	
	echo "</table>";
?>
	

<?php 
	
?>