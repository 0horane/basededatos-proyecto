<?php

$omysqli = new mysqli('localhost', 'root','','classicmodels');
$sqlquery = "SELECT * FROM products";

if ($omysqli->connect_errno) {printf("connect error: " . $omysqli->connect_error);}

$result = $omysqli->query($sqlquery);

for ($x=0;x<$count($result);x++)
	printf($result[x] . '\n')

>