
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/nav4.css">
    <link rel="stylesheet" href="css/artistaccount3.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Bootstrap/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
  
  <!-- Account Panel -->

    <div class="account_modal" role="dialog" id="account">
          <div class="account_modal-content">
            <div class="account_modal-header">
            <h2>My Account</h2>
               <div class="account_modal-body">
                <p1>
                Log in or Register to manage  cart, bid,  and see auction results, receive email updates, and see personalized recommendations.
                </p1>
                    </div>
                    <div class="account_modal-footer">
                    <div class="signs">                   
                      <ul>
                        <li><a class="signin" href="signin.php">Sign In</a></li>
                        <li><a class="signup" href="signup.php">Sign Up</a></li>
                      </ul>
                    </div>
                </div>
            </div>
  </div>
  </div>
 
  <!-- CONTENT  -->
    
  <!-- ARTIST RULES PAGE  -->
     <div class ="artistrules">
        <div class="toppage">
          <br>
          <br>
          <br>
          <img src="css/createartistaccount/artistrules.png">
        </div>
        <br>
        <br>
        <div class="focus">
          <img src="css/createartistaccount/focus.png">
        </div>
        <div class="whatcanyousell">
          <img src="css/createartistaccount/whatcanyousell.png">
        </div>
        <div class="partnerwithus">
          <img src="css/createartistaccount/partnerwithus.png">
        </div>
        <div class="AAA">
          <img src="css/createartistaccount/AAA.png">
        </div>
        <div class="check">
          <img src="css/createartistaccount/check.png">
        </div>
        <div class="areyou">
          <img src="css/createartistaccount/areyou.png">
        </div>
        <div class="signup2">
        <a href="createartist.php"><i class="fab fa-facebook-f"></i>Sign Up</a>
        </div>
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
        <br>
        <br>
        <br>
        <div class="hover">
          <img src="css/createartistaccount/hover.png">
        </div>
        </div>
    

<!-- BOTTOM NAVIGATION BAR -->

  <div class="navbar">
  <img src="css/Background/menu.png" class="botlogo">
  <div class="icons">
    <ul>
       <li><img src="css/Background/fb.png"></li>
       <li><img src="css/Background/twitter.png"></li>
       <li><img src="css/Background/instagram.png"></li>
      </ul>
    </div>
  <img src="css/Background/PrivacyPolicy.png" class="privacy">
  <img src="css/Background/TermsofUse.png" class="terms">
</div>
  
<nav>

<!-- TOP NAVIGATION BAR -->

<div class="menu"></div>
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
 <li><a href="homepage.php">HOME</a></li>
 <li><a href="admin_page.php">AUCTIONS</a></li>
 <li><a href="admin_page.php">BID FOR THE FUTURE</a></li>
 <li><a href="admin_page.php">ARTISTS</a></li>
 <li><a href="admin_page.php">CONTACT</a></li>
</ul>
<div>
<button class="accountmenu" href="#" data-toggle="modal" data-target="#account"></button>
</div>
</nav>


</body>
</html>