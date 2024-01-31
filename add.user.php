<?php

session_start();
$role = $_SESSION['role'];

if($_SESSION['role'] != 0){
    header('location: home.php');
}

if(isset($_GET['status'])){
    $status = $_GET['status'];
}

?>

<!-- dli pa mo gana kungadmin sija inag register -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit User</title>
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
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="gallery.php?id=<?php echo $_SESSION['ID'] ?>">Gallery</a>  <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="artist.gallery.php">Artist Gallery</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>" href="users.php">Users</a>
                    </div>
                </div>

                <!-- Page content-->
                <div class="container-fluid mt-5 mx-3">
                    <div class="">
                        <div class="card-header">
                            <h4>New User Form</h4>
                        </div>
                        <strong class="text-primary <?php echo($status == "New User Added" ? 'd-block' : 'd-none'); ?>">New User Added!</strong>
                        <strong class="text-danger <?php echo($status == "Failed to Add User" ? 'd-block' : 'd-none'); ?>">Failed to Add User</strong>
                        <form class="mt-5" action="otherFiles/add.php" method="post">
                            <div class="col-10 m-3">
                                <input type="text" class="col-6" name="fname" placeholder="Firstname">
                            </div>
                            <div class="col-10 m-3">
                                <input type="text" class="col-6" name="lname" placeholder="Lastname">
                            </div>
                            <div class="col-10 m-3">
                                <input type="text" class="col-6" name="addr" placeholder="Address">
                            </div>
                            <div class="col-10 m-3">
                                <input type="email" class="col-6" name="email" placeholder="Email">
                            </div>
                            <div class="col-10 m-3">
                                <input type="password" class="col-6" name="password" placeholder="Password">
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" name="role" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0">
                                <label class="form-check-label" for="inlineRadio1"><span class="badge bg-danger">Admin User</span></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="role" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                                <label class="form-check-label" for="inlineRadio2"><span class="badge bg-success">Regular user</span></label>
                            </div>
                            <div class="mt-5">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                <a class="btn btn-secondary" href="users.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>



        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>