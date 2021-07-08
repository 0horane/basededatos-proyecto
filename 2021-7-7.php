<?php

$omysqli = new mysqli('localhost', 'root','','classicmodels');
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
$products[]="a";
echo "<pre>";
print_r($products);
echo "</pre>";


/*
for ($x=0;x<$count($result);x++)
	printf($result[x] . '\n')
*/

?>