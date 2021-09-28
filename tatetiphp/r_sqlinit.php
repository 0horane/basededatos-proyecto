<?php
define('serverIP', '127.0.0.1'); //localhost
define('user', 'root');
define('database', 'uttt');
define('password', 'root'); //''

$mysqlinstance = new mysqli(serverIP, user, password, database);
if ($mysqlinstance->connect_errno) {printf("connect error: " . $mysqlinstance->connect_error);}


/*
$link=mysqli_connect(serverIP, user, '', database);

*/
?>
