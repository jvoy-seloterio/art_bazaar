<?php
require "db.inc.php";

$id = $_GET['id'];
$file = $_FILES['profile']['name'];
$temp = $_FILES['profile']['tmp_name'];
$type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$uploads = '../uploads/' . $file;
$about = $_POST['about'];
$ID = $id;

if(move_uploaded_file($temp, $uploads)){

    $sql = "UPDATE profile SET profile ='$file', statement ='$about' WHERE id ='$id'";
    $query = mysqli_query($con, $sql);
    
    if($query === TRUE){
        header("location: ../profile.php?id=$id");
    }
}

