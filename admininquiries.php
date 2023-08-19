<?php

@include 'config.php';
date_default_timezone_set("Asia/Manila");
session_start();

if(!isset($_SESSION['adminid'])){ 
   header('location:homepage.php');
}

$email = $_SESSION['email'];
$convoid = $_SESSION['inquiryid'];
$isnotartist = $_SESSION['isnotartist'];

$tsql = "SELECT * 
         FROM   ArtistAccount
         WHERE Email = '$email'";

$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


if(isset($_POST['viewconvoartist'])){
  $_SESSION['inquiryid'] = ($_POST['inquiryid']);
  $_SESSION['isnotartist'] = 0;
 

  header('location:admininquiries.php');
  };

  
  
if(isset($_POST['viewconvoartlover'])){
  $_SESSION['inquiryid'] = ($_POST['inquiryid']);
  $_SESSION['isnotartist'] = 1;

  header('location:admininquiries.php');
  };


  
if(isset($_POST['sendmessage'])){
  if($isnotartist==1){

    $_SESSION['isnotartist'] = 1;
    $receiverid = $_POST['id'];
    $message = $_POST['message'];
   

    $date = date('Y-m-d');
    $time = date('h:i:s A');
    $datetimes = date("Y-m-d h:i:s A");

    


    $tsql = "SELECT * 
            FROM   Account
            WHERE ID = '$receiverid'";

    $stmt = sqlsrv_query($conn, $tsql);
    $Srow = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

    $profile = $Srow['DefaultPic'];
    
    $insertmessage = "INSERT INTO AdminResponse (ArtLoverAccountID, DateSent, TimeSent, Response,  AdminPic, DateTimeS , ArtLoverPic) 
    VALUES ('$receiverid','$date','$time','$message', 'A','$datetimes' , '$profile' )";
    $results = sqlsrv_query($conn, $insertmessage);


    header('location:admininquiries.php');
  }
  };

  
