<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include("./databaseInfo.php");

$connection = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && isset($data->newStatus)) {
    $id = $data->id;
    $newStatus = $data->newStatus;

    $query = "UPDATE rooms SET status = '$newStatus' WHERE rid = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result == true) {
        echo "database updated";
    } else {
        echo "error with the database update";
    }

}
$connection->close();

?>