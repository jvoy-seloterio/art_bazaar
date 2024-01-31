<?php
session_start();
require 'db.inc.php';

 if (isset($_SESSION['ID'])){
     $id = $_SESSION['ID'];
 }
 if (isset($_SESSION['firstname'])){
    $name = $_SESSION['firstname'];
}

    $fname = $name;
    $file = $fname . $_FILES['profile']['name'];
    $temp = $_FILES['profile']['tmp_name'];
    $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    $uploads = '../uploads/' . $file;
    $about = $_POST['about'];
    $ID = $id;


    if(empty($file)){
        header("location: ../profile.form.php?error=no-image");
    }
    elseif($_FILES["profile"]["size"] > 500000) {
        header("location: ../profile.form.php?error=too-large");
    }
    elseif($type != "jpg" && $type != "png" && $type != "jpeg"
    && $type != "gif" ) {
        header("location: ../profile.form.php?error=invalid-file");
    }
    else{
        $sql = "INSERT INTO profile (id, profile, statement, artistId) VALUES ('' , '$file','$about', '$ID')";

        $query = mysqli_query($con, $sql);

        if(move_uploaded_file($temp, $uploads)){
            header("location: ../profile.php?id=$ID status=sucess");
        }else{
            header("location: ../profile.php?error=failed");
        }
    }
    ?>