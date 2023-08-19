<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{
  $email = ($_POST['email']);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename = $_POST['middlename'];
  $dateofbirth = $_POST['dateofbirth'];
  $phonenumber = $_POST['phonenumber'];
  $gender = $_POST['gender'];
  $baranggay = $_POST['baranggay'];
  $country = $_POST['country'];
  $region = $_POST['region'];
  $homenumber = $_POST['homenumber'];
  $city = $_POST['city'];
  $postal = $_POST['postal'];

              $_SESSION['email'] = $email;
              $_SESSION['firstname'] = $firstname;
              $_SESSION['lastname'] = $lastname;
              $_SESSION['middlename'] = $middlename;
              $_SESSION['dateofbirth'] = $dateofbirth;
              $_SESSION['phonenumber'] = $phonenumber;
              $_SESSION['gender'] = $gender;
              $_SESSION['baranggay'] = $baranggay;
              $_SESSION['country'] = $country;
              $_SESSION['region'] = $region;
              $_SESSION['homenumber'] = $homenumber;
              $_SESSION['city'] = $city;
              $_SESSION['postal'] = $postal;



  $validID = $_FILES['image']['name'];

  $target = "ValidID/".basename($validID);

  move_uploaded_file($_FILES['image']['tmp_name'], $target);
  
  $_SESSION['validID'] = $validID;

  
  header("Location: createartistpage2.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/nav4.css">
    <link rel="stylesheet" href="css/createartistaccount3.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Bootstrap/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
  
  <!-- Account Panel -->

    <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
            <h2>My Account</h2>
               <div class="account_modal-body">
                <p1>
                Log in or Register to manage  cart, bid,  and see auction results, receive email updates, and see personalized recommendations.
                </p1>
                    </div>
                    <div class="account_modal-footer">
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
  <div class="artisticon">
          <img src="css/createartistaccount/imanartist.png">
        </div>
        <div class="artist">
        <img src="css/createartistaccount/artist.png">
        </div>
        <div class="artistreg">
        <img src="css/createartistaccount/artistregist.png">
        </div>
  <!-- Create Artist Account  -->
     <div class ="artistaccount">
     <div class="container">
    <form action=" createartist.php" method="post" enctype="multipart/form-data">
        <div class="title">
        </div>
        <div class="personalinfo">
        <img src="css/createartistaccount/personal.png">
        </div>
        <br>
        <div class="option2">First Name</div>
        <div class="input-box2 underline">
          <input type="text" name="firstname" placeholder="" required>
          <div class="underline2"></div>
        </div>
        <div class="option">Date of Birth</div>
        <div class="input-box underline">
          <input type="date" name="dateofbirth" placeholder="" required>
          <div class="underline"></div>
        </div>
        <div class="option2">Country</div>
        <div class="input-box2 underline">
          <input type="text" name="country" placeholder="" required>
          <div class="underline2"></div>
        </div>
        <div class="option2">Baranggay</div>
        <div class="input-box2 underline">
          <input type="text" name="baranggay" placeholder="" required>
          <div class="underline2"></div>
        </div>

        <div class="column2">
          <div class="option2">Middle Name</div>
          <div class="input-box2 underline">
            <input type="text" name="middlename" placeholder="" required>
            <div class="underline2"></div>
          </div>
          <div class="option2">Email Address</div>
          <div class="input-box2 underline">
            <input type="email" name="email" placeholder="" required>
            <div class="underline2"></div>
          </div>
          <div class="option">Region</div>
          <div class="input-box underline">
            <input type="text" name="region" placeholder="" required>
            <div class="underline"></div>
          </div>
          <div class="option2">Street Name, Building, House No.</div>
          <div class="input-box2 underline">
            <input type="text" name="homenumber" placeholder="" required>
            <div class="underline2"></div>
          </div>
        </div>

        <div class="column3">
          <div class="option2">Last Name</div>
          <div class="input-box2 underline">
            <input type="text" name="lastname" placeholder="" required>
            <div class="underline2"></div>
          </div>
          <div class="option">Phone Number (+63)</div>
          <div class="input-box underline">
            <input type="number" name="phonenumber" placeholder="" required>
            <div class="underline"></div>
          </div>
          <div class="option">City</div>
          <div class="input-box underline">
            <input type="text" name="city" placeholder="" required>
            <div class="underline"></div>
          </div>
          <div class="option">Postal Code</div>
          <div class="input-box underline">
            <input type="number" name="postal" placeholder="" required>
            <div class="underline"></div>
          </div>
        </div>

        <div class="column4">
          <div class="option">Gender</div>
          <select name="gender" class="option2">
          <option style="display:none">Male</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
        </div>
        <div class="uploadid">
          <style>
            .uploadid{
              position:absolute;
              top:300px;
              left:1400px;
            }
          </style>
                                        <div id="selectedBanner" class="selected">Upload Valid ID</div>
                                        <input type="file" id="img" name="image" required>
                                            </div>

        <div class="input-box button">
          <input type="submit" name="submit" value="Next">
        </div>
      </form>
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
  
<nav>

<!-- TOP NAVIGATION BAR -->

<div class="menu"></div>
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
 <li><a href="admin_page.php">AUCTIONS</a></li>
 <li><a href="admin_page.php">BID FOR THE FUTURE</a></li>
 <li><a href="admin_page.php">ARTISTS</a></li>
 <li><a href="admin_page.php">CONTACT</a></li>
</ul>
<div>
<button class="accountmenu" href="#" data-toggle="modal" data-target="#account"></button>
</div>
</nav>


          
     
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
              "' class='' width='170px' height='200px';>";
            selDiv.html(html);
          };
          reader.readAsDataURL(f);
        });
      }
    </script>
  


    <sc type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></sc>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>