if(isset($_POST['sendmessage'])){
  if($isnotartist==0){

    $_SESSION['isnotartist'] = 0;
    $receiverid = $_POST['id'];
    $message = $_POST['message'];

 
    $date = date("Y-m-d");
    $time = date("h:i:s A");
    $datetimes = date("Y-m-d h:i:s A");

    
    $insertmessage = "INSERT INTO AdminResponse (ArtistAccountID, DateSent, TimeSent, Response, AdminPic, DateTimeS , ArtLoverPic) 
    VALUES ('$receiverid','$date','$time','$message', 'A', '$datetimes', ')";
    $results = sqlsrv_query($conn, $insertmessage);

    header('location:admininquiries.php');

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
  </div>


</nav>

   

<div class="w3-sidebar w3-dark-grey w3-bar-block w3-collapse w3-card" style="width:300px;" id="mySidebar">
<br>
<br>
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
              <h4>Art Collector Inquiries</h4>
            </div>


<form action='admininquiries.php' method='post' enctype='multipart/form-data'>
<?php

$ssql = "SELECT
DISTINCT ArtLoverAccountID
FROM AdminResponse";

$sstmt = sqlsrv_query($conn, $ssql);

while ($srow = sqlsrv_fetch_array( $sstmt, SQLSRV_FETCH_ASSOC)){
  $ALA = $srow['ArtLoverAccountID'];

  $tsql = "SELECT * 
  FROM   AdminResponse
  WHERE ArtLoverAccountID = $ALA
  ORDER BY Adminresponse_ID DESC";

  $stmt = sqlsrv_query($conn, $tsql);

  $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ?>
  <form action='admininquiries.php' method='post' enctype='multipart/form-data'>
  <div class="chat_list">
  <div class="chat_people">
      <div class="chat_img"><button type='submit' name='viewconvoartlover' style=" border-width : 0;"><img src="defaultprofilepics/<?= $row['ArtLoverPic']?>.png" alt="sunil"> </div>
          <div class="chat_ib">
         
                  <h5><?=$row['ArtLoverName']?><span class="chat_date">&nbsp;<?=date_format($row['TimeSent'],'h:i a')?></span><span class="chat_date"><?=date_format($row['DateSent'],'F d Y')?></span></h5>
                  <?php if(!empty($row['Response']))
                          echo"<p>You:&nbsp;" .$row['Response']."</p> ";
                       else 
                          echo"<p>" .$row['ArtLoverResponse']."</p> "
                    ?>
                  <input type='hidden' name='inquiryid' value='<?=$row['ArtLoverAccountID'];?>'>
                
                </div>
              </div>
                      
              </div>
  </form>
 <?php } ?>


<div class="text-center">
              <h4>Artist Inquiries</h4>
            </div>
  <?php

$tsql = "SELECT * 
FROM   ArtistInquiries
ORDER BY ArtistInquiry_ID DESC";

$stmt = sqlsrv_query($conn, $tsql);

  while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { ?>
  <form action='admininquiries.php' method='post' enctype='multipart/form-data'>
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
 
        <div class="mesgs" >
          <div class="msg_history" id="element">

<form action='admininquiries.php' method='post' enctype='multipart/form-data'>

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

  
   while ($crow = sqlsrv_fetch_array($ctmt, SQLSRV_FETCH_ASSOC) AND $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ){?>
 <?php { 
  
        $datereceive = date_format($crow['DateSent'],'Y-m-d');
        $strdate = mb_strimwidth($datereceive, 0, 35, '');

        $tsql = "SELECT * 
        FROM   ArtistInquiries
        WHERE DateSent LIKE %" . $strdate. "%
        ORDER BY ArtistInquiry_ID DESC";


        $stmt = sqlsrv_query($conn, $tsql);

        $cdatereceive = date_format($row['DateSent'],'Y-m-d');
        $cstrdate = mb_strimwidth($cdatereceive, 0, 35, '');

        $csql = "SELECT * 
        FROM   AdminResponse
        WHERE DateReceived LIKE %" . $strdate . "%
        ORDER BY AdminResponse_ID DESC";

        $ctmt = sqlsrv_query($conn, $csql);


  
  ?>

            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="defaultprofilepics/<?= $row['ArtistPic']?>.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?=$row['Response']?></p>
                  <span class="time_date"> <?=date_format($row['TimeSent'],'h:i A')?>    |    <?=date_format($row['DateSent'],'F d Y')?></span></div>
              </div>
            </div>

            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?=$crow['Response']?></p>
                <span class="time_date"> <?=date_format($crow['TimeSent'],'h:i A')?>    |    <?=date_format($crow['DateReceived'],'F d Y')?></span> </div>
            </div>
   
         
  <?php
   } 
   
   }
   
  ?>

         <?php }

  else{
    
    $csql = "SELECT * 
    FROM   AdminResponse
    WHERE ArtLoverAccountID = '$convoid'";
    
    $ctmt = sqlsrv_query($conn, $csql);
   
    while ($crow = sqlsrv_fetch_array( $ctmt, SQLSRV_FETCH_ASSOC) )  {
      ?>

    <form action='admininquiries.php' method='post' enctype='multipart/form-data'>
      <?php if(!empty($crow['ArtLoverResponse'])){
       ?>
                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="defaultprofilepics/<?= $crow['ArtLoverPic']?>.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p><?=$crow['ArtLoverResponse']?></p>
                      <input type="hidden" name="profilepic" value="<?=$crow['ArtLoverResponse']?>" />
                      <span class="time_date"> <?=date_format($crow['TimeSent'],'h:i A')?>    |    <?=date_format($crow['DateSent'],'F d Y')?></span></div>
                  </div>
                </div>
                 
      <?php }else{

      }
      ?>
    
       
    <?php if(!empty($crow['Response'])){?>

        <div class="outgoing_msg">
        <div class="sent_msg">
          <p><?=$crow['Response']?></p>
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