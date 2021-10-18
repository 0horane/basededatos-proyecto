<?php require('i_menu.php') ?>

	<form>
		officecode:<input type='text' name='officeCode' value=<?php echo isset($_GET['officeCode']) ? $_GET['officeCode'] : '' ;?> > state:<input type='text' name='state' value=<?php echo isset($_GET['state']) ?  $_GET['state'] : '' ;?>> 
		<input type='submit'>
	</form>
<?php

require_once('r_sqlinit.php');
require_once('r_display.php');

if (isset($_GET['officeCode']) && isset($_GET['state'])){
	$cquery='SELECT * FROM offices WHERE officeCode LIKE "%'.$_GET['officeCode']. '%" AND ( state LIKE "%'.$_GET['state'].'%" OR state IS NULL)';
} else if (isset($_GET['officeCode'])){
	$cquery='SELECT * FROM offices WHERE city LIKE "%'.$_GET['officeCode']. '%"';
} else if (isset($_GET['state'])){
	$cquery='SELECT * FROM offices WHERE city LIKE "%'.$_GET['state']. '%"';
} else {
	$cquery='SELECT * FROM offices';
}

if (!$result=mysqli_query($link,$cquery)){die('error' . mysqli_error($link)  );}
if (!$colarr=mysqli_query($link,'SHOW COLUMNS from offices')){die('error' . mysqli_error($link) );}
displafy($result,$colarr);
?>

