<?php
  session_get_cookie_params();
  require_once('~config\connection.php');

  $query = mysqli_query($connection, "SELECT * FROM users");

  if (mysqli_num_rows($query) == 0) {
    $_SESSION['action'] = 0;
    echo = '';
    header('Location:~/login/login.php');
  } else {
    $_SESSION['action'] = 1;
    echo = '<table border="1">';
    echo = '<tr><th> Imię</th><th> Nazwisko</th><th> e-mail</th></tr>';
    while($row=mysqli_fetch_array($query))
    {
      echo = "<tr><td>".$row['firstNameUser']."</td><td>".$row['lastNameUser']."</td><td>".$row['emailUser']."</td></tr>";
    }
    echo = "</table>";
    header('Location:~/index.php');
  }
  // $query->free();

  mysqli_close($connection);
?>
