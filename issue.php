<?php

	require('config.php');
	
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$MemberID = $_GET['MemberID'];
		$query1 = "UPDATE stock SET Available = '0' WHERE BookID = '$id' ";
		$query2 = "UPDATE members SET Issued = '$id' WHERE MemberID = '$MemberID' ";
		mysqli_query($conn,$query1);
		mysqli_query($conn,$query2);
		echo 'success';
	} else if(isset($_GET['MemberID'])) {
		$MemberID = $_GET['MemberID'];

		$query = "SELECT Issued FROM members WHERE MemberID = '$MemberID' ";
		$result = mysqli_query($conn,$query);
		$issued = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($issued);

	} else {
		$BookID = $_GET['BookID'];
		$BookName = $_GET['BookName'];
		$Author = $_GET['Author'];
		$query = "SELECT * FROM stock WHERE Valid = '1' AND BookID LIKE '$BookID%' AND BookName LIKE '$BookName%' AND Author LIKE '$Author%' ";
		$result = mysqli_query($conn,$query);
		$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($books);
	}

	mysqli_close($conn);
?>