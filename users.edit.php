<?php

session_start();
require 'otherFiles/db.inc.php';


$id = $_GET['id'];


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
                <a href="dashboard.php" class="text-decoration-none text-white mx-4"><?php echo $_SESSION['firstname']; ?></a>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 <?php echo($role == 1 ? 'd-block' : 'd-none') ?>" href="gallery.php?id=<?php echo $_SESSION['ID'] ?>">Gallery</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>" href="users.php">Users</a>
                </div>
            </div>
            <div class="container-fluid mt-5 mx-3">
                    <div class="">
                        <div class="card-header">
                            <h4>Update User Role</h4>
                        </div>
                        <div class="col-8 mt-3">
                            <h6>Email</h6>
                            <input class="form-control" name="email" type="email" value="<?php echo($user['email']) ?>">
                        </div>
                        <div class="col-8 mt-3">
                            <h6>Last Name</h6>
                            <input class="form-control" name="email" type="text" value="<?php echo($user['lastname']) ?>">
                        </div>
                        <div class="col-8 mt-3">
                            <h6>First Name</h6>
                            <input class="form-control" name="email" type="text" value="<?php echo($user['firstname']) ?>">
                        </div>


                        <form action="otherFiles/user.role.php?id=<?php echo($user['id']) ?>" method="post" class="mt-5">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="role" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" <?php echo($user['role'] == 0 ? "checked" : "") ?>>
                                <label class="form-check-label" for="inlineRadio2"><span class="badge bg-danger">Admin user</span></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="role" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1" <?php echo($user['role'] == 1 ? "checked" : "") ?>>
                                <label class="form-check-label" for="inlineRadio2"><span class="badge bg-success">Regular user</span></label>
                            </div>
                            <div class="mt-5">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                <a class="btn btn-secondary" href="users.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>

        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>