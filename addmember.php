<?php

	require('config.php');

	$FirstName = mysqli_real_escape_string($conn, $_GET['FirstName']);
	$LastName = mysqli_real_escape_string($conn,$_GET['LastName']);
	$Address = mysqli_real_escape_string($conn,$_GET['Address']);
	$City = mysqli_real_escape_string($conn,$_GET['City']);
	$State = mysqli_real_escape_string($conn,$_GET['State']);
	$Zip = mysqli_real_escape_string($conn,$_GET['Zip']);
	$Gender = mysqli_real_escape_string($conn,$_GET['Gender']);
	$Subscription = mysqli_real_escape_string($conn,$_GET['Subscription']);
	$query = "INSERT INTO members (FirstName, LastName, Address, City, State, Zip, Gender, Subscription, JoiningDate, SubscriptionEnds) VALUES ('$FirstName', '$LastName', '$Address', '$City', '$State', '$Zip', '$Gender', '$Subscription', CURDATE(), ADDDATE(CURDATE(), INTERVAL '$Subscription' MONTH))";

	if(mysqli_query($conn,$query) === TRUE) {
		echo "success";
	} else {
		echo '\nError: ' . $query . "\n" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>