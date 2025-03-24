<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function openDatabase() {
    $servername = "localhost";
    $username = "fstein";
    $password = "f5RED7289";
    $dbname = "thebasementsink";

    $conn = new mysqli($servername, $username, $password, $dbname);
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}
}
	
?>
