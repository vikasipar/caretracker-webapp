<?php
include 'dbconnect.php';
session_start();
// for parent data
$pid = $_SESSION['pid'];

$sql = "SELECT * FROM `users` WHERE `User Id`= $pid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$number = $row['Mob. Number'];

// for child data
$cid = $_GET['profileid'];
$sql = "SELECT * FROM `children` WHERE `Child Id`= $cid";
$result = mysqli_query($conn, $sql);
if (!$result) {
    // If query execution failed, display error message
    echo "Error: " . mysqli_error($conn);
} else {
    // Query executed successfully, fetch data
    $row = mysqli_fetch_assoc($result);
    $cname = $row['Name'];
    $cgender = $row['Gender'];
    $ccity = $row['City'];
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
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js"></script>
    <title>| CareTracker > Profile |</title>

</head>

<body onload="getLocation()">
    <div class="content">
        <nav>
            <div class="logo">
                <a href="https://vikasipar.github.io/CareTracker/">CareTracker</a>
            </div>
            <ul class="nav-links">
                <li><a href="https://vikasipar.github.io/CareTracker/">Home</a></li>
                <li><a href="https://vikasipar.github.io/CareTracker/index.html#about">About</a></li>
                <li><a href="https://vikasipar.github.io/CareTracker/index.html#stat">Statistics</a></li>
                <li><a href="https://vikasipar.github.io/CareTracker/parent.html#contact">Contact</a></li>
                <li class="btn btn-primary"><a href="http://localhost/CareTracker/dashboard.php" style="color:#fff;"> Back To Dashboard</a></li>
            </ul>
            <div class="hamburger">
                <img src="resource/menu.png" alt="Menu" height="20px">
            </div>
        </nav>

        <div class="box">
            <div class="profile">
                <div class="card">
                    <?php if($cgender == 'female'){
                        echo '<img src="resource/girl.jpg" alt="Avatar" style="width:76%; margin: 5% 12%;">';
                    }
                    else{
                        echo '<img src="resource/boy.jpg" alt="Avatar" style="width:76%; margin: 5% 12%;">';
                    }
                    ?>
                    <div class="container">
                        <h3><b><?php echo $cname; ?></b></h3>
                        <h5><b><?php echo $number; ?></b></h5>
                        <br>
                        <button onclick="sendEmail()" type="button" class="btn btn-danger"><b>Report</b></button>
                        <br><br>
                    </div>
                </div>
            </div>

             <!-- url -->
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
           <div class="qrcode">
           <?php 
           $link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            include 'qrcode.php'; 
            ?>
            </div>
           
        </div>
    </div>

     <!-- send email on click event -->
     <script>
        function sendEmail() {
            const subject = "CareTracker Emergency Alert!";
            const recipient = "vickyipar01@gmail.com";
            const maplink =
                "https://www.google.com/maps?q=" + latitude + "," + longitude;
            const body = "Current Location = " + maplink;

            const mailtoLink = `mailto:${recipient}?subject=${encodeURIComponent(
                subject
            )}&body=${encodeURIComponent(body)}`;

            window.location.href = mailtoLink;
        }
    </script>
    
</body>

</html>