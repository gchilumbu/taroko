<?php
/*
 * This page manages the editing on a user's profile. The application has been 
 * set to only enable users to only edit their profles and not others. Users
 * can only edit their name, email and date of birth. 
 */
session_start();
if (!array_key_exists("username", $_SESSION)) {
  header('Location: index.php');
  exit;
}
require_once("./connects/access.php");
$userID = accessDB::getInstance()->getUserID($_SESSION['username']);

$firstNameIsEmpty = false;
$lastNameIsEmpty = false;
$emailIsEmpty = false;
$dobIsEmpty = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (array_key_exists("back", $_POST)) {
    header('Location: viewUser.php');
    exit;
  } else
  if ($_POST['first'] == "" || $_POST['last'] == "" || $_POST['email'] == "") {
    $firstNameIsEmpty = true;
    $lastNameIsEmpty = true;
    $emailIsEmpty = true;
  } else if ($userID != "") {
    accessDB::getInstance()->updateUser($userID, $_POST["first"], $_POST["last"]
            , $_POST["email"], $_POST["dob"]);
    header('Location: editUser.php');
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
      <title>Edit User Info</title>
      </header>
      <body>
        <?php
        /* The code checks which Request Server method was used for transferring
         * the data and creates an array named $user. */
        if ($_SERVER["REQUEST_METHOD"] == "POST")
          $user = array("user_id" => $userID, "firstName" =>
              $_POST["first"], "lastName" => $_POST["last"], "email" => $_POST["email"]
              , "dob" => $_POST["dob"]);
        else if (array_key_exists("userID", $_GET))
          $user = mysqli_fetch_array(accessDB::getInstance()->getUserInfo($_GET["userID"]));
        else
          $user = array("user_id" => "", "firstName" => "", "lastName" => "",
              "email" => "", "dob" => "");
        ?>
        <div id="container">
          <h2>Edit user profile</h2>

          <div class="center">
            <form name="editUser" action="editUser.php" method="POST">
              <div class="forms">
                <p>
                  <?php
                  //check to make sure all fields have been entered
                  if ($firstNameIsEmpty || $lastNameIsEmpty
                          || $emailIsEmpty || $dobIsEmpty) {
                    echo ("All fields must be filled. Please, enter all fields");
                    echo ("<br/>");
                  }
                  ?> 
                </p>
                <label>First Name:</label>
                <input type="text" name="first"  value="<?php echo $user['firstName']; ?>" />             
              </div>
              <div class="forms">
                <label>Last Name:</label>
                <input type="text" name="last"  value="<?php echo $user['lastName']; ?>" id="last" />                
              </div>
              <div class="forms">
                <label>Email:</label>
                <input type="text" name="email"  value="<?php echo $user['email']; ?>" id="email" />               
              </div>
              <div class="forms">
                <label>Date of birth:</label>
                <input type="text" name="dob"  value="<?php echo $user['dob']; ?>" id="dob" />
              </div>    
              <div class="forms">
                <input type="submit" name="save" value="Save Changes"/><br />
                <input type="submit" name="back" value="View User Profile"/>
              </div>                
            </form>
            <form name="backToMainPage" action="index.php">
              <input type="submit" value="Main page"/>
            </form>
          </div>
        </div>
      </body>
  </html>