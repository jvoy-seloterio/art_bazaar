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

$sql = "SELECT * FROM artist WHERE id = '$id'";
$query = mysqli_query($con, $sql);

$user = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
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
                    <div class="cont m-5">
                        <?php
                            $upload = "SELECT * from profile WHERE artistID = '$id'";
                            $files = mysqli_query($con, $upload);
                            if(mysqli_num_rows($files) > 0){
                                $row = mysqli_fetch_assoc($files);
                                $profile = $row['profile'];
                                $artistID = $row['artistId'];
                                $_SESSION['imgID'] = $row['id'];
                                $about = $row['statement'];

                                if($profile < 1){?>
                                    <img src="uploads/profile.jpg" width="200px" height="200px">
                                <?php }
                                else{ ?>
                                    <img src="<?php echo("uploads/$profile") ?>" width="200px" height="200px">
                                    <a class="text-decoration-none text-primary" href="otherFiles/profile.delete.php?id=<?php echo $_SESSION['imgID'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    </a>
                                <?php
                                }
                            }
                                if(mysqli_num_rows($files) == 0){ ?>
                                    <img src="uploads/profile.jpg" width="200px" height="200px">
                                <?php } ?>

                    </div>

                    <div class="col-5 mt-5">
                            <div class="head">
                                <div class="name">
                                    <a href="name.form.php?id=<?php echo($id) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    </a>
                                    <h3 class="me-5">Hi! I'm <?php echo($user['firstname']) ?></h3>
                                </div>
                                <a class="text-decoration-none <?php echo(mysqli_num_rows($files) == 0 ? 'd-block' : 'd-none') ?>" href="profile.form.php?id=<?php echo $_SESSION['ID']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                                    Upload
                                </a>
                                <a class="text-decoration-none <?php echo(mysqli_num_rows($files) > 0 ? 'd-block' : 'd-none') ?>" href="profile.update.php?id=<?php echo $_SESSION['imgID']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    Edit Profile
                                </a>
                            </div>
                            <div class="aboutCon p-3 mt-5 mb-4">
                                <?php
                                    if(mysqli_num_rows($files) > 0){ 
                                        if($about < 1){?>
                                            <p>Describe yourself here...</p>
                                        <?php }
                                        else{ ?> 
                                            <div class="about">
                                                <p><?php echo($about) ?></p>
                                                <div class="svgs">
                                                    <a class="text-decoration-none" href="about.form.php?id=<?php echo $_SESSION['imgID'] ?>">
                                                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                    <a href="otherFiles/about.delete.php?id=<?php echo $_SESSION['imgID'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    </a>
                                                </div>    
                                            </div>
                                        <?php } 
                                    } ?>
                                    <?php
                                    if(mysqli_num_rows($files) == 0){ ?>
                                        <p>Describe yourself here...</p>
                                <?php } ?>
                            </div>
                    </div>
        </div>
        <div class="border1"></div>
        <div class="uploads">
            <div>Recent Uploads</div>
            <div class="output ms-5 col-10">
                <?php
                    $upload = "SELECT * from images";
                    $files = mysqli_query($con, $upload);
                    while($row = mysqli_fetch_assoc($files)){
                        if($id == $row['artistId']){  ?>
                        <div class="art">
                            <img class="rounded-4 ms-2 mt-5" src="uploads/<?php echo $row['image'] ?>" width="auto" height="250">                            
                            <?php echo $row['title'] ?>
                        </div>
                <?php  }
                    } ?>
            </div>
        </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>