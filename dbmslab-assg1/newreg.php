<?php

$name = $_POST["studentname"];
$rollnumber = $_POST["rollnumber"];
$dob = $_POST["dob"];
$address = $_POST["address"];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST["email"];
$sgpa1 = $_POST["sgpa1"];
$sgpa2 = $_POST["sgpa2"];
$sgpa3 = $_POST["sgpa3"];
$sgpa4 = $_POST["sgpa4"];
$sgpa5 = $_POST["sgpa5"];
$sgpa6 = $_POST["sgpa6"];
$sgpa7 = $_POST["sgpa7"];
$sgpa8 = $_POST["sgpa8"];
$cgpa = $_POST["cgpa"];
// $cgpa = ($sgpa1+$sgpa2+$sgpa3+$sgpa4+$sgpa5+$sgpa6+$sgpa7+$sgpa8)/8;
$hobbies = $_POST["hobbies"];
$residence = $_POST['residence'];
$ref = $_POST['ref'];

if (!empty($name) || !empty($rollnumber) || !empty($dob) || !empty($address) || !empty($mobilenumber) || !empty($email) || !empty($cgpa) || !empty($hobbies) || !empty($residence)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "testdb";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {

        $SELECT = "SELECT rollnumber FROM testreg WHERE rollnumber = ? LIMIT 1";
        $INSERT = "INSERT INTO testreg (studentname, rollnumber, dob, addr,mobilenumber, email, cgpa,sgpa1, sgpa2, sgpa3, sgpa4, sgpa5, sgpa6, sgpa7, sgpa8, hobbies, residence, ref) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $rollnumber);
        $stmt->execute();
        $stmt->bind_result($rollnumber);
        $stmt->store_result();
        $rnum = $stmt->num_rows();

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssisdddddddddsss", $name, $rollnumber, $dob, $address, $mobilenumber, $email, $sgpa1, $sgpa2, $sgpa3, $sgpa4, $sgpa5, $sgpa6, $sgpa7, $sgpa8, $cgpa, $hobbies, $residence, $ref);
            $stmt->execute();

            // $stmt = mysqli_query($conn, "INSERT INTO testreg (studentname, rollnumber, dob, addr, mobilenumber, email, cgpa, hobbies, residence) values($name, $rollnumber, $dob, $address, $mobilenumber, $email, $cgpa, $hobbies, $residence)");

            echo "New Record inserted successfully!";
        } else {
            echo "Rollnumber already existing!";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
