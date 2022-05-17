<?php
  require_once('../config/connection.php');
  session_start();

  if(preg_match('@^[A-Z][a-z]{2,10}$@', $_POST['firstName'])) {
    header('Location:../login/users.php');
  } else {
    $exampleFirstName = echo "Wpisz poprawnie imię";
    header('Location:../login/register.php');
  }

  if(preg_match('@^[A-Z][a-z]{2,10}$@', $_POST['lastName'])) {
    header('Location:../login/users.php');
  } else {
    echo 'Wpisz poprawnie nazwisko';
  }

  if(preg_match('@^[a-z]+[\@]{1}[a-z]{2,}[\.]{0,1}[a-z]{0,5}$@', $_POST['emailAddress'])) {
    header('Location:../login/users.php');
  } else {
    echo 'Wpisz poprawnie e-mail';
  }

  if(preg_match('@^[A-Za-z0-9]{8,16}$@', $_POST['password'])) {
    header('Location:../login/users.php');
  } else {
    echo 'Wpisz hasło zawierające od 8 do 16 dużych i małych liter oraz cyfr';
  }

  if(preg_match('@^[A-Za-z0-9]{8,16}$@', $_POST['repeatPassword'])) {
    header('Location:../login/users.php');
  } else {
    echo 'Powtórz hasło';
  }
?>
