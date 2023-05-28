<?php
session_start();
include('dbconnect.php');

$showAlert = false;
$showError = false;

if(isset($_POST['username'])){

    //sanitize input
    $email = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);

    //check if email exists in database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        //generate random password
        $new_password = substr(md5(rand()), 0, 8);
        //hash password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        //update password in database
        $query = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
        mysqli_query($conn, $query);

        //send new password to user's email
        $to = $email;
        $subject = 'New CareTracker Password for Your Account';
        $message = 'Your new password is: ' . $new_password;
        $headers = 'From: yourname@example.com' . "\r\n" .
                   'Reply-To: yourname@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        $_SESSION['success_msg'] = "A new password has been sent to your email.";
        header("Location: resetPassword.php");
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
    <title>| CareTracker > Forgot Password |</title>


    <style>
        .form {
            display: flex;
            width: 90%;
            margin: auto;
            margin-top: -3%;
        }

        .form-left {
            width: 55%;
            margin: auto;
        }

        .form-right {
            width: 45%;
            margin: auto;
            margin-top: 13%;
        }

        #img1 {
            width: 80%;
            margin: auto;
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


    <div class="form">
        <div class="form-left my-5 py-5">
            <img id="img1" src="resource/fpassword.png" alt="forgot password" title="forgot password?">
        </div>
        <div class="form-right">
            <div class="heading my-5">
                <h1>Forgot Your Password?</h1>
            </div>

            <div class="form-group row my-3">
                <h6>Enter the email address associated with your
                    account</h6>
            </div>
            <form action="forgetPassword.php" method="post">
                <div class="form-group row my-5" id="element">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" placeholder="email" name="username"
                            required>
                    </div>
                </div>


                <div class="center-footer mx-5 px-5">
                    <div class="form-group row my-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

</html>