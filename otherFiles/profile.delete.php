<?php

require 'db.inc.php';
$profileId = $_GET['id'];

$sql = "DELETE FROM profile WHERE id='$profileId'";

if($con->query($sql) === TRUE){
    header('location: ../profile.php');
}

?>