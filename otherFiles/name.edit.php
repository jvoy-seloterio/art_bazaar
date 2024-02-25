<?php
require "db.inc.php";

$id = $_GET['id'];
$name = $_POST['fname'];

$sql = "UPDATE artist SET firstname='$name' WHERE id='$id'";
$query = mysqli_query($con, $sql);
 
if($query === TRUE){
    header("location: ../profile.php?id=$id");
}else{
    header("location: ../name.form.php?id=$id");
}