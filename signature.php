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

if(isset($_POST['submit'])){
  $artist = $_SESSION['artist'];
  $artname = $_SESSION['artname'];
  $dimension = $_SESSION['dimension'];
  $arttype = $_SESSION['arttype'];
  $description = $_SESSION['description'];
  $price = $_SESSION['price'];
  $biddate = $_SESSION['biddate'];
  $bidtime = $_SESSION['bidtime'];
  $venue = $_SESSION['venue'];
  
  $image1 = $_SESSION['image1'];
  $image2 = $_SESSION['image2'];
  $image3 =  $_SESSION['image3'];
  $target1 = $_SESSION['target1'];
  $target2 = $_SESSION['target2'];
  $target3 =  $_SESSION['target3'];
  

  $_SESSION['artist'] = $artist;
  $_SESSION['artname'] = $artname;
  $_SESSION['dimension'] = $dimension;
  $_SESSION['arttype'] = $arttype;
  $_SESSION['description'] = $description;
  $_SESSION['price'] = $price;
  $_SESSION['biddate'] = $biddate;
  $_SESSION['bidtime'] = $bidtime;
  $_SESSION['venue'] = $venue;

  $_SESSION['target1'] = $target1;
  $_SESSION['target2'] = $target2;
  $_SESSION['target3'] = $target3;

  $_SESSION['image1'] = $image1;
  $_SESSION['image2'] = $image2;
  $_SESSION['image3'] = $image3;

  $_SESSION['signed'] = $_POST['signed'];

  header("Location: artistsignature.php");

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/signature1.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="asset/jquery.signature.min.js"></script>

 
      
    <style>
        .kbw-signature { width: 400px; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
        .pad{
            position: relative;
            top:0px;
            right:10px;

        }
        .clear{
            border-radius: 20px 20px 20px 20px;
            width: 200px;

        }
    </style>

  </head>
  <body>

  <!--SIGNATURE PAD-->
  
  <div class="container">
  <div class="Success">
  <form method="POST" action="signature.php">

      <h3>Please draw your signature below</h3>

      <div class="">
          <br/>
          <label class="" for="">Signature:</label>
          <div id="sig" class="pad"></div>
          <br/>
          <button id="clear" class="clear">Clear Signature</button>
          <textarea id="signature64" name="signed" style="display: none" required></textarea>
      </div>
      <br/>
      <button name="submit" class="btn btn-success">Submit</button>
  </form>

</div>
  </div>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
  

</body>
</html>