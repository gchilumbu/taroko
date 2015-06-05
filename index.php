<?php
/*
 * This page includes the logon form that allows the user to logon into the 
 * application before they can access any of its data. If the user does not
 * have an account, there is a link on this page that directs the user to the 
 * registration page where they can create an account and have access to the 
 * application's data. 
 */

require_once("./connects/access.php");
$logonSuccess = false;

// verify user's credentials
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $pass = $_POST['password'];
  $password = md5($pass);
  $logonSuccess = (accessDB::getInstance()->validateUser($_POST['username'], $password));
  if ($logonSuccess == true) {
    session_start();
    $_SESSION['username'] = $_POST['username'];
    header('Location: main.php');
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <script type="text/javascript" src="formValidation.js" ></script>
      <link rel="stylesheet" type="text/css" href="user_stylesheet.css" />
	  <link rel="stylesheet" type="text/css" href="./css/styles.css" media="screen" />
      <title>Login page</title>
    </head>
    <body>
	 <div class="body"></div>
	 		<div class="grad"></div>
	 		<div class="header">
	 			<div><span>K</span>ora</div>
	 		</div>
	 		<br>
	 		<div class="login">
	 			<form action="index.php" method="POST" name="login">
	 			   <?php
	             if ($_SERVER["REQUEST_METHOD"] == "POST") {
	               if (!$logonSuccess)
	                 echo "Invalid name and/or password";
	             }
	             ?>
	 				<input type="text" placeholder="username" name="username" id="username"><br>
	 				<input type="password" placeholder="password" name="password" id="password"><br>
	 				<input type="submit" name="submit" value="Login"><br>
	 			</form>
	 			 <script type="text/javascript">
	             var field_id = "username"
	             document.getElementById(field_id).focus();
	           </script>
	           <br />If you do not have an account, please <a href="createUser.php">sign up</a>
	 		</div>
    </body>
  </html>