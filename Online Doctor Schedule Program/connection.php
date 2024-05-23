<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "doctor_schedule_program";
    $host = "http://localhost/PHP_Project/Online%20Doctor%20Schedule%20Program";
    $con = mysqli_connect($server, $user, $password, $db);
    if(!$con){
        die("Not connected");
    }
    else{
        //echo "Database Connected Successfully";
    }

?>