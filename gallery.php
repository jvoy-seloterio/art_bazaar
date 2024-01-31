<?php 
session_start();

require 'otherFiles/db.inc.php';

if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
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

    <div class="d-flex col-12">
            <!-- Sidebar-->
            <div class="border-end bg-white col-2" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>   <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="gallery.php?id=<?php echo $_SESSION['ID'] ?>">Gallery</a>  <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="artist.gallery.php">Artist Gallery</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?>" href="users.php">Users</a>
                </div>
            </div>
            <div class="m-5">
                <h4 class="col-8">My Gallery</h4>
                <div class="d-flex">
                    <div class="mt-5">
                        <a class="text-decoration-none" href="gallery.form.php">
                            <img class="ms-2" src="uploads/add.jpg" width="150" height="150">
                            <p class="ms-5 text-black ">Add Image</p>
                        </a>
                    </div>
                    <div class="ms-5">
                    <?php
                        $upload = "SELECT * from images";
                        $files = mysqli_query($con, $upload);
                        while($row = mysqli_fetch_assoc($files)){
                            if($id == $row['artistId']){  ?>
                                <img class="rounded-4 ms-2 mt-5" src="uploads/<?php echo $row['image'] ?>" width="auto" height="250">                            
                                <?php echo $row['title'] ?>
                                <a class="text-decoration-none text-black" href="otherFiles/image.delete.php?id=<?php echo $row['id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </a>
                        <?php  }
                        } ?>
                    </div>
                </div>
            </div>            
    </div>                  
    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>