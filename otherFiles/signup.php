<?php
session_start();
include "db.inc.php";

$fName = $_POST['fname'];
$sName = $_POST['lname'];
$address = $_POST['addr'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = "1";



$sql = "INSERT INTO artist (id, role, firstname, lastname, address, email, password) VALUES (NULL , $role, '$fName', '$sName', '$address', '$email', '$password')";


if ($con->query($sql) === TRUE) {
    $sql = "SELECT * FROM artist WHERE email='$email' && password='$password'";
    $login = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($login) === 1){
        $row = mysqli_fetch_assoc($login);

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
    header("Location: ../signup.form.php?error=sign-up-failed");
}
}

$conn->close();

?>  