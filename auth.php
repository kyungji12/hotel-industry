<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

session_start();

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    //credentials to db access
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASSWORD = "";
    $DATABASE_NAME = "finalpr";

    //connection to db
    $connection = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASSWORD,$DATABASE_NAME);

    //Check connection
    if(!$connection){
        echo json_encode(array('error' => 'Connection Error'));    }else{
        //query
        $sql = "SELECT * FROM employees WHERE email='".$email."' AND password='".$password."' ";
        $query = mysqli_query($connection,$sql);

        //check query
        if(!$query){
            echo json_encode(array('error' => mysqli_error($connection)));
        }else{
            if(mysqli_num_rows($query)>0){
                echo json_encode(array('message' => 'Logged in'));
            }else{
                echo json_encode(array('error' => 'Wrong email or password'));
            }
        }
    }

    mysqli_close($connection);
}else{
    echo json_encode(array('error' => 'Error in POST METHOD'));
}
?>