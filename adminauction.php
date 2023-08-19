<?php

@include 'config.php';
date_default_timezone_set("Asia/Manila");
session_start();

if(!isset($_SESSION['adminid'])){ 
   header('location:homepage.php');
}


if(isset($_POST['remove'])){
  $removeart = $_POST['artid'];
  $rsql = "DELETE FROM Arts WHERE Art_ID = '$removeart'";
  $results = sqlsrv_query($conn, $rsql);

  };


$email = $_SESSION['email'];


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/artistpage5.css">
    <link rel="stylesheet" href="css/clock.css">
    <link rel = "stylesheet" href  = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Swiper CSS -->
    <link rel="stylesheet" href="Bootstrap/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style1.css">

    <link rel="stylesheet" href="font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Bootstrap/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
  
<nav>

<!-- TOP NAVIGATION BAR -->

<div class="nav"></div>
<button id="myBtn" class="buttonmenu"></button>
</div>
<img src="css/Background/artify.png" class ="artify">

<label for="btn" class="icon">
  <span class="fa fa-bars"></span>
</label>
<div class="wraptext">
  </div>



</nav>

   

<div class="w3-sidebar w3-dark-grey w3-bar-block w3-collapse w3-card" style="width:300px;" id="mySidebar">
<br>
<br>


  <a href="adminpage.php" class="w3-bar-item w3-large w3-button">
  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
  <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
  <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
</svg>
  
&nbsp; Dashboard</a>
  
  <a href="adminartcollectorreg.php" class="w3-bar-item w3-large w3-button">
  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
</svg>
    
&nbsp; Art Collector Registry</a>

  <a href="adminauction.php" class="w3-bar-item w3-large w3-button">
  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-calendar3-week" viewBox="0 0 16 16">
  <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
  <path d="M12 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-5 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
    
&nbsp; Auction Management</a>
 
  <a href="adminartistreg.php" class="w3-bar-item w3-large w3-button">
  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-palette" viewBox="0 0 16 16">
  <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
  <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8zm-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7z"/>
</svg>

&nbsp; Artists Registry</a>


<a href="admininartpending.php" class="w3-bar-item w3-large w3-button">
  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-arrow-clockwise w3-spin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
</svg>
    
&nbsp;<h8 id="result_shops" class="sub_shops"></h8>&nbsp; Pending Arts</a>

  <a href="admininquiries.php" class="w3-bar-item w3-large w3-button">
  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-person-exclamation" viewBox="0 0 16 16">
  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
</svg>
    
&nbsp; Inquiries</a>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<a href="logout.php" class="w3-bar-item w3-large w3-button">
<svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
</svg>
    
&nbsp; Logout</a>

</div>



<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-tasks "></i>Auction Manager</b></h5>
  </header>
<br>
<br>  


<h1 class="text-center">Auction Winners</h1>
<br>
<br>
<div style=" height: 400px;overflow-x:auto;overflow-y:auto;">
<table class="w3-table w3-striped w3-border">
  <tr>
      <th>Latest Winner</th>
      <th>Winner AccountID</th>
      <th>Art ID</th>
      <th>Art Name</th>
      <th>Date Won</th>
      <th>Time Won</th>
      <th>Artist</th>
      <th>Highest Bid</th>
      <th>Art Image</th>
    
    </tr>
  <?php

$wsql = "SELECT * 
FROM   Winner
ORDER BY Win_ID DESC";

$wtmt = sqlsrv_query($conn, $wsql);
$no2 = 0;
  while ($wrow = sqlsrv_fetch_array( $wtmt, SQLSRV_FETCH_ASSOC)) { 
    $no2 +=1;
    ?>
    
    <tr>
    <form action='adminartcollectorreg.php' method='post' enctype='multipart/form-data'>
      <td><?= $no2 ?></td>
      <td><?= $wrow['AccountID'] ?></td>
      <td><?= $wrow['Art_ID'] ?></td>
      <td><?= $wrow['Art_Name'] ?></td>
      <td><?=date_format($wrow['DateWon'],'F d Y');?></td>
      <td><?=date_format($wrow['TimeWon'],'h:i a');?></td>
      <td><?= $wrow['Artist'] ?></td>
      <td><?= $wrow['Highest_Bid'] ?></td>
      <td><img src="arts/<?= $wrow['Art_Image'] ?>" style="height: 80px; width: 80px; border-radius: 3%;" oncontextmenu='return false;'></td>
      
    </tr>  
  </form> 
  <?php }
  ?>
  </table>

