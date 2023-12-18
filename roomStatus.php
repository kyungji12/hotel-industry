<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include("./roomClass.php");

session_start();

$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASSWORD = "";
$DATABASE_NAME = "finalpr";
$connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);

function query($connection, $prop){
    return mysqli_query($connection, $prop);        //do the query
}

function getData(){   
    return "SELECT * FROM rooms";           //sql query
}

$roomData = query($connection, getData());      //get the room data 

while ($row = mysqli_fetch_assoc($roomData)) {  //while to iterate in each row and convert resultset SQL to an Array(associate Array)
    $room = new Room(
        $row["id"],             //get the id from the rows
        $row["type"],           //"" type ""
        $row["availability"],    //"" availability ""
        $row["status"],         //"" status ""
        $row["details"],     //"" details ""
    );

    $rooms[] = $room;       //save on an array each room
}   
echo json_encode($rooms);           //cast to JSON
?>