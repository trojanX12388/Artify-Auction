<?php
@include 'config.php';
session_start();

$ARTID = $_SESSION['artid'];
?>

<h1><strong>BIDDERS</strong></h1>
  <table class="w3-table-all w3-centered w3-card-4">
  <tr>
      <th>No.</th>
      <th>Bid Amount</th>
      <th>Bidder Name</th>
      <th>Bidder ID</th>
      <th>Art Name</th>
      <th>Date and Time</th>
     

    </tr>

  <?php 

$tsql = "SELECT * 
FROM   Bids
WHERE Art_ID = $ARTID
ORDER BY Bid_ID DESC";

$stmt = sqlsrv_query($conn, $tsql);
$no = 0;


  while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { 
    date_default_timezone_set("Asia/Manila");
    $no +=1;
    
    if($row['AccountID']==0){
?>
     
    <?php
    }
    else{
      
    $bidderid = $row['AccountID'];

    $Bsql = "SELECT * 
    FROM   Account
    WHERE AccountID = $bidderid
	ORDER BY AccountID DESC";
    
    $Btmt = sqlsrv_query($conn, $Bsql);
    $Brow = sqlsrv_fetch_array( $Btmt, SQLSRV_FETCH_ASSOC)

    ?>
    <tr>
    <td><?= $row['Bid_ID'] ?></td>
    <td><?= $row['Ammount'] ?></td>
    <td><?= $Brow['FirstName'] ?>&nbsp;<?= $Brow['LastName'] ?></td>
    <td><?= $Brow['ID'] ?></td>
    <td><?= $row['Art_Name'] ?></td>
      <td><?=date_format($row['Bid_Date'],'F d Y || h:i:s A')?></td>
     
    </tr>  
    
  <?php }
  ?>
   
  <?php }
  ?>
    </table>

    
