<?php
    //Defining the Server
    $server="localhost";
    //Defining the Username
    $username = "root";
    //Defining the Password
    $password = "abc123";
    //Defining the Database
    $database = "sample";

    $con = new mysqli($server,$username,$password,$database);

    if($con->connect_error===true){
        die("Connection Failed".$con->connect_error);
    }
?>