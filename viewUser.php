<?php
session_start();
if (!array_key_exists("username", $_SESSION)) {
  //redirect users not logged in to the login screen (index.php)
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <script type="text/javascript" src="formValidation.js" ></script>
      <link rel="stylesheet" type="text/css" href="user_stylesheet.css" />
      <title>View User</title>
    </head>
    <body>
      <div id="container">
        Hello <?php echo $_SESSION['username']; ?><br/>

        <table>
          <tr><th>First Name</th><th>last Name</th><th>Email</th><th>Date of Birth</th></tr>
          <?php
          require_once("./connects/access.php");
          $user = accessDB::getInstance()->getUserID($_SESSION['username']);
          $result = accessDB::getInstance()->getUserInfo($user);
          while ($row = mysqli_fetch_array($result)):
            echo "<tr><td>" . htmlentities($row['firstName']) . "</td>";
            echo "<td>" . htmlentities($row['lastName']) . "</td>";
            echo "<td>" . htmlentities($row['email']) . "</td>";
            echo "<td>" . htmlentities($row['dob']) . "</td>";
            $userID = $row["user_id"];
            ?>
            <td>
              <form name="editUser" action="editUser.php" method="GET">
                <input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
                <input type="submit" name="editUser" value="Edit"/>
              </form>
            </td>
            <?PHP
            echo "</tr>\n";
          endwhile;
          mysqli_free_result($result);
          ?>
        </table>
        <br />
        <div class="forms">
          <form action="userProf.php" method="GET" name="userProf">
            Search for a user by username: <input type="text" name="username" value=""/>
            <input type="submit" value="Search" />
          </form>
        </div>
        <div class="forms">
          <form action="listUsers.php" method="GET" name="listUsers">
            <input type="hidden" name="userID" value="<?php echo $userID; ?>"/>
            <input type="submit" value="List all Users" />
          </form>
        </div>
        <div class="forms">
          <form name="backToMainPage" action="index.php">
            <input type="submit" value="Main page"/>
          </form>
        </div>
      </div>
    </body>
  </html>
