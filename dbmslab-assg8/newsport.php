<?php

$host ="localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ex8";


$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if (!$conn){
    die('Could not connect: ' . $dbName);
    
}
// echo '<p> Connected <p>';

$sport_id = $_POST["sport_id"];
$sport_name = $_POST["sport_name"];


$INSERT  = "INSERT INTO sport (sport_id, sport_name) VALUES ('$sport_id', '$sport_name')";


if (mysqli_query($conn, $INSERT)) {
	echo '<h4> New Sport Added <h4>';
    echo '<p> Sport ID : '.$sport_id.'</p>';
	echo '<p> Sport Name : '.$sport_name.'</p>';
	
} else {
      echo "Error: " . $INSERT . "<br>" . mysqli_error($conn);
}

$conn->close();

?>