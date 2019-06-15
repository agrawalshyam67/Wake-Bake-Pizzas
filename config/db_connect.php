<?php 

	// Connect to database
	$conn = mysqli_connect('localhost','shyam','test123','shyam_pizza');

	// Check Connection
	if (!$conn) {
		echo 'Connection error:' . mysqli_connect_error();
	}

 ?>