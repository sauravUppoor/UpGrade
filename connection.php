<?php

// Include config.php
include "config.php";

// Connect to MySQL DataBase
$con = mysqli_connect($server, $user);

// Checking connection
if($con == false) {
    die("Error: " . $con->connect_error);
}

// Using assessment_app database
$sql = "USE assessment_app;";
mysqli_query($con, $sql);

?>