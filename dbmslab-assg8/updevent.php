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
$sport_id = $_POST["sport_id"];
$event_name = $_POST["event_name"];

$UPDATE = "UPDATE event SET event_name = '$event_name', sport_id = '$sport_id' WHERE event_id='$event_id'; ";

if(mysqli_query($conn,$UPDATE)) {
    echo '<h4>Event Updated Successfully!</h4> ';
    echo '<h4>Updated details:</h4> ';
    echo '<p>Event ID:'. $event_id. '</p> ';
    echo '<p>Event Name:'. $event_name. '</p> ';
    echo '<p>Sport ID:'. $sport_id. '</p> ';

}

else {
    die('Invalid Input! Either Event ID or Sport ID is non-existent.');
}

$conn->close();

?>