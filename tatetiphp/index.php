<?php 
	
	require_once("r_session.php");
	require_once("r_sqlinit.php");
	
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

<form action="newgame.php" >	
	<input type="submit" value="Crear juego nuevo">
</form>

<?php 
	
?>