<?php

$arr=array(43,45,642,23,465,776,32,5,6,7,82,3,5,7);
$lower=$arr[0];
$upper=$arr[0];
$sum=0;
foreach ($arr as $x){
	if ($x>$upper){
		$upper=$x;
	}
	if ($x<$lower){
		$lower=$x;
	}
	$sum+=$x;
}

echo "El mas bajo era " . $lower . ", el mas alto era " . $upper . ", y el promedio es" . $sum/count($arr);







?>