<?php require('i_menu.php') ?>

	<form>

		
city	<input type='text' name='city' >  <br>
phone	<input type='text' name='phone' > <br>
addressLine1	<input type='text' name='addressLine1' ><br> 
addressLine2	<input type='text' name='addressLine2' > <br>
state	<input type='text' name='state' > <br>
country	<input type='text' name='country' > <br>
postalCode	<input type='text' name='postalCode' > <br>
territory<input type='text' name='territory' > <br>
		<input type='submit'><br>
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
