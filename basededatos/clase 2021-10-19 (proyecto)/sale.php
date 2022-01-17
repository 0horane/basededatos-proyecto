<?php require('i_menu.php') ?>
<?php
$perpage=10;
require_once('r_sqlinit.php');
require_once('r_display.php');
if (isset($_GET['page'])){
	$page = $_GET['page'];
} else {$page = 0;}

$cquery="select * from orderdetails limit ". $page*$perpage.",${perpage}";
$qlen=ceil(mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(ordernumber) AS cOC FROM orderdetails"))['cOC']/$perpage);

if (!$result=mysqli_query($link,$cquery)){die('error' . mysqli_error($link) );}
if (!$colarr=mysqli_query($link,'SHOW COLUMNS from orderdetails')){die('error' . mysqli_error($link) );}
displaty($result,$colarr);

echo "<br>";

if ($page >=$qlen-5){
	$startpage=$qlen-10;
	$endpage=$qlen;
	
} else if ($page>=5){
	$startpage=$page-5;
	$endpage=$page+5;

} else{
	$startpage=0;
	$endpage=10;
	
}
if ($startpage<0){
	$startpage=0;
}

$temp=$page-1;
echo "<a href='sale.php?page=0'><<</a><span> </span>";
echo $page!=0 ? "<a href='sale.php?page=". $temp ."'><</a><span> </span>" : '' ;
for ($i=$startpage;$i<$endpage;$i++){
	echo "<a href='sale.php?page=${i}'>${i}</a><span> </span> " ;
}
$temp=$page+1;
$temp2=$qlen-1;
echo $page!=$temp2 ? "<a href='sale.php?page=". $temp ."'>></a><span> </span>" : '';
echo "<a href='sale.php?page=" . $temp2 . "'>>></a><span> </span>";

?>
