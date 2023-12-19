<!-- adding approved employee data to database -->
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

// pls adjust the account info to yours
$dbServer = "localhost";
$dbUser = "tmpUser";
$dbPass = "finalproject";
$dbName = "finalpr";

$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents("php://input"); 
    $data = json_decode($json, true); 

    echo json_encode($data); 

    $insertQuery = $conn->prepare("INSERT INTO employees (fname, lname, email, phone_number, address, postal_code, position, salary, Starting_Date) VALUES(?,?,?,?,?,?,?,?,?)");

    $insertQuery->bind_param("sssisssis",$fname, $lname, $email, $phone_number, $address, $postal_code, $position, $salary, $Starting_Date);

    foreach ($data as $e) {
        $fname = $e['fname'];
        $lname = $e['lname'];
        $email = $e['email'];
        $phone_number = $e['phone_number'];
        $address = $e['address'];
        $postal_code = $e['postal_code'];
        $position = $e['position'];
        $salary = $e['salary'];
        $Starting_Date = $e['Starting_Date'];

        $insertQuery->execute();
    };

    $insertQuery->close();

    $conn->close();
}
