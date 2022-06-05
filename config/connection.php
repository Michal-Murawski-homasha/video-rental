<?php
  session_start(['cookie_lifetime' => 86400, 'read_and_close'  => true]);
  $config = [$host = 'localhost', $user = 'root', $password = '', $dbname = 'teb'];

  $connection = new mysqli('localhost', 'root', '', 'teb');

  $connection->set_charset("utf8mb4");

  if($connection->connect_error)
  {
    die("Błąd: ".$connection->connect_error);
  } else {
    $connectionInfo = 'Połączono z bazą danych '.$dbname.' !!! :)<br>';
  }

  //mysqli_close($connection);
?>
