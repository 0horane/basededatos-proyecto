<?php 
include('i_menu.php');
require_once('r_sqlinit.php');
$ltquery="SHOW TABLES";

if(isset($_GET['table'])){
	$currenttable=$_GET['table'];
} else {
	$currenttable='customers';
}

$perpage=10;
if (isset($_GET['page'])){
	$page = $_GET['page'];
} else {$page = 0;}

if (!$tables=mysqli_query($link,$ltquery)){die('error' . mysqli_error($link)  );}
?>

	<form>
		<select name="table" onchange="submit()">
		
<?php
	while($ptable=mysqli_fetch_assoc($tables)){
		echo "<option value='".$ptable['Tables_in_'.db]."'".($ptable['Tables_in_'.db] == $currenttable ? ' selected':'').">" . $ptable['Tables_in_'.db] . "</option>";
	}

	
?>

		</select>
	</form>

	<form action="?table=<?php echo $currenttable;?>">
	
<?php
if (!$colarr=mysqli_query($link,'SHOW COLUMNS from '.$currenttable)){die('error' . mysqli_error($link) );}	

while ($pforsearch=mysqli_fetch_assoc($colarr)){
	
	 echo $pforsearch['Field'].":<input type='text' name='".$pforsearch['Field']."' value=".(isset($_GET[$pforsearch['Field']]) ? $_GET[$pforsearch['Field']] : '')."><br>"; 
	
}
mysqli_data_seek($colarr, 0);
?>

		<input type='hidden' name='table' value='<?php echo $currenttable; ?>'>
		<input type='hidden' name='page' value=0>
		<input type='submit'>
	</form>

	
<?php

require_once('r_display.php');


$cquery1='SELECT * FROM '. $currenttable . " ";
$cquery2='';
$cquery3='';
$fieldsset=0;
while ($pforsearch=mysqli_fetch_assoc($colarr)){
	if (isset($_GET[$pforsearch['Field']]) && $_GET[$pforsearch['Field']]!==""){
		$cquery2.= $fieldsset ? "AND " : 'WHERE ';

		
		$cquery2.="(". $pforsearch['Field']." LIKE '%".$_GET[$pforsearch['Field']]."%' OR ".$pforsearch['Field']." IS NULL ) "; 
		$fieldsset++;
	}
	
}
$cquery3.="limit " . $page*$perpage . ",". $perpage;
$cquery=$cquery1.$cquery2.$cquery3;
mysqli_data_seek($colarr, 0);

//paginador
//echo "SELECT COUNT(".mysqli_fetch_assoc($colarr)['Field'].") AS cOC FROM ".$currenttable .$cquery2;
$qlen=ceil(mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(".mysqli_fetch_assoc($colarr)['Field'].") AS cOC FROM ".$currenttable .' '.$cquery2))['cOC']/$perpage);
//echo 'error ' . mysqli_error($link);
mysqli_data_seek($colarr, 0);
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
$spchar=strpos($_SERVER['REQUEST_URI'],"?") ? '&' : '?';
echo "<a href='".$_SERVER['REQUEST_URI'].$spchar."page=0'><<</a><span> </span>";
echo $page!=0 ? "<a href='".$_SERVER['REQUEST_URI'].$spchar."page=". $temp ."'><</a><span> </span>" : '' ;
for ($i=$startpage;$i<$endpage;$i++){
	echo "<a href='".$_SERVER['REQUEST_URI'].$spchar."page=${i}'>${i}</a><span> </span> " ;
}
$temp=$page+1;
$temp2=$qlen-1;
echo $page!=$temp2 ? "<a href='".$_SERVER['REQUEST_URI'].$spchar."page=". $temp ."'>></a><span> </span>" : '';
echo "<a href='".$_SERVER['REQUEST_URI'].$spchar."page=" . $temp2 . "'>>></a><span> </span>";



/////////////
if (!$result=mysqli_query($link,$cquery)){die('error' . mysqli_error($link)  );}
displafy($result,$colarr);
?>

