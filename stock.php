<?php

	require('config.php');

	$query = "SELECT * FROM stock WHERE Valid = '1' ORDER BY BookID";

	$result = mysqli_query($conn,$query);
	$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($books);
	mysqli_close($conn);
?>