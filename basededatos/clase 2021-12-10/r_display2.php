<?php function displafy ($rows,$columns){ ?>
<table border=1>
<tr>
<?php
while ($row=mysqli_fetch_assoc($columns)){
	?>
	
			<th><?php echo $row['Field']; ?></th>
<?php } ?><th>Tortal</th> </tr> <?php
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
		echo "<td>" . $row["quantityOrdered"]*$row["priceEach"] . "</td>";
		mysqli_data_seek($columns, 0);
	?>
	</tr>
<?php
}

}






?>