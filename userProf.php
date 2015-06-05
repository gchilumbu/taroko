<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <script type="text/javascript" src="formValidation.js" ></script>
      <link rel="stylesheet" type="text/css" href="user_stylesheet.css" />
      <title></title>
    </head>
    <body>

      <?php
      /*
       * The code on this page displays a user profile that has been requested
       * using a search input field and button. Only the name and email are 
       * displayed as the instructions given stated for this part.
       */
      require_once("./connects/access.php");

      $userID = accessDB::getInstance()->getUserID($_GET['username']);
      if (!$userID) {
        exit("The person " . $_GET['username'] . " is not found. Please check the spelling and try again");
      }
      ?>
      <div id="container">
        Wish List of <?php echo $_GET['username'] . "<br/>"; ?>

        <table border="black">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>
          <?php
          $result = accessDB::getInstance()->getUserInfo($userID);
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . htmlentities($row['firstName']) . "</td>";
            echo "<td>" . htmlentities($row['lastName']) . "</td>";
            echo "<td>" . htmlentities($row['email']) . "</td></tr>\n";
          }
          mysqli_free_result($result);
          ?>
        </table>
        <br />
        </form>
        <div class="forms">
          <form name="backToMainPage" action="index.php">
            <input type="submit" value="Main page"/>
          </form>
        </div>
        <div class="forms">
          <form name="backToMainPage" action="viewUser.php">
            <input type="submit" value="Back to my profile"/>
          </form>
        </div>
      </div>
    </body>
  </html>
