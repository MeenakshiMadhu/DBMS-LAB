<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
    <style>
        table,
        td {
            background-color: #f2f2f2;
            /* margin-left: 20px;
            margin-top: 20px; */
            border: black 1px solid;
        }
    </style>
</head>

<body>

    <div class="container">
        <br>
        <h2>
            Search Results:
        </h2>
        <br>


        <table>

            <?php

            $conn = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($conn, "testdb");

            if (isset($_POST["srchroll"])) {

                $rollnumber = $_POST["rollnumber"];

                $SELECT = "SELECT * FROM testreg WHERE rollnumber='$rollnumber' ";
                $result = mysqli_query($conn, $SELECT);

                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td>Name : </td>
                        <td><?php echo $row["studentname"]; ?></td>
                    </tr>
                    <tr>
                        <td>Roll Number : </td>
                        <td><?php echo $row["rollnumber"]; ?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth : </td>
                        <td><?php echo $row["dob"]; ?></td>
                    </tr>
                    <tr>
                        <td>Address : </td>
                        <td><?php echo $row["addr"]; ?></td>
                    </tr>
                    <tr>
                        <td>Mobile number : </td>
                        <td><?php echo $row["mobilenumber"]; ?></td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA1 : </td>
                        <td><?php echo $row["sgpa1"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA2 : </td>
                        <td><?php echo $row["sgpa2"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA3 : </td>
                        <td><?php echo $row["sgpa3"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA4 : </td>
                        <td><?php echo $row["sgpa4"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA5 : </td>
                        <td><?php echo $row["sgpa5"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA6 : </td>
                        <td><?php echo $row["sgpa6"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA7 : </td>
                        <td><?php echo $row["sgpa7"]; ?></td>
                    </tr>
                    <tr>
                        <td>SGPA8 : </td>
                        <td><?php echo $row["sgpa8"]; ?></td>
                    </tr>
                    <tr>
                        <td>CGPA : </td>
                        <td><?php echo $row["cgpa"]; ?></td>
                    </tr>
                    <tr>
                        <td>Hobbies : </td>
                        <td><?php echo $row["hobbies"]; ?></td>
                    </tr>
                    <tr>
                        <td>Hosteller / Day Scholar : </td>
                        <td><?php echo $row["residence"]; ?></td>
                    </tr>
                    <tr>
                        <td>References : </td>
                        <td><?php echo $row["ref"]; ?></td>
                    </tr>
            <?php
                }
            }

            ?>


        </table>



    </div>

</body>

</html>