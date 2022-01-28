<?php
  require_once('../config/connection.php');
  session_start();

  $fName = $_POST['firstName'];
  $lName = $_POST['lastName'];
  $eAddress = $_POST['emailAddress'];
  //$passw = $_POST['password'];
  //$passw = new passwordHash();
  $passw = md5($_POST['password']);

  echo '<p>Imię: '.$fName.'</p>';
  echo '<p>Nazwisko: '.$lName.'</p>';
  echo '<p>e-mail: '.$eAddress.'</p>';
  echo '<p>Hasło: '.$passw.'</p>';

  // $queryUsers = mysqli_query($connection, "SELECT COUNT(1) AS ilosc FROM users WHERE emailUsers = '$eAddress'");
  $query = "SELECT count(1) AS ilosc From users WHERE emailUser = '$eAddress'";
  $select = $connection->query($query);

  while ($row = mysqli_fetch_array($select)) {
    $ilosc = $row['ilosc'];
    if($ilosc>0) {
      $_SESSION['info'] = "Konto z takim emialem już istnieje!";
      header('Location:register.php');
      exit();
    } else {
      $insert = "INSERT INTO users (firstNameUser, lastNameUser, emailUser, passwordUser) VALUES ('$fName', '$lName', '$eAddress', '$passw')";
      $add = $connection->query($insert);
      $_SESSION['info'] = "Utworzono nowe konto";
      header('Location:login.php');
    }
  }

?>
