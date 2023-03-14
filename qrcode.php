<?php
include "phpqrcode/qrlib.php";

// Set the link to encode
//$link = "https://example.com";

// Set the output image file path
$foldername = "resource/qrimages/";
$filename = "$foldername.$cname.png";

// Generate the QR code image
QRcode::png($link, $filename, QR_ECLEVEL_Q, 10);

// Display the image
echo "<img src='". $filename."' height='210px'>";
?>
