<?php 
	
	$conn = new mysqli('localhost','root','','foodshop');
	
	if($conn->connect_error) {
		die("DB Connection Error");
	}
	
?>