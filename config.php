<?php

	$conn = mysqli_connect('localhost','root','testdb','booksplore');
	if (mysqli_connect_error()) {
    	die("Connection failed: " . mysqli_connect_error());
	}
?>