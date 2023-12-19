<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'databaseInfo.php';
// echo $dbServer;

session_start();


if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    //credentials to db access
    // $DATABASE_HOST = "localhost";
    // $DATABASE_USER = "root";
    // $DATABASE_PASSWORD = "";
    // $DATABASE_NAME = "hotel";

    //connection to db
    $connection = mysqli_connect($dbServer,$dbUser,$dbPass,$dbName);

    //Check connection
    if(!$connection){
        echo json_encode(array('error' => 'Connection Error'));    }else{
        //query
        $sql = "SELECT * FROM employees WHERE email='".$email."' AND password='".$password."' ";
        $sqlPos = "SELECT position FROM employees WHERE email='".$email."' AND password='".$password."' ";
        $query = mysqli_query($connection,$sql);
        $position = mysqli_fetch_row(mysqli_query($connection,$sqlPos));

        //check query
        if(!$query){
            echo json_encode(array('error' => mysqli_error($connection)));
        }else{
            if(mysqli_num_rows($query)>0){
                echo json_encode(array('message' => 'Logged in','email'=>$email, 'position'=>$position[0]));
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
