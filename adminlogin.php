<?php
@include 'config.php';

session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if (isset($_POST["login"]))
{
  $email = ($_POST['email']);
  $pass = ($_POST['password']);
  
  
  $tsql = "SELECT *  
            FROM   AdminAccount
            WHERE Email = '$email'
            AND   Password = '$pass'";

  $stmt = sqlsrv_query($conn, $tsql);

     $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

     if($row['Email'] == $email && $row['Password'] == $pass )
       {
 
      if($row['MFA'] == 1){
         //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'artifyauction.service@gmail.com';

        //SMTP password
        $mail->Password = 'dzftmaunubhfmdnm';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your_email@gmail.com', 'Artify Auction');

        //Add a recipient
        $mail->addAddress($email, $lastname);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
                    
            $tsql = "SELECT *  
            FROM   AdminAccount";

        $stmt = sqlsrv_query($conn, $tsql);
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

    
              $insertlogin = "UPDATE AdminAccount SET Verification_Code = '$verification_code'
              WHERE Email = '$email'";
              $results = sqlsrv_query($conn, $insertlogin);
              $_SESSION['email'] = $email;
              $_SESSION['inquiryid'] = 0;
              $_SESSION['isnotartist'] = 0;
              header("Location: verifyadmin.php"); 
            } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }              
      }
      else{
        $tsql = "SELECT *  
        FROM   AdminAccount";

    $stmt = sqlsrv_query($conn, $tsql);
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

        $_SESSION['adminid'] = $row['AdminAccountID'];
        $_SESSION['email'] = $email;
        $_SESSION['inquiryid'] = 0;
        $_SESSION['isnotartist'] = 0;
 

        header("Location: adminpage.php");  
        }
              
}
else{
  $error[] = 'Incorrect Password!';
  header('location:failedadminlogin.php');
}
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/nav4.css">
    <link rel="stylesheet" href="css/createartistaccountpage2_3.css">
    
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
      
  <!-- Create Artist Account  -->
     <div class ="artistaccount">
      <div class="container">
    <form action="adminlogin.php" method="post" enctype="multipart/form-data">
        <div class="title">
        </div>
        <div class="artistsignin">
        <img src="css/admin/admin.png">
        </div>
        <div class="personalinfo">
       
  
        <br>
        </div>
        <div class="option2">Username/Email</div>
        <div class="input-box2 underline">
          <input type="text" name="email" placeholder="" required>
          <div class="underline2"></div>
        </div>
        <div class="option2">Password</div>
        <div class="input-box2 underline">
          <input type="password" name="password" placeholder="" required>
          <div class="underline2"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="login" value="Login">
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

      


    <sc type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></sc>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>