<?php

@include 'config.php';
session_start();

$email = $_SESSION['email'];


if (isset($_POST["verify"]))
{
  $verify = ($_POST['verification']);
                    
            $tsql = "SELECT *  
            FROM   Login
            WHERE Email = '$email'
            ORDER BY LoginId DESC";

        $stmt = sqlsrv_query($conn, $tsql);
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

        $verification_code = $row['Verification_Code'];

              if($verify == $verification_code ){   
            $tsql = "DELETE FROM Account WHERE Email='$email'";
            $results = sqlsrv_query($conn, $tsql);
            $tsql = "DELETE FROM Login WHERE Email='$email'";
            $results = sqlsrv_query($conn, $tsql);
            header('location:successartloveraccountdelete.php');
         }
              elseif($verify != $verification_code ){
              $error[] = 'Incorrect Verification!';
              header('location:deletefailedverification.php');

        };  

      }; 
       
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
               <h2>Delete Account</h2>
                  <p1>
                      Please Verify Your Account with OTP Sent in your Email
                  </p1>
                  <br>
                  <br>
                  <p1>
                  <?php echo $email ?>
                  </p1>
                  <br>
                  <br>
                  <form action="deleteartloveraccount.php" method="post" enctype="multipart/form-data">
                      <div class="option">OTP Code</div>
                      <div class="input-box underline">
                          <input type="numeric" name="verification" placeholder="" required>
                      <div class="underline"></div>
                      <br>
                      <input type="submit" name="verify" value="Submit">
                </form>
            </div>
                   
  
 

</body>
</html>