<?php
	$conn = new mysqli("localhost", "test", "", "market");
	
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>