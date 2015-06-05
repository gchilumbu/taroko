<?php
//connects to the database. All credentials are included in the connectdb class
require_once("./connects/access.php");

/** other variables */
$userNameIsUnique = true;
$passwordIsValid = true;
$firstNameIsValid = true;
$lastNameIsValid = true;
$emailIsValid = true;
$userNameIsEmpty = false;
$passwordIsEmpty = false;
$firstNameIsEmpty = false;
$lastNameIsEmpty = false;
$emailIsEmpty = false;
$password2IsEmpty = false;

/** Check that the page was requested from itself via the POST method. */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  /** Check whether the user has filled in the wisher's name in the text field "user" */
  if ($_POST["username"] == "") {
    $userNameIsEmpty = true;
  }

  /* The userDB object exists as long as the current page is being processed. 
   * It is destroyed after the processing is completed or interrupted. */
  $userID = accessDB::getInstance()->getUserID($_POST["username"]);
  if ($userID) {
    $userNameIsUnique = false;
  }

  if ($_POST["username"] == "") {
    $userNameIsEmpty = true;
  }
  if ($_POST["password"] == "") {
    $passwordIsEmpty = true;
  }
  if ($_POST["pwd_verify"] == "") {
    $password2IsEmpty = true;
  }
  if ($_POST["email"] == "") {
    $emailIsEmpty = true;
  }

  if ($_POST["firstName"] == "") {
    $firstNameIsEmpty = true;
  }
  if ($_POST["lastName"] == "") {
    $lastNameIsEmpty = true;
  }

  /** Check whether the boolean values show that the input data was validated 
   * successfully. If the data was validated successfully, add it as a new entry 
   * in both the  users table and login table. After adding the new entry, close 
   * the connection and redirect the application to editUser.php. */
  if (!$userNameIsEmpty && $userNameIsUnique && !$passwordIsEmpty
          && !$password2IsEmpty && $passwordIsValid && !$firstNameIsEmpty && $firstNameIsValid
          && !$lastNameIsEmpty && $lastNameIsValid
          && !$emailIsEmpty && $emailIsValid) {
    accessDB::getInstance()->createUser($_POST["username"], $_POST["password"]
            , $_POST["email"], $_POST["firstName"], $_POST["lastName"]);

//Return the last user_id inserted into the users database table   
    //accessDB::getInstance()->createUser($_POST["username"], $_POST["password"]);


    session_start();
    $_SESSION['username'] = $_POST['username'];
    header('Location: main.php');
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en-US">
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taroko Hotel Management System</title>
  <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
  <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">

   <!--Extra meta below -->
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
 
  <script src="js/modernizr.custom.js"></script>
  <!-- end extra -->

  <link rel="stylesheet" type="text/css" media="all" href="css/form_styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="formValidation.js" ></script>
  <script type="text/javascript" src="js/switchery.min.js"></script>

</head>
<body>
  <div class="menu">
      
      <div class="main clearfix">
        <div class="column">
          <div id="dl-menu" class="dl-menuwrapper"> 
            <button class="dl-trigger">Open Menu</button>
            <a href="main.php" style="color:#ffffff;font-size:16px; font-weight:bold;padding-left:5px; padding-right:15px">Home</a>
            <ul class="dl-menu">
              <li>
                <a href="#">Services</a>
                <ul class="dl-submenu">
                  <li>
                    <a href="#">Reservations</a>
                    <ul class="dl-submenu">
                      <li><a href="createReservation">New Reservation</a></li>
                      <li><a href="#">Update Reservation</a></li>
                      <li><a href="#">Blocks</a></li>
                      <li><a href="#">Confirmation</a></li>
                      <li><a href="#">Registration Cards</a></li>
                      <li><a href="#">Calender</a></li>
                      <li><a href="#">Profiles</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Front Desk</a>
                    <ul class="dl-submenu">
                      <li><a href="#">Arrivals</a></li>
                      <li><a href="#">In-House</a></li>
                      <li><a href="#">Room Assignment</a></li>
                      <li><a href="#">Accounts</a></li>
                      <li><a href="#">Messages</a></li>
                      <li><a href="#">Traces</a></li>
                      <li><a href="#">Wakeup Calls</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Guest Services</a>
                    <ul class="dl-submenu">
                      <li><a href="#">Housekeeping</a></li>
                      <li><a href="#">Room Service</a></li>
                      <li><a href="#">Dry Cleaning</a></li>
                      <li><a href="#">Shuttle</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">Hotel</a>
                <ul class="dl-submenu">
                  <li><a href="#">Maintenance</a></li>
                  <li><a href="#">Miscellaneous</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Administration</a>
                <ul class="dl-submenu">
                  <li>
                    <a href="#">Bookkeeping</a>
                    <ul class="dl-submenu">
                      <li><a href="#">Accounts Receivable</a></li>
                      <li><a href="#">Monthly Goals</a></li>
                      <li><a href="#">Quaters</a></li>
                      <li><a href="#">Management</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Shift Reports</a>
                    <ul class="dl-submenu">
                      <li><a href="#">AM Reports</a></li>
                      <li><a href="#">PM Reports</a></li>
                      <li><a href="#">Night Reports</a></li>
                      <li><a href="#">Management</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Room Management</a>
                    <ul class="dl-submenu">
                      <li><a href="#">Floor Plan</a></li>
                      <li><a href="#">Checkouts</a></li>
                      <li><a href="#">Inspected Rooms</a></li>
                      <li><a href="#">Clean Rooms</a></li>
                      <li><a href="#">Dirty Rooms</a></li>
                      <li><a href="#">Under Maintenance</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Cashiering</a>
                    <ul class="dl-submenu">
                      <li>
                        <a href="#">Hotel Buys</a>
                        <ul class="dl-submenu">
                          <li><a href="#">Sweet Shop</a></li>
                          <li><a href="#">Souvenir Shop</a></li>
                          <li><a href="#">East Wing Dining</a></li>
                          <li><a href="#">Bar</a></li>
                          <li><a href="#">Business Room</a></li>
                          <li><a href="#">Other</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
              <li>
                <a href="#">Hotel Services</a>
                <ul class="dl-submenu">
                  <li><a href="#">Miscellaneous</a></li>
                  <li>
                    <a href="#">Maintenance</a>
                    <ul class="dl-submenu">
                      <li><a href="#">Hotel General Areas</a></li>
                      <li><a href="#">Laundry Room</a></li>
                      <li><a href="#">Outdoor</a></li>
                      <li><a href="#">Hotel Rooms</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              
            </ul>
            <li>
              <a href="index.php">Logout</a>
              
              
            </li>
          </div><!-- /dl-menuwrapper -->
        </div>
      </div>
    </div> <!-- /end menu -->

<div class="parent">	
  <div id="wrapper">
  <h1 class="header">Create User</h1>
  <!--<h1>Create User</h1>-->
 
  <?php
                 //CHeck to make sure all fields have been entered
                 if ($userNameIsEmpty || $passwordIsEmpty || $firstNameIsEmpty || $lastNameIsEmpty
                         || $emailIsEmpty) {
                   echo ("All fields must be filled. Please, enter all fields");
                   echo ("<br/>");
                 }
                 //Check for duplicates 
                 if (!$userNameIsUnique) {
                   echo ("The person already exists. Please check the spelling and try again");
                   echo ("<br/>");
                 }
                 ?>
  <form onsubmit="createUser.php" method="POST" name="signup" onSubmit="return validateForm()">
  <div class="col-2">
    <label>
      First Name
      <input type="text" placeholder="What is your first name" id="firstName" name="firstName" tabindex="1">
    </label>
  </div>
  <div class="col-2">
    <label>
      Last Name
      <input type="text" placeholder="What is your last name" id="lastName" name="lastName" tabindex="2">
    </label>
  </div>
  <div class="col-2">
    <label>
      Username
      <input type="text" placeholder="Enter your username here" id="username" name="username" tabindex="3">
    </label>
  </div>
  <div class="col-2">
    <label>
      Email
      <input type="text" placeholder="What is your e-mail address?" id="email" name="email" tabindex="4">
    </label>
  </div> 
  <div class="col-2">
    <label>
      Password
      <input type="password" placeholder="Enter your password" id="password" name="password" tabindex="5">
    </label>
  </div>
  <div class="col-2">
    <label>
      Repeat Password
      <input type="password" placeholder="Enter your password again" id="pwd_verify" name="pwd_verify" tabindex="6">
    </label>
  </div>
  
  <div class="col-submit">
    <button type="submit" name="submit" class="submitbtn">Submit Form</button>
  </div>
  
  </form>
  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.dlmenu.js"></script>
    <script>
      $(function() {
        $( '#dl-menu' ).dlmenu();
      });
    </script>



<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
</body>
</html>