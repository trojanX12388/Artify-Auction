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
    
    header('location:viewartartist.php');

}

      
if(isset($_POST['wishlist'])){
        $artid = $_POST['artid'];
        $artname = $_POST['artname'];
        $artist = $_POST['artist'];
        $artimg = $_POST['artimg'];

        $tsql = "SELECT * 
        FROM   Arts
        WHERE Art_ID = '$artid'";

        $stmt = sqlsrv_query($conn, $tsql);
        $artavail = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


        if($artavail['Availability'] == 1){
          $tsql = "SELECT * 
          FROM   Account
          WHERE Email = '$email'";
  
          $stmt = sqlsrv_query($conn, $tsql);
          $account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
  
          $artistloverid = $account['AccountID'];
      
          $insertbid = "INSERT INTO Wish (AccountID, Art_ID, Art_Name, Artist, Art_Image) 
          VALUES ('$artistloverid','$artid','$artname','$artist','$artimg')";
          $results = sqlsrv_query($conn, $insertbid);
          
  
          header('location:wishsuccess.php');

        }
        else{
          header('location:bidtimesup.php');
        }

       }
      

if(isset($_POST['bid'])){
  date_default_timezone_set("Asia/Manila");
        $ammount = $_POST['ammount'];
        $artid = $_POST['artid'];
        $artname = $_POST['artname'];
        $biddate = date("Y-m-d H:i:s A");
        $currentbid = $_POST['currentbid'];
        $totalbids = $_POST['totalbid']+1;

        $tsql = "SELECT * 
        FROM   Arts
        WHERE Art_ID = '$artid'";

        $stmt = sqlsrv_query($conn, $tsql);
        $artavail = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


        if($ammount<=$currentbid){
          header('location:bidfailed.php');
        }
        else{
          if($artavail['Availability'] == 1){
            $tsql = "SELECT * 
          FROM   Arts
          WHERE Art_ID = '$artid'";
        
          $stmt = sqlsrv_query($conn, $tsql);
          $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        
        $updateart = "UPDATE Arts SET Current_Bid = '$ammount', Total_Bidders = '$totalbids' WHERE Art_ID = '$artid'";
        $results = sqlsrv_query($conn, $updateart);

        $tsql = "SELECT * 
        FROM   Account
        WHERE Email = '$email'";

        $stmt = sqlsrv_query($conn, $tsql);
        $account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

        $artistloverid = $account['AccountID'];

        $insertbid = "INSERT INTO Bids (AccountID, Art_Name, Art_ID, Ammount, Bid_Date) 
        VALUES ('$artistloverid','$artname','$artid','$ammount','$biddate')";
        $results = sqlsrv_query($conn, $insertbid);
        
          }
          else{
            header('location:bidtimesup.php');
          }
        }
      };
  

      
