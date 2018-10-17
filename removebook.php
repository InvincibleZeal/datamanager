<?php

	require('config.php');
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "UPDATE stock SET Valid = '0' WHERE BookID = '$id' ";
		mysqli_query($conn,$query);
		echo 'success';
	} else {
		$BookID = $_GET['BookID'];
		$BookName = $_GET['BookName'];
		$Author = $_GET['Author'];
		$query = "SELECT * FROM stock WHERE Available = '1' AND Valid = '1' AND BookID LIKE '$BookID%' AND BookName LIKE '$BookName%' AND Author LIKE '$Author%' ";
		$result = mysqli_query($conn,$query);
		$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($books);
	}

	mysqli_close($conn);
?>