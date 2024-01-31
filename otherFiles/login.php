<?php
session_start();
require 'db.inc.php';


if (isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) && empty($password)){
        header('location: ../login.form.php?error=Email and Password Required');
    }elseif(empty($email)){
        header('location: ../login.form.php?error=email required');
    }elseif(empty($password)){
        header('location: ../login.form.php?error=password required');
    }else{
        $sql = "SELECT * FROM artist WHERE email = '$email' && password = '$password'";
        $query = mysqli_query($con, $sql);



        if(mysqli_num_rows($query) === 1){
            $row = mysqli_fetch_assoc($query);

            if($row['email'] == $email && $row['password'] == $password){
                $_SESSION['email'] = $row['email'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['ID'] = $row['id'];
                header('location: ../home.php');
                exit();
            }
        }else{
            header('location: ../login.form.php?error=Incorrect Email or Password');
        }
    }

}

?>