<?php
include 'dbconnect.php';
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="shortcut icon" type="image/x-icon" href="resource/boy.png">
    <title>| CareTracker > Dashboard |</title>
</head>

<body>

    <div class="box">

        <nav>
            <div class="logo">
                <a href="index.html" style="text-decoration:none;">CareTracker</a>
            </div>
            <ul class="nav-links">
            <form action="logout.php" method="post">
                <input type="submit" value="Logout" class="btn btn-success"></form>
            </ul>
        </nav>

        <div class="heading">
                    <h2>Welcome <?php echo $_SESSION['name']; ?>!</h2>
                </div>
        <div class="content">
        
            <div class="left">
                <a href="addchild.php" class="btn btn-primary add-child-btn"><b>+</b> Add Child</a>
                <br><br>


                <table class="table" style="border:3px solid #cdcddd;">
                    <thead class="table-active">
                        <tr>
                            <th></th>
                            <th id="ops" scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">QR Code</th>
                            <th id="ops" scope="col">View Profile</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    $sql = "SELECT * FROM `children` where `Parent Id` = {$_SESSION['pid']}";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $number = 0;
                        while($row=mysqli_fetch_assoc($result)){
                            $name = $row['Name'];
                            $id = $row['Child Id'];
                            $number = $number+1;
                            $imgpath = 'resource/qrimages/.'.$name.'.png';
                            echo '<tr>
                            <td><br></td>
                            <td id="ops" class="align-middle"><b>'.$number.'</b></td>

                            <td class="align-middle"><big><b>'.$name.'</b></big></td>

                            <td class="align-middle qrcode">
                            <img src="'.$imgpath.'" height="90px" alt='.$name.' title='.$name.'>
                            </td>

                            <td id="ops" class="align-middle">
                            <button type="submit" class="btn btn-success my-4 px-2"><a href="profile.php? profileid='.$id.'" class="text-light" style="text-decoration:none;"> Profile</a>
                            </button>
                            </td>
                            
                            <td class="align-middle">
                            <button type="button" class="btn btn-warning my-2 mx-2"><a href="payment.php? paymentid='.$id.'" class="text-light" style="text-decoration:none;">Buy Now</a></button>
                            <br>
                            <button type="button" class="btn btn-danger my-2 mx-2 px-4"><a href="deletechild.php? deleteid='.$id.' & imgpath='.$imgpath.'" class="text-light" style="text-decoration:none;">Delete</a>
                            </button>
                            </td>
                            </tr>';
                        }
                    }
                    ?>  
                    </tbody>
                </table>
            </div>

            <div class="right">
                <div class="image">
                    <img src="resource/dashboard.png" title="safe family" alt="safe family">
                </div>
                <div class="para"><b>
                Child safety is about protecting children from harm and ensuring their well-being. It involves creating a safe environment, providing access to necessities, and educating parents and caregivers on child protection measures. By prioritizing child safety, we can help children grow and develop to their full potential.</b>
                </div>
            </div>
        </div>

    </div>

</body>

</html>