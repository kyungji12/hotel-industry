<!-- reading database to create employee table -->
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

// pls adjust the account info to yours
$dbServer = "localhost";
$dbUser = "tmpUser";
$dbPass = "finalproject";
$dbName = "finalpr";

$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    echo ("connection error" . $conn->connect_error);
} else {
    $selectQuery = "SELECT id, fname, lname, email, phone_number, address, postal_code, position, salary, Starting_Date FROM employees";

    $data = $conn->query($selectQuery);

    $outData = [];

    if ($data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            array_push($outData, $row);
        }
        echo json_encode($outData);
    }

    $conn->close();
}
