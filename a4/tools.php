<?php
/* Put your PHP functions and modules here.Many will be provided in the teaching materials,
keep a look out for them!
*/
function debugModule() {    
 echo "<pre id='debug'>";     
 print_r($_POST);  
 print_r($_GET);
 print_r($_SESSION);
 echo "</pre>";    
}

function printMyCode() {
  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>"; 
  foreach($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" .rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
}

function php2js( $arr, $arrName ) {
  $arrJSON = json_encode($arr, JSON_PRETTY_PRINT);
  echo <<<"CDATA"
  <script>
    /* Variable generated with Trev's handy php2js() function */
    var $arrName = $arrJSON;
  </script>
CDATA;
}
//movie object, keep all details of movies,used by panels
$movie_object = [
  'dune' => [
    'title' => 'Dune',
    'rating' => 'MA15',
    'type' => 'Science fiction themes and violence',
    'shortBrief' => 'First movie of the series',
    'ReleaseDate' => '02/12/2021',
    'RunningTime' => '2h 35m',
    'director' => 'Denis Villeneuve',
    'cast' => '	Josh Brolin, Stellan Skarsgård, Zendaya',
    'storyLine' => "A mythic and emotionally charged hero's journey.<br><br> 
                  'Dune' tells the story of Paul Atreides, a brilliant and gifted young man
                  born into a great destiny beyond his understanding, who must
                  travel to the most dangerous planet in the universe to ensure
                  the future of his family and his people. <br><br>As malevolent forces
                  explode into conflict over the planet's exclusive supply of
                  the most precious resource in existence-a commodity capable of
                  unlocking humanity's greatest potential-only those who can
                  conquer their fear will survive.",
    'screenings' => [
      'Monday' => '08:30',
      'Tuesday' => '11:15',
      'Wednesday' => '16:30',
      'Thursday' => '20:15',
      'Friday' => '22:30',
      'Saturday' => '15:00',
      'Sunday' => '14:30',
    ],
    'trailerYoutube' => '<iframe width="950" height="534"
                        src="https://www.youtube.com/embed/8g18jFHCLXk" title="YouTube video player"
                         frameborder="0" allow="accelerometer; autoplay; 
                         clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>',
    'bookingPhotoLink' => 'https://www-s3.hoyts.com.au/movies/AU/HO00006505/poster.jpg'
  ],
  'cyrano' => [
    'title' => 'Cyrano',
    'rating' => 'PG',
    'type' => 'Drama Musical Romance',
    'shortBrief' => 'Cyrano helps young Christian nab her heart through love letters.',
    'ReleaseDate' => '01/12/2021',
    'RunningTime' => '2h 4m',
    'director' => 'Joe Wright',
    'cast' => 'Peter DinklageHaley BennettKelvin Harrison Jr.',
    'storyLine' => "A man ahead of his time.<br><br> 
                  Cyrano de Bergerac dazzles whether
                  with ferocious wordplay at a verbal joust or with brilliant
                  swordplay in a duel. <br><br>But, convinced that his appearance
                  renders him unworthy of the love of a devoted friend, the
                  luminous Roxanne.<br><br> Cyrano has yet to declare his feelings for
                  her and Roxanne has fallen in love, at first sight, with
                  Christian.",
    'screenings' => [
      'Monday' => '15:30',
      'Tuesday' => '12:15',
      'Wednesday' => '20:30',
      'Thursday' => '22:15',
      'Friday' => '18:30',
      'Saturday' => '11:00',
      'Sunday' => '14:30',
    ],
    'trailerYoutube' => '<iframe width="950" height="534" 
                        src="https://www.youtube.com/embed/5e8apSFDXsQ" title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                        encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    'bookingPhotoLink' => 'https://www-s3.hoyts.com.au/movies/AU/HO00007255/poster.jpg'
  ],

  'spider_man' => [
    'title' => 'Spider-Man',
    'rating' => 'M',
    'type' => 'Action violence',
    'shortBrief' => 'A continuation of Spider-Man Far From Home.',
    'ReleaseDate' => '16/12/2021',
    'RunningTime' => '148mins',
    'director' => 'Jon Watts',
    'cast' => '	Tony Revolori, Marisa Tomei, Benedict Cumberbatch, Jon Favreau, 
                        Jamie Foxx, Tom Holland, Zendaya, Jacob Batalon',
    'storyLine' => " Peter Parker's secret identity is revealed to the entire
                  world. <br><br>Desperate for help, Peter turns to Doctor Strange to
                  make the world forget that he is Spider-Man.<br><br> The spell goes
                  horribly wrong and shatters the multiverse, bringing in
                  monstrous villains that could destroy the world.",
    'screenings' => [
      'Monday' => '0:30',
      'Tuesday' => '15:15',
      'Wednesday' => '13:30',
      'Thursday' => '16:15',
      'Friday' => '11:30',
      'Saturday' => '14:00',
      'Sunday' => '19:30',
    ],
    'trailerYoutube' => '<iframe width="950" height="534" src="https://www.youtube.com/embed/ZYzbalQ6Lg8"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>',
    'bookingPhotoLink' => 'https://www-s3.hoyts.com.au/movies/AU/HO00006804/poster.jpg'
  ],
  'silent_night' => [
    'title' => 'Silent-Night',
    'rating' => 'CTC',
    'type' => 'Thrill',
    'shortBrief' => 'Perfect except for one thing: everyone is going to die.',
    'ReleaseDate' => '11/30/2021',
    'RunningTime' => '1h 32m',
    'director' => 'Camille Griffin',
    'cast' => 'Keira KnightleyMatthew GoodeRoman Griffin Davis',
    'storyLine' => "Nell, Simon and their son Art host a yearly Christmas dinner
                  at their country estate for their former school friends and
                  their spouses.<br><br> It is gradually revealed that there is an
                  imminent environmental catastrophe and that this dinner will
                  be their last night alive.",
    'screenings' => [
      'Monday' => '22:30',
      'Tuesday' => '19:15',
      'Wednesday' => '21:30',
      'Thursday' => '10:15',
      'Friday' => '23:30',
      'Saturday' => '24:00',
      'Sunday' => '9:30',
    ],
    'trailerYoutube' => '<iframe width="950" height="534" 
                        src="https://www.youtube.com/embed/ras0H9GEz5I" title="YouTube video player" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                        encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
    'bookingPhotoLink' => 'https://s3.amazonaws.com/static.rogerebert.com/uploads/movie/movie_poster/silent-night-2021/large_silent-night-poster.jpeg'
  ]
];
//price table
$price_table = [
                'FCA' =>[
                        'standFor'=>'First Class Adult',
                        'discount'=>'24.00',
                        'normal'=> '30.00',
                        ],
                'FCP' =>[
                        'standFor'=>'First Class Concession',
                        'discount'=>'22.50',
                        'normal'=> '27.00',
                        ], 
                'FCC' =>[
                        'standFor'=>'First Class Child',
                        'discount'=>'21.00',
                        'normal'=> '24.00',
                        ] ,
                'STA' =>[
                        'standFor'=>'Standard Adult',
                        'discount'=>'15.00',
                        'normal'=> '20.50',
                        ],
                'STP' =>[
                        'standFor'=>'Standard Concession',
                        'discount'=>'13.00',
                        'normal'=> '18.00',
                        ],
                'STC' =>[
                        'standFor'=>'Standard Child',
                        'discount'=>'12.00',
                        'normal'=> '16.50',
                        ]         
   ];

//booking page panels

//return movie id with get method, used by panels
function getMoive()
{
  return $_GET["movieID"];
}
function getMoiveTitle()
{
  global $movie_object;
  return $movie_object[$_GET["movieID"]]['title'];
}
function bookingYoutube()
{
  global $movie_object;
  $link = $movie_object[getMoive()]['trailerYoutube'];
 echo <<<"CDATA"
 $link
 CDATA;
}
function bookingDetail()
{
  global $movie_object;
  $movieID = getMoive();
  $picLink = $movie_object[ $movieID ]['bookingPhotoLink'];
  $title = $movie_object[$movieID]['title'];
  $rating = $movie_object[$movieID]['rating'];
  $type = $movie_object[$movieID]['type'];
  $shortBrief= $movie_object[$movieID]['shortBrief'];
  $ReleaseDate= $movie_object[$movieID]['ReleaseDate'];
  $runtime = $movie_object[$movieID]['RunningTime'];
  $director = $movie_object[$movieID]['director'];
  $cast = $movie_object[$movieID]['cast'];
 echo <<<"CDATA"
  <div class="movie_details clearfix w">
            <div class="movie_img">
                <img src= $picLink
                    alt= $movieID >
            </div>
            <div class="movie_info">
                <div>
                    <h3>$title</h3>
                    <em>$rating</em>
                    <span>$type</span>
                    <p>$shortBrief</p>
                </div>
                <div class="movie_table">
                    <table>
                        <tr>
                            <td class="movie_key">Release Date:</td>
                            <td class="movie_value">$ReleaseDate</td>
                        </tr>
                        <tr>
                            <td class="movie_key">Running Time:</td>
                            <td class="movie_value">$runtime</td>
                        </tr>
                        <tr>
                            <td class="movie_key">Director:</td>
                            <td class="movie_value">$director</td>
                        </tr>
                        <tr>
                            <td class="movie_key">Cast:</td>
                            <td class="movie_value">$cast</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
 CDATA;
}
function getTimeTable() {
global $movie_object;
$id = '';
for ($i = 0; $i < 4;$i++) {
  $date = date("l", strtotime('+'.$i.'days'));
  $time = $movie_object[getMoive()]['screenings'][date("l", strtotime('+'.$i.'days'))];
     // $id = $i.'_days_later';
      if($i==0){
         echo <<<"CDATA"
        <span>$date</span>  <span class="movieTime">$time</span>
        <input type="radio" checked="checked" name="movieTime" value=$time id= $date class="user_select">
        CDATA;
    }
    else {
      echo <<<"CDATA"
          <span>$date</span>  <span class="movieTime">$time</span>
        <input type="radio" name="movieTime" value=$time id= $date class="user_select">
        CDATA;
    }  
}
}
function getPriceForChecked()
{
  global $movie_object;
  global $price_table;
  $today_date = date("l");
$todaytime = $movie_object[getMoive()]['screenings'][$today_date]; //get time 15:30
$dt = DateTime::createFromFormat("H:i", $todaytime);
$hour=$dt->format('H');//get hour
$price_tpye = '';
if ( $today_date =='Saturday' || $today_date=='Sunday') {
    $price_tpye = 'normal';
  }
else if($today_date == 'Monday'){
    $price_tpye = 'discount';
  }
  else {
    if ($hour >= 12) {
       $price_tpye = 'discount';
    }
    else {
       $price_tpye = 'normal';
    }
  }
  foreach ($price_table as $code => $details) {
    $name = $price_table[$code]['standFor'];
    $each_price = $price_table[$code][$price_tpye];
          echo <<<"CDATA"
          <li>
            $name $(<span>$each_price</span>)
            <input type="hidden" id="eachPrice" name="eachPrice[$name]" value=$each_price>
          </li>            
          CDATA;
  }

}
function plus_reduce_button(){
  global $price_table;
  $value = 1;
  $i = 0;
  foreach ($price_table as $code => $details) {

    if ($i > 0) {
      $value = 0;
    }
    $name=$price_table[$code]['standFor'];
    echo <<<"CDATA"
  <li>
  <button class="reduce" type="button">-</button>
  <input type="text" value=$value id="seats" name="seat[$name]" min="0" max="5" />
  <button class="add" type="button">+</button>
  <span class="singleSeatPrice"> </span>
  </li>
  CDATA;
    $i++;
  }
  }

//index page movie panel
function moviePanel(){
  global $movie_object;
  foreach ($movie_object as $movie => $details) {
  $rating = $movie_object[$movie]['rating'];
  $runtime = $movie_object[$movie]['RunningTime'];
  $title=$movie_object[$movie]['title'];
  $todayDate = date("l");
  $tomorrowDate=date("l",strtotime("+1 day"));
  $todaytime = $movie_object[$movie]['screenings'][$todayDate];
  $tomorrowTime=$movie_object[$movie]['screenings'][$tomorrowDate];
  $story = $movie_object[$movie]['storyLine'];
    echo <<<"CDATA"
             <li>
            <div class="flip-card">
    <div class="flip-card-inner">
    <div class="flip-card-front">
              <div class="poster">
                <img src="images/movie_$movie.jpg" alt=$movie />
              </div>
              <article class="footer">
                <footer>
                  <h3>$title</h3>
                  <div class="details">
                    <span class="tag $rating">$rating</span>
                    <span class="movie_length"> $runtime</span>
                    <div class="time_table">
                      <ul>
                        <li class="clearfix">
                          <em>today</em>
                          <span>$todaytime</span>
                        </li>
                        <li class="clearfix">
                          <em>tomorrow</em>
                          <span>$tomorrowTime</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </footer>
              </article>
               </div>
    <div class="flip-card-back">
     <p>$story</p>
<form  action="booking.php" method="get">
<button  name="movieID" value=$movie>Book Now</button>
</form>
    </div>
  </div>
</div>
 </li>
CDATA;
  }
}
//index seats and price
function getPriceForRich(){
  global $price_table;
  foreach ($price_table as $code => $details) {
    if (substr($code,0,1)=== 'F') {
      $seat = $price_table[$code]['standFor'];
      $discount = $price_table[$code]['discount'];
      $normal = $price_table[$code]['normal'];
       echo <<<"CDATA"
             <tr>
              <td>$seat</td>
              <td>$discount</td>
              <td>$normal</td>
            </tr>
    CDATA;
    }
  }
}
function getPriceForPoorGuy(){
  global $price_table;
  foreach ($price_table as $code => $details) {
    if (substr($code,0,1)=== 'S') {
      $seat = $price_table[$code]['standFor'];
      $discount = $price_table[$code]['discount'];
      $normal = $price_table[$code]['normal'];
       echo <<<"CDATA"
             <tr>
              <td>$seat</td>
              <td>$discount</td>
              <td>$normal</td>
            </tr>
    CDATA;
    }
  }
}
//receipt page 
function printSeatsInReceipt() {
  global $price_table;
  $eachPrice = '';
  foreach($_SESSION['seat'] as $key => $value) {
    if ($value != 0) {
      $eachPrice = $_SESSION['eachPrice'][$key];
      $eachTotal = sprintf("%.2f", ($eachPrice * $value));
      echo <<<"CDATA"
    <tr>
    <td>$key</td>
    <td>$eachPrice</td>
    <td>$value</td>
    <td>$eachTotal</td>
    </tr>
  CDATA;
    }
  }
}

function printTicket(){
  $movie = strtoupper($_SESSION['movieID']);
  $date = $_SESSION['movieDate'];
  $time = $_SESSION['movieTime'];
  foreach ($_SESSION['seat'] as $key => $value) {
    if($value != 0) {
      for ($i = 0; $i < $value; $i++) {
        echo <<<"CDATA"
      <div class="main-page">
      <div class="sub-page">
     <section class="movieDetailInTickets">
        <h3>$movie</h3>
        <p>$date</p>
        <p>$time</p>
        <span>$key</span>
     </section>
     <section class="company">
        <h1>Lunardo</h1>
        <ul>
        <li>email:Lunardo@email.com</li>
        <li>tel:00009900</li>
        <li>888 luna street, moon town</li>
        </ul>
     </section>
        <footer class="reminder">Remarks:Don't be late!</footer>
      </div>    
      </div>
  CDATA;
      }
    }
  }
}
?>

