<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
?>

<?php
  require_once('../config/connection.php');
  // $_SESSION = array();
  unset($_SESSION['loginStatus']);
  unset($_SESSION['accountExists']);
  unset($_SESSION['errorFirstName']);
  unset($_SESSION['errorLastName']);
  unset($_SESSION['errorEmailAddress']);
  unset($_SESSION['errorPassword']);
  unset($_SESSION['errorRepeatPassword']);
  if (isset($_COOKIE[session_name()]))
  {
    setcookie(session_name(), '', time() - 3600);
  }
  header('Location:../index.php');
?>
