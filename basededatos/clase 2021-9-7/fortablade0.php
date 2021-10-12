<?php
$x=9;
$y=5;


?>

<html>
	<head>

	</head>
	<body>
	
	<table border="1">
		<?php for ($row =0; $row<$y;$row++) { ?>
			<tr>
				<?php for ($col =0; $col<$x;$col++) { ?>
				<td><?php echo $col." ,".$row ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
	
	</body>
</html>