<?php
require_once("r_session.php");
require_once("r_gameengine.php");
require_once("r_sqlinit.php");
$gameboard = new game();
$gameboard2 = new game();
$datareceived=mysqli_fetch_assoc($mysqlinstance->query("select * from games where gameid = " . $_GET["gameid"] ));//["board"]
$gameboard->reset(1,1);
$gameboard2->reset(1,1);

if (!($datareceived["board"]=="")){
	$moveslist=explode(",",$datareceived["board"]);
//	var_dump($moveslist);
//	echo "<br>";
//	var_dump($datareceived["board"]);
	for ($i=0;$i<count($moveslist);$i++){
		$gameboard->move($moveslist[$i]);
		$gameboard2->move($moveslist[$i]);
	}
}

$gameboard->move($_POST['tile']);


//var_dump($gameboard->board == $gameboard2->board,$_SESSION['user']==$datareceived["useridX"],$datareceived["turn"]==0,$_SESSION['user'],$datareceived["useridX"]);

if ($gameboard->board == $gameboard2->board){
	$_SESSION["msg"]="impossible move/";
} else {
	if ( ($_SESSION['id']==$datareceived["useridX"]  && $datareceived["turn"]==0 ) ||  ( $_SESSION['id']==$datareceived["useridO"] && $datareceived["turn"]==1 ) ){
		$pcomma=$datareceived["board"]=="" ? "" : ",";
		$turnint= $gameboard->turn=="x" ? 0 : 1;
		$query="UPDATE games SET board = '" . $datareceived["board"] . $pcomma . $_POST["tile"]."' , turn=" . $turnint . " WHERE gameid =" . $_GET["gameid"];
		$mysqlinstance->query($query);
		
	} else{$_SESSION["msg"]="wrong user/turn";}
}

header('Location: game.php?gameid='. $_GET["gameid"]);
?>