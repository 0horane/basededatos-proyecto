<?php
session_start();
require("r_gameengine.php");
require("r_sqlinit.php");
$gameboard = new game();
$gameboard2 = new game();
$datareceived=mysqli_fetch_assoc($mysqlinstance->query("select * from games where gameid = " . $_GET["gameid"] ));//["board"]
$gameboard->reset(1,1);
$gameboard2->reset(1,1);

$moveslist=explode(",",$datareceived["board"]);
var_dump($moveslist);
echo "<br>";
var_dump($datareceived["board"]);
for ($i=0;$i<count($moveslist);$i++){
	$gameboard->move($moveslist[$i]);
	$gameboard2->move($moveslist[$i]);
}

$gameboard->move($_POST['tile']);
if ($gameboard->board == $gameboard2->board){
	header('Location: game.php?gameid='. $_GET["gameid"]);
} else {
	//UPDATE USING DATARECEIVED AND ADDING LATEST MOVE
}
?>