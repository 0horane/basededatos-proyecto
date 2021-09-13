<?php 
session_start()
if !(isset($_SESSION["user"])){
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/horane/basededatos-proyecto/tatetisql/login.php/');
	exit;
	
}

?>