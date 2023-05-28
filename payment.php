<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
header('Location: order.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
  <link href="payment.css" rel="stylesheet">
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
      <li><a href="https://vikasipar.github.io/CareTracker/index.html#contact">Contact</a></li>
      <li> <a href="dashboard.php"><button type="submit" class="btn btn-primary">Cancel</button></a></li>
    </ul>
    <div class="hamburger">
      <img src="resource/menu.png" alt="Menu" height="20px">
    </div>
  </nav>

  <div class="row">
    <div class="right">
      <div class="container1">

        <form action = "payment.php" method="post">

          <div class="row">
                <div class="col-50 col-left">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="your name">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="name@example.com">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="home number, street">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="city name">

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="st">
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
              </div><br>
              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
              </label><b>
                </div>

                <div class="col-50 col-right">
             <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="first middle last">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="mm">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="yyyy">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="123">
                </div>
              </div>
              <?php 
              $id = $_GET['paymentid'];
              echo '<button type="submit" class="btn btn-primary">
              <a href="order.php? paymentid='.$id.'" class="text-light" style="text-decoration:none;">Place Order</a>
            </button>';
            ?>
              </div>
          </div>

        </form>
      </div>
    </div>

  </div>

</body>

</html>