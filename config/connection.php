<?php
  $config = [$host = 'localhost', $user = 'root', $password = '', $dbname = 'teb'];

  $connection = new mysqli('localhost', 'root', '', 'teb');

  mysqli_set_charset($connection, "utf8");

  if($connection->connect_error)
  {
    die("Błąd: ".$connection->connect_error);
  } else {
    $connectionInfo = 'Połączono z bazą danych '.$dbname.' !!! :)<br>';
  }

  mysqli_close($connection);
?>
