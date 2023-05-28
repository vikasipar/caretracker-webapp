<?php
$childid = $_GET['paymentid'];

include 'dbconnect.php';

$qty = 1;
$amt = 999;

  $sql = "Select * from `orders` where `Child Id` ='$childid'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if($num == 1){
    $row = mysqli_fetch_assoc($result);
    $amt = $row['Amount'];
    $qty = $row['Quantity'];
    $sql = "UPDATE `orders` SET `Quantity` = $qty+1,`Amount` = $amt+999 WHERE `Child Id` = $childid";
  }
  else{
    $sql = "INSERT INTO `orders`(`Child Id`,`Quantity`,`Amount`) VALUES ($childid,$qty,$amt)";
  }
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <link href="order.css" rel="stylesheet">
</head>

<body>

    <nav>
        <div class="logo">
            <a href="https://vikasipar.github.io/CareTracker/">CareTracker</a>
        </div>
        <ul class="nav-links">
            <li><a href="https://vikasipar.github.io/CareTracker/">Home</a></li>
            <li><a href="https://vikasipar.github.io/CareTracker/index.html#about">About</a></li>
            <li><a href="https://vikasipar.github.io/CareTracker/index.html#stat">Statistics</a></li>
            <li><a href="https://vikasipar.github.io/CareTracker/index.html#contact">Contact</a></li><a href="dashboard.php">
            <button type="submit" class="btn btn-primary">Back To Dashboard</button></a>
        </ul>
        <div class="hamburger">
            <img src="resource/menu.png" alt="Menu" height="20px">
        </div>
    </nav>

    <div class="content">
        <div class="tickimg">
            <img id="tick" src="resource/tick.gif" title="success" alt="tick">
            <h3>Order Successfully Placed </h3>
            <a href="dashboard.php">
            <button type="submit" class="btn btn-primary">Back To Dashboard</button></a>
            <!-- <img id="dboy" src="resource/delivery.png" title="delivery" alt="delivery-boy"> -->
        </div>
    </div>

</body>

</html>