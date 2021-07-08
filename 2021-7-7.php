<?php

$omysqli = new mysqli('localhost', 'root','','classicmodels');
$sqlquery = "SELECT * FROM products";

if ($omysqli->connect_errno) {printf("connect error: " . $omysqli->connect_error);}

$result = $omysqli->query($sqlquery);

while ($reg=mysqli_fetch_assoc($result)){
	//for ($x=0;$x<count($reg);$x++){
		printf(join($reg));
		
	//}
	
	printf("<br><br>");
}
/*
for ($x=0;x<$count($result);x++)
	printf($result[x] . '\n')
*/

?>