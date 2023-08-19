
<?php
		@include 'config.php';

		session_start();
		$email = $_SESSION['email'];
		
		// ARTIST NOTIFS
		if(isset($_SESSION['artistid'])){ 
		$tsql = "SELECT * 
		FROM   ArtistAccount
		WHERE Email = '$email'";

		$stmt = sqlsrv_query($conn, $tsql);
		$account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
			
		$accID = $account['ArtistAccountID'];

		$Psql ="SELECT * FROM ArtNotification 
		WHERE (ArtistAccountID LIKE '%" . $accID . "%'
		   AND  softdelete LIKE '%" . 0 . "%')";

		$Pparams = array();
		$Poptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


		$Pstmt = sqlsrv_query($conn, $Psql , $Pparams, $Poptions);
		$Part = sqlsrv_num_rows($Pstmt);
		

		if(empty($Part = sqlsrv_num_rows($Pstmt))){
			echo"";
		}
		else
		echo $Part;
	}


		// ART LOVER NOTIF ARTS

		if(isset($_SESSION['artloverid'])){ 
		$tsql = "SELECT * 
		FROM   Account
		WHERE Email = '$email'";

		$stmt = sqlsrv_query($conn, $tsql);
		$account = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
			
		$accID = $account['AccountID'];

		$Psql ="SELECT * FROM ArtNotification 
		WHERE (AccountID LIKE '%" . $accID . "%'
		   AND  softdelete LIKE '%" . 0 . "%')";

		$Pparams = array();
		$Poptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


		$Pstmt = sqlsrv_query($conn, $Psql , $Pparams, $Poptions);
		$Part = sqlsrv_num_rows($Pstmt);
		

		if(empty($Part = sqlsrv_num_rows($Pstmt))){
			echo"";
		}
		else
		echo $Part;
	}

		header('refresh:1');
	
		
		?>
