<?php
require "db.inc.php";

$id = $_GET['id'];
$role = $_POST['role'];

$sql = "UPDATE artist SET role='$role' WHERE id='$id'";
$query = mysqli_query($con, $sql);
 

if($query === TRUE){
    header("location: ../users.php?id=$id");
}else{
    header("location: ../users.edit.php?id=$id");
}

