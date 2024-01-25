<?php

require 'db.inc.php';
$userID = $_GET['id'];

$sql = "DELETE FROM artist WHERE id='$userID'";

if($con->query($sql) === TRUE){
    header('location: ../users.php');
}

?>