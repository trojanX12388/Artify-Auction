<?php  
@include 'config.php';
session_start();

if(!isset($_SESSION['adminid'])){ 
    header('location:homepage.php');
 }

 
$image1 = $_SESSION['image1'];
$image2 = $_SESSION['image2'];
$image3 = $_SESSION['image3'];

$next = $_SESSION['next'];


 
// Requires php5  
define('UPLOAD_DIR', 'arts_watermarked/');  
$img1 = $_POST['imgBase641'];  
$img1 = str_replace('data:image/png;base64,', '', $img1);  
$img1 = str_replace(' ', '+', $img1);  
$data1 = base64_decode($img1);  
$file1 = UPLOAD_DIR . uniqid() . '.png';  
$success = file_put_contents($file1, $data1);  
print $success ? $file1 : 'Unable to save the file.';  
  

$waterimage1 = mb_strimwidth($file1, 17, 35, '');


$Bsql = "SELECT * 
FROM   Arts
ORDER BY Art_ID DESC";

$Btmt = sqlsrv_query($conn, $Bsql);
$Brow = sqlsrv_fetch_array( $Btmt, SQLSRV_FETCH_ASSOC);

$artID = $Brow['Art_ID'];



$update = "UPDATE Arts SET WaterImage1 = '$waterimage1' WHERE Art_ID = '$artID'";
$results = sqlsrv_query($conn, $update);


  
?>  