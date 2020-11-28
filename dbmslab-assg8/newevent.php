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

$event_id = $_POST["event_id"];
$event_name = $_POST["event_name"];
$sport_id = $_POST["sport_id"];


$INSERT  = "INSERT INTO event (event_id, event_name, sport_id) VALUES ('$event_id', '$event_name', '$sport_id')";


if (mysqli_query($conn, $INSERT)) {
	echo '<h4> New Event Added </h4>';
    echo '<p> Event ID : '.$event_id.'</p>';
    echo '<p> Event Name : '.$event_name.'</p>';
	echo '<p> Sport ID : '.$sport_id.'</p>';
	
} else {
      echo "Error: " . $INSERT . "<br>" . mysqli_error($conn);
}

$conn->close();

?>