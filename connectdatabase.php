<?php

	$database = "test";
	$username = "root";
	$server = "localhost";
	$password = '';

	$conn = new mysqli($server , $username , $password , $database);
	
	if(!$conn)
		echo "Connection can not be made!";
?>