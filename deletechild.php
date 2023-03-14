<?php
include 'dbconnect.php';

//if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $imgpath = $_GET['imgpath'];

    // Delete the qr code image
    if (file_exists($imgpath)) {
        unlink($imgpath);
    }

    // Delete child record
    $sql = "DELETE FROM `children` WHERE `Child Id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: dashboard.php');
    }
    else{
        die("Error : ". mysqli_connect_error());
    }
//}
?>