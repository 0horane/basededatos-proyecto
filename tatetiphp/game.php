<?php
//header("Refresh:3");
require_once("r_session.php");
require_once("r_gameengine.php");
require_once("r_sqlinit.php");
$gameboard = new game();
$datareceived=mysqli_fetch_assoc($mysqlinstance->query("select * from games where gameid = " . $_GET["gameid"] ));//["board"]
$gameboard->reset(1,1);
if ( ( $datareceived["useridX"] == $_SESSION["id"] && $datareceived["turn"] == 1 ) || ( $datareceived["useridO"] == $_SESSION["id"] && $datareceived["turn"] == 0 )){
	header("Refresh:3");
}

//var_dump($_SESSION);
//echo("<br>");
//var_dump($datareceived);

if (!($datareceived["board"]=="")){
	$moveslist=explode(",",$datareceived["board"]);
//	var_dump($moveslist);
	echo "<br>";
//	var_dump($datareceived["board"]);
	for ($i=0;$i<count($moveslist);$i++){
		$gameboard->move($moveslist[$i]);
	//	echo "movi" . $moveslist[$i] . "<br>";
	}
}
?>

<html>
	<head>
		<link rel="stylesheet" href="checkboxes.css">
		<style>

		</style>
	</head>
	<body>
		<form action="receive.php?gameid=<?php echo $_GET['gameid']; ?>" method="post">
		<table>		<!--REPLACE ALL THIS WITH iFRAME-->
			<?php for ($i=0;$i<3;$i++){ ?> <!--   i es eje X grande, i es eje Y grande, k es eje x pequenio, l es eje x pequenio     --> 
				<tr>
					<?php for ($j=0;$j<3;$j++){ ?>
						<td><table<?php echo gresult($gameboard->board[$i][$j])=="x" ? " class='lX'" : (gresult($gameboard->board[$i][$j])=="o" ? " class='lO'" : "");?>>
							<?php for ($k=0;$k<3;$k++){ ?>
								<tr>
									<?php for ($l=0;$l<3;$l++){ ?>
										<td>
										<container class ="<?php $tileval=$gameboard->board[$i][$j][$k][$l]; echo $tileval=="x" ? "x" : ($tileval=="o" ? "o" : ($tileval==" " ? "empty" : "disabled"));  ?>">
											<input type="radio" name="tile" value="<?php echo $i.$j.$k.$l; ?>" <?php echo $tileval!=" " || ( $datareceived["useridX"] == $_SESSION["id"] && $datareceived["turn"] == 1 ) || ( $datareceived["useridO"] == $_SESSION["id"] && $datareceived["turn"] == 0 ) ? "disabled" : ""; ?>>
											<div><?php echo $tileval=="x" ? "x" : ($tileval=="o" ? "o" : "  ");  ?></div>
										</container>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</table></td>
					<?php } ?>
				</tr>
			<?php }	 ?>
		</table><br><input type="submit"></form>
		<pre>
		<?php //var_dump($gameboard->board); ?>
		</pre>
	</body>
</html>
