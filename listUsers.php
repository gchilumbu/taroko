<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <script type="text/javascript" src="formValidation.js" ></script>
      <link rel="stylesheet" type="text/css" href="user_stylesheet.css" />
      <title>List Users</title>
    </head>
    <body>
      <div id="container">
        <table>
          <tr><th>First Name</th><th>last Name</th><th>Email</th></tr>
          <?php
          require_once("./connects/access.php");
          //$user = accessDB::getInstance()->getUserID($_SESSION['username']);
          if (isset($_GET["page"])) {
            $page = $_GET["page"];
          } else {
            $page = 1;
          };
          $start_from = ($page - 1) * 5;
          $result = accessDB::getInstance()->recordsDisplay($start_from);

          $total = 0; //counter for total number of records in users table        
          while ($row = mysqli_fetch_array($result)):
            echo "<tr><td>" . htmlentities($row['firstName']) . "</td>";
            echo "<td>" . htmlentities($row['lastName']) . "</td>";
            echo "<td>" . htmlentities($row['email']) . "</td>";
            //echo "<td>" . htmlentities($row['user_id']) . "</td>";
            if(htmlentities($row['user_id']) > $total)
              $total = htmlentities($row['user_id']);
            ?>

            <?PHP
            echo "</tr>\n";
          endwhile;
          mysqli_free_result($result);
          ?>
        </table>

        <?php
        $recordsPerPage = 5;

        //$result = accessDB::getInstance()->countRecords(htmlentities($row['email']));
        $records = $total;
        $total_pages = ceil($records / $recordsPerPage);

        echo "Page:";
        for ($i = 1; $i <= $total_pages; $i++) {
          echo "<a href='listUsers.php?page=" . $i . "'>" . $i . "</a> ";
        }
        ?>
        <div class="forms">
          <form name="createNewUser" action="createUser.php">
            <input type="submit" value="Create new user"/>
          </form>
        </div>
        <div class="forms">
          <form name="viewUser" action="viewUser.php">
            <input type="submit" value="Back to my profile"/>
          </form>
        </div>
        <div class="forms">
          <form name="backToMainPage" action="index.php">
            <input type="submit" value="Main page"/>
          </form>
        </div>
      </div>
      </div>
    </body>
  </html>


