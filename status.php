/<?php

    $unitID = $_GET['unitID'];
    $unitStatus = $_GET['unitStatus'];

    $servername = "localhost";
    $username = "rpiPicoW";
    $password = "rpifred3733";
    $dbname = "thebasementsink";

    $conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO BOARD_STATUS
	VALUES (NOW(), '$unitID', '$unitStatus')";
	if (mysqli_query($conn, $sql)) {
  		echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	$sql = "DELETE FROM BOARD_STATUS WHERE REPORT_DATE < NOW() - INTERVAL 1 DAY";

	if (mysqli_query($conn, $sql)) {
  		echo "Old records deleted successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	

?>
