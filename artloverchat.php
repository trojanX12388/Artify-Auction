<?php

@include 'config.php';
date_default_timezone_set("Asia/Manila");
session_start();

if(!isset($_SESSION['artloverid'])){ 
   header('location:homepage.php');
}

$email = $_SESSION['email'];
$convoid = $_SESSION['inquiryid'];
$isnotartist = $_SESSION['isnotartist'];

$tsql = "SELECT * 
         FROM   Account
         WHERE Email = '$email'";

$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

$Id = $row['ID'];
$pic = $row['DefaultPic'];
$name = $row['FirstName'];

if(isset($_POST['viewconvoartist'])){
  $_SESSION['inquiryid'] = ($_POST['inquiryid']);
  $_SESSION['isnotartist'] = 0;


  header('location:artloverchat.php');
  };

  
  
if(isset($_POST['viewconvoartlover'])){
  $_SESSION['inquiryid'] = ($_POST['inquiryid']);
  $_SESSION['isnotartist'] = 1;

  header('location:artloverchat.php');
  };


  
if(isset($_POST['sendmessage'])){
  if($isnotartist==1){

    $_SESSION['isnotartist'] = 1;
 
    $message = $_POST['message'];
 
    $date = date('Y-m-d');
    $time = date('h:i:s');

    
    $insertmessage = "INSERT INTO AdminResponse (ArtLoverAccountID, DateSent, TimeSent, ArtLoverResponse,  ArtLoverPic , ArtLoverName) 
    VALUES ('$Id','$date','$time','$message', '$pic', '$name')";
    $results = sqlsrv_query($conn, $insertmessage);


    header('location:artloverchat.php');
  }
  };



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/artistpage5.css">
    <link rel="stylesheet" href="css/clock.css">
    <link rel="stylesheet" href="css/chat2.css">
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
          <li><a href="auctions.php">AUCTIONS</a></li>
          <li><a href="bid.php">BID FOR THE FUTURE</a></li>
          <li><a href="artists.php">ARTISTS</a></li>
          <li><a href="arts.php">ARTS</a></li>
        </ul>
      <div>
      <button class="profileiconbutton" href="#" data-toggle="modal" data-target="#account">
      <img src="defaultprofilepics/<?php echo $row['DefaultPic']?>.png" class="profileicon">
      </button>

     
    </div>
    </nav>
 
  <!-- Account Panel -->

    <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
            <button type="button" class="closeacc" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <?php
                                              
                                              $tsql = "SELECT * 
                                              FROM   Account
                                              WHERE Email = '$email'";
                        
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
                    <div class="account_modal-footer">
                    <div class="signs">                   
                      <ul>
                        <li><a class="manage" href="manageartloveraccount.php">Manage Account</a></li>
                        <li><a class="logout" href="logout.php">Log Out</a></li>
                      </ul>
                    </div>
                </div>
                </div>
            </div>
  </div>
  </div>
<style>

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}


/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>



<div class="container">
<h3 class=" text-center">Inquiries</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <span class="input-group-addon">
                
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
      
          <div class="text-center">
              <h4>Artify Auction</h4>
            </div>


<form action='artloverchat.php' method='post' enctype='multipart/form-data'>
<?php


$tsql = "SELECT * 
FROM   AdminResponse
WHERE ArtLoverAccountID = $Id
ORDER BY AdminResponse_ID DESC";

$stmt = sqlsrv_query($conn, $tsql);
$check = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

if(empty($check['ArtLoverAccountID'])){
$todaydate = date('Y-m-d');
$todaytime = date('h:i:s');

$insertmessage = "INSERT INTO AdminResponse (ArtLoverAccountID, DateSent, TimeSent,   ArtLoverPic , ArtLoverName) 
VALUES ('$Id','$todaydate','$todaytime','$pic', '$name')";
$results = sqlsrv_query($conn, $insertmessage);
}

$tsql = "SELECT * 
FROM   AdminResponse
WHERE ArtLoverAccountID = $Id
ORDER BY AdminResponse_ID DESC";


$stmt = sqlsrv_query($conn, $tsql);
$adminchat = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
$adminmessage = $adminchat['Response'];
 ?>
  <div class="chat_list">
  <div class="chat_people">
      <div class="chat_img"><button type='submit' name='viewconvoartlover' style=" border-width : 0;"><img src="defaultprofilepics/artify.png" alt="sunil"> </div>
          <div class="chat_ib">
                  <h5>Artify Auction<span class="chat_date">&nbsp;<?=date_format($adminchat['TimeSent'],'h:i a')?></span><span class="chat_date"><?=date_format($adminchat['DateSent'],'F d Y')?></span></h5>
                  <?php if(!empty($adminchat['Response']))
                          echo"<p>" .$adminchat['Response']."</p> ";
                       else 
                          echo"<p>You:&nbsp;" .$adminchat['ArtLoverResponse']."</p> "
                    ?>
                     
            <?php ?>
  </form>
          </div>
        </div>
      </div>


