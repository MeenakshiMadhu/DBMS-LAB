<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Event Details</title>
    <style>
        table,
        td {
            background-color: #f2f2f2;
            border: black 1px solid;
            padding: 5px;
            padding-right: 7px;
        }
    </style>
</head>

<body>

    <div class="container">
        <br><br>
        <h2>Event Details:</h2>
        <br>
        <table>
            <?php

            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "ex8";


            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if (!$conn) {
                die('Could not connect: ' . $dbName);
            }
            // echo '<p> Connected <p>';

            $event_id = $_POST["event_id"];

            $SELECT = "SELECT * FROM event WHERE event_id='$event_id'; ";

            $result = mysqli_query($conn, $SELECT);
            $numrows = mysqli_num_rows($result);

            if ($numrows) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td>Event ID: </td>
                        <td><?php echo $row['event_id']; ?> </td>
                    </tr>
                    <tr>
                        <td>Event Name: </td>
                        <td><?php echo $row['event_name']; ?> </td>
                    </tr>
                    <tr>
                        <td>Sport ID: </td>
                        <td><?php echo $row['sport_id']; ?> </td>
                    </tr>
            <?php
                }
            } else {
                die('Invalid Input! Event ID is non-existent.');
            }

            $conn->close();

            ?>
        </table>
    </div>

</body>

</html>