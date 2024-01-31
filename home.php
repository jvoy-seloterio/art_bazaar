<?php
session_start();
require 'otherFiles/db.inc.php';

if(isset($_SESSION['password']) && isset($_SESSION['email'])){

    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <img src="uploads/Logo.png" width="120" height="60">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white ms-3" href="home.php">Home</a>
                    </li>
                </ul>
            </div>
            <a class="text-light text-decoration-none mx-4 <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>   <a class="text-light text-decoration-none mx-4 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="profile.php">Profile</a>
            <div>
                <a href="otherFiles/logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </nav>
    
    <div>
        <?php
            $upload = "SELECT * from images";
            $files = mysqli_query($con, $upload);
            while($row = mysqli_fetch_assoc($files)){
            ?>
            <img class="rounded-4 ms-3 mt-5" src="uploads/<?php echo $row['image'] ?>" width="auto" height="400">
            <?php } ?>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
elseif(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}
?>

