<?php

/*define('serverIP', 'localhost');
define('user', 'root');

$omysqli = new mysqli(serverIP, user, '', 'classicmodels');
$sqlquery = "SELECT * FROM products";

if ($omysqli->connect_errno) {printf("connect error: " . $omysqli->connect_error);}

if(!($result = $omysqli->query($sqlquery))){exit($omysqli->error);}

echo "<br><br><br><table border='1'>";

while ($reg=mysqli_fetch_assoc($result)){
	//for ($x=0;$x<count($reg);$x++){
		//printf(join($reg));
		
	//}
	
	//printf("<br><br>");
	echo "</tr>";
	while ($col=next($reg)){
		echo "<th>" . $col . "</th>";
	}
	echo "</tr>";
}*/



echo "</table>"


?>