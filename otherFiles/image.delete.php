<?php

require 'db.inc.php';
$userID = $_GET['id'];

$sql = "DELETE FROM images WHERE id='$userID'";

if($con->query($sql) === TRUE){
    header('location: ../gallery.php');
}

?>