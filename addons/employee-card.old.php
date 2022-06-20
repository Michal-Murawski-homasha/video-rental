<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>

<?php
  require_once('../config/connection.php');

  $query = 'SELECT * FROM users';
  $result = $connection->query($query);
  // $numberRows = $result->numRows;

  if (mysqli_num_rows($result) == 0) {
  // if ($numRows == 0) {
    $_SESSION['usersConnect'] = 0;
    $_SESSION['usersInfo'] = '';
    // header('Location:../index.php');
    exit();
  } else {
    $_SESSION['usersConnect'] = 1;
    // $_SESSION['usersInfo1'] = '<table class="table">';
    $_SESSION['usersInfo2'] = '<thead><tr><th> Imię</th><th> Nazwisko</th><th> Adres e-mail</th></tr></thead>';
    while ($row = $result->fetch_assoc())
    {
      $_SESSION['usersInfo3'] = '<tbody><tr><td>'.$row['firstNameUser'].'</td><td>'.$row['lastNameUser'].'</td><td>'.$row['emailUser'].'</td></tr></tbody>';
    }
    // $_SESSION['usersInfo3'] = $whileRow;
    // $_SESSION['usersInfo4'] = '</table>';
    // header('Location:../index.php');
    exit();
  }
  $query->free();

  mysqli_close($connection);
?>
