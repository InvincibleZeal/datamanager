<?php

	require('config.php');
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "UPDATE members SET Valid = '0' WHERE MemberID = '$id'";
		mysqli_query($conn,$query);
		echo 'success';
	} else {
		$MemberID = $_GET['MemberID'];
		$FirstName = $_GET['FirstName'];
		$LastName = $_GET['LastName'];
		$query = "SELECT * FROM members WHERE Valid = '1' AND MemberID LIKE '$MemberID%' AND FirstName LIKE '$FirstName%' AND LastName LIKE '$LastName%' ";
		$result = mysqli_query($conn,$query);
		$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($members);
	}

	mysqli_close($conn);
?>