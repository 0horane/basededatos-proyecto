<pre>
	<?php 
	var_dump($_GET);
	var_dump($_POST);
	
	if ($_GET["age"]<18){
		echo("menor A 18");
	} else {
		echo("mayor A 18");
	}
	?>


</pre>