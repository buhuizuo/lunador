<?php session_start();?>
<?php
include 'tools.php';
  if (empty($_SESSION)) {
  echo "is empty";
   // header("Location: index.php"); 
  }
  //print_r($_SESSION);
$now = date('d/m h:i');
$GST =round($_SESSION['cost']-$_SESSION['cost']/1.1,2) ;
$cells = array_merge( 
  [ $now ], [
  $_SESSION['user-name'],
  $_SESSION['user-email'],
  $_SESSION['user-mobile'],
  $_SESSION['movieID'],
  $_SESSION['movieDate'],
  $_SESSION['movieTime'],
  $_SESSION['seat']['First Class Adult'],
  $_SESSION['seat']['First Class Concession'],
  $_SESSION['seat']['First Class Child'],
  $_SESSION['seat']['Standard Adult'],
  $_SESSION['seat']['Standard Concession'],
  $_SESSION['seat']['Standard Child'],
  $_SESSION['cost'],
  $GST]
);

$fp = fopen('receipt.txt', 'w');
fputcsv($fp, $cells);
fclose($fp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
</head>
<body class="container">
    <div class="main-page">
      <div class="sub-page">
<section class="company">
        <h1>Lunardo</h1>
        <ul>
        <li>email:Lunardo@email.com</li>
        <li>tel:00009900</li>
        <li>888 luna street, moon town</li>
        </ul>
</section> 
       <?php echo "<hr/>"; ?>
       <section class="movieDetailInReceipt">
        <h3><?php echo strtoupper($_SESSION['movieID'])?></h3>
        <p><?php echo $_SESSION['movieDate']?></p>
        <p><?php echo $_SESSION['movieTime']?></p>
</section>  
        <?php echo "<hr/>"; ?>
<section class="seatDetails">
        <table>
 <thead>
  <tr>
    <th>Seat</th> <th>Price</th> <th>QTY</th> <th>Total</th>
  </tr>
</thead>
<tbody>
 <?= printSeatsInReceipt();?> 
</tbody>
</table>
</section>
  <?php echo "<hr/>"; ?>
<section class="checkOut">
    <span>Total$:<?php echo $_SESSION['cost']?></span>
</br>
    <span>GST$:<?php echo round($_SESSION['cost']-$_SESSION['cost']/1.1,2) ?></span>
</section>
    <?php echo "<hr/>"; ?>
    <section class="userInformation">
         <ul>
            <li><p>Your name:</p><?php echo $_SESSION['user-name']?></li>
            <li><p>Your email:</p><?php echo $_SESSION['user-email']?></li>
            <li><p>Your phone number:</p><?php echo $_SESSION['user-mobile']?></li>
        </ul>
</section>
  <?php echo "<hr/>"; ?>
<section>
    <p>payment method:online purchase</p> 
    <p>refund policy:<span class="policy">no-refund</span></p> 
</section>
<footer>
  THANK YOU FOR</br>YOUR CUSTOM
</footer>
      </div>    
    </div>
   <?= printTicket();?>
  </body>

</html>
    