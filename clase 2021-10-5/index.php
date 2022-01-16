

	<form>
		ciudad:<input type='text' name='ciudad' value=<?php echo isset($_GET['ciudad']) ? $_GET['ciudad'] : '' ;?> > pais:<input type='text' name='pais' value=<?php echo isset($_GET['pais']) ?  $_GET['pais'] : '' ;?>> 
		<input type='submit'>
	</form>
<?php

if (!$link=mysqli_connect('localhost','root','','classicmodels')){die('error' . mysqli_error($link) );}

if (!$result=mysqli_query($link,'SELECT * FROM offices WHERE city LIKE "%'.$_GET['ciudad']. '%" AND country LIKE "%'.$_GET['pais'].'%"')){die('error de coneccion' );}
if (!$colarr=mysqli_query($link,'SHOW COLUMNS from offices')){die('error' . mysqli_error($link) );}

?>
<table border=1>
<tr>
<?php
while ($row=mysqli_fetch_assoc($colarr)){
	?>
	
			<th><?php echo $row['Field']; ?></th>
<?php } ?> </tr> <?php
$colarr=reset($colarr);
while ($row=mysqli_fetch_array($result)){
//	print_r($row);
	?>
	<tr>
	<?php/*
		for ($i=0;$i<mysqli_num_fields($colarr);$i++){
			?>
			<td><?php echo $row[$i]; ?></td>
			<?php
		}*/
		
		
	?>
	</tr>
<?php
}






?>