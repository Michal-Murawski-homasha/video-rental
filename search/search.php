<?php
  if (session_status() == SESSION_PHP_NONE)
  {
    session_start();
  }

  require_once('../config/connection.php');

  echo 'SEARCH';
?>
