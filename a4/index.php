<?php
require_once "tools.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!-- description -->
     <meta description="description" content="country cinema, movies,entertainment,drinks,food" />
    <!-- keywords -->
    <meta name="keywords" content="cinema,movie" />
    <title>Assignment 2</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link
      id="wireframecss"
      type="text/css"
      rel="stylesheet"
      href="style.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&family=PT+Serif&display=swap"
      rel="stylesheet"
    />
    <script src="script.js"></script>
  </head>

  <body>
    <!-- header start! -->
    <!-- A <header> element that contains a cinema logo (image) and a business name
       (this text must not be an image). This element should scroll off screen
        "normally", ie as the user scrolls up and down. -->
    <header class="header">
      <div>
         <a href="index.php">
        <img src="images/logo.png" alt="logo" />
          <h1>Lunardo</h1>
        </a>
      </div>
    </header>
    <!-- header end -->
    <!-- nav start -->
    <!-- contains internal links to different sections inside the main element,
   the booking page should contain just one link to the index page.
   below the header initially but then "stick" to the top of the browser
    window as the user scrolls down.
  -->
    <nav class="nav">
      <div class="w">
        <ul>
          <li><a href="#showing">Now Showing</a></li>
          <li><a href="#showing">Book Tickets</a></li>
          <li><a href="#seats">Seats and Prices</a></li>
          <li><a href="#about_us">About</a></li>
          <li><a href="#contact_us">Contact Us</a></li>
        </ul>
      </div>
    </nav>
    <!-- nav end -->
    <!-- main start -->
    <main>
      <!-- about us start -->
      <section class="section1" id="about_us">
        <div class="about_us">
          <h1 class="title">About Us</h1>
          <p class="article">
            Welcome to the reopened of Lunardo! with extensive improvements and
            renovations. There are new seats: standard seats and reclinable
            first class seats The projection and sound systems are upgraded with
            3D Dolby Vision projection and Dolby Atmos sound. A brand new movies
            experience just near you.
          </p>
        </div>
      </section>
      <!-- about us end -->
      <!-- Seats and Prices start -->
      <!-- show pictures of their new seats: standard seating and first class seating -->
      <section class="section2 w clearfix" id="seats">
        <div>
          <h1>Seats and Prices</h1>
        </div>
        <div class="box">
          <img src="images/first_class.jpg" alt="first_class" />
          <table>
            <tr>
              <th>Seat Type</th>
              <!-- <th>Seat Code</th> -->
              <th>Discounted Prices</th>
              <th>Normal Prices</th>
          <?= getPriceForRich();?>
          </table>
          <div class="first_class_tag">
            <span>GOLD</span>
            <img src="images/logo.png" alt="logo" />Lunardo
            <h3>FIRST CLASS</h3>
            <p>
              The most luxurious way to experience the movies, no matter the
              celebration.
            </p>
          </div>
        </div>
        <div class="box">
          <img src="images/stander_seat.jpg" alt="standaed_class" />
          <table>
            <tr>
              <th>Seat Type</th>
              <!-- <th>Seat Code</th> -->
              <th>Discounted Prices</th>
              <th>Normal Prices</th>
            </tr>
             <?= getPriceForPoorGuy(); ?>
          </table>
        </div>
      </section>
      <!-- Seats and Prices end -->
      <!-- Now Showing start -->
      <!-- This area should have 4 panels that shows details for each movie. 
 These panels will have a "front" and a "back"
On the front: a movie poster, the name of the movie, the rating (eg PG, MA, R etc.),
and a list of day / times that the movie is playing should be shown.
On the back: a short synopsis of the movie plot should be show along with a "book now" hyperlink which should be styled to look like a button. 
This link should take the user to a booking.php page   -->
      <div class="show_list clearfix" id="showing">
        <h1>Now Showing</h1>
        <ul>
  <!-- one function to rule them all -->
  <?= moviePanel()?>
        </ul>
      </div>
      <!-- Now Showing end -->
    </main>
    <!-- main end -->
    <!-- footer start -->
    <footer class="footerfooter" id="contact_us">
      <div class="company_info">
        <div class="company_logo">
          <img src="images/logo.png" alt="logo" />
          <h1>Lunardo</h1>
          <ul>
            <li>email:Lunardo@email.com</li>
            <li>tel:00009900</li>
            <li>888 luna street, moon town</li>
          </ul>
        </div>
      </div>
      <div class="more_info">
        <div>
          &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          <a href="https://github.com/buhuizuo/wp">
            Wei Cui(s), S3903904 (s) and that's it. Last modified
          </a>
          <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
        </div>
        <div>
          Disclaimer: This website is not a real website and is being developed
          as part of a School of Science Web Programming course at RMIT
          University in Melbourne, Australia.
        </div>
        <div>
          <button id="toggleWireframeCSS" onclick="toggleWireframe()">
            Toggle Wireframe CSS
          </button>
        </div>
      </div>
    </footer>
    <!-- footer end -->
  </body>
</html>
