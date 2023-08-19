<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['artloverid'])){ 
  header('location:homepage.php');
}


$email = $_SESSION['email'];

$tsql = "SELECT * 
         FROM   Account
         WHERE Email = '$email'";

$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

$accountID = $row['AccountID'];



if(isset($_POST['wishdelete'])){
       
    $wishid =  $_POST['wishid'];
    $tsql = "DELETE FROM Wish WHERE Wish_ID ='$wishid'";
    $results = sqlsrv_query($conn, $tsql);
       };
    

if(isset($_POST['delete'])){
       
        $_SESSION['email'] = $email;
        header("Location: deleteartloveraccount.php");
       };
   
      
if(isset($_POST['update'])){

  $gender = $_POST['gender'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename = $_POST['middlename'];
  $contact = $_POST['contact'];
  $homenumber = $_POST['homenumber'];
  $street = $_POST['street'];
  $baranggay = $_POST['baranggay'];
  $country = $_POST['country'];
  $region = $_POST['region'];
  $city = $_POST['city'];
  $postal = $_POST['postal'];
  $date = $_POST['dateofbirth'];



  $tsql = "SELECT * 
  FROM   Account
  WHERE Email = '$email'";

  $stmt = sqlsrv_query($conn, $tsql);
  $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

$update = "UPDATE Account SET Gender = '$gender', FirstName = '$firstname', LastName = '$lastname', MiddleName = '$middlename', PhoneNumber = '$contact', HomeNumber = '$homenumber', Street = '$street', Baranggay = '$baranggay', Country = '$country', Region = '$region', City = '$city', PostalCode = '$postal', DateOfBirth = '$date'
 WHERE Email = '$email'";
$results = sqlsrv_query($conn, $update);

echo '<script type ="text/JavaScript">';  
echo 'alert("Account Successfully Updated!")';  
echo '</script>';  

 }




?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/artloverpage5.css">
    <link rel="stylesheet" href="css/manageartaccount9.css">
    <link rel="stylesheet" href="css/clock.css">

      <!-- Swiper CSS -->
    <link rel="stylesheet" href="Bootstrap/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="Bootstrap/css/swipin.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <img src="defaultprofilepics/<?php echo $row['DefaultPic']?>.png" class="profileicon" >
      </button>
  </nav>

 
  <!-- Account Panel -->
  <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
            <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Account
                                              WHERE AccountID = '$accountID'";
                        
                                              $stmt = sqlsrv_query($conn, $tsql);
                                              $account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
            ?>
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

    <div class="title">
          <img src="css/signin/profileicon.png">
        </div>
        <div class="artlover">
        <img src="css/signin/artlover.png">
        </div>

     <!-- Manage Art Lover Account  -->

    <div class="container">
        <div class="title">
        </div>
        <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Account
                                              WHERE AccountID = '$accountID'";
                        
                                              $stmt = sqlsrv_query($conn, $tsql);
                                              $account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
            ?>
              <img src="defaultprofilepics/<?php echo $account['DefaultPic']?>.png" class="profilepic">
             
              <div class="account-email">
              <span class="username"><?php echo $account['FirstName'] ?></span>
              <span class="username"><?php echo $account['LastName'] ?></span>
              <br>
              <span class="email"><?php echo $_SESSION['email'] ?></span>
              </div>

        <div class="leftmenu">                   
                      <ul>
                        <li>

 <!-- PROFILE MENU -->

 <div class="dropdown">
                          <a class="" >Profile   ></a>
                          <img src="css/manageaccount/User.png" class="menulogo">
                          
                          <div class="dropdown-content">
                              <div class="profiletext">
                                <br>
                                <img src="css/manageaccount/Profile.png">

                              </div>
                          <form action="manageartloveraccount.php" method="post" enctype="multipart/form-data">
                              <div class = "profileinfo">
                              <div class="row1"></div>
                              <span>Gender & Name*</span>
                              <br>
                                <select name="gender" class="gender" required >
                                <option style="display:none"><?php echo $account['Gender'] ?></option>
                                                      <option value="male">Male</option>
                                                      <option value="female">Female</option>
                                                  </select>
                                      <input type="text" name="firstname" placeholder="First Name" required value="<?php echo $account['FirstName'] ?>">
                                      <input type="text" name="middlename" placeholder="Middle Name" required value="<?php echo $account['MiddleName'] ?>">
                                      <input type="text" name="lastname" placeholder="Last Name" required value="<?php echo $account['LastName'] ?>">
                            <br>
                            <br>   

                            <div class="row2">
                            <span>Email*</span>
                            <span>Mobile Number*</span>
                            <br>
                            <input type="email" name="email" placeholder="Email" required value="<?php echo $account['Email'] ?>">  
                            <input type="number" name="contact" placeholder="+63" required value="<?php echo $account['PhoneNumber'] ?>">  
                            </div>
                            <br>   

                            <div class="row3">
                            <br>
                            <span>Delivery Address*</span>
                            <br>
                            <input type="number" name="homenumber" placeholder="Home Number" required value="<?php echo $account['HomeNumber'] ?>">  
                            <input type="text" name="street" placeholder="Street" required value="<?php echo $account['Street'] ?>">  
                            <input type="text" name="baranggay" placeholder="Baranggay" required value="<?php echo $account['Baranggay'] ?>">  
                            </div>

                            <div class="row4">
                            <br>
                            <input type="text" name="country" placeholder="Country" required value="<?php echo $account['Country'] ?>">  
                            <input type="text" name="region" placeholder="Region" required value="<?php echo $account['Region'] ?>"> 
                            </div>

                            <div class="row5">
                            <br>
                            <input type="text" name="city" placeholder="City" required value="<?php echo $account['City'] ?>">  
                            <input type="number" name="postal" placeholder="Postal Code" required value="<?php echo $account['PostalCode'] ?>">  
                            </div>
                            <br>
                            <div class="row6">
                            <span>Date of Birth*</span>
                            <br>
                            <input type="date" name="dateofbirth" placeholder="Date Of Birth" required value="<?php echo $account['DateOfBirth'] ?>">  
                            
                            </div>
                                 


                                      <div class="updatebutton">
                                               <input type="submit" name="update" value="Update Changes">
                                            </div>
                                         </form>
                                         <div class="deletebutton">
                                               <input type="submit" name="delete" value="Delete Account">
                                            </div>
                              </div>
                            </div>

<!-- FOLLOWING TAB -->
                      <li>
                        <div class="dropdown2">
                          <a class="">Following   ></a>
                            <img src="css/manageaccount/following.png" class="followinglogo">
                          
                          <div class="dropdown2-content">
                              <div class="followingtext">
                                <br>
                                <img src="css/manageaccount/followedartists.png">
                                <br>
                                <br>
                              </div>
      <div class="followingtable">
            <table>   
                        <form action="manageartloveraccount.php" method="post" enctype="multipart/form-data">
                              
                              <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Account
                                              WHERE AccountID = $accountID
                                              ORDER BY AccountID DESC";
                                              
                        
                                              $stmt = sqlsrv_query($conn, $tsql);
                                            
                       
                         while ($followingaccount = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
                          if(!empty($followingaccount)){  
                          echo " 
            
                          <tr>
                          <img src='defaultprofilepics/".$followingaccount['DefaultPic'].".png' class='followingpic'>
                                <div class='followinginfo'>
                                            <span>".$followingaccount['FirstName']."</span>
                                            <span>".$followingaccount['LastName']."</span>
                                    <br>
                                    <div class='followingemail'>
                                            <span>".$followingaccount['Email']."</span>
                                    </div>
                                  
    
                              <input type='hidden' name='artid' value='".$followingaccount['AccountID']."'>
                              <br>
                              <input type='submit' name='viewart' value='Following' class ='following'>
                              <br>
                               
                  
                      ";
                          }
                      else   
                      echo " 
                            <span class='nofollowing'>You don't Follow Any Artists.</span>
                  ";
                         };
                  ?>
                            </form>
                            </div>
                    </div>
             </div>
             </table>               
           </li>

      <!-- ORDERS -->

                        <li> 
                          <div class="dropdown3">
                          <a class="" >Orders   ></a>
                             <img src="css/manageaccount/orders.png" class="orderslogo">

                          <div class="dropdown3-content">
                              <div class="profiletext">
                                <br>
                                <img src="css/manageaccount/ORDER.png">

                              </div>
                        <form action="manageartloveraccount.php" method="post" enctype="multipart/form-data">
                              <div class = "orderinfo">
                              <div class="row1"></div>
                              <br>
                              <br>
                              <div class="topheader">
                              <span>Filter</span>
                              <input type='submit' name='history' value='See Order History' class ='history'>
                              </div>
                              <br>
                              <img src="css/manageaccount/line.png" class="line">
                              <div class="orderheader">
                                  <span>ID</span>
                                  <span>ArtName</span>
                                  <span>DateWon</span>
                                  <span>Time Won</span>
                                  <span>Artist</span>
                                  <span>Highest Bid</span>
                                  <span>Art Image</span>
                              </div>
                           
     <div class="ordertable">
            <table>   
                        <form action="manageartloveraccount.php" method="post" enctype="multipart/form-data">
                              
                              <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Winner
                                              WHERE AccountID = $accountID
                                              ORDER BY Win_ID DESC";
                        
                                              $stmt = sqlsrv_query($conn, $tsql);
                                            
                         while ($order = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
                          if(!empty($order)){   
                          echo " 
            
                          <tr>
                                <div class='orderinfo'>
                                            <span class='category1'>".$order['Art_ID']."</span>
                                            <span class='category2'>".$order['Art_Name']."</span>
                                            <span class='category3'>".date_format($order['DateWon'],'F d Y')."</span>
                                            <span class='category4'>".date_format($order['TimeWon'],'h:i a')."</span>     
                                            <span class='category5'>".$order['Artist']."</span>
                                            <span class='category6'>".$order['Highest_Bid']."</span>
                                            <img src='arts/".$order['Art_Image']."' class='category22' oncontextmenu='return false;'>
                             
                                </div>

                      ";
                    }       
                  else   
                  echo " 
                        <span class='noorders'>No Records Found</span>
              ";
                  };  
                  ?>
                            </form>
                    </div>
                  </div>
                    </div>
             </div>
             </table>               
           </li>

<!-- BIDS -->

                      <li> 
                          <div class="dropdown4">
                          <a class="" >Bids  ></a>
                          <img src="css/manageaccount/bid.png" class="addresslogo">

                          <div class="dropdown4-content">
                              <div class="profiletext">
                                <br>
                                <img src="css/manageaccount/Bids.png">

                              </div>
                              <br>
                                            <span class='categoryA'>Bid No.</span>
                                            <span class='categoryB'>Art Name</span>
                                            <span class='categoryC'>Amount</span>
                                            <span class='categoryD'>Bid Date</span>
                                            <br>
                                            <br>
                              <div class="ordertable">

                                         
            <table>   
                        <form action="manageartloveraccount.php" method="post" enctype="multipart/form-data">
                              
                              <?php
                             
                                              
                                              $tsql = "SELECT * 
                                              FROM   Bids
                                              WHERE AccountID = $accountID
                                              ORDER BY Bid_ID DESC";
                        
                                              $stmt = sqlsrv_query($conn, $tsql);
                         
                                      
                         while ($order = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
                          if(!empty($order)){ 
                         
                          echo " 
            
                          <tr>
                                <div class='bidinfo'>
                                            <span class='category11'>".$order['Bid_ID']."</span>
                                            <span class='category8'>".$order['Art_Name']."</span>
                                            <span class='category9'>".$order['Ammount']."</span>
                                            <span class='category10'>".date_format($order['Bid_Date'],'Y/m/d g:i A')."</span>     
                                </div>

                      ";
                    }
                            
                  else   
                  echo " 
                        <span class='noorders'>No Records Found</span>
              ";
                  };
               
                  ?>
                            </form>
                    </div>
                  </div>
                    </div>
             </div>
             </table>
                              </div>
                            </div>
                      </li>




<!-- WISHLIST -->
        <li> 
            <div class="dropdown5">
                          <a class="" >Wishlists  ></a>
                            <img src="css/manageaccount/wishlist.png" class="wishlistlogo">

                          
                            <div class="dropdown5-content">
                            <div class="profiletext">
                                <br>
                                <img src="css/manageaccount/Wishlists.png">
                                <br>
                                <br>
                              </div>
      <div class="wishtable">
            <table>   
              
                              
                              <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Wish
                                              WHERE AccountID = $accountID
                                              ORDER BY Wish_ID DESC";
                        
                                              $stmt = sqlsrv_query($conn, $tsql);

                     
                         while ($artworks = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
                          if(!empty($artworks)){  
                          echo " 
            
                          <tr>
                          <img src='Arts/".$artworks['Art_Image']."' class='followingpic'>
                                <div class='wishinfo'>
                                            <span>".$artworks['Art_Name']."</span>     
                                    <br>
                                    <div class='wishemail'>
                                    <span>".$artworks['Artist']."</span>
                                    </div>
                    <form action='manageartloveraccount.php' method='post' enctype='multipart/form-data'>
    
                              <input type='hidden' name='wishid' value='".$artworks['Wish_ID']."'>
                              <br>
                              <input type='submit' name='wishdelete' value='Delete' class ='following'>
                              <br>
                               
                              </form>
                      ";
                    }
                    
                      else   
                      echo " 
                            <span class='nowish'>No Artworks.</span>
                  ";
                         }
                  ?>
                           
                            </div>
                    </div>
             </div>
             </table>   
                      </li>


                      </li>
                      </ul>
                      
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
   $("#result_shops").load('curtime.php');
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