<?php require('i_menu.php') ?>
<?php
$perpage=10;
require_once('r_sqlinit.php');
require_once('r_display2.php');
if (isset($_GET['page'])){
	$page = $_GET['page'];
} else {$page = 0;}

$cquery="select * from orderdetails limit ${page},${perpage}";
$qlen=ceil(mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(ordernumber) AS cOC FROM orderdetails"))['cOC']/$perpage);

if (!$result=mysqli_query($link,$cquery)){die('error' . mysqli_error($link) );}
if (!$colarr=mysqli_query($link,'SHOW COLUMNS from orderdetails')){die('error' . mysqli_error($link) );}
displafy($result,$colarr);
for ($i=0;$i<$qlen;$i++){
	echo "<a href='sale.php?page=${i}'>${i}</a>" ;
}
?>
