<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
?>

<?php
  require_once('../config/connection.php');

  $query = 'SELECT * FROM film';
  $result = $connection->query($query);
  // $numberRows = $result->numRows;

  if (mysqli_num_rows($result) == 0)
  {
  // if ($numRows == 0) {
    $_SESSION['filmsConnect'] = 0;
    $_SESSION['filmsInfo'] = '';
    header('Location:../index.php');
    exit();
  }
  else
  {
    $_SESSION['filmsConnect'] = 1;
    // $_SESSION['filmsInfo1'] = '<table class="table">';
    $_SESSION['filmsInfo2'] = '<thead><tr><th> Tytuł</th><th> Opis</th><th> Data produkcji</th></tr></thead>';
    while ($row = $result->fetch_assoc())
    {
      $_SESSION['filmsInfo3'] = '<tbody><tr><td>'.$row['title'].'</td><td>'.$row['description'].'</td><td>'.$row['release_year'].'</td></tr></tbody>';
    }
    // $_SESSION['filmsInfo3'] = $whileRow;
    // $_SESSION['filmsInfo4'] = '</table>';
    header('Location:../index.php');
    exit();
  }
  $query->free();

  mysqli_close($connection);
?>
