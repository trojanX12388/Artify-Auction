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
    define('UPLOAD_DIR3', 'arts_watermarked/');  
    $img3 = $_POST['imgBase643'];  
    $img3 = str_replace('data:image/png;base64,', '', $img3);  
    $img3 = str_replace(' ', '+', $img3);  
    $data3 = base64_decode($img3);  
    $file3 = UPLOAD_DIR3 . uniqid() . '.png';  
    $success = file_put_contents($file3, $data3);  
    print $success ? $file3 : 'Unable to save the file.';  
      
    
    $waterimage3 = mb_strimwidth($file3, 17, 35, '');
    
    
    $Bsql = "SELECT * 
    FROM   Arts
    ORDER BY Art_ID DESC";
    
    $Btmt = sqlsrv_query($conn, $Bsql);
    $Brow = sqlsrv_fetch_array( $Btmt, SQLSRV_FETCH_ASSOC);
    
    $artID = $Brow['Art_ID'];
    
    
    
    $update = "UPDATE Arts SET WaterImage3 = '$waterimage3' WHERE Art_ID = '$artID'";
    $results = sqlsrv_query($conn, $update);


?>  