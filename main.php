<?php
session_start();
if (!array_key_exists("username", $_SESSION)) {
  //redirect users not logged in to the login screen (index.php)
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Kora Hotel Management System</title>
		<meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects" />
		<meta name="keywords" content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="./css/panels.css" media="screen" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<!--<div class="container demo-1">	-->
			<div class="menu">
			
			<div class="main clearfix">
				<div class="column">
					<div id="dl-menu" class="dl-menuwrapper"> 
						<button class="dl-trigger">Open Menu</button>
						<a href="main.php" style="color:#ffffff;padding-left:5px; padding-right:15px">Home</a>
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
			 <h3 class="text_line">Services</h3>
					<div class="img">
					 <a target="_blank" href="#"><img src="./images/reservation.jpg" alt="Klematis" width="110" height="90"></a>
					 <div class="desc">Reservations</div>
					</div>
					<div class="img">
					 <a target="_blank" href="#"><img src="./images/guestservices.jpg" alt="Klematis" width="110" height="90"></a>
					 <div class="desc">Guest Services</div>
					</div>
					<div class="img">
					 <a target="_blank" href="#"><img src="./images/frontdesk.jpg" alt="Klematis" width="110" height="90"></a>
					 <div class="desc">Front Desk</div>
					</div>
				     <div class="img">
				     <a target="_blank" href="#"><img src="./images/misc.jpg" alt="Klematis" width="110" height="90"></a>
				     <div class="desc">Membership</div>
				     </div>		
					 <h3 class="text_line">Administration</h3>
			
					 <div class="img">
					  <a target="_blank" href="#"><img src="./images/bookkeeping.jpg" alt="Klematis" width="110" height="90"></a>
					  <div class="desc">Bookkeeping</div>
					 </div>
					 <div class="img">
					  <a target="_blank" href="#"><img src="./images/roommngt.jpg" alt="Klematis" width="110" height="90"></a>
					  <div class="desc">Room Mngmt</div>
					 </div>
					 <div class="img">
					  <a target="_blank" href="#"><img src="./images/reports.jpg" alt="Klematis" width="110" height="90"></a>
					  <div class="desc">Shift Reports</div>
					 </div>
		 			 <div class="img">
		 			 <a target="_blank" href="#"><img src="./images/cashiering.jpg" alt="Klematis" width="110" height="90"></a>
		 			 <div class="desc">Cashiering</div>
		 			 </div>
			
					 <h3 class="text_line">Hotel</h3>
					 <div class="img">
					  <a target="_blank" href="klematis3_big.htm"><img src="./images/maintenance.jpg" alt="Klematis" width="110" height="90"></a>
					  <div class="desc">Maintenance</div>
					 </div>
					 <div class="img">
					  <a target="_blank" href="klematis3_big.htm"><img src="./images/miscellaneous.jpg" alt="Klematis" width="110" height="90"></a>
					  <div class="desc">Miscellaneous</div>
					 </div>
			
				 <div class="clear"></div>
			</div>
			
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
	</body>
</html>
