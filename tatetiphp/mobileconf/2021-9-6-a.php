<?php

define('serverIP', '127.0.0.1');
define('user', 'root');

$omysqli = new mysqli(serverIP, user, 'root','uttt');
//$sqlquery = "CREATE TABLE `uttt`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(64) NOT NULL , `password` VARCHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";//"
//$sqlquery="CREATE TABLE `uttt`.`games` ( `gameid` INT NOT NULL AUTO_INCREMENT , `useridX` int not null, `useridO` INT NOT NULL , `board` LONGTEXT NOT NULL , `turn` BOOLEAN NOT NULL , `result` TINYINT NOT NULL, PRIMARY KEY (`gameid`)) ENGINE = InnoDB;";
$sqlquery="show tables";
if ($omysqli->connect_errno) {printf("connect error: " . $omysqli->connect_error);}

if(!($result = $omysqli->query($sqlquery))){exit($omysqli->error);}
var_dump($result);
while($a=mysqli_fetch_assoc($result)){print_r($a);}

?>