<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'databaseInfo.php';


$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbName);
// $roomId = 1002;
//     $startDate = 2023-12-18;
//     $selectQuery = "INSERT INTO `availability`(`did`, `rid`) VALUES ($startDate,$roomId);";
//     $conn->query($selectQuery);


    

if($_SERVER["REQUEST_METHOD"] == 'POST') {
  if($conn -> connect_error) {
    echo('connection error'. $conn -> connect_error);
  } else {
    // $roomId = $_POST['roomId'];
    $roomId = 1002;
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    switch($_POST['request']) {
      case 'read':
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
        break;
      case 'booking':
        // reserve dates
        $selectQuery = "INSERT INTO `availability`(`did`, `rid`) VALUES ($startDate,$roomId);";
        break;
        // cancel dates 
        case 'cancellation':
          break;
          
        }
        $conn->close();
  }
}
?>