<br>
<br>  
<br>
<br>
</div>
<br>
<br>
<br>
<br>
<h1 class="text-center">Auctioned Arts</h1>
<div style=" height: 700px;overflow-x:auto;overflow-y:auto;">
<br>
<br>

  <table class="w3-table w3-striped w3-border">
  <tr>
      <th>Latest Auction</th>
      <th>Art ID</th>
      <th>Art Image</th>
      <th>Art Name</th>
      <th>Artist</th>
      <th>Original Price</th>
      <th>Highest Bid</th>
      <th>No. Bidders</th>
      <th>Auction Date</th>
      <th>Auction Time</th>
      <th>Is Available?</th>
      <th>Winner AccountID</th>
    </tr>
  <?php
$tsql = "SELECT * 
FROM   Arts
ORDER BY Art_ID DESC";

$stmt = sqlsrv_query($conn, $tsql);
$no = 0;
  while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
    $no +=1;
    ?>
    
    <tr>
    <form action='adminauction.php' method='post' enctype='multipart/form-data'>
      <td><?= $no ?></td>
      <td><?= $row['ID'] ?></td>
      <td><img src="arts/<?= $row['Art_Image'] ?>" style="height: 150px; width: 150px; border-radius: 3%;" oncontextmenu='return false;'></td>
      <td><?= $row['Art_Name'] ?></td>
      <td><?= $row['Artist'] ?></td>
      <td><?= $row['Art_Bid'] ?></td>
      <td><?= $row['Current_Bid'] ?></td>
      <td><?= $row['Total_Bidders'] ?></td>
      <td><?=date_format($row['Auction_Date'],'F d Y');?></td>
      <td><?=date_format($row['Bid_Time'],'h:i a');?></td>
      <td><?= $row['Availability'] ?></td>
      <td><?= $row['Winner'] ?></td>
      <input type='hidden' name='artid' value='<?=$row['Art_ID'];?>'>
      <td><input type='submit' name='remove' value='&times;' class="center"></td>
    </tr>  
  </form> 
  <?php }
  ?>
  <br>
<br>

  </table>
  <br>
<br>
<br>
<br>
<br>
<br>
</div>
</div>


<br>
<br>
<br>
<br>




     
<!-- FUNCTIONS FOR BUTTONCLICK -->

    <script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("myBtn");
      var span = document.getElementsByClassName("close")[0];
      btn.onclick = function() {
        modal.style.display = "block";
      }
      span.onclick = function() {
        modal.style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

<script>
      $('.acccloseicon').click(function(){
        $('span').toggleClass("cancel");
      });
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("myBtn");
      var span = document.getElementsByClassName("closeacc")[0];
      btn.onclick = function() {
        modal.style.display = "block";
      }
      span.onclick = function() {
        modal.style.display = "none";
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>


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


<!-- CURRENT TIME CLOCK -->
      
<script>
$(document).ready(function(){
	

//var output = $('h1');
var isPaused = false;
var time = 0;

var t = window.setInterval(function() 
{
  if(!isPaused) 
  {
	//time++;
   // output.text("Seconds: " + time);
   $("#clock").load('curtime.php');
  }
}, 1000);

//with jquery
$('.pause').on('click', function(e) 
{
  e.preventDefault();
  isPaused = true;
});

$('.play').on('click', function(e) 
{
  e.preventDefault();
  isPaused = false;
});


});
</script>
  


<script>
$(document).ready(function(){
	

//var output = $('h1');
var isPaused = false;
var time = 0;

var t = window.setInterval(function() 
{
  if(!isPaused) 
  {
	//time++;
   // output.text("Seconds: " + time);
   $("#result_shops").load('pending/index.php');
  }
}, 1000);

//with jquery
$('.pause').on('click', function(e) 
{
  e.preventDefault();
  isPaused = true;
});

$('.play').on('click', function(e) 
{
  e.preventDefault();
  isPaused = false;
});


});
</script>


    <sc type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></sc>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>