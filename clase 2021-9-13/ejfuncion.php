<?php

function isemail ($string){
	
	return is_string($string) && strlen($string)>6 && str_contains($string, "@") && str_ends_with($string, ".com") ? true : false;
	
}


echo isemail("shdjhksjhklsfjhklsfkjl@gmail.com") ? "true" : "false", "<br>";
echo isemail(4) ? "true" : "false", "<br>";
echo isemail("shdjhksjhklsfjhklsfkjl@gmail.co") ? "true" : "false", "<br>";
echo isemail("shdjhksjhklsfjhklsfkjl&gmail.com") ? "true" : "false", "<br>";
?>