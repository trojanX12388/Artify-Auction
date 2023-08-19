<?php
@include 'config.php';


?>

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel = "stylesheet" href  = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
 

  <div class="col-md-12">
    <div class="row">

      <?php

      $tsql = "SELECT * 
      FROM   Arts";

      $stmt = sqlsrv_query($conn, $tsql);
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

        while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) { ?>
        <div class="col-md-3">
        <form action='homepage.php' method='post' enctype='multipart/form-data'>
          <img src="arts/<?= $row['Art_Image'] ?>" style="height: 450px;" oncontextmenu='return false;'>
          <br>
          <br>
          <h5 class="text-center"><?= $row['Art_Name']; ?></h5>
          <h5 class="text-center"><?= $row['Artist']; ?></h5>
          <h6>Php <?= number_format($row['Art_Bid'],2); ?></h6>
          <br>
          <br>


          </form>
        </div>  

        <?php }
        ?>

    </div>
  </div>
</div>

