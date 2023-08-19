<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['adminid'])){ 
   header('location:homepage.php');
}


$email = $_SESSION['email'];

$tsql = "SELECT * 
         FROM   ArtistAccount
         WHERE Email = '$email'";

$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);



$Psql ="SELECT * FROM Pending";

$Pparams = array();
$Poptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


$Pstmt = sqlsrv_query($conn, $Psql , $Pparams, $Poptions);
$Part = sqlsrv_num_rows( $Pstmt );



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page </title>
    <link rel="stylesheet" href="css/artistpage5.css">
    <link rel="stylesheet" href="css/clock.css">
    <link rel = "stylesheet" href  = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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

</nav>

<!-- FETCH DATABASE -->
   


<?php

// defining function
function cal_percentage($num_amount, $num_total) {
  $count1 = $num_amount / $num_total;
  $count2 = $count1 * 100;
  $count = number_format($count2, 0);
  return $count;
}

    $sql ="SELECT * FROM Arts";

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

  $Astmt = sqlsrv_query($conn, $sql , $params, $options);
  $foundarts = sqlsrv_num_rows( $Astmt );


  $Lsql ="SELECT * FROM Account";

  $Lparams = array();
  $Loptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Lstmt = sqlsrv_query($conn, $Lsql , $Lparams, $Loptions);
$artlovers = sqlsrv_num_rows( $Lstmt );



$Bsql ="SELECT Current_Bid from Arts;";
$Bstmt = sqlsrv_query($conn, $Bsql);
$total1 = 0;
while($Brow = sqlsrv_fetch_array($Bstmt)){
  $bid1 = $Brow['Current_Bid'];
  $bid2 = $bid1;
  $total += $bid2; 
}

$totalbids = $total;


$IAsql ="SELECT Availability from Arts;";
$IAstmt = sqlsrv_query($conn, $IAsql);
$total1 = 0;

while($IArow = sqlsrv_fetch_array($IAstmt)){
  $IA1 = $IArow['Availability'];
  $IA2 = $IA1;
  $total1 += $IA2; 
}

$totalIA = $total1;



$Dsql ="SELECT * FROM Arts
WHERE Availability = '0'";

$Dparams = array();
$Doptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Dstmt = sqlsrv_query($conn, $Dsql , $Dparams, $Doptions);
$Dart = sqlsrv_num_rows( $Dstmt );



$Usql ="SELECT * FROM Arts
WHERE Winner = '0'";

$Uparams = array();
$Uoptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Ustmt = sqlsrv_query($conn, $Usql , $Uparams, $Uoptions);
$Uart = sqlsrv_num_rows( $Ustmt );

// YEAR 2012-2023

$Y12sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 1";

$Y12params = array();
$Y12options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y12stmt = sqlsrv_query($conn, $Y12sql , $Y12params, $Y12options);
$Y12art = sqlsrv_num_rows( $Y12stmt );



$Y13sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 2";

$Y13params = array();
$Y13options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y13stmt = sqlsrv_query($conn, $Y13sql , $Y13params, $Y13options);
$Y13art = sqlsrv_num_rows( $Y13stmt );


$Y14sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 3";

$Y14params = array();
$Y14options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


$Y14stmt = sqlsrv_query($conn, $Y14sql , $Y14params, $Y14options);
$Y14art = sqlsrv_num_rows( $Y14stmt );



$Y15sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 4";

$Y15params = array();
$Y15options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y15stmt = sqlsrv_query($conn, $Y15sql , $Y15params, $Y15options);
$Y15art = sqlsrv_num_rows( $Y15stmt );



$Y16sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 5";

$Y16params = array();
$Y16options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y16stmt = sqlsrv_query($conn, $Y16sql , $Y16params, $Y16options);
$Y16art = sqlsrv_num_rows( $Y16stmt );



$Y17sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 6";

$Y17params = array();
$Y17options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y17stmt = sqlsrv_query($conn, $Y17sql , $Y17params, $Y17options);
$Y17art = sqlsrv_num_rows( $Y17stmt );



$Y18sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 7";

$Y18params = array();
$Y18options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y18stmt = sqlsrv_query($conn, $Y18sql , $Y18params, $Y18options);
$Y18art = sqlsrv_num_rows( $Y18stmt );



$Y19sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 8";

