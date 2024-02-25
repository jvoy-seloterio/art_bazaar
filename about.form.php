<?php

session_start();
require 'otherFiles/db.inc.php';


$id = $_GET['id'];


$sql = "SELECT * FROM profile WHERE id = '$id'";
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
                <a href="dashboard.php" class="text-decoration-none text-white mx-4"><?php echo $_SESSION['firstname']; ?></a>
                <div>
                    <a href="otherFiles/logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </nav>
        <div class="name col-5">   
            <div class="container-fluid mt-5 mx-3">
                    <div class="col-4 mt-3">
                        <h6>Current Description</h6>
                        <input class="form-control" name="email" type="text" value="<?php echo($user['statement']) ?>">
                    </div>
                    <form action="otherFiles/about.update.php?id=<?php echo($user['id']) ?>" method="post">
                        <h6 class="col-4">New Description</h6>
                            <textarea class="form-control" name="about" placeholder="Say something here..." id="floatingTextarea" style="height: 100px"></textarea>
                        <div class="mt-5">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                <a class="btn btn-secondary" href="profile.php">Back</a>
                        </div>
                    </form>
            </div>
        </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>