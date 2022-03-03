<?php
  echo $_POST['firstName'];

  if (isset($_POST['firstName'])) {
    echo 'JEST';
  } else {
    echo 'NIE MA';
  }

 ?>
 // Generowanie klucz użytkownika
 $keyUser = md5(string: time() + rand(10, 99));
