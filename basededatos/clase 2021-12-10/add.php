<?php require('i_menu.php') ?>

	<form>

		
city	<input type='text' name='city' > 
phone	<input type='text' name='phone' > 
addressLine1	<input type='text' name='addressLine1' > 
addressLine2	<input type='text' name='addressLine2' > 
state	<input type='text' name='state' > 
country	<input type='text' name='country' > 
postalCode	<input type='text' name='postalCode' > 
territory<input type='text' name='territory' > 
		<input type='submit'>
	</form>
<?php
	
	
	if (next($_GET)){
		require_once('r_sqlinit.php');
		$officeCode=mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(officeCode) AS maxOC FROM offices"))['maxOC']+1;
	if(mysqli_query($link, "INSERT INTO offices VALUES('" . $officeCode . "','" . $_GET['city'] . "','" . $_GET['phone'] . "','" . $_GET['addressLine1'] . "','" . $_GET['addressLine2'] . "','" . $_GET['state'] . "','" . $_GET['country'] . "','" . $_GET['postalCode'] . "','" . $_GET['territory'] ."') ")){
		echo "aa";
	} else {
		echo mysqli_error($link);
	}

	}





?>
