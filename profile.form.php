<?php 
session_start();

if(!isset($_SESSION['password']) && !isset($_SESSION['password'])){
    header('location: login.form.php');
}
if(isset($_GET['error'])){
    $error = $_GET['error'];
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
    <link rel="stylesheet" href="style.css">
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


        
        <div class="con">
            <div class="col-4">
                <h4>Upload Image</h4>

                <small class="text-danger <?php echo($error == "no-image" ? 'd-block' : 'd-none') ?>">No Image Uploaded!</small>
                <small class="text-danger <?php echo($error == "too-large" ? 'd-block' : 'd-none') ?>">The file was to large</small>
                <small class="text-danger <?php echo($error == "invalid-file" ? 'd-block' : 'd-none') ?>">Invalid file type</small>
                <small class="text-danger <?php echo($error == "failed" ? 'd-block' : 'd-none') ?>">Failed To Upload Image. Please try again.</small>
                
                <form class="mt-5" action="otherFiles/profile.b.php?id=<?php echo $_SESSION['ID']?>" method="post" enctype="multipart/form-data">
                    
                        <input type="file" name="profile">        
                        <div class="form-floating mt-3">
                            <textarea class="form-control" name="about" placeholder="Type your blog contents here..." id="floatingTextarea" style="height: 100px"></textarea>
                            <label for="floatingTextarea">Say something here...</label>
                        </div>                           
                        <div class="my-3">
                        <input class="btn btn-primary" type="submit" value="Save">
                        <a class="btn btn-secondary"  href="profile.php?id=<?php echo $_SESSION['ID'] ?>">Back</a>
                        </div>
                        
                </form>
            </div>
            <div class="img"s>
                <img src="uploads/design.jpg">
            </div>
            </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>