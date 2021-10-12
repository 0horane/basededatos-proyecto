<?php require('i_menu.php') ?>

	<form>
		ciudad:<input type='text' name='ciudad' value=<?php echo isset($_GET['ciudad']) ? $_GET['ciudad'] : '' ;?> > pais:<input type='text' name='pais' value=<?php echo isset($_GET['pais']) ?  $_GET['pais'] : '' ;?>> 
		<input type='submit'>
	</form>
<?php

require_once('r_sqlinit.php');
require_once('r_display.php');

if (isset($_GET['ciudad']) && isset($_GET['pais'])){
	$cquery='SELECT * FROM offices WHERE city LIKE "%'.$_GET['ciudad']. '%" AND country LIKE "%'.$_GET['pais'].'%"';
} else if (isset($_GET['ciudad'])){
	$cquery='SELECT * FROM offices WHERE city LIKE "%'.$_GET['ciudad']. '%"';
} else if (isset($_GET['pais'])){
	$cquery='SELECT * FROM offices WHERE city LIKE "%'.$_GET['pais']. '%"';
} else {
	$cquery='SELECT * FROM offices';
}

if (!$result=mysqli_query($link,$cquery)){die('error de coneccion' );}
if (!$colarr=mysqli_query($link,'SHOW COLUMNS from offices')){die('error' . mysqli_error($link) );}
displafy($result,$colarr);
?>
