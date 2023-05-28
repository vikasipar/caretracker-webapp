<?php

// start the session
session_start();

// check if the user is logged in
if (!isset($_SESSION['pid'])) {
    // if not, redirect to login page
    header('Location: login.php');
    exit;
}

include 'dbconnect.php';
$pid = $_SESSION['pid'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $school = $_POST['school'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    session_start();
    $_SESSION['childname'] = $name;
    $_SESSION['childgender'] = $gender;

    $sql = "INSERT INTO `children` (`Parent Id`, `Name`, `Gender`, `School`, `City`, `State`) VALUES ('$pid', '$name', '$gender', '$school', '$city', '$state')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:dashboard.php');
    }
    else{
        die("Error : ". mysqli_connect_error());
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <link rel="stylesheet" href="design.css">
    <title>| CareTracker > Child Registration Form |</title>

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }
        .nav-links{
            align-items: center;
        }
        .form {
            width: 100%;
            display: flex;
        }
        .form-left {
            width: 35%;
            margin: auto;
            padding: 90px 0px;
            margin-right: 0px;
            justify-content: center;
            border-right: 2px solid #b1b1b1;
        }
        .form-left img {
            width: 75%;
        }

        .form-right {
            width: 55%;
            margin: auto;
            margin-left: -20px;
            display: flex;
            justify-content: center;
        }

        .heading {
            display: flex;
            justify-content: center;
            color: #0972f3;
        }

        form {
            margin: 5% 20%;
            padding: 20px;
            font-weight: 500;
        }

        button {
            margin: 5% 48%;
        }
        #dashbrd{
            margin: 0px;
        }
        #mob-dashbrd{
            display: none;
        }

        @media screen and (max-width:580px) {
            .form {
                width: 90%;
            }

            .form-left {
                display: none;
            }

            .form-right {
                width: 95%;
                margin: auto;
                margin-top: 10px;
            }

            .heading h2 {
                font-size: 1.5rem;
            }

            form {
                width: 90%;
                margin: auto;
                margin: 2% auto;
                padding: 5px;
            }
            .bottom{
                display: flex;
                flex-direction: column;
                text-align: center;
            }
            button {
                margin: auto;
            }
            #mob-dashbrd{
                display: block;
                margin: 20px auto;
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
            <li><a href="#about">About</a></li>
            <li><a href="#stat">Statistics</a></li>
            <li><a href="#contact">Contact</a></li>
            <li> <a href="dashboard.php"><button type="submit" id="dashbrd" class="btn btn-primary">Back To Dashboard</button></a></li>
            
        </ul>
        <div class="hamburger">
            <img src="resource/menu.png" alt="Menu" height="20px">
        </div>
    </nav>

    <div class="form">
        <div class="form-left">
            <img src="resource/child.svg" alt="kid">
        </div>
        <div class="form-right">
            <form method="post" action="addchild.php">
                <div class="heading">
                    <h2>Add Child's Information</h2>
                </div><br><br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Child's Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="gender">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="gender">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <label for="school" class="col-sm-2 col-form-label">Child's School</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="school" placeholder="school" name="school" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <input type="city" class="form-control" id="city" placeholder="city" name="city" required>
                    </div>
                </div>
        
                <div class="form-group row">
                <label for="state" class="col-sm-2 col-form-label">State</label>
                <select class="form-select" name="state" aria-label="Default select example">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Andaman and Nicobar">Andaman and Nicobar</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Ladakh">Ladakh</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                </select>
                </div>

                <div class="form-group row bottom">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Add Child</button>
                    </div>
                    <a href="dashboard.php"><button type="submit" id="mob-dashbrd" class="btn btn-primary">Back To Dashboard</button></a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>