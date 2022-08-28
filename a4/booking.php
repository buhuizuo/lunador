<?php
session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("post-validation.php");
    $errorMsgs = findBookingErrors();
    if (count($errorMsgs) == 0) {
    // ie no problems with user input
      $_SESSION = $_POST;
      //add other value to session other than POST values
      //but I did this using input=hidden
      // repeat for other POSTed fields
      header("Location: receipt.php");
}
// no else{} required, user stays on the booking page until they get it right!
}
require_once "tools.php";
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
   
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <!-- <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>-->
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=PT+Serif&display=swap" rel="stylesheet">
     
</head>
<body>
    <!-- header start! -->
    <header class="header">
        <div>
            <img src="images/logo.png" alt="logo">
            <h1>Lunardo</h1>
        </div>
    </header>
    <!-- header end -->
    <!-- nav start -->
    <nav class="nav">
        <div class="w">
            <ul>
                <li><a href="index.php#showing">Now Showing</a></li>
                <li><a href="index.php#showing">Book Tickets</a></li>
                <li><a href="index.php#seats">Seats and Prices</a></li>
                <li><a href="index.php#about_us">About</a></li>
                <li><a href="index.php#contact_us">Contact Us</a></li>
            </ul>
        </div>
    </nav>
    <!-- nav end -->
    <!-- main start -->
    <main>
        <!-- youtube playerlink -->
        <div class="trailer w">
            <?= bookingYoutube()?>
        </div>
        <!-- pic and details  -->
      <?=bookingDetail() ?>
        <!-- user info -->
        <form action="booking.php" name="userform"  onsubmit="return validateData();" method="post">
        <input type="hidden" value=<?= getMoiveTitle()?> name="movieID" id="movieID" />
            <div class="user_info w">
                <!-- select time -->
                <div class="forHiddenInput">
                    <h3>Select Time:</h3>
                   <?php getTimeTable(); ?>
                    <input type="hidden"  value="date"  id="movieDate" name="movieDate">
                </div>
                <!-- select seats -->
                <div>
                    <h3>Select Seats:</h3>
                    <ul class="user_seat">
                   <?= getPriceForChecked() ?>
                   </ul>
                    <ul class='number'>
                  <?= plus_reduce_button() ?>
                    </ul>
                    <span class="user_seat_error"></span>
                </div>
                  <!-- total -->
                <section class="total "> 
                    <h3>Total: 
                    <span class="totalPrice"> </span>$ 
                    </h3>
                    <input type="hidden" value=0 name="cost" id="cost" />
                </section>
                <!-- user name -->
                <section class="set_margin w">
                <div >
                    <h3>Your Name:</h3>
                    <label for="name" class="user_name">
                        <input type="text" name="user-name" value="enter your name" id="name" required maxlength="15" onblur="localS_name()">
                        <span class="user_name_error"></span>
                    </label>
                </div>
                <!-- user email address -->
                <div>
                    <h3>Your Email:</h3>
                    <label for="email" class="user_email">
                        <input type="text" value="enter your email" id="email" name="user-email" required maxlength="45" onblur="localS_email()">
                        <span class="user_email_error"></span>
                    </label>
                </div>
                <!-- user phone number -->
                <div>
                    <h3>Your Phone:</h3>
                    <label for="phone" class="user_phone">
                        <input type="text" value="enter your number" id="phone" name="user-mobile" required onblur="localS_phone()">
                        <span class="user_phone_error"></span>
                    </label>
                </div>
                <div class="storeUserData">
                    <input type="radio" id="remember" name="keepInfo" value="rememberMe" checked="checked">
                    <label for="remember"><span class="remember">remember me</span>  </label>
                   <input type="radio" id="forget" name="keepInfo" value="forgetMe" onclick="forgetMe()">
                   <label for="forget"> <span class="forget">forget me</span></label>
                </div>
                </section>
                <!-- summit button  -->
                <button class="book" >
                    book
                </button>
        </form>
    </main>
    <!-- main end -->
    <!-- footer start -->
    <footer class="footerfooter clearfix" id="contact_us">
        <div class="company_info">
            <div class="company_logo">
                <img src="images/logo.png" alt="logo">
                <h1>Lunardo</h1>
                <ul>
                    <li>email:Lunardo@email.com</li>
                    <li>tel:00009900</li>
                    <li>888 luna street, moon town</li>
                </ul>
            </div>
        </div>
        <div class="more_info">
            <div>&copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Wei Cui(s), S3903904 (s) and that's it. Last modified
                <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
            </div>
            <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science
                Web
                Programming course at RMIT University in Melbourne, Australia.</div>
            <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
        </div>
    </footer>
    <!-- footer end -->
    <aside id="debug">
        <h3>Debug Area</h3>
        <pre>
GET Contains:
<?php print_r($_GET) ?>
POST Contains:
<?php print_r($_POST) ?>
SESSION Contains:
<?php print_r($_SESSION) ?>
      </pre>
      <?= printMyCode() ?>
    </aside>
    <?= php2js($price_table,'priceTableJS') ?>
     <script src="script.js"> </script>
</body>
</html>