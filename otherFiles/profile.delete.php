<?php

require 'db.inc.php';
$profileId = $_GET['id'];

$sql = "UPDATE profile SET profile = NULL WHERE id='$profileId'";

if($con->query($sql) === TRUE){
    header('location: ../profile.php');
}

?>