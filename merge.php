
<?php 
@include 'config.php';
session_start();

$artID = $_SESSION['artID'];
$_SESSION['artID'] = $artID;

if(!isset($_SESSION['adminid'])){ 
    header('location:homepage.php');
 }


$image1 = $_SESSION['image1'];
$image2 = $_SESSION['image2'];
$image3 = $_SESSION['image3'];

$next = $_SESSION['next'];

$entry = $next;

?>
<!DOCTYPE html>
<html>
  
<head>
    <title></title>
    <link rel="stylesheet" href=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>



    <style>
        .top {
            margin-top: 20px;
            position:absolute;
            right:600px;
        }
          
        h1 {
            color: green;
        }
          
        input {
            background-color: transparent;
            border: 0px solid;
            width: 100px;
        }
          
        body {
            text-align: center;
        }
   

          .art{
            width: 800px;
            height: 800px;
          }
          .watermark{
            position: absolute;
            top: 350px;
            left: 100px;
            width: 600px;
            height: 100px;
          }
        </style>

</head>
  

<h1><div class="sub_shops">Processing Watermark...</div></h1>
<h1><div class="sub_shops">Complete!</div></h1>

<body onload="triggerBtnClick1()">
  
    <div class="col-md-offset-5 col-md-5 col--md-offset-5 top">
        <div id="createImg1" >
       
        <img class="art" src="Arts/<?php echo"$image1"?>" alt="Logo 1" />
          <img class="watermark" src="watermark/artify.png" alt="Logo Goes Here" />       
        </div>
       
            <br>
            <br>
        <div id="img1" style="display:none;position:relative;left:600px;" >
            <img src1="1" id="newimg1" class="top" />
        </div>
    </div>





<!-- DOWNLOAD CERT TO PDF -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
    <div class="col-md-offset-5 col-md-5 col--md-offset-5 top">
        <div id="createImg2" >
        <img class="art" src="Arts/<?php echo"$image2"?>?>" alt="Logo 2" />
          <img class="watermark" src="watermark/artify.png" alt="Logo Goes Here" />       
        </div>
              
      
            <br>
            <br>
        <div id="img2" style="display:none;position:relative;left:600px;" >
            <img src2="2" id="newimg2" class="top" />
        </div>
    </div>



<!-- DOWNLOAD CERT TO PDF -->


<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


  
    <div class="col-md-offset-5 col-md-5 col--md-offset-5 top">
        <div id="createImg3" >
        <img class="art" src="Arts/<?php echo"$image3"?>" alt="Logo 3" />
          <img class="watermark" src="watermark/artify.png" alt="Logo Goes Here" />       
        </div>

 
            <br>
        <div id="img3" style="display:none;position:relative;left:600px;" >
            <img src3="3" id="newimg3" class="top" />
        </div>
    </div>


<style>
    .hidden{
        position: absolute;
        left: 200px;
    }
    .finish{
        font-size: 40px;
      
    }
    
</style>
<!-- DOWNLOAD CERT TO PDF -->
<div class="hidden">
<button id="geeks1" type="button" 
                                      class="">
            </button>
   

<button id="geeks2" type="button" 
                                      class="">
            </button>
       
<button id="geeks3" type="button"    class="">
            </button>
            <br>
            </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<a href="admininartpending.php" class="finish">Finish.</a>

<!-- WATERMARKED IMAGE 1  -->
 
 <script>
  function triggerBtnClick1()
{
  document.getElementById("geeks1").click(); 
  document.getElementById("geeks2").click(); 
  document.getElementById("geeks3").click(); 
}
</script>

<script>
  
            $("#geeks1").click(function() {
                html2canvas($("#createImg1"), {
                    onrendered: function(canvas) {
                        var imgsrc1 = canvas.toDataURL("image/png");
                        console.log(imgsrc1);
                        $("#newimg1").attr('src1', imgsrc1);
                        $("#img1").show();
                        var dataURL1 = canvas.toDataURL();
                        $.ajax({
                            type: "POST",
                            url: "watermark.php",
                            data: {
                                imgBase641: dataURL1
                            }
                        }).done(function(o) {
                            console.log('saved1');
                        });
                    }
                });
            });
    

    </script>



<!-- WATERMARKED IMAGE 2  -->
 


<script>
  
            $("#geeks2").click(function() {
                html2canvas($("#createImg2"), {
                    onrendered: function(canvas) {
                        var imgsrc2 = canvas.toDataURL("image/png");
                        console.log(imgsrc2);
                        $("#newimg2").attr('src2', imgsrc2);
                        $("#img2").show();
                        var dataURL2 = canvas.toDataURL();
                        $.ajax({
                            type: "POST",
                            url: "watermark2.php",
                            data: {
                                imgBase642: dataURL2
                            }
                        }).done(function(o) {
                            console.log('saved2');
                        });
                    }
                });
            });
    

    </script>



<!-- WATERMARKED IMAGE 3  -->


<script>
  
            $("#geeks3").click(function() {
                html2canvas($("#createImg3"), {
                    onrendered: function(canvas) {
                        var imgsrc3 = canvas.toDataURL("image/png");
                        console.log(imgsrc3);
                        $("#newimg3").attr('src3', imgsrc3);
                        $("#img3").show();
                        var dataURL3 = canvas.toDataURL();
                        $.ajax({
                            type: "POST",
                            url: "watermark3.php",
                            data: {
                                imgBase643: dataURL3
                            }
                        }).done(function(o) {
                            console.log('saved3');
                        });
                    }
                });
            });
    

    </script>





</body >
</html>
