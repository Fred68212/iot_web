<?php

    require 'secrets.php';

    $inches = $_GET['inches'];
    $inches = 99;



    $conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO READINGS VALUES (NOW(), '$inches')";
	if (mysqli_query($conn, $sql)) {
  		echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	$sql = "DELETE FROM READINGS WHERE READINGDATE < NOW() - INTERVAL 1 DAY";
	
	if (mysqli_query($conn, $sql)) {
  		echo "Old records deleted successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
	

?>
