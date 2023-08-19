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

if(isset($_POST['delete'])){
       
        $_SESSION['email'] = $email;
        header("Location: deleteartistaccount.php");
       };
    

       
if(isset($_POST['deleteart'])){
       
  $artid =  $_POST['artid'];
  $tsql = "DELETE FROM Arts WHERE Art_ID ='$artid'";
  $results = sqlsrv_query($conn, $tsql);
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
  FROM   ArtistAccount
  WHERE Email = '$email'";

  $stmt = sqlsrv_query($conn, $tsql);
  $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

$update = "UPDATE ArtistAccount SET Gender = '$gender', FirstName = '$firstname', LastName = '$lastname', MiddleName = '$middlename', PhoneNumber = '$contact', HomeNumber = '$homenumber', Street = '$street', Baranggay = '$baranggay', Country = '$country', Region = '$region', City = '$city', PostalCode = '$postal', DateOfBirth = '$date'
 WHERE Email = '$email'";
$results = sqlsrv_query($conn, $update);

echo '<script type ="text/JavaScript">';  
echo 'alert("Account Successfully Updated!")';  
echo '</script>';  

};

 
if(isset($_POST['postart'])){
  $_SESSION['artist'] = $_POST['artist'];
  $_SESSION['artname'] = $_POST['artname'];
  $_SESSION['dimension'] = $_POST['dimension'];
  $_SESSION['arttype'] = $_POST['arttype'];
  $_SESSION['description'] = $_POST['description'];
  $_SESSION['price'] = $_POST['price'];
  $_SESSION['biddate'] = $_POST['biddate'];
  $_SESSION['bidtime'] = $_POST['bidtime'];
  $_SESSION['venue'] = $_POST['venue'];

  $image1 = $_FILES['image1']['name'];
  $image2 = $_FILES['image2']['name'];
  $image3 = $_FILES['image3']['name'];
  $target1 = "Arts/".basename($image1);
  $target2 = "Arts/".basename($image2);
  $target3 = "Arts/".basename($image3);
  $_SESSION['image1'] = $image1;
  $_SESSION['image2'] = $image2;
  $_SESSION['image3'] = $image3;
  $_SESSION['target1'] = $target1;
  $_SESSION['target2'] = $target2;
  $_SESSION['target3'] = $target3;
  
  move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
  move_uploaded_file($_FILES['image2']['tmp_name'], $target2);
  move_uploaded_file($_FILES['image3']['tmp_name'], $target3);


  header("Location: signature.php");

};


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
       <li><a href="artistpage.php">HOME</a></li>
       <li><a href="admin_page.php">AUCTIONS</a></li>
       <li><a href="admin_page.php">BID FOR THE FUTURE</a></li>
       <li><a href="admin_page.php">ARTISTS</a></li>
       <li><a href="admin_page.php">CONTACT</a></li>
      </ul>
      <div>
      <button class="profileiconbutton" href="#" data-toggle="modal" data-target="#account">
      <img src="defaultprofilepics/<?php echo $row['DefaultPic']?>.png" class="profileicon">
      </button>
  </nav>

 
  <!-- Account Panel -->
  <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
            <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   ArtistAccount
                                              WHERE ArtistAccountID = '$accountID'";
                        
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
                                              FROM   ArtistAccount
                                              WHERE Email = '$email'";
                        
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
                          <form action="manageartistaccount.php" method="post" enctype="multipart/form-data">
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