<div class="text-center">
              <h4>Artist Inquiries</h4>
            </div>
  <?php

$tsql = "SELECT * 
FROM   ArtistInquiries
ORDER BY ArtistInquiry_ID DESC";

$stmt = sqlsrv_query($conn, $tsql);

  while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { ?>
  <form action='artloverchat.php' method='post' enctype='multipart/form-data'>
  <div class="chat_list">
  <div class="chat_people">
      <div class="chat_img"><button type='submit' name='viewconvoartist' style=" border-width : 0;"><img src="defaultprofilepics/<?=$row['ArtistPic']?>.png" alt="sunil"> </div>
          <div class="chat_ib">
          <h5><?=$row['ArtistName']?><span class="chat_date">&nbsp;<?=date_format($row['TimeSent'],'h:i a')?></span><span class="chat_date"><?=date_format($row['DateSent'],'F d Y')?></span></h5>
          <p><?=$row['Response']?></p>
           <input type='hidden' name='inquiryid' value='<?=$row['ArtistAccountID'];?>'>

                </div>
              </div>
                      
              </div>
             
  </form>
  <?php }
  ?>
   </div>
        </div>
 
        <div class="mesgs">
          <div class="msg_history" id="element">
        
        <?php

if($isnotartist==0){
  
$tsql = "SELECT * 
FROM   ArtistInquiries
WHERE ArtistAccountID = '$convoid'";

$stmt = sqlsrv_query($conn, $tsql);

$csql = "SELECT * 
FROM   AdminResponse
WHERE ArtistAccountID = '$convoid'";

$ctmt = sqlsrv_query($conn, $csql);

  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
 <form action='artloverchat.php' method='post' enctype='multipart/form-data'>
      
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="defaultprofilepics/<?= $row['ArtistPic']?>.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?=$row['Response']?></p>
                  <span class="time_date"> <?=date_format($row['TimeSent'],'h:i A')?>    |    <?=date_format($row['DateSent'],'F d Y')?></span></div>
              </div>
            </div>
            
           <?php 
  while ($crow = sqlsrv_fetch_array($ctmt, SQLSRV_FETCH_ASSOC)) { ?>
          <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?=$crow['Response']?></p>
                <span class="time_date"> <?=date_format($crow['TimeSent'],'h:i A')?>    |    <?=date_format($crow['DateSent'],'F d Y')?></span> </div>
            </div>
            
         
  
         
  <?php }
  ?>
               
  <?php }
  ?>  
         <?php }
  
  else{
    
  
    $csql = "SELECT * 
    FROM   AdminResponse
    WHERE ArtLoverAccountID = $Id";
    
    $ctmt = sqlsrv_query($conn, $csql);
   
    while ($crow = sqlsrv_fetch_array( $ctmt, SQLSRV_FETCH_ASSOC) )  {
      ?>

    <form action='artloverchat.php' method='post' enctype='multipart/form-data'>
      <?php if(!empty($crow['Response'])){
       ?>
                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="defaultprofilepics/artify.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p><?=$crow['Response']?></p>
                      <input type="hidden" name="profilepic" value="<?=$crow['AdminPic']?>" />
                      <span class="time_date"> <?=date_format($crow['TimeSent'],'h:i A')?>    |    <?=date_format($crow['DateSent'],'F d Y')?></span></div>
                  </div>
                </div>
                 
      <?php }else{

      }
      ?>
    
       
    <?php if(!empty($crow['ArtLoverResponse'])){?>

        <div class="outgoing_msg">
        <div class="sent_msg">
          <p><?=$crow['ArtLoverResponse']?></p>
          <span class="time_date"> <?=date_format($crow['TimeSent'],'h:i A')?>    |    <?=date_format($crow['DateSent'],'F d Y')?></span> </div>
      </div>
       
                 
      <?php }
      else{

      }
      ?>
      <?php }
      
      ?>
      
      <?php }
      
      ?>
      
  
                </div>
                <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" name="message" class="write_msg" placeholder="Type a message" />
              <input type="hidden" name="id" value="<?=$convoid?>" />
              <input type="hidden" name="profilepic" value="<?=$profilepic?>" />
              <button class="msg_send_btn" type='submit' name='sendmessage'><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>

  </form>


     
<!-- SCROLL MESSAGE DOWN -->

<script>

var element = document.querySelector('#element');

element.scrollTop = element.scrollHeight;

</script>

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