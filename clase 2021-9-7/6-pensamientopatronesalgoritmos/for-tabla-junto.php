<?php
$cant_filas=19;
$cant_columnas=19;
?>

<table border="1">
	<?php
		for($filas=1;$filas<=$cant_filas;$filas++){ ?>
			<tr>
			<?php
			for($columnas=1;$columnas<=$cant_columnas;$columnas++){ 
				if($filas == 1 || $columnas == 1 || $filas ==$cant_filas  || $columnas == $cant_columnas ||  $filas==($cant_filas+1)/2 || $columnas==($cant_columnas+1)/2 || $filas == $columnas || $filas == $cant_columnas+1-$columnas){
					$color="red";
				}else{
					$color = "blue";
				}
			?>
				
				<td bgcolor="<?php echo $color; ?>"><?php echo "f" . $filas . "--c" .$columnas; ?></td>
			<?php } ?>
			</tr>
		<?php } ?>
</table>