<?php 
session_start();

require 'otherFiles/db.inc.php';
$sql = "SELECT * FROM artist";
$query = mysqli_query($con, $sql);

$images = "SELECT * FROM images";
$Query = mysqli_query($con, $images);


if(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}

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
                <a href="dashboard.php" class="text-decoration-none text-white mx-4"><?php echo($role == 0 ? 'Dashboard' : $_SESSION['firstname']); ?></a>
                <div>
                    <a href="otherFiles/logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </nav>

<div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white col-2" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>   <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="gallery.php?id=<?php echo $_SESSION['ID'] ?>">Gallery</a>  <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="artist.gallery.php">Artist Gallery</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?>" href="users.php">Users</a>
                </div>
            </div>
            <div class="container-fluid mx-3">
                    <div class="container mt-3">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($Query->num_rows > 0){
                                    while($art = $Query->fetch_assoc()){
                                    $artistId = $art['artistId'];
                                    $artistSql = "SELECT firstname, lastname from artist where id='$artistId'";
                                    $artist = $con->query($artistSql);
                                    $artistName = $artist->fetch_assoc();
                            ?> 
                                <tr>
                                    <td width="10%"><img src="uploads/<?php echo $art['image'] ?>" alt="" width="100%"></td>
                                    <td><?php echo $art['title'] ?></td>
                                    <td><?php echo $artistName['firstname'] ?></td>
                                    <td><?php echo $artistName['lastname'] ?></td>
                                    <td><a class="btn btn-danger" href="otherFiles/delete.img.php?id=<?php echo $art['id'] ?>">Delete</a></td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>