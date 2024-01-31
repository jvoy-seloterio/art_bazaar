<?php
session_start();
require 'db.inc.php';

 if (isset($_SESSION['ID'])){
     $id = $_SESSION['ID'];
 }
 if (isset($_SESSION['firstname'])){
    $name = $_SESSION['firstname'];
}


        $title = $_POST['art'];
        $fname = $name;
        $file = $fname . $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        $uploads = '../uploads/' . $file;
        $ID = $id;

        if($_FILES["image"]["size"] > 500000) {
            header("location: ../gallery.form.php?error=too-large");
        }
        elseif($type != "jpg" && $type != "png" && $type != "jpeg"
        && $type != "gif" ) {
            header("location: ../gallery.form.php?error=invalid-file");
        }
        else{
            $sql = "INSERT INTO images (id, image, title, artistId) VALUES ('' , '$file','$title', '$ID')";

            $query = mysqli_query($con, $sql);

            if(move_uploaded_file($temp, $uploads)){
                header("location: ../gallery.php?id=$ID status=sucess");
            }else{
                header("location: ../gallery.php?error=failed");
            }
        }
        ?>