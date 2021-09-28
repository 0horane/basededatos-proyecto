<?php

require_once("r_session.php");
require_once("r_sqlinit.php");

$query="select * from games where useridX=0 || useridO=0";

if(!($result = $mysqlinstance->query($query))){exit($mysqlinstance->error);}
if (mysqli_num_rows($result) == 0) { echo "r1 <br>";
	if (rand(0,1)){
		echo "insert into games VALUES(null," . $_SESSION["id"] . ",null,'',0,0";
		if(!($result = $mysqlinstance->query("insert into games VALUES(null," . $_SESSION["id"] . ",0,'',0,0)"))){exit($mysqlinstance->error);}

	} else {
		if(!($result = $mysqlinstance->query("insert into games VALUES(null,0," . $_SESSION["id"] . ",'',0,0)"))){exit($mysqlinstance->error);}

	}
	
} else {
	$game = mysqli_fetch_assoc($result);
	if ($game["useridX"]==0){	echo "r2 <br>";
		$query="UPDATE games SET useridX =" . $_SESSION["id"]. " WHERE gameid =" . $game["gameid"];  
		if(!($result = $mysqlinstance->query($query))){exit($mysqlinstance->error);}
	} else {
		$query="UPDATE games SET useridO =" . $_SESSION["id"]. " WHERE gameid =" . $game["gameid"];  
		if(!($result = $mysqlinstance->query($query))){exit($mysqlinstance->error);}
	}
}
header('Location: index.php'); // SWITCH TO GAMEID

?>