if(isset($_POST['viewcert'])){
  $email = $_SESSION['email'];
  $ARTID = $_SESSION['artid'];


 header('location:artcertificate.php');


}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/viewart4.css">
    <link rel="stylesheet" href="css/clock.css">

      <!-- Swiper CSS -->
    <link rel="stylesheet" href="Bootstrap/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="Bootstrap/css/swipin.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href  = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="Bootstrap/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>

     <!-- TOP NAVIGATION BAR -->
  <nav>
      <div class="menu"></div>
      <button id="myBtn" class="buttonmenu"></button>
      <img src="css/Background/artify.png" class ="artify">
      <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
      </label>
      <div class="wraptext">
      <div class="search">
      <form name="form1" method="get" action="search.php">
      <input type="text" class="search-term" placeholder="Search" name="search" aria-label="Search" required>
        <button type="submit" name="submit" class="search-button">
          <svg viewBox="0 0 1024 1024">
            <path
              class="path1"
              d="M848.471 928l-263.059-264.059c-48.941 37.707-111.120 56.060-178.412 55.060-172.296 0-315-145.708-315-314s145.708-315 315-314c173.298 0 315 144.708 314 314 0 69.296-28.474 129.475-58.060 179.414l276.060 265.060-80.529 80.530zM190.625 409.079c0 125.365 99.092 220.458 220.458 219.456s220.456-98.092 220.456-220.456c0-123.365-105.160-220.458-220.458-220.458-124.366 0-220.457 98.093-220.455 220.454z"
            ></path>
          </svg>
        </button>
      </form>
      </div>
        </div>
      <ul>
       <li><a href="artloverpage.php">HOME</a></li>
       <li><a href="admin_page.php">AUCTIONS</a></li>
       <li><a href="admin_page.php">BID FOR THE FUTURE</a></li>
       <li><a href="admin_page.php">ARTISTS</a></li>
       <li><a href="admin_page.php">CONTACT</a></li>
      </ul>
      <div>
      <button class="profileiconbutton" href="#" data-toggle="modal" data-target="#account">
      <img src="defaultprofilepics/<?php echo $account['DefaultPic']?>.png" class="profileicon" >
      </button>
  </nav>

 
  <!-- Account Panel -->
  <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
    
              <img src="defaultprofilepics/<?php echo $account['DefaultPic']?>.png" class="profilepic">
              <div class="account_modal-email">
              <span><?php echo $_SESSION['email'] ?></span>
              </div>

                    <div class="account_modal-body">
                    
                    <br>
                  <span><?php echo $account['FirstName'] ?></span>
                  <span><?php echo $account['LastName'] ?></span>
                    </div>
                </div>
            </div>
  </div>
  </div>


    <!-- CONTENT  -->


    
    <form action='artcertificate.php' method='post' enctype='multipart/form-data'>
                             <input type='hidden' name='artid' value='<?=$row['Art_ID'];?>'>
                                  <div class="viewcert">
                                              <input type='submit' name='viewcert' value='Art Certificate' class="center">
                                 </div>
                        </form>

    
    <div class="artcontent" >
                    <table>   
                 
                            <div class="arttable">
                          
                            <?php
                                              
                                  $tsql = "SELECT * 
                                  FROM   Arts
                                  WHERE Art_ID = $ARTID";
            
                                  $stmt = sqlsrv_query($conn, $tsql);
                                
                                  
                                    while ($art = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 

                                     
                                        echo " 

                                                            
                     

                            <div id='id01' class='w3-modal w3-animate-opacity'> </div>
                                        
                    <form action='viewart.php' method='post' enctype='multipart/form-data'>
                                        <td>
                                            <tc><img src='arts_watermarked/".$art['WaterImage1']."' alt='' class='card-img' oncontextmenu='return false;'>
                                            </tc>
                                            <br>
                                            
                                            <tc><img src='arts_watermarked/".$art['WaterImage2']."' alt='' class='card-img' oncontextmenu='return false;'></tc>
                                            <br>
                                            <tc><img src='arts_watermarked/".$art['WaterImage3']."' alt='' class='card-img' oncontextmenu='return false;'></tc>
                                            <br>
                                            
                                            <div class = 'cardmid'> 
                                            
                                                <tc><img src='arts_watermarked/".$art['WaterImage1']."' alt='' class='card-mid' oncontextmenu='return false;'></tc>
                                            </div>
                                            <div class = 'table1'>  
                                            <h5>Released: ".date_format($art['Date_Release'],'F d Y')."</h5> 
                                        
                                            <h4><strong>ART ID: ".$art['ID']."</strong></h4>  
                                            
                                            <h6><strong>".$art['Art_Name']."</strong></h6>  
                                            <br>              
                                            <h4>". mb_strimwidth($art['Description'], 0, 35, "...")."</h4>
                                            <br>
                                            <h6>".$art['Dimension']."</h6> 
                                            <br>   
                                            <h6><strong>ARTIST | </strong></h6>                          
                                            <h6><strong>".$art['Artist']."</strong></h6> 
                                               <br>
                                                <br>
                                            <h6><strong>Price | </strong></h6>                          
                                            <h7>Php" .$art['Art_Bid']."</h7> 
                                                                                                                         
                                            <h6><strong>VENUE | </strong></h6>
                                            <h6>". mb_strimwidth($art['Venue'], 0, 300, "...")."</h6>
                                            <br>
                                            <br>   
                                            <h6><strong>ONLINE AUCTION UNTIL: </strong></h6>
                                            <h8>".date_format($art['Auction_Date'],'F d Y')."</h8>
                                            <h8>| ".date_format($art['Bid_Time'],'h:i a')."</h8>
                                            <br>
                                            <br>
                                            <div class ='bidtable'>
                                            <br>

                                                <h8>Current Bid:</h8>
                                                <h9>P"  .$art['Current_Bid']."  [<span>"  .$art['Total_Bidders']." Bid/s   </span>]</h9>
                                                <br>
                                                <br>
                                                <div class='bid'>

                                                <input type='hidden' name='artid' value='".$ARTID."'>
                                                <input type='hidden' name='totalbid' value='".$art['Total_Bidders']."'>
                                                <input type='hidden' name='currentbid' value='".$art['Current_Bid']."'>
                                                <input type='hidden' name='artname' value='".$art['Art_Name']."'>
";if($art['Availability']==0){
  echo" 
                    
                    <input type='number' name='ammount' placeholder='Amount' required disabled>
                    <input type='submit' name='---' value='Place Bid' class ='bid' disabled>
               
                  </div>
                  <div class='enter'>
                  <p>Enter greater than P["  .$art['Art_Bid']."] Bid </p>
                  </div>
                  <div class='botlayer'>
                 
                  <input type='hidden' name='artid' >
                  <input type='hidden' name='artimg' >
                  <input type='hidden' name='artist' >
                  <input type='hidden' name='artname'>
                  <input type='submit' name='---' value='Add To Wishlist' class ='bid' disabled>
              
                  </div>


                  <br>
                  <br>
                  </div>
                  </div>


                  <td colspan = 9>
                  <td>
                  <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td>

                  </td>
  
  ";
}
else{
  echo" 
                                    
                  <input type='number' name='ammount' placeholder='Amount' required>
                  <input type='submit' name='bid' value='Place Bid' class ='bid'>
                </form>  
                </div>
                <div class='enter'>
                <p>Enter greater than P["  .$art['Art_Bid']."] Bid </p>
                </div>
                <div class='botlayer'>
                <form action='viewart.php' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='artid' value='".$ARTID."'>
                <input type='hidden' name='artavailability' value='".$art['Availability']."'>
                <input type='hidden' name='artimg' value='".$art['Art_Image']."'>
                <input type='hidden' name='artist' value='".$art['Artist']."'>
                <input type='hidden' name='artname' value='".$art['Art_Name']."'>
                <input type='submit' name='wishlist' value='Add To Wishlist' class ='bid'>
                </form>
                </div>


                <br>
                <br>
                </div>
                </div>


                <td colspan = 9>
                <td>
                <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td> <td><td><td><td>

                </td>

";

}"
                                           
                                    ";
                                  };
                                ?>
                        </div>
                        </table>
         </div>




