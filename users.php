<?php 
session_start();
require 'otherFiles/db.inc.php';

$sql = "SELECT * FROM artist";
$query = mysqli_query($con, $sql);

if(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}

if($_SESSION['role'] != 0){
    header('location: home.php');
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="dashboard.php" class="text-decoration-none text-white mx-4"><?php echo $_SESSION['firstname']; ?></a>
                <div>
                    <a href="otherFiles/logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </nav>

    <div class="d-flex mt-3" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white col-2" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="gallery.php">Gallery</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 active <?php echo($role == 0 ? 'd-lock' : 'd-none') ?>" href="users.php">Users</a>
                </div>
            </div>
            <div class="container-fluid mx-3">
                    <div class="container mt-3">
                        <a href="add.user.php" class="btn btn-primary">New User</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($query->num_rows > 0){
                                while($row = $query->fetch_assoc()){
                            ?> 
                                <tr>
                                    <td><a class="btn btn-primary" href="users.edit.php?id=<?php echo $row['id'] ?>">Edit</a>  <a class="btn btn-danger" href="otherFiles/user.delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                                    <td><?php echo $row['lastname'] ?></td>
                                    <td><?php echo $row['firstname'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><span class="badge <?php echo($row['role'] == 0 ? "bg-danger" : "bg-success") ?>"><?php echo($row['role'] == 0 ? "Admin" : "User") ?></span></td>
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