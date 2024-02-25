<?php

require 'db.inc.php';
$profileId = $_GET['id'];
$about = $_POST['about'];

$sql = "UPDATE profile SET statement = '$about' WHERE id='$profileId'";

if($con->query($sql) === TRUE){
    header('location: ../profile.php');
}

?>