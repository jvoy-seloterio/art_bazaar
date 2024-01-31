<?php 
session_start();

if(isset($_SESSION['password']) && isset($_SESSION['email'])){
    header('location: home.php');
}

if(isset($_GET['error'])){
    $error = $_GET['error'];
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

    <div class="cons">
        <div class="container col-md-4">
                <div class="col-md-6">
                    <h2>Login Form</h2>
                </div>
                <small class="text-danger <?php echo($error == "Email and Password Required" ? 'd-block' : 'd-none') ?>">Email and Password Required</small>
                <small class="text-danger <?php echo($error == "Incorrect Email or Password" ? 'd-block' : 'd-none') ?>">Incorrect Email or Password</small>

            <form action="otherFiles/login.php" method="post" class="row g-3 mt-3">
                <div class="col-10">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <small class="text-danger <?php echo($error == "email required" ? 'd-block' : 'd-none') ?>">Email Required</small>
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <small class="text-danger <?php echo($error == "password required" ? 'd-block' : 'd-none') ?>">Password Required</small>
                </div>
                <div class="row col-12 mt-3">
                    <div class="col-2">
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    </div>
                    <div class="col-6">
                        <a href="signup.form.php" class="btn btn-primary">Sign up</a>
                    </div>
                    <div class="col-1">
                        <input type="submit" class="btn btn-success" name="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
        <div class="imgs">
            <img src="uploads/design.jpg">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>