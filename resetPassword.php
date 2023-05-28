<?php
session_start();
include('dbconnect.php'); //include your database connection file

$showAlert = false;
$showError = false;

if(isset($_POST['reset_password'])){
    //sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    //check if email exists in database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        //hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //update password in database
        $query = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
        mysqli_query($conn, $query);

        $_SESSION['success_msg'] = "Your password has been reset successfully.";
        header("Location: login.php");
        exit();
    } else {
        $showError = "Email not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <link rel="stylesheet" href="design.css">
    <title>| CareTracker > Reset Password |</title>


    <style>
        .form {
            display: flex;
            width: 90%;
            margin: auto;
            margin-top: -3%;
        }

        .form-left {
            width: 60%;
            margin: auto;
        }

        .form-right {
            width: 40%;
            margin: auto;
            margin-top: 15%;
        }

        #img1 {
            width: 90%;
            margin: auto;
            margin-top: -60px;
        }

        .center-footer {
            display: flex;
            justify-content: end;
            margin-top: -40px;
        }
    </style>

</head>

<body>

    <nav>
        <div class="logo">
            <a href="index.html">CareTracker</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="index.html#stat">Statistics</a></li>
            <li><a href="signup.php">Register</a></li>
            <li><a href="index.html#contact">Contact</a></li>
        </ul>
        <div class="hamburger">
            <img src="resource/menu.png" alt="Menu" height="20px">
        </div>
    </nav>
<?php

if($showAlert){
    
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong>you logged-in successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>';
}
if($showError){
    echo '<div class="alert alert-danger" role="alert">'.$showError.'</div>';
}

?>

<!-- HTML code for reset password form -->

<div class="form">
        <div class="form-left my-5 py-5">
            <img id="img1" src="resource/resetpassword.png" alt="forgot password" title="forgot password?">
        </div>
        <div class="form-right">

        <div class="header">
            <h1>Reset Password </h1>
            <br>
        </div>

<form action="resetPassword.php" method="post">
    <div class="form-group row my-5" id="element">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
        </div>
    </div>

    <div class="form-group row my-5" id="element">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="password" placeholder="new password" name="password" required>
        </div>
    </div>

    <div class="center-footer mx-5 px-5">
        <div class="form-group row my-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="reset_password">Reset Password</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</body>
</html>