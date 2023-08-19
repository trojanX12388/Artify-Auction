<?php
@include 'config.php';

session_start();

if(empty($_SESSION['email'])){ 
    header('location:loginfirst.php');
}

  
  if(isset($_SESSION['artloverid'])){ 
            
        $email = $_SESSION['email'];
        $ARTID = $_SESSION['artid'];

        $plus= $ARTID+1;
        $minus= $ARTID-1;


        $tsql = "SELECT * 
                FROM   Account
                WHERE Email = '$email'";

        $stmt = sqlsrv_query($conn, $tsql);
        $account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    
  }


  if(isset($_SESSION['artistid'])){ 
            
    $email = $_SESSION['email'];
    $ARTID = $_SESSION['artid'];

    $plus= $ARTID+1;
    $minus= $ARTID-1;

    $tsql = "SELECT * 
            FROM   ArtistAccount
            WHERE Email = '$email'";

    $stmt = sqlsrv_query($conn, $tsql);
    $account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Art Certificate</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/cert2.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel = "stylesheet" href  = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
</head>
    
<body onload = "autoClick();">

<?php

$tsql = "SELECT * 
FROM   Arts
WHERE Art_ID = $ARTID";

$stmt = sqlsrv_query($conn, $tsql);

  $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

  $artistID = $row['ArtistAccountID'];
  
$Asql = "SELECT * 
FROM   ArtistAccount
WHERE ArtistAccountID = $artistID";

$Atmt = sqlsrv_query($conn, $Asql);
$Arow = sqlsrv_fetch_array( $Atmt, SQLSRV_FETCH_ASSOC);

    
    ?>
    <!-- 
    <tr>
    <td><?= $no ?></td>
    <td>A0-<?= $row['ID'] ?></td>
      <td><img src="arts/<?= $row['Art_Image'] ?>" style="height: 150px; width: 150px; border-radius: 3%;" oncontextmenu='return false;'></td>
      <td><?= $row['Art_Name'] ?></td>
      <td><?=date_format($row['Date_Release'],'F d Y')?></td>
      <td><?=date_format($row['Auction_Date'],'F d Y');?></td>
      <td><?=date_format($row['Bid_Time'],'h:i a');?></td>
      <td><?= $row['Artist'] ?></td>
      <td><?= $row['Availability'] ?></td>
    </tr>  
 
  


 -->
<br>
<br>
<div id = "htmlContent">
<div class="cert-container">

  <div class="border-gray">
    <div class="border-red">
      <div class="content">
          <img id="mt-logo" src="css/cert/artify.png" alt="Logo Goes Here" />
          <img id="mt-stamp" src="signatures/<?=$row['SignaturePic']?>" alt="Certified Signature"  class="signature"/>
          
              <ul class="credentials">
                <li>
                    <p id="cert-id">Certificate ID: <span><?= $row['Certificate_ID'] ?></span></p>
                </li>
                <li>
                    <p id="host-server-id">Art ID: <span><?= $row['ID'] ?></span></p>
                </li>
                <li>
                    <p id="lms-id">Artist ID: <span><?= $Arow['ID'] ?></span></p>
                </li>
              </ul>
          
            <div class="copytext-container">
                <div class="congrats-copytext">
                    <h1 class="text-center">Certificate of Authenticity</h1><br>
                    <h3 class="text-center">"<?= $row['Art_Name'] ?>"</h3></h3>
                </div>
                <div class="congrats-body">
                    <br>

                    <h4 class="text-center">All copyright and reproduction </h4>
                    <h4 class="text-center">are reserved by the artist. </h4>
                        <br><br> <h5 class="text-center"><strong><?=$Arow['FirstName']?>  <?=$Arow['MiddleName'][0]?>.  <?=$Arow['LastName']?></strong></h5><br>
               <h5 class="text-center">Artist ID: <?=$Arow['ID']?></h5></h3>
                </div>
                
                <div class="course-copytext">
                    <h6>Art ID: <?= $row['ID'] ?></span><br>
                    <h6>Date Released: <?=date_format($row['Date_Release'],'F d, Y')?></span></h6><br>
                    <img id="mt-art" src="arts_watermarked/<?=$row['WaterImage1']?>" alt="Logo Goes Here" oncontextmenu='return false;' />
                   
                    
                </div>
                <div class="course-signature">
                <h5><span>Signature</span></h5><br>
                </div>
                <div class="address-copytext">
                    <address><h6 class="text-center">Artify Auction Corp. </h6><h6 class="text-center"> Quezon City, 1119 </h6></address>
                    <a href="artifyauction.com" id="mt-site" ><em>artifyauction.com</em></a>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
</div>
        <div class="back">
        <?php 
       if(isset($_SESSION['artistid'])){ 

        $Arsql = "SELECT * 
        FROM   ArtistAccount
        WHERE Email = '$email'";

        $Artmt = sqlsrv_query($conn, $Arsql);
        $Araccount = sqlsrv_fetch_array( $Artmt, SQLSRV_FETCH_ASSOC);



        if($row['ArtistAccountID']==$Araccount['ArtistAccountID'])
        echo"<a id='download'>Download</a>";
        else
        echo"";
       }
        ?>
        <a href="viewart.php" >Back to Art</a>
        </div>
       

        <div class="block" oncontextmenu='return false;'></div>

   
        <script>
        document.addEventListener("keyup", function (e) {
        var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                stopPrntScr();
            }
        });
function stopPrntScr() {

            var inpFld = document.createElement("input");
            inpFld.setAttribute("value", ".");
            inpFld.setAttribute("width", "0");
            inpFld.style.height = "0px";
            inpFld.style.width = "0px";
            inpFld.style.border = "0px";
            document.body.appendChild(inpFld);
            inpFld.select();
            document.execCommand("copy");
            inpFld.remove(inpFld);
            alert('Screenshot Disabled');
        }
       function AccessClipboardData() {
            try {
                window.clipboardData.setData('text', "Access   Restricted");
            } catch (err) {
            }
        }
        setInterval("AccessClipboardData()", 300);
      </script>


<!-- DOWNLOAD CERT TO PDF -->

<script type="text/javascript">
      function autoClick(){
        $("#download").click();
      }

      $(document).ready(function(){
        var element = $("#htmlContent");

        $("#download").on('click', function(){

          html2canvas(element, {
            onrendered: function(canvas) {
              var imageData = canvas.toDataURL("image/jpg");
              var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
              $("#download").attr("download", "Art_Certificate.jpg").attr("href", newData);
            }
          });

        });
      });
    </script>


</body>
</html>
