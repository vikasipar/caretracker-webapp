<?php
$paymentid = $_GET['paymentid'];
include 'dbconnect.php';

$sql = "SELECT `Name` FROM `children` WHERE `Child Id`='$paymentid'";
$result = mysqli_query($conn, $sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $cname = $row['Name'];
}

$qty = 1;
$amt = 999;

$countid = "SELECT COUNT(*) FROM `orders` WHERE `Child Id`='$paymentid'";
$check = mysqli_query($conn, $countid);
if(mysqli_num_rows($check) > 0){ // check if the query returned any rows
    $qty = $qty + 1;
    $amt = $amt * 2;
    $sql = "UPDATE `orders` SET `Quantity`='$qty', `Amount`='$amt' WHERE `Child Id`='$paymentid'";
}
else{
    $sql = "INSERT INTO `orders`(`Name`,`Child Id`,`Quantity`,`Amount`) VALUES ('$cname','$paymentid','$qty','$amt')";
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
            <h4>Order Successfully Placed </h4>
            <button type="button" class="btn btn-primary">Back To Dashboard</button>
        </div>
        <br>
        <hr color="#f3f3f5" width="50%">
        <h5>Purchase History:</h5>
        <div class="delivery">
            <img id="img1" src="resource/delivery.png" title="delivery" alt="delivery-boy">
            <div class="history">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Purchased For</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'dbconnect.php';
                        $sql = "SELECT * FROM `orders` WHERE `Child Id`=$paymentid";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            $number = 0;
                            while($row=mysqli_fetch_assoc($result)){
                                $cname = $row['Name'];
                                $qty = $row['Quantity'];
                                $amt = $row['Amount'];
                                $number = $number+1;

                                echo '<tr>
                                    <th scope="row">'.$paymentid.'</th>
                                    <td>'.$cname.'</td>
                                    <td>'.$qty.'</td>
                                    <td>₹ '.$amt.'</td>
                                </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>