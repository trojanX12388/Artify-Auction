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
    define('UPLOAD_DIR2', 'arts_watermarked/');  
    $img2 = $_POST['imgBase642'];  
    $img2 = str_replace('data:image/png;base64,', '', $img2);  
    $img2 = str_replace(' ', '+', $img2);  
    $data2 = base64_decode($img2);  
    $file2 = UPLOAD_DIR2 . uniqid() . '.png';  
    $success = file_put_contents($file2, $data2);  
    print $success ? $file : 'Unable to save the file.';  
      
    
    $waterimage2 = mb_strimwidth($file2, 17, 35, '');
    
    
    $Bsql = "SELECT * 
    FROM   Arts
    ORDER BY Art_ID DESC";
    
    $Btmt = sqlsrv_query($conn, $Bsql);
    $Brow = sqlsrv_fetch_array( $Btmt, SQLSRV_FETCH_ASSOC);
    
    $artID = $Brow['Art_ID'];
    
    
    
    $update = "UPDATE Arts SET WaterImage2 = '$waterimage2' WHERE Art_ID = '$artID'";
    $results = sqlsrv_query($conn, $update);
    

?>  