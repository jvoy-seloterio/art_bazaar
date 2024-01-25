<?php
session_start();


if(isset($_SESSION['password']) && isset($_SESSION['email'])){
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
            <a href="dashboard.php" class="text-decoration-none text-white mx-3"><?php echo $_SESSION['firstname']; ?></a>
            <div>
                <a href="otherFiles/logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </nav>


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
elseif(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.form.php');
}
?>

