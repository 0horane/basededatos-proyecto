<?php
require_once("r_sqlinit.php");

$query="select * from games where useridX=55";
var_dump($mysqlinstance->query($query));
?>