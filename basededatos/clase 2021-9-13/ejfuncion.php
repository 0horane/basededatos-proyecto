<?php

function isemail ($string){

	//str_contains($string, "@") && substr($string, 0,1)!="@"
	return is_string($string) && strlen($string)>6 && strpos($string ,"@") && str_ends_with($string, ".com") ? true : false;
	
}


echo isset($_GET["email"]) ?  (isemail($_GET["email"]) ? "true" : "false") : "string is empy"  , "<br>";

?>