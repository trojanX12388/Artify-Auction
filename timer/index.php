<!DOCTYPE html>
<html lang="en">
<head>
<title>Coming Soon Counter</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main1.css">
<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="wsize1">
<p class="txt-center p-b-23">
<i class="zmdi zmdi-card-giftcard cl0 fs-60"></i>
</p>

		<?php
		@include 'config.php';
		date_default_timezone_set("Asia/Manila");
		session_start();
		$email = $_SESSION['email'];
        $ARTID = $_SESSION['artid'];

        $plus= $ARTID+1;
        $minus= $ARTID-1;

                                              
		$tsql = "SELECT * 
		FROM   Arts
		WHERE Art_ID = $ARTID";

		$stmt = sqlsrv_query($conn, $tsql);
		$art = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

		$biddate = date_format($art['Auction_Date'],'F d Y');
		$bidtime = date_format($art['Bid_Time'],'h:i a');

		//Enter the date you wants to show in the frontend
			$date = $biddate;
		//Enter the time you wants to show in the frontend
			$time = $bidtime;
			$date_today = $date . ' ' . $time;

		?>
		<script type="text/javascript">
			//Set the date we are counting down to
			var count_id = "<?php echo $date_today; ?>";
			var countDownDate = new Date(count_id).getTime();
			//Update the count down every 1 second
			var x = setInterval(function(){
			//Get today's date and time
			var now = new Date().getTime();
			//Find the distance between now and the count down date
			var distance = countDownDate - now;
			//Time calculations for day,hours,minutes and seconds
			var days = Math.floor(distance/(1000*60*60*24));
			var hours = Math.floor((distance%(1000*60*60*24))/(1000*60*60));
			var minutes = Math.floor((distance%(1000*60*60))/(1000*60));
			var seconds = Math.floor((distance%(1000*60))/1000);
			//Output the results in an element with id
			document.getElementById("day").innerHTML = days;
			document.getElementById("hours").innerHTML = hours;
			document.getElementById("minutes").innerHTML = minutes;
			document.getElementById("seconds").innerHTML = seconds;
			//If the count down over,write some text
			if(distance<0){
				clearInterval(x);
				document.getElementById("demo").innerHTML = "EXPIRED";
			
			}
			},1000);
		</script>

		<?php 
		
		$artbiddate = date_format($art['Auction_Date'],'y-m-d');
		$currdate = date('y-m-d');
		$strdate = strtotime($artbiddate);
		$strcurr = strtotime($currdate);

		$artbidtime= date_format($art['Bid_Time'],'h:i:s a');
		$currtime = date('h:i:s a');
		$strtime = strtotime($artbidtime);
		$strcurrtime = strtotime($currtime);


		$diffdate = ($strdate-$strcurr);
		$difftime = ($strtime-$strcurrtime);
		$difference = ($diffdate+$difftime);

		$sample1 = ($strtime-$strdate);
		$currtime1 = date('y-m-d h:i:s a');
		$samplecurrtime =  strtotime($currtime1);
		$diffsample = ($strcurrtime-$strcurr);

		if($difference <= 0)
		{

		   $tsql = "SELECT * 
		   FROM   Arts
		   WHERE Art_ID = '$ARTID'";
		 
		   $stmt = sqlsrv_query($conn, $tsql);
		   $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

		   $artid = $row['Art_ID'];
		   $artname = $row['Art_Name'];
		   $artbid = $row['Art_Bid'];
		   $datewon = date("Y-m-d");
		   $timewon = date("h:i:s a");
		   $artist = $row['Artist'];
		   $artimage = $row['Art_Image'];

		   $update = "UPDATE Arts SET Availability = '0' WHERE Art_ID = '$ARTID'";
		   $results = sqlsrv_query($conn, $update);

			
		 if($row['Winner']==0){

			$Aid = $row['ID'];

			$Csql = "SELECT * 
			FROM   Bids
			WHERE Art_ID = '$ARTID'
			ORDER BY Ammount DESC";

			$Ctmt = sqlsrv_query($conn, $Csql);
			$Crow = sqlsrv_fetch_array( $Ctmt, SQLSRV_FETCH_ASSOC);
 
		   if($Crow['Ammount']==$artbid){

			$Bsql = "SELECT * 
			FROM   Bids
			WHERE Art_ID = '$ARTID'
			ORDER BY Ammount DESC";
		  
			$Btmt = sqlsrv_query($conn, $Bsql);
			$Brow = sqlsrv_fetch_array( $Btmt, SQLSRV_FETCH_ASSOC);

 
		  $update = "UPDATE Arts SET Winner = '0' WHERE Art_ID = '$ARTID'";
		  $results = sqlsrv_query($conn, $update);

			
	
			 }
			elseif($Crow['Ammount']>$artbid){

				$Bsql = "SELECT * 
				FROM   Bids
				WHERE Art_ID = '$ARTID'
				ORDER BY Ammount DESC";
			  
				$Btmt = sqlsrv_query($conn, $Bsql);
				$Brow = sqlsrv_fetch_array( $Btmt, SQLSRV_FETCH_ASSOC);
	
				$highestbid = $Brow['Ammount'];
				$accountid = $Brow['AccountID'];
	 
			 $insertwinner = "INSERT INTO Winner (Art_ID, AccountID, Art_Name, DateWon, TimeWon, Artist, Highest_Bid, Art_Image) 
			   VALUES ('$artid','$accountid', '$artname', '$datewon', '$timewon', '$artist', '$highestbid', '$artimage')";
			  $results = sqlsrv_query($conn, $insertwinner);
	 
			  $update = "UPDATE Arts SET Winner = '$accountid' WHERE Art_ID = '$ARTID'";
			  $results = sqlsrv_query($conn, $update);


			  $notifID = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
			  $message = array("Congratulations!", "You", "won", "the", "art","$artname", "in", "bidding"); 
			  $notif = $newLangsSpace = implode(" ", $message);
			  
		
			  $insertnotif = "INSERT INTO ArtNotification (ID,Notif_Message,artimage,softdelete,AccountID) 
					VALUES ('$notifID','$notif','$artimage',0,$accountid)";
					$results = sqlsrv_query($conn, $insertnotif);
		
			 }
			
 
		   }
		   
	   }
		 

		

		 if($difference <= 0)
		 {
			$ttsql = "SELECT * 
			FROM   Arts
			WHERE Art_ID = '$ARTID'";
		  
			$tstmt = sqlsrv_query($conn, $ttsql);
			$trow = sqlsrv_fetch_array( $tstmt, SQLSRV_FETCH_ASSOC);
 
 
		  if($trow['Winner']==0){

			echo"
			<h3><div class='sub_shops1'>&nbsp;&nbsp;NO WINNER </div></h3> 
			<h3><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Art Is Pending for Reauction</div></h3> 
  
			";

			}
			else{

			echo"
			<h3><div class='sub_shops1'>Not Available</div></h3> 
			<div class='sub_shops3'>The Art is already Auctioned and Owned</div>
  
			";
		 	}
		}
		
		 else{
			echo"
<h3><div class='sub_shops1'>COUNTDOWN</div></h3>
<span class='l1-txt2 p-b-4 days' id='day'></span>
<span class='m2-txt2'>Days</span>

<span class='l1-txt2 p-b-22'>:</span>

<span class='l1-txt2 p-b-4 hours' id='hours'></span>
<span class='m2-txt2'>Hours</span>

<span class='l1-txt2 p-b-22 respon2'>:</span>

<span class='l1-txt2 p-b-4 minutes' id='minutes'></span>
<span class='m2-txt2'>Minutes</span>

<span class='l1-txt2 p-b-22'>:</span>

<span class='l1-txt2 p-b-4 seconds' id='seconds'></span>
<span class='m2-txt2'>Seconds</span>


</div>


</div>
</div>
		  ";
		  	// <br>
			// <h8>".$diffsample."</h8>
			// <h8>".$art['Availability']."</h8>
		}
		 
		?>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/countdowntime/moment.min.js"></script>
<script src="vendor/countdowntime/moment-timezone.min.js"></script>
<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"78c0ec766cf8c976","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>
</html>