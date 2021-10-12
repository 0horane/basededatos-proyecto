<?php function displafy ($rows,$columns){ ?>
<table border=1>
<tr>
<?php
while ($row=mysqli_fetch_assoc($columns)){
	?>
	
			<th><?php echo $row['Field']; ?></th>
<?php } ?> </tr> <?php
//var_dump (reset($colarr));
//if (!$colarr=mysqli_query($link,'SHOW COLUMNS from offices')){die('error' . mysqli_error($link) );}

mysqli_data_seek($columns, 0);
while ($row=mysqli_fetch_assoc($rows)){
//	print_r($row);
	?>
	<tr>
	<?php
		while ($i=mysqli_fetch_assoc($columns)){
			?>
			<td><?php echo $row[$i['Field']]; ?></td>
			<?php
		}
		mysqli_data_seek($columns, 0);
	?>
	</tr>
<?php
}

}






?>