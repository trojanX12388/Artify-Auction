<?php
@include 'config.php';

session_start();


if(isset($_SESSION['artistid'])){ 
  header('location:artistpage.php');
}

if(isset($_SESSION['artloverid'])){ 
  header('location:artloverpage.php');
}


if(isset($_SESSION['adminid'])){ 
  header('location:adminpage.php');
}

if(isset($_POST['viewart'])){
  $_SESSION['artid'] = ($_POST['artid']);
  header('location:viewart.php');
  };

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/homepage9.css">

      <!-- Swiper CSS -->
    <link rel="stylesheet" href="Bootstrap/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel = "stylesheet" href  = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
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
       <li><a href="homepage.php">HOME</a></li>
       <li><a href="auctions.php">AUCTIONS</a></li>
       <li><a href="bid.php">BID FOR THE FUTURE</a></li>
       <li><a href="artists.php">ARTISTS</a></li>
       <li><a href="contact.php">CONTACT</a></li>
      </ul>
      <div>
      <button class="accountmenu" href="#" data-toggle="modal" data-target="#account"></button>
    </div>
    </nav>
 
  <!-- Account Panel -->

  <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
            <button type="button" class="closeacc" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <h2>My Account</h2>
           
               <div class="account-modal-body">
                <p1>
                Log in or Register to manage  cart, bid,  and see auction results, receive email updates, and see personalized recommendations.
                </p1>
                    </div>
                    <div class="account-modal-footer">
                    <div class="signs">                   
                      <ul>
                        <li><a class="signin" href="signin.php">Sign In</a></li>
                        <li><a class="signup" href="signup.php">Sign Up</a></li>
                      </ul>
                    </div>
                </div>
            </div>
  </div>
  </div>

    <!-- CONTENT  -->

    <div class="ARTIFYAUCTION">
      <img src="css/Background/A R T I F Y A U C T I O N.png">
      </div>
      <div class="CREATIVEMEETSCONNECTIVITY">
      <img src="css/Background/creative.png">
      </div>
   
      <div class="slide-container swiper">
        
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">

                    <div class="card swiper-slide">
                        <div class="image-content">
                            <div class="card-image">
                                <img src="css/homepage/eye.png" alt="" class="card-img" oncontextmenu="return false;">
                            </div>
                        </div>

                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <div class="card-image">
                                <img src="css/homepage/bird.png" alt="" class="card-img" oncontextmenu="return false;">
                            </div>
                        </div>

                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <div class="card-image">
                                <img src="css/homepage/red.png" alt="" class="card-img" oncontextmenu="return false;">
                            </div>
                        </div>

                        
                        </div>
                    </div>    
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="explore">
          <img src="css/Background/worldwide.png">
          <img src="css/Background/toprated.png">
          <img src="css/Background/distinctively.png">
      </div>
      <div class="more">
      <img src="css/Background/nudeframe.png">
      </div>
      <div class="moremenu">
          <img src="css/Background/howtobuy.png">
          <img src="css/Background/howtosell.png">
          <img src="css/Background/otherservices.png">
          <img src="css/Background/aboutus.png">
      
      </div>
      <div class="links">
        <a href="howto.php">HOW TO BUY</a>
        <a href="howto.php">HOW TO SELL</a>
        <a href="services.php">OTHER SERVICES</a>
        <a href="aboutus.php">ABOUT US</a>
      </div>

   <br>
   <br>
   <br>
 
<!-- ART CONTENT -->




<div class="col-md-12">
<div class="row">

<?php

$tsql = "SELECT * 
FROM   Arts
ORDER BY Art_ID DESC";

$stmt = sqlsrv_query($conn, $tsql);

  while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { ?>
  <div class="col-md-2">
  <form action='homepage.php' method='post' enctype='multipart/form-data'>
                                            <img src="arts_watermarked/<?= $row['WaterImage1'] ?>" style="height: 350px; width: 250px; border-radius: 3%;" oncontextmenu='return false;'>
                                          
                                            <div class="block" oncontextmenu='return false;'></div>
                                            <br>
                                            
                                            <div class="col-md-10 text-center">
                                              <h5><?=$row['Art_Name']?></h5> 
                                              <p class="h6"><?=date_format($row['Date_Release'],'F d Y')?></p>  
                                            </div>
                                            <br>                
                                            <h6><?=mb_strimwidth($row['Description'], 0, 35, '...');?></h6>
                                            <h8><?=$row['Dimension']?></h8> 
                                            <br>  
                                            <br>   
                                            <h6>ARTIST | </h6>                          
                                            <h8><?=$row['Artist']?></h8> 
                                            <br>       
                                            <br>                                                                        
                                            <h6>VENUE | </h6>
                                            <h8><?=mb_strimwidth($row['Venue'], 0, 35, "...");?></h8>
                                            <br>
                                            <br>   
                                            <h6>ONLINE AUCTION UNTIL: </h6>
                                            <h8><?=date_format($row['Auction_Date'],'F d Y');?></h8>
                                            <h8>| <?=date_format($row['Bid_Time'],'h:i a');?></h8>
                                            
                                            <br>
                                            <br>
                                           
                                            <input type='hidden' name='artid' value='<?=$row['Art_ID'];?>'>
                                            <div class="col-md-10 text-center">
                                              <input type='submit' name='viewart' value='View More' class="center">
                                            </div>
    <br>


    </form>
    <br>
<br>
  </div>  

  <?php }
  ?>

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


    <scr type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></scr>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>