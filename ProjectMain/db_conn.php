<?php 

	// connect to database
	$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

	// check connection
	if (!$conn) {
		echo "Connection error: " . mysqli_connect_error();
	}
 ?>