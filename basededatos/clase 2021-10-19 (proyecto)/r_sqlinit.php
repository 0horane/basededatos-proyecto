<?php 
define('db', 'classicmodels');

if (!$link=mysqli_connect('localhost','root','',db)){die('error de coneccion' );}

mysqli_set_charset($link, 'utf8');
?>