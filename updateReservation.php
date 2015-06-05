<?php
session_start();
if (!array_key_exists("username", $_SESSION)) {
  //redirect users not logged in to the login screen (index.php)
  header('Location: index.php');
  exit;
}
?>
<!doctype html>
<html lang="en-US">
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Taroko Hotel Management System</title>
  <meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects" />
  <meta name="keywords" content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery" />
  <meta name="author" content="George Chilumbu">
  <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
  <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
  
  <!--Extra meta below -->
   <link rel="stylesheet" type="text/css" href="css/default.css" />
   <link rel="stylesheet" type="text/css" href="css/component.css" />
   <link rel="stylesheet" type="text/css" href="./css/panels.css" media="screen" />
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
               <span style="color:#444; font-size:12px;">User: <?php echo $_SESSION['username']; ?></span>
               <ul class="dl-menu">
                 <li>
                   <a href="#">Services</a>
                   <ul class="dl-submenu">
                     <li>
                       <a href="#">Reservations</a>
                       <ul class="dl-submenu">
                         <li><a href="createReservation">New Reservation</a></li>
                         <li><a href="updateReservation.php">Update Reservation</a></li>
                         <li><a href="#">Blocks</a></li>
                         <li><a href="#">Confirmation</a></li>
                         <li><a href="#">Registration Cards</a></li>
                         <li><a href="#">Calender</a></li>
                         <li><a href="createUser.php">Profiles</a></li>
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
  <h1 class="header">Update Reservation</h1>
  
  <form onsubmit="return false">
  <div class="col-3">
     <label style="align:center;color:#00BFFF;font-size:16px">Personal Information</label>
	 <label>
      First Name
      <input type="text" id="firstName" name="firstName" tabindex="1">
    </label>
    <label>
      Last Name
      <input type="text" id="firstName" name="lastName" tabindex="2">
    </label>
    <label>
      Phone
      <input type="text" id="phone" name="phone" tabindex="4">
    </label>
    <label>
      Email
      <input type="text" id="email" name="email" tabindex="3">
    </label>
  </div>
   <div class="col-3">
      <label style="align:center;color:#00BFFF;font-size:16px">Address Information</label>
 	 <label>
       Address
       <input type="text" id="firstName" name="firstName" tabindex="1">
     </label>
     <label>
       City
       <input type="text" id="firstName" name="lastName" tabindex="2">
     </label>
     <label>
       State
       <input type="text" id="phone" name="phone" tabindex="4">
     </label>
     <label>
       Zipcode
       <input type="text" id="email" name="email" tabindex="3">
     </label>
   </div>
   <div class="col-3">
   <label style="align:center;color:#00BFFF;font-size:16px">Membership Information</label>
    <label>
      Membership
      <input type="text" id="membership" name="membership" tabindex="4">
    </label>
    <label>
      Country
      <input type="text" id="country" name="country" tabindex="4">
    </label>
   </div>
   <div class="col-3">
   <label>
     Market
     <input type="text" id="market" name="market" tabindex="4">
   </label>
   </div>
   <div class="col-3">
     <label>
       Source
       <input type="text" id="source" name="source" tabindex="2">
     </label>
   </div>
   <div class="col-3">
     <label>
       Reservation Type
       <input type="text" id="res_type" name="res_type" tabindex="4">
     </label>
   </div>
  <div class="col-1">
     <label style="align:center;color:#00BFFF;font-size:16px">Card Information</label>
	 <label>
      Payment Method (Cash, Visa, Check etc)
      <input type="text" id="payment" name="payment" tabindex="1">
    </label>
</div>
<div class="col-3"></div>
	<div class="col-3">
    <label>
      Card Number
      <input type="text" id="cardno" name="cardno" tabindex="2">
    </label>
</div>
<div class="col-3">
    <label>
      Expire Date
      <input type="text" id="xxexpire" name="ccexpire" tabindex="4">
    </label>
</div>
<div class="col-3">
    <label>
      Card Holder
      <input type="text" id="email" name="email" tabindex="3">
    </label>
</div>
  </div>
  
  <div class="col-submit">
    <button type="submit" name="submit" class="submitbtn">Save Changes</button>
	 <button type="submit" name="submit" class="submitbtn">Cancel Changes</button>
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