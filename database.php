<?php
    // Database connection configuration
    $server = "localhost";
    $username = "root";
    $password = "abc123";

    // Create connection
    $con = new mysqli($server, $username, $password);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS users";
    $con->query($sql);
    
    // Select the database
    $con->select_db("users");

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Fname VARCHAR(50) NOT NULL,
        Lname VARCHAR(50) NOT NULL,
        Age INT(3),
        Gender VARCHAR(10),
        Email VARCHAR(100) UNIQUE,
        ContactNo VARCHAR(15),
        Username VARCHAR(50) UNIQUE,
        Password VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $con->query($sql);
?>
