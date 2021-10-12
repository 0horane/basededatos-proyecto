<?php
if (isset($_GET["b"]) && isset($_GET["h"]) ){
	echo "El perimetro es " . ($_GET["h"]*2+$_GET["b"]*2) . "<br>" . "y el area es " . ($_GET["h"]*$_GET["b"]);
}


?>