<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'databaseInfo.php';


$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if($conn -> connect_error) {
    echo('connection error'. $conn -> connect_error);
  } else {
    
    // $roomId = $_POST['roomId'];
    $roomId = 1002;
    $selectQuery = "SELECT occupied, did FROM `availability` WHERE rid = $roomId";
    $data = $conn->query($selectQuery);
    
    $outData = [];
    
    // return dates 
    if ($data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            array_push($outData, $row);
        }
        echo json_encode($outData);
    } else {
      http_response_code(404);
    }
  
    $conn->close();
  }
} else if($_SERVER["REQUEST_METHOD"] == 'POST') {
  if($conn -> connect_error) {
    echo('connection error'. $conn -> connect_error);
  } else {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    switch($_POST['request']) {
      case 'booking':
        // reserve dates
        break;
        // cancel dates 
        case 'cancellation':
          break;
          
        }
        $conn->close();
  }


}
?>