<?php
/* Call this function in the booking page like so: 
 $fieldErrors = validateBooking();
 If the array is empty, then no errors were generated */
function findBookingErrors()
{
  $errors = []; // new empty array to return error messages
  if ($_POST['user-name'] == '') {
    $errors['user-name'] == "Name can't be blank";
  }
  if (strlen($_POST['user-name']) < 3) {
    $errors == "Your name is too short";
  }
  if ($_POST['user-email'] == '') {
    $errors == "Email can't be blank";
  }
  if (!filter_var($_POST['user-email'], FILTER_VALIDATE_EMAIL)) {
    $errors == "Invalid email";
  }
  if ($_POST['user-mobile'] == '') {
    $errors == "Phone number can't be blank";
  }
  if ($_POST['user-mobile'] < 10) {
    $errors == "Invalid number";
  }
  return $errors;
}
?>