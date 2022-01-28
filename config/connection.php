<?php
  $config = [$host = 'localhost', $user = 'root', $password = '', $dbname = 'teb'];

  $connection = new mysqli('localhost', 'root', '', 'teb');

  if($connection->connect_error)
  {
    die("Błąd: ".$connection->connect_error);
  } else {
    $connectionInfo = 'Połączono z bazą danych '.$dbname.' !!! :)<br>';
  }
?>
