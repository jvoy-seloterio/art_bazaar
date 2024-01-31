<?php
session_start();
include "db.inc.php";
    header('location: ../add.user.php?status=Failed to Add User');
if(!isset($_POST['role'])){
    
}

$fName = $_POST['fname'];
$sName = $_POST['lname'];
$address = $_POST['addr'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];



$sql = "INSERT INTO artist (ID, role, firstname, lastname, address, email, password) VALUES (NULL , '$role', '$fName', '$sName', '$address', '$email', '$password')";


if($con->query($sql) === TRUE){
    header('location: ../add.user.php?status=New User Added');
}

?>