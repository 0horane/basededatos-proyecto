<?php

const emptyboard= array(
			array(
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				),
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				),
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				)
			),
			array(
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				),
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				),
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				)
			),
			array(
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				),
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				),
				array(
					array(" ", " "," "),
					array(" ", " "," "),
					array(" ", " "," ")
				)
			)
			
		);
?>
<?php 

function gresult($barray){
	
	if (
		($barray[0][0]=="x" && $barray[0][1]=="x" && $barray[0][2]=="x") ||
		($barray[1][0]=="x" && $barray[1][1]=="x" && $barray[1][2]=="x") ||
		($barray[2][0]=="x" && $barray[2][1]=="x" && $barray[2][2]=="x") ||
		($barray[0][0]=="x" && $barray[1][0]=="x" && $barray[2][0]=="x") ||
		($barray[0][1]=="x" && $barray[1][1]=="x" && $barray[2][1]=="x") ||
		($barray[0][2]=="x" && $barray[1][2]=="x" && $barray[2][2]=="x") ||
		($barray[0][0]=="x" && $barray[1][1]=="x" && $barray[2][2]=="x") ||
		($barray[0][2]=="x" && $barray[1][1]=="x" && $barray[2][0]=="x") 
	){return "x";} else if (
		($barray[0][0]=="o" && $barray[0][1]=="o" && $barray[0][2]=="o") ||
		($barray[1][0]=="o" && $barray[1][1]=="o" && $barray[1][2]=="o") ||
		($barray[2][0]=="o" && $barray[2][1]=="o" && $barray[2][2]=="o") ||
		($barray[0][0]=="o" && $barray[1][0]=="o" && $barray[2][0]=="o") ||
		($barray[0][1]=="o" && $barray[1][1]=="o" && $barray[2][1]=="o") ||
		($barray[0][2]=="o" && $barray[1][2]=="o" && $barray[2][2]=="o") ||
		($barray[0][0]=="o" && $barray[1][1]=="o" && $barray[2][2]=="o") ||
		($barray[0][2]=="o" && $barray[1][1]=="o" && $barray[2][0]=="o") 
	) {return "o";} else if (
		($barray[0][0]=="x"||$barray[0][0]=="o") &&
		($barray[0][1]=="x"||$barray[0][1]=="o") &&
		($barray[0][2]=="x"||$barray[0][2]=="o") &&
		($barray[1][0]=="x"||$barray[1][0]=="o") &&
		($barray[1][1]=="x"||$barray[1][1]=="o") &&
		($barray[1][2]=="x"||$barray[1][2]=="o") &&
		($barray[2][0]=="x"||$barray[2][0]=="o") &&
		($barray[2][1]=="x"||$barray[2][1]=="o") &&
		($barray[2][2]=="x"||$barray[2][2]=="o")
	) {return "t";} else {return "";}
}

class game{
/*	public $board;
	public $turn;

    public function __construct() {
        $this->board = $board;
        $this->turn = $turn;
	}
*/	
	public function reset(){
		$this->board=emptyboard;
		$this->turn="x";
	}
	
	public function move($loc){
		$locarr = str_split($loc);
//		var_dump($loc);
		if ($this->board[$locarr[0]][$locarr[1]][$locarr[2]][$locarr[3]]==" "){
			$this->board[$locarr[0]][$locarr[1]][$locarr[2]][$locarr[3]]=$this->turn;
			if($this->turn=="x"){
				$this->turn="o";
			} else {
				$this->turn="x";
			}

			for ($X=0;$X<3;$X++){
				for ($Y=0;$Y<3;$Y++){
					for ($x=0;$x<3;$x++){
						for ($y=0;$y<3;$y++){
							if (  ( $X==$locarr[2] && $Y==$locarr[3] && gresult($this->board[$X][$Y])=="" ) || ( gresult($this->board[$locarr[2]][$locarr[3]]) !="" && gresult($this->board[$X][$Y])=="" )  ) { // (  ( tile is in corresponding board && correponding board is in play ) || ( corresponding board is not in play && tile's board is in play )  )
								if($this->board[$X][$Y][$x][$y]==""){
									$this->board[$X][$Y][$x][$y]=" ";
								}

							} else if ($this->board[$X][$Y][$x][$y]==" "){
								$this->board[$X][$Y][$x][$y]="";
							}
							
							
						}				
					}	
				}	
			}	
		}
		
		$minboard = array(array(),array(),array());
		for ($X2 = 0; $X2<3; $X2++){
			for ($Y2 = 0; $Y2<3; $Y2++){
				$minboard[$X2][$Y2] = gresult($this->board[$X2][$Y2]); 
			}
		}
		if (gresult($minboard)!=""){
			echo "<h1>Ganó el jugador" . gresult($minboard) . "</h1>";
			for ($X=0;$X<3;$X++){
				for ($Y=0;$Y<3;$Y++){
					for ($x=0;$x<3;$x++){
						for ($y=0;$y<3;$y++){
							if ($this->board[$X][$Y][$x][$y]==" "){
								$this->board[$X][$Y][$x][$y]="";
							}
						}
					}
				}
			}   
		}
		
	}
}

$gameboard = new game();
$gameboard->reset(1,1);
$gameboard->move("0011");
?>

<html>
	<head>
		<link rel="stylesheet" href="checkboxes.css">
		<style>

		</style>
	</head>
	<body>
		<form>
		<table>
			<?php for ($X=0;$X<3;$X++){ ?>
				<tr>
					<?php for ($Y=0;$Y<3;$Y++){ ?>
						<td><table<?php 
							if (gresult($gameboard->board[$X][$Y])=="x"){
								echo " class='lX'";
							}
							if (gresult($gameboard->board[$X][$Y])=="o"){
								echo " class='lO'";
							}
						?>>
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
		<?php var_dump($gameboard->board) ?>
		</pre>
	</body>
</html>