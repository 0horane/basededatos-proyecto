

	<form>
		ciudad:<input type='text' name='ciudad' value=<?php echo isset($_GET['ciudad']) ? $_GET['ciudad'] : '' ;?> > pais:<input type='text' name='pais' value=<?php echo isset($_GET['pais']) ?  $_GET['pais'] : '' ;?>> 
		<input type='submit'>
	</form>
<?php

if (!$link=mysqli_connect('localhost','root','','classicmodels')){die('error de coneccion' );}

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

?>
<table border=1>
<tr>
<?php
while ($row=mysqli_fetch_assoc($colarr)){
	?>
	
			<th><?php echo $row['Field']; ?></th>
<?php } ?> </tr> <?php
//var_dump (reset($colarr));
//if (!$colarr=mysqli_query($link,'SHOW COLUMNS from offices')){die('error' . mysqli_error($link) );}
$lofcolarr=mysqli_query($link, "SHOW COLUMNS from offices");

while ($row=mysqli_fetch_assoc($result)){
//	print_r($row);
	?>
	<tr>
	<?php
		while ($i=mysqli_fetch_assoc($lofcolarr)){
			?>
			<td><?php echo $row[$i['Field']]; ?></td>
			<?php
		}
		mysqli_data_seek($lofcolarr, 0);
	?>
	</tr>
<?php
}






?>