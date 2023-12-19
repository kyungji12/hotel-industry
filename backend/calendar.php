<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'databaseInfo.php';

function dateCalculator($sDate, $eDate) {
  // convert string into Date object
  $sDate = strtotime($sDate);
  $eDate = strtotime($eDate);
  
  $sArray = getDate($sDate);
  $eArray = getDate($eDate);

  // get month and day from Date object
  $sMonth = $sArray["mon"];
  $sDay = $sArray["mday"];
  $eMonth = $eArray["mon"];
  $eDay = $eArray["mday"];
  
  $response = [];

  // if start month and end month is same, calculate the date difference only
  if ($sMonth == $eMonth) {
    for($i = $sDay; $i < $eDay; $i++) {
      array_push($response, $sArray["year"]."-".$sMonth."-".$i);
    }
  } else {
  // calculate the month difference too
      for($i = $sDay; $i < 32; $i++) {
        array_push($response, $sArray["year"]."-".$sMonth."-".$i);
      }
      for($i = 1; $i < $eDay; $i++) {
        array_push($response, $eArray["year"]."-".$eMonth."-".$i);
      }
  }
  return $response;

}

$conn = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

if($_SERVER["REQUEST_METHOD"] == 'POST') {
  if($conn -> connect_error) {
    echo('connection error'. $conn -> connect_error);
  } else {
    $roomId = $_POST['roomId'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $flag = false;
    $dateArr = dateCalculator($startDate, $endDate);
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
        foreach($dateArr as $date) {
          $selectQuery = "INSERT INTO availability (did, rid) VALUES ('$date', $roomId);";
          $data = $conn->query($selectQuery);
          $flag = true;
        }

        if ($flag) {
          http_response_code(200);
        } else {
          http_response_code(400);
        }
        break;
        // cancel dates 
        case 'cancellation':
          foreach($dateArr as $date) {
            $selectQuery = "DELETE FROM availability WHERE did = '$date' AND rid = $roomId;";
            $data = $conn->query($selectQuery);
          }
          if ($flag) {
            http_response_code(200);
          } else {
            http_response_code(400);
          }
          break;
          
        }
        $conn->close();
  }
}
?>