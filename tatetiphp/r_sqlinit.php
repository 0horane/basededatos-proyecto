<?php
define('serverIP', 'localhost');
define('user', 'root');
define('database', 'uttt');

$mysqlinstance = new mysqli(serverIP, user, '', database);
if ($mysqlinstance->connect_errno) {printf("connect error: " . $mysqlinstance->connect_error);}
?>