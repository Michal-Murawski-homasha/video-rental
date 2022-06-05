<?php
  require_once('~config\connection.php');

  $query = mysqli_query($connection, "SELECT * FROM users");

  if (mysqli_num_rows($query) == 0) {
    $_SESSION['filmsConnect'] = 0;
    $_SESSION['filmsInfo'] = '';
    // header('Location:../login/login.php');
  } else {
    $_SESSION['filmsConnect'] = 1;
    $_SESSION['filmsInfo'] = '<table border="1">';
    $_SESSION['filmsInfo'] = '<tr><th> Imię</th><th> Nazwisko</th><th> e-mail</th></tr>';
    while($row=mysqli_fetch_array($query))
    {
      $_SESSION['filmsInfo'] = "<tr><td>".$row['emailUser']."</td></tr>";
    }
    $_SESSION['filmsInfo'] = "</table>";
    // header('Location:../index.php');
  }
  // $query->free();

  mysqli_close($connection);
?>
