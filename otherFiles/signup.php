<?php
session_start();
include "db.inc.php";

$role = "1";

class user{
    public $fName;
    public $sName;
    public $address;
    public $email;
    public $password;
    public $role;

    public function __construct($fName, $sName,$address , $email, $password, $role){
        $this->fName = $fName;
        $this->sName = $sName;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
}
$artist  = new user($_POST['fname'],$_POST['lname'],$_POST['address'], $_POST['email'], $_POST['password'], $role);

$emailChecker = "SELECT * FROM artist WHERE email = '$email'";
$account = mysqli_query($con, $emailChecker);

if(mysqli_num_rows($account) > 0){
    header('location: ../signup.form.php?error=email is already in use.');
    exit();
}
else{
    $sql = "INSERT INTO artist (id, role, firstname, lastname, address, email, password) VALUES (NULL , '$artist->role', '$artist->fName', '$artist->sName', '$artist->address', '$artist->email', '$artist->password')";


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
}

$conn->close();

?>  