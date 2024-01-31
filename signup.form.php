<?php 
session_start();

if(isset($_SESSION['password']) && isset($_SESSION['email'])){
    header('location: home.php');
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
    
    <div class="con">
        <div class="me-5">
                <div class="col-md-6">
                    <h2>Sign Up Form</h2>
                </div>

            <form action="otherFiles/signup.php" method="post" class="row g-3 mt-3 me-5">
                <div class="col-10">
                    <input type="text" class="form-control" name="fname" placeholder="Firstname">
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="lname" placeholder="Lastname">
                </div>
                <div class="col-10">
                    <input type="text" class="form-control" name="addr" placeholder="Address">
                </div>
                <div class="col-10">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="col-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="row col-12 mt-3">
                    <div class="col-2">
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    </div>
                    <div class="col-6">
                        <a href="login.form.php" class="btn btn-success">Login</a>
                    </div>
                    <div class="col-1">
                        <input type="submit" class="btn btn-primary" name="submit" value="Sign up">
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