<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'dbconnect.php';
    $username = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // check whether this email-id already exists
    $existQuery = "SELECT * FROM `users` WHERE Email = '$email'";
    $result =  mysqli_query($conn, $existQuery);
    $numofexistsrows = mysqli_num_rows($result);
    if($numofexistsrows > 0){
        $showError = "<strong>Error!</strong> Email Already Exists";
    }
    else{
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`User Name`, `Mob. Number`, `Email`, `Password`) VALUES ('$username', '$number', '$email', '$hash');";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "<strong>Error!</strong> passwords do not match";
        }
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
    <title>| CareTracker > Sign-Up Form |</title>

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        .heading {
            color: #0972f3;
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 50px;
            margin-bottom: -45px;
        }

        a {
            text-decoration: none;
        }

        form {
            margin: auto 10%;
            margin-top: 0px;
            padding: 20px;
        }

        .button {
            margin-top: 5%;
            display: flex;
            justify-content: center;
        }

        .form-check {
            margin-left: 20%;
            margin-top: 20px;
        }

        .newbtn {
            margin-top: -90px;
            margin-left: 30%;
            text-decoration: none;
        }

        button a {
            text-decoration: none;
        }

        .form {
            width: 100%;
            margin-top: 60px;
            display: flex;
            flex-direction: row-reverse;
            font-weight: 400;
            margin-bottom: -90px;
        }

        .form-left {
            width: 50%;
        }

        .form-right img {
            width: 75%;
            margin-left: 50px;
            margin-top: 60px;
        }

        .form-right {
            width: 50%;
            height: 90%;
            padding-bottom: 50px;
            border-right: 2px solid rgb(198, 198, 198);
        }

        @media screen and (max-width: 580px) {
            .form {
                flex-direction: column;
                margin-top: 20px;
                width: 100%;
            }

            .newbtn {
                margin-left: 20%;
            }

            .button {
                margin-top: 60px;
            }

            .form-left {
                width: 100%;
            }

            .row {
                display: flex;
                flex-direction: row;
            }

            .form-right {
                display: none;
            }
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
        <strong>Success! </strong>Your account is created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger" role="alert">'.$showError.'</div>';
    }

    ?>

    <div class="heading">
        <h2>Registration Form</h2>
    </div>

    <div class="form">
        <div class="form-left">

            <form action="signup.php" method="POST">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobileNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="number" placeholder="number" name="number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password1" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password1" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password2" name="cpassword" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                            <label class="form-check-label" for="gridCheck1">
                                Terms & Conditions
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 button">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
                <br><br>
                <div class="form-group row">
                    <div class="col-sm-10 button1">
                        <button type="submit" class="btn btn-success newbtn"><a href="login.php"
                                style="color:#ffff; text-decoration:none;">Already Have An
                                Account</a></button>
                    </div>
                </div>

            </form>
        </div>
        <div class="form-right">
            <img src="resource/form.svg" alt="form">
        </div>
    </div>

</body>

</html>