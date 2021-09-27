<?php

require_once("r_session.php");
require_once("r_gameengine.php");
require_once("r_sqlinit.php");
$gameboard = new game();
$datareceived=mysqli_fetch_assoc($mysqlinstance->query("select * from games where gameid = " . $_GET["gameid"] ));//["board"]
$gameboard->reset(1,1);


var_dump($_SESSION);
echo("<br>");
var_dump($datareceived);

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
			<?php for ($X=0;$X<3;$X++){ ?>
				<tr>
					<?php for ($Y=0;$Y<3;$Y++){ ?>
						<td><table<?php echo gresult($gameboard->board[$X][$Y])=="x" ? " class='lX'" : (gresult($gameboard->board[$X][$Y])=="o" ? " class='lO'" : "");?>>
							<?php for ($x=0;$x<3;$x++){ ?>
								<tr>
									<?php for ($y=0;$y<3;$y++){ ?>
										<td>
										<container class ="<?php $tileval=$gameboard->board[$X][$Y][$x][$y]; echo $tileval=="x" ? "x" : ($tileval=="o" ? "o" : ($tileval==" " ? "empty" : "disabled"));  ?>">
											<input type="radio" name="tile" value="<?php echo $X.$Y.$x.$y; ?>" <?php echo $tileval==" " ? "" : "disabled"; ?>>
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