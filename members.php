<?php

	require('config.php');

	$query = "SELECT * FROM members WHERE Valid = '1' ORDER BY MemberID";

	$result = mysqli_query($conn,$query);
	$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($members);
	mysqli_close($conn);
?>