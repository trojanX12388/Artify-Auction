<?php
@include 'config.php';

session_start();

$email = $_SESSION['email'];
$accID = $_SESSION['accID'];
$validIDPic = $_SESSION['validIDPic'];

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$pass = $_SESSION['password'];
$defaultpic = $_SESSION['defaultprofile'];

$middlename = $_SESSION['middlename'];
$dateofbirth = $_SESSION['dateofbirth'];
$phonenumber = $_SESSION['phonenumber'];
$gender = $_SESSION['gender'];
$baranggay = $_SESSION['baranggay'];
$country = $_SESSION['country'];
$region = $_SESSION['region'];
$homenumber = $_SESSION['homenumber'];
$city = $_SESSION['city'];
$postal = $_SESSION['postal'];
$username = $_SESSION['username'];

if (isset($_POST["verify"]))
{
  $verify = ($_POST['verification']);
                    
            $tsql = "SELECT *  
            FROM   ArtistLogin
            WHERE Email = '$email'
            ORDER BY ArtistloginID DESC";

        $stmt = sqlsrv_query($conn, $tsql);
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

        $verification_code = $row['Verification_Code'];

              if($verify == $verification_code ){
              $insertaccount = "INSERT INTO ArtistAccount (Email, FirstName, LastName, Password, DefaultPic, MiddleName, DateOfBirth, PhoneNumber, Gender, 
              Baranggay, Country, Region, HomeNumber, City, PostalCode, UserName, ID, softdelete, ValidIDPic) VALUES ('$email','$firstname', '$lastname' ,'$pass', '$defaultpic', '$middlename',
               '$dateofbirth', '$phonenumber', '$gender', '$baranggay', '$country', '$region', '$homenumber', '$city', '$postal', '$username', '$accID',0,'$validIDPic')";
              $results = sqlsrv_query($conn, $insertaccount);
              header('location:successartistaccount.php');
              } 
              elseif($verify != $verification_code ){
              $error[] = 'Incorrect Verification!';
              header('location:failedartistverification.php');

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
               <h2>Verification of Account</h2>
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
                  <form action="verifyartist.php" method="post" enctype="multipart/form-data">
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