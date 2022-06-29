<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
  require_once('../config/connection.php');

  $search = $_POST['search'];
  // echo $search;

  $query = "SELECT first_name FROM customer WHERE first_name LIKE '%".$search."%'";
  $result = $connection->query($query);
  if (mysqli_num_rows($result) == 0)
  {
    echo 'NIE';
  }
  else
  {
    while ($row = $result->fetch_assoc())
    {
      echo $row['first_name'].'<br>';
    }
  }
?>
