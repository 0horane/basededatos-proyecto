<?php

define('serverIP', 'localhost');

$omysqli = new mysqli(serverIP, 'root','','classicmodels');
$sqlquery = "SELECT * FROM products";

if ($omysqli->connect_errno) {printf("connect error: " . $omysqli->connect_error);}

if(!($result = $omysqli->query($sqlquery))){exit($omysqli->error);}

while ($reg=mysqli_fetch_assoc($result)){
	//for ($x=0;$x<count($reg);$x++){
		//printf(join($reg));
		
	//}
	
	//printf("<br><br>");
	$products[]=$reg;
	
}
//$products[]="a";
//echo "<pre>";
//print_r($products);
//echo "</pre>";

echo "<br><br><br><table border='1'><tr>";
$row=reset($products);
$col=reset($row);
echo "<th>" . $col . "</th>";
while ($col=next($row)){
	echo "<th>" . $col . "</th>";
}
echo "</tr>";
while ($row=next($products)){
	echo "<tr>";
	$col=reset($row);
	echo "<th>" . $col . "</th>";
	while ($col=next($row)){
		echo "<th>" . $col . "</th>";
	}
	
	
	echo "</th>";
}

echo "</table>"

/*
for ($x=0;x<$count($result);x++)
	printf($result[x] . '\n')
*/

?>