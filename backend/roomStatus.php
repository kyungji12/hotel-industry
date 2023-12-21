<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include("./roomClass.php");


session_start();
include("./databaseInfo.php");

// $DATABASE_HOST = "localhost";
// $DATABASE_USER = "root";
// $DATABASE_PASSWORD = "";
// $DATABASE_NAME = "finalpr";
$connection = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

function query($connection, $prop){
    return mysqli_query($connection, $prop);        //do the query
}

function getData(){   
    return "SELECT * FROM rooms";           //sql query
}

// function getAvailabiliyty(){
//     return "SELECT a.occupied FROM availability a, rooms r WHERE a.rid = r.rid";
// }

$roomData = query($connection, getData());      //get the room data 

while ($row = mysqli_fetch_assoc($roomData)) {  //while to iterate in each row and convert resultset SQL to an Array(associate Array)
    $room = new Room(
        $row["rid"],             //get the id from the rows
        $row["room_type"],           //"" type ""
        $row["status"],         //"" status ""
        $row["details"],     //"" details ""
    );

    // $rooms[] = $room;       //save on an array each room

    $rooms[] = array_map('strval', array_values((array) $room));
}   
echo json_encode($rooms);           //cast to JSON
?>
