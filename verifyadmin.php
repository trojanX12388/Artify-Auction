<?php
@include 'config.php';

session_start();

$email = $_SESSION['email'];


if (isset($_POST["verify"]))
{
  $verify = ($_POST['verification']);
                    
            $tsql = "SELECT *  
            FROM   AdminAccount
            WHERE Email = '$email'";

        $stmt = sqlsrv_query($conn, $tsql);
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

        $verification_code = $row['Verification_Code'];

              if($verify == $verification_code ){
               
              $_SESSION['adminid'] = $row['AdminAccountID'];
              $_SESSION['email'] = $email;
              
              header('location:adminpage.php');
              } 
              elseif($verify != $verification_code ){
              $error[] = 'Incorrect Verification!';
              header('location:failedadminverification.php');

        };       
             
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/verify.css">
 
  </head>
  <body>

  <!-- Account Panel -->

           
            <div class="verify">
               <h2>Verification of Admin</h2>
                  <p1>
                      Please Verify Admin by checking the OTP sent in the Admin Email
                  </p1>
                  <br>
                  <br>

                  <form action="verifyadmin.php" method="post" enctype="multipart/form-data">
                      <div class="option">OTP Code</div>
                      <div class="input-box underline">
                          <input type="numeric" name="verification" placeholder="" required>
                      <div class="underline"></div>
                      <br>
                      <input type="submit" name="verify" value="Submit">
                      &nbsp;  <a class="signin" href="adminlogin.php">Back</a>
                </form>
            </div>
                   
  
 

</body>
</html>