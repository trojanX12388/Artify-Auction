
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artify Auction</title>
    <link rel="stylesheet" href="css/nav4.css">
    <link rel="stylesheet" href="css/signupform1.css">

      <!-- Swiper CSS -->
    <link rel="stylesheet" href="Bootstrap/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="Bootstrap/css/swipin.css">
    <link rel="stylesheet" href="font-awesome.min.css">
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
     <!-- ART LOVER AND COLLECTOR  -->
    <div class="container">
    <form action="signin.php" method="post" enctype="multipart/form-data">
        <div class="title">
          <img src="css/signin/profileicon.png">
        </div>
        <div class="artlover">
        <img src="css/signin/artlover.png">
        </div>
        <div class="option">Want to bid to obtain arts?</div>
        <div class="option">Create Account Now!</div>
        <div class="createnew">
          <a href="createartloveraccount.php"><i class="fab fa-facebook-f"></i>Create New Account</a>
        </div>
        </form>
  </div>

   <!-- I AM AN ARTIST  -->
   <div class="artistcontainer">
   <form action="signinartist.php" method="post" enctype="multipart/form-data">
        <div class="title">
        <img src="css/signin/artist.png">
        </div>
        <div class="artist">
        <img src="css/signin/imanartist.png">
        </div>
        <div class="option">If you are an artist, apply now!</div>
       
        <div class="applyonline">
          <a href="artistrules.php"><i class="fab fa-facebook-f"></i>Apply Online</a>
        </div>
      </form>
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

      


    <sc type="text/javascript" src="Bootstrap/js/jquery-3.3.1.min.js"></sc>
    <script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>
    
    <script src="Bootstrap/js/swiper-bundle.min.js"></script>
    <script src="Bootstrap/js/swiperscript.js"></script>
</body>
</html>