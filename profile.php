<?php 
session_start();

require 'otherFiles/db.inc.php';

if(!isset($_SESSION['password']) && !isset($_SESSION['password'])){
    header('location: login.form.php');
}
if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];

}
if (isset($_SESSION['ID'])){
    $id = $_SESSION['ID'];
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

        
        <div class="d-flex">
                <!-- Sidebar-->
                <div class="border-end bg-white col-2" id="sidebar-wrapper">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>   <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?> active" href="profile.php">Profile</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gallery.php?">Gallery</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?>" href="users.php">Users</a>
                    </div>
                </div>
                <div class="m-5">
                    <?php
                        $upload = "SELECT * from profile";
                        $files = mysqli_query($con, $upload);
                        if(mysqli_num_rows($files) === 1){
                            $row = mysqli_fetch_assoc($files);
                            $profile = $row['profile'];
                            $artistID = $row['artistId'];
                            $about = $row['statement'];
                            $_SESSION['imgID'] = $row['id'];
                        }
                    ?>
                        <img src="<?php echo($id == $artistID ? "uploads/$profile" : "uploads/profile.jpg") ?>" width="300px" height="300px">
                    </div>
    
                    <div class="col-5 mt-5">
                        <h5>About Me</h5>
                        <div class="card p-3 mt-4 mb-4">
                            <p><?php echo($id == $artistID ? "$about" : "Say something here...") ?></p>
                        </div>
                        <a class="btn btn-primary" href="profile.form.php?id<?php echo $_SESSION['ID']?>">Upload</a>
                        <a class="btn btn-primary ms-3" href="profile.update.php?id<?php echo $_SESSION['imgID']?>">Change</a>
                </div>
        </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>