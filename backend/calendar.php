<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$dbServer = "localhost";
$dbUser = "tmpUser";
$dbPass = "finalproject";
$dbName = "hotel";

$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // return dates > today +30 > ['2023-12-16': true, '2023-12-17': false]
  if($conn -> connect_error) {
    echo('connection error'. $conn -> connect_error);
  } else {
    
    $roomId = $_POST['roomId'];
    $selectQuery = "SELECT occupied, did FROM `availability` WHERE rid = $roomId";
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
} else if($_SERVER["REQUEST_METHOD"] == 'POST') {
  switch($_POST['request']) {
    // reserve dates
    case 'booking':
      break;
    // cancel dates 
    case 'cancellation':
      break;
  }
}
?>