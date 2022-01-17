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


function displaty ($rows,$columns){ ?>
	<table border=1>
	<tr>
	<?php
	$cc=0;
	while ($row=mysqli_fetch_assoc($columns)){
		?>
		
				<th><?php echo $row['Field']; $cc++;?></th>
				
	<?php } ?><th>Tortal</th> </tr> <?php
	$cc++;

	mysqli_data_seek($columns, 0);
	$counter=0;
	while ($row=mysqli_fetch_assoc($rows)){

		?>
		<tr>
		<?php
			while ($i=mysqli_fetch_assoc($columns)){
				?>
				<td><?php echo $row[$i['Field']]; ?></td>
				<?php
			}
			echo "<td>" . $row["quantityOrdered"]*$row["priceEach"] . "</td>";
			$counter+=$row["quantityOrdered"]*$row["priceEach"];
			mysqli_data_seek($columns, 0);
		?>
		</tr>
	<?php
	}
	echo "<th colspan=" . $cc .">Total: " . $counter . "</th>";
}
?>



