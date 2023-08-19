<?php
  @include 'config.php';

  session_start();

  
if(!isset($_SESSION['artistid'])){ 
  header('location:homepage.php');
}

$email = $_SESSION['email'];

$tsql = "SELECT * 
         FROM   ArtistAccount
         WHERE Email = '$email'";

$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

$accountID = $row['ArtistAccountID'];

  $artist = $_SESSION['artist'];
  $artname = $_SESSION['artname'];
  $dimension = $_SESSION['dimension'];
  $arttype = $_SESSION['arttype'];
  $description = $_SESSION['description'];
  $daterelease = date("Y-m-d");
  $price = $_SESSION['price'];
  $biddate = $_SESSION['biddate'];
  $bidtime = $_SESSION['bidtime'];
  $venue = $_SESSION['venue'];
  $pendID = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
  $certID = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

  $image1 = $_SESSION['image1'];
  $image2 = $_SESSION['image2'];
  $image3 =  $_SESSION['image3'];
  $target1 = $_SESSION['target1'];
  $target2 = $_SESSION['target2'];
  $target3 =  $_SESSION['target3'];

  $signed =  $_SESSION['signed'];
  
  $folderPath = "signatures/";
  $image_parts = explode(";base64,", $signed); 
  $image_type_aux = explode("image/", $image_parts[0]);
  $image_type = $image_type_aux[1];
  $image_base64 = base64_decode($image_parts[1]);
  $file = $folderPath . uniqid() . '.'.$image_type;
  $signaturepic = mb_strimwidth($file, 11, 17);
  file_put_contents($file, $image_base64);
 


  $insertart = "INSERT INTO Pending (Artist, Art_Name, Dimension, Art_Type, Description, Art_Bid, Venue, Art_Image, Art_Image2, Art_Image3, ArtistAccountId, Bid_Time, Auction_Date, ID, SignaturePic, softdelete , Certificate_ID ) 
  VALUES ('$artist','$artname', '$dimension','$arttype', '$description','$price', '$venue', '$image1', '$image2', '$image3', '$accountID', '$bidtime', '$biddate', '$pendID', '$signaturepic', 0, '$certID' )";
  $results = sqlsrv_query($conn, $insertart);
     
  header("Location: pending.php");
?>