$Y19params = array();
$Y19options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y19stmt = sqlsrv_query($conn, $Y19sql , $Y19params, $Y19options);
$Y19art = sqlsrv_num_rows( $Y19stmt );



$Y20sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 9";

$Y20params = array();
$Y20options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y20stmt = sqlsrv_query($conn, $Y20sql , $Y20params, $Y20options);
$Y20art = sqlsrv_num_rows( $Y20stmt );



$Y21sql = "SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 10";

$Y21params = array();
$Y21options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y21stmt = sqlsrv_query($conn, $Y21sql , $Y21params, $Y21options);
$Y21art = sqlsrv_num_rows( $Y21stmt );



$Y22sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 11";

$Y22params = array();
$Y22options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y22stmt = sqlsrv_query($conn, $Y22sql , $Y22params, $Y22options);
$Y22art = sqlsrv_num_rows( $Y22stmt );



$Y23sql ="SELECT * FROM Arts WHERE YEAR(Date_Release) = 2023 AND MONTH(Date_Release) = 12";

$Y23params = array();
$Y23options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$Y23stmt = sqlsrv_query($conn, $Y23sql , $Y23params, $Y23options);
$Y23art = sqlsrv_num_rows( $Y23stmt );



  ?>
  



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
  <header class="w3-container" style="padding-left:22px">
    <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-paint-brush w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?=$foundarts?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Arts</h4>
      </div>
    </div>
    
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-gavel w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?=$artlovers?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Bidders</h4>
      </div>
    </div>
    
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-money w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>PHP <?=$totalbids?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Income</h4>
      </div>
    </div>
  </div>


  
  <canvas id="myChart" style="width:100%;max-width:800px; position:relative; top:50px; left:400px;"></canvas>
  <br>  
  <br>
  <br>
  <h3 class="text-center" style="letter-spacing: 5.5px;">Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec</h3>
  <br>  
  <h3 class="text-center">(January - December)</h3>
  <h3 class="text-center">Number of Art Entered in the System</h3>


<script>
const xValues = [1,2,3,4,5,6,7,8,9,10,11,12];
const yValues = [<?=$Y12art?>,<?=$Y13art?>,<?=$Y14art?>,<?=$Y15art?>,<?=$Y16art?>,<?=$Y17art?>,<?=$Y18art?>,<?=$Y19art?>,<?=$Y20art?>,<?=$Y21art?>,<?=$Y22art?>,<?=$Y23art?>];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:<?=$foundarts?>+2}}],
    }
  }
});
</script>


  <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <h3>Delivered Arts</h3>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:<?=cal_percentage($Dart, $foundarts)?>%">+<?=cal_percentage($Dart, $foundarts)?>%</div>
    </div>

    <h3>In Auction</h3>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:<?=cal_percentage($totalIA, $foundarts)?>%"><?=cal_percentage($totalIA, $foundarts)?>%</div>
    </div>

    <h3>Arts Not Owned</h3>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:<?=cal_percentage($Uart , $Dart)?>%"><?=cal_percentage($Uart , $Dart)?>%</div>
    </div>
  </div>


<br>
<br>  
<br>
<br>
<br>
<br>

<h1 class="text-center">Arts</h1>

<br>
<br>



<div style=" height: 700px;overflow-x:auto;overflow-y:auto;">
  <table class="w3-table w3-striped w3-border">
  <tr>
      <th>No.</th>
      <th>Art ID</th>
      <th>Image</th>
      <th>Art Name</th>
      <th>Date Released</th> 
      <th>Auction Date</th> 
      <th>Auction Time</th> 
      <th>Artist</th> 
      <th>Is In Auction?</th> 

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
    <td><?= $no ?></td>
    <td><?= $row['ID'] ?></td>
      <td><img src="arts/<?= $row['Art_Image'] ?>" style="height: 150px; width: 150px; border-radius: 3%;" oncontextmenu='return false;'></td>
      <td><?= $row['Art_Name'] ?></td>
      <td><?=date_format($row['Date_Release'],'F d Y')?></td>
      <td><?=date_format($row['Auction_Date'],'F d Y');?></td>
      <td><?=date_format($row['Bid_Time'],'h:i a');?></td>
      <td><?= $row['Artist'] ?></td>
      <td><?= $row['Availability'] ?></td>
    </tr>  
  <?php }
  ?>
  </table>
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