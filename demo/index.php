<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
          <link rel="stylesheet" href="styles1.css" type="text/css">
             <link rel="stylesheet" href="styles2.css" type="text/css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage" style="background:url(intro-bg_1.jpg); background-size:cover; height: 700px; ">
               <div class="container" style="width:600px;">
                   <center>
                   <div id="bannerContent" style="margin-top: 400px; background-color:#fff;">
                       <h1>BET ON BETTER SHOP</h1>
                       <p> Check out our shop to gift your loved ones while also preserving our world.</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>

           
     
     <div class="logo3">
            <img src="logo3.PNG" alt="1" style="width: 750px; padding-left: 500px; padding-top: 50px;">
        </div>
        <h2 class="line">TO PROVIDE A BETTER FUTURE WHERE EVERYONE IS THRIVING</h2>
        <div class="end">
      <i><strong><a style="color: black;text-decoration: none;padding-right: 20px;" href="#">Contact Us</a><a>|</a><a style="color: black;text-decoration: none;padding-right: 20px;padding-left: 20px;" href="transparency.html">Transparency</a><a>|</a><a style="color: black;text-decoration: none;padding-right: 20px;padding-left: 20px;" href="privacy%20policy.html">Privacy Policy</a><a>|</a><a style="color: black;text-decoration: none;padding-left: 20px;" href="website%20T&C.html">Website T&C</a></strong></i>
    </div>
    
    <div class="first">
      <p class="e1">READ LATEST NEWS</p>
      <p class="ep1">Updating yourself is always important.</p>
    </div>
    <div class="second">
      <p class="e2">READ SUCCESS STORIES</p>
    <p class="ep2">Their legacy. Our inspiration.</p>
    </div>

    
    
     
     

   

  <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>   

           
    </body>
</html>