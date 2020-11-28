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

$DELETE = "DELETE FROM event WHERE event_id='$event_id'; ";

if(mysqli_query($conn,$DELETE)) {
    echo '<h4>Event '.$event_id.' Deleted Successfully!</h4> ';

}

else {
    die('Invalid Input! Event ID is non-existent.'. mysqli_error());
}

$conn->close();

?>