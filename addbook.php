<?php

	require('config.php');

	$BookName = mysqli_real_escape_string($conn, $_GET['BookName']);
	$Author = mysqli_real_escape_string($conn,$_GET['Author']);
	$Publication = mysqli_real_escape_string($conn,$_GET['Publication']);
	$Genre = mysqli_real_escape_string($conn,$_GET['Genre']);
	$Edition = mysqli_real_escape_string($conn,$_GET['Edition']);
	$query = "INSERT INTO stock (BookName, Author, Publication, Genre, Edition, StockedOn) VALUES ('$BookName', '$Author', '$Publication', '$Genre', '$Edition', CURDATE())";

	if(mysqli_query($conn,$query) === TRUE) {
		echo "success";
	} else {
		echo '\nError: ' . $query . "\n" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>