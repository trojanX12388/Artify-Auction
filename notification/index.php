
	<?php
		@include 'config.php';

		session_start();
		
			
			
		$Psql ="SELECT * FROM Pending";

		$Pparams = array();
		$Poptions =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


		$Pstmt = sqlsrv_query($conn, $Psql , $Pparams, $Poptions);
		$Part = sqlsrv_num_rows( $Pstmt );

		echo $Part;

		header('refresh:1');
	
		
		?>
