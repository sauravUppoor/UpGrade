<?php

include "config.php";

// Connect to MySQL DataBase
$con = mysqli_connect($server, $user);

// Checking connection
if($con == false) {
    die("Error: " . $con->connect_error);
}

// Create database assessment_app
$sql = "CREATE DATABASE IF NOT EXISTS assessment_app;";
if(mysqli_query($con, $sql)) {
    echo "assessment_app created successfully!";
}
else {
    echo "Error creatng database: " . mysqli_error($con);
}

echo "<br />";

// Using assessment_app database
$sql = "USE assessment_app;";
if(mysqli_query($con, $sql)) {
    echo "Database changed successfully!";
}
else {
    echo "Error changing table: " .mysqli_error($con);
}

echo "<br />";

/********************** 
* TABLES 
***********************/

// Teacher
$sql = "CREATE TABLE IF NOT EXISTS teacher (
        teacher_id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(40) NOT NULL,
        full_name VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        cpassword VARCHAR(255) NOT NULL,
        contact_no VARCHAR(255) NOT NULL,
        PRIMARY KEY (teacher_id),
        UNIQUE (email)
        );";
if(mysqli_query($con, $sql)) {
    echo "Teacher table created successfully!";
}
else {
    echo "Error creating table Teacher: " .mysqli_error($con);
}

echo "<br>";

// Test
$sql = "CREATE TABLE IF NOT EXISTS test (
        test_id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        created_by INT NOT NULL,
        total_marks INT NOT NULL,
        PRIMARY KEY (test_id)
        );";
if(mysqli_query($con, $sql)) {
    echo "Test table created successfully!";
}
else {
    echo "Error creating table Test: " .mysqli_error($con);
}

echo "<br>";

// Question
$sql = "CREATE TABLE IF NOT EXISTS question (
        question_id INT NOT NULL AUTO_INCREMENT,
        test_id INT NOT NULL,
        marks INT NOT NULL,
        question_no INT NOT NULL,
        statement VARCHAR(255) NOT NULL,
        choice_a VARCHAR(255) NOT NULL,
        choice_b VARCHAR(255) NOT NULL,
        choice_c VARCHAR(255),
        choice_d VARCHAR(255),
        correct_choice INT NOT NULL,
        PRIMARY KEY (question_id),
        FOREIGN KEY (test_id) REFERENCES test(test_id)
        );";
if(mysqli_query($con, $sql)) {
    echo "Question table created successfully!";
}
else {
    echo "Error creating table Question: " .mysqli_error($con);
}

echo "<br>";

//Student
$sql = "CREATE TABLE IF NOT EXISTS student (
    student_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(40) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    cpassword VARCHAR(255) NOT NULL,
    contact_no VARCHAR(255) NOT NULL,
    PRIMARY KEY (student_id),
    UNIQUE (email)
    );";
if(mysqli_query($con, $sql)) {
    echo "Student table created successfully!";
}
else {
    echo "Error creating table Student: " .mysqli_error($con);
}

echo "<br>";


// Add more tables here

?>