<h5><strong><div id="result_shops" class="sub_shops"></strong></div></h5>

   
<style>
  body{
    background-color:rgba(212, 208, 208, 0.808);
  }

  .bidtable{
    z-index: 0;
    position: relative;
    top: 0px;
  }
  
  .sub_shops{
    z-index: -10;
  }

  .sub_clock{
    position: relative;
    bottom: 20px;
    z-index: 2000;
    
  }

.bidderstable{
  position: relative;
  top: 720px;
}
  
.artcontent{
  position: relative;
  top: 140px;
}

.card-img{
  padding-bottom:20px;
  border-radius:20px 20px 20px 20px;
}


.viewcert{
  position: relative;
  top: 720px;
  left: 770px;
  border-radius:20px 20px 20px 20px;
  z-index: 10;
  width:120px;
  height:20px;


}



</style>



<div class="bidderstable" id="bidderstable" ></div>


  <!-- Clock -->                 
    
  <div class="clock_modal-content">
            <div class="clock_modal-header">
                    
                      <img src="css/Background/clock.png" class="clockicon">
                      <div class="clock_modal-body">

                      <h6><div id="clock" class="sub_clock"></div></h6>

                     </div>

                    </div>
                </div>
 





 


<!-- BOTTOM NAVIGATION BAR -->

  <div class="navbar">
  <img src="css/Background/menu.png" class="botlogo">
  <div class="icons">
    <ul>
       <li><img src="css/Background/fb.png"></li>
       <li><img src="css/Background/twitter.png"></li>
       <li><img src="css/Background/instagram.png"></li>
      </ul>
    </div>
  <img src="css/Background/PrivacyPolicy.png" class="privacy">
  <img src="css/Background/TermsofUse.png" class="terms">
</div>
  
      


          
     
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



 <!-- COUNT DOWN CLOCK  -->

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
   $("#result_shops").load('timer/index.php');
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
   $("#bidderstable").load('bidderstable.php');
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

      



    <sc type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></sc>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>