<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
?>

<?php
  require_once('../config/connection.php');

  $query = 'SELECT * FROM users';
  $result = $connection->query($query);

  if (mysqli_num_rows($result) == 0) {
    $_SESSION['userConnect'] = 0;
    $_SESSION['userInfo'] = '';
    header('Location:../index.php');
  } else {
    $_SESSION['userConnect'] = 1;
$_SESSION['userInfo'] = '<<<TAB
<tr><th> Imię</th><th> Nazwisko</th><th> e-mail</th></tr>
while ($row=mysqli_fetch_array($result))
{
<tr><td>.$row["firstNameUser"].</td><td>.$row["lastNameUser"].</td><td>.$row["emailUser"].</td></tr>
}
TAB';
    header('Location:../index.php');
  }
  $query->free();

  mysqli_close($connection);
?>
