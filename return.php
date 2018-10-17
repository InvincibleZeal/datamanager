<?php

	require('config.php');
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$MemberID = $_GET['MemberID'];
		$query1 = "UPDATE members SET Issued = DEFAULT WHERE Valid = '1' AND MemberID = '$MemberID'";
		$query2 = "UPDATE stock SET Available = '1' WHERE Valid = '1' AND BookID = '$id' ";
		mysqli_query($conn,$query1);
		mysqli_query($conn,$query2);
		echo 'success';
	} else {
		$BookID = $_GET['BookID'];
		$MemberID = $_GET['MemberID'];
		$FirstName = $_GET['FirstName'];
		$query = "SELECT * FROM members WHERE Valid = '1' AND MemberID LIKE '$MemberID%' AND FirstName LIKE '$FirstName%' AND Issued LIKE '$BookID%' ";
		$result = mysqli_query($conn,$query);
		$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($members);
	}

	mysqli_close($conn);
?>