<!-- DASHBOARD -->
                      <li>
                        <div class="dropdown-dash">
                          <a class="">Dashboard   ></a>
                            <img src="css/manageaccount/dashboards.png" class="dashboardlogo">
                          
                          <div class="dropdown-dash-content">
                              <div class="dashboardtext">
                                <br>
                                <img src="css/manageaccount/dashboard.png">
                                <br>
                                <br>
                              </div>
                              <span class='nodash'>Not Available.</span>
                        </div>
                    </div>
                          
                        </li>

      <!-- ADD ARTWORK -->

                        <li> 
                          <div class="dropdown-addart">
                          <a class="" >Add Artwork   ></a>
                             <img src="css/manageaccount/addartworks.png" class="addartworklogo">

                          <div class="dropdown-addart-content">
                              <div class="addartworktext">
                                <br>
                                <img src="css/manageaccount/addartwork.png">

                              </div>
                          <form action="manageartistaccount.php" method="post" enctype="multipart/form-data">
                        
                    <div class = "addartinfo">
                              <div class="row1">
                              <span>Artwork Name</span>
                              <span>Art Dimension (Size)</span>
                              <br>
                                <input type="text" name="artname" placeholder="Art Name" required value="">
                                <input type="text" name="dimension" placeholder="Dimension" required value="">
                                </div>
                            <br>   
                            <div class="row2">
                            <span>Category</span>
                            <span>Description</span>
                            <br>
                            <select name="arttype" class="" required value="">
                                <option style="display:none"></option>
                                                                <option value="oil in canvas">Oil In Canvas</option>
                                                                <option value="digital">Digital Art</option>
                                                                <option value="paintings">Painting</option>
                                                                <option value="drawings">Drawing</option>
                                                                <option value="sculpture">Sculpture</option>
                                                                <option value="acrylic">Acrylic</option>
                                                                <option value="charcoal">Charcoal</option>
                                                                <option value="oil">Oil</option>
                                                                <option value="watercolor">Watercolor</option>
                                                                <option value="pencil">Pencil</option>
                                                                <option value="sketch">Sketch</option>
                                                                <option value="ink">Ink</option>
                                                                <option value="3d">3d Art</option>
                                                                <option value="abstract">Abstract</option>
                                                                <option value="photorealism">Photorealism</option>
                                                                <option value="street">Street Art</option>
                                                                <option value="surrealism">Surrealism</option>
                                                  </select>
                            <input type="text" name="description" placeholder="Art Description" required value="">  
                            </div>
                            <br>   
                            <div class="row3">
                            <span>Starting Price</span>
                            <span>Bidding Date</span>
                            <span>Bidding Time</span>
                            <br>
                            <input type="number" name="price" placeholder="(P)" required value="">  
                            <input type="date" name="biddate" placeholder="" required value="">  
                            <input type="time" name="bidtime" placeholder="" required value="">  
                            </div>
                            <br>
                            <div class="row4">
                            <span>Venue</span>
                            <br>
                            <input type="text" name="venue" placeholder="Auction Venue" required value="">
                            </div>
                           
                            <div class="row5">
                            <img src="css/manageaccount/line.png" class="line">
                            <br>
                            <span>Art Photos</span>
                            <br>
                              <div class="selecttext">
                                <span>(Select 3 Art Photo)</span>
                              </div>
                                      <div class="uploadart">
                                        <div id="selectedBanner" class="selected"></div>
                                            <input type="file" id="img" name="image1" required>
                                            <input type="file" id="img2" name="image2" required>
                                            <input type="file" id="img3" name="image3" required>
                                            </div>        
                            </div>
                                            <div class="postbutton">
                                            <input type="hidden" name="artist" value="<?php echo $account['FirstName'] ?> <?php echo $account['LastName'] ?>">
                                               <input type="submit" name="postart" value="Post">
                                            </div>
                        
                              </div>
     
                                         </form>
                    </div>
                  </div>
                   
          
                        
                       </li>

<!-- ARTWORKS -->

                      <li> 
                      <div class="dropdown2">
                          <a class="">Artworks   ></a>
                            <img src="css/manageaccount/artwork.png" class="artworklogo">
                          
                          <div class="dropdown2-content">
                              <div class="artworktext">
                                <br>
                                <img src="css/manageaccount/artworks.png">
                                <br>
                                <br>
                              </div>
      <div class="followingtable">
            <table>   
                        <form action="manageartistaccount.php" method="post" enctype="multipart/form-data">
                              
                              <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Arts
                                              WHERE ArtistAccountID = $accountID
                                              ORDER BY Art_ID DESC";
                        
                                              $stmt = sqlsrv_query($conn, $tsql);
                          
                         while ($artworks = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
                          if(!empty($artworks)){ 
                          echo " 
            
                          <tr>
                          <img src='Arts/".$artworks['Art_Image']."' class='followingpic'>
                                <div class='followinginfo'>
                                            <span>".$artworks['Art_Name']."</span>
                                            <span>".$artworks['Art_Type']."</span>
                                    <br>
                                    <div class='followingemail'>
                                            <span>".$artworks['Dimension']."</span>
                                    </div>
                                  
    
                              <input type='hidden' name='artid' value='".$artworks['Art_ID']."'>
                              <br>
                              <input type='submit' name='deleteart' value='Delete' class ='following'>
                              <br>
                               
                  
                      ";
                    }
                    
                      else  {
                      echo " 
                            <span class='nofollowing'>No Artworks.</span>
                  ";} 
                         }
                  ?>
                            </form>
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
      var selDiv = "";
      var storedFiles = [];
      $(document).ready(function () {
        $("#img").on("change", handleFileSelect);
        selDiv = $("#selectedBanner");
      });

      function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function (f) {
          if (!f.type.match("image.*")) {
            return;
          }
          storedFiles.push(f);

          var reader = new FileReader();
          reader.onload = function (e) {
            var html =
              '<img src="' +
              e.target.result +
              "\" data-file='" +
              f.name +
              "' class='' width='120px' height='100px';>";
            selDiv.html(html);
          };
          reader.readAsDataURL(f);
        });
      }
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
  

    <script type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>