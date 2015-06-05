<?php

/*
 * This class extends mysqli. This means that WishDB inherits the functions and
 *  other characteristics of the PHP mysqli class. This class makes the application
 *  very efficient as it ensures that any changes to queries or functions will be
 *  made in one place and you will not have to parse the entire application code. 
 *  This makes maintenance of the application easier code than having similar blocks
 * of code with queries to the database throughout the application pages. 
 */

class accessDB extends mysqli {

  // single instance of self shared among all instances
  private static $instance = null;
  // db connection config vars
  private $user = "superuser";
  private $pass = "superpass";
  private $dbName = "hoteldb";
  private $dbHost = "192.168.7.113";
  private $con = null;

  //This method must be static, and must return an instance of the object if the object
  //does not already exist.
  public static function getInstance() {
    if (!self::$instance instanceof self) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
  // thus eliminating the possibility of duplicate objects.
  public function __clone() {
    trigger_error('Clone is not allowed.', E_USER_ERROR);
  }

  public function __wakeup() {
    trigger_error('Deserializing is not allowed.', E_USER_ERROR);
  }

  // private constructor
  private function __construct() {
    parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
    if (mysqli_connect_error()) {
      exit('Connect Error (' . mysqli_connect_errno() . ') '
              . mysqli_connect_error());
    }
    parent::set_charset('utf-8');
  }

  public function getUserID($username) {
    $username = $this->real_escape_string($username);
    $user = $this->query("SELECT userId FROM user WHERE username = '"
            . $username . "'");

    if ($user->num_rows > 0) {
      $row = $user->fetch_row();
      return $row[0];
    } else
      return null;
  }

  public function getUserInfo($userid) {
    return $this->query("SELECT userId, username, email, firstName, lastName
          FROM user WHERE userId=" . $userid);
  }

  //The function creates a new record in the users table. The function requires all 
  //fields of a new user as the input parameters and does not return any data.
  public function createUser($uname, $pwd, $email, $first, $last) {
    $username = $this->real_escape_string($uname);
    $password = md5($pwd);
    $email = $this->real_escape_string($email);
    $firstName = $this->real_escape_string($first);
    $lastName = $this->real_escape_string($last);
    $this->query("INSERT INTO user (userId, username, password, email, firstName, lastName) 
      VALUES (NULL, '" . $username . "', '" . $password . "', '" . $email . "', '" . $firstName . "'
        , '" . $lastName . "')");
  }

  //Function inserts username and password into the login table
  public function createUserLogin($username, $password) {
    $username = $this->real_escape_string($username);
    $password = $this->real_escape_string($password);
    $pass = md5($password);
    $this->query("INSERT INTO login (login_id, userName, password)
      VALUES (LAST_INSERT_ID(), '" . $username . "', '" . $pass . "')");
  }

  //Display a list of users in the user's database table.
  public function recordsDisplay($start_from) {
    $start_from = $this->real_escape_string($start_from);
    return $this->query("SELECT * FROM user ORDER BY lastName ASC LIMIT $start_from, 5");
  }

  //Validate the user's credentials at logon page
  public function validateUser($username, $password) {
    $username = $this->real_escape_string($username);
    $password = $this->real_escape_string($password);
    $result = $this->query("SELECT 1 FROM user WHERE username = '"
            . $username . "' AND password = '" . $password . "'");

    return $result->data_seek(0);
  }

  //The function uses the PHP date_parse function
  function formatDate($date) {
    if ($date == "")
      return null;
    else {
      $dateParts = date_parse($date);
      return $dateParts["year"] * 10000 + $dateParts["month"] * 100 + $dateParts["day"];
    }
  }

  //Function to update a user's record if it exists in the users database table
  public function updateUser($userId, $uname, $pwd, $email, $first, $last) {
    $username = $this->real_escape_string($uname);
    $password = md5($pwd);
    $firstName = $this->real_escape_string($first);
    $lastName = $this->real_escape_string($last);
    $email = $this->real_escape_string($email);
    if ($password == '') {
      $this->query("UPDATE user SET firstName = '" . $username . "',
          firstName = '" . $firstName . "',
          lastName = '" . $lastName . "',email = '" . $email . "',
             due_date = NULL WHERE userId = " . $userId);
    } else
      $this->query("UPDATE user SET username = '" . $username . "'
            , password = '" . $password . "', firstName = '" . $firstName . "', lastName = '" . $lastName . "'
            , email = '" . $email . " WHERE userId = " . $userId);
  }

}
