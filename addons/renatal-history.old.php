<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>

<?php
  require_once('../config/connection.php');

  $query = 'SELECT * FROM rental';
  $result = $connection->query($query);

  if (mysqli_num_rows($result) == 0) {
    $_SESSION['rentalConnect'] = 0;
    $_SESSION['rentalInfo'] = '';
    header('Location:../index.php');
    exit();
  } else {
    $_SESSION['rentalConnect'] = 1;
    // $_SESSION['rentalInfo1'] = '<table class="table">';
    $_SESSION['rentalInfo2'] = '<tr><th>ID wypożyczenia</th><th> ID wykazu</th><th> Data wypożyczenia</th><th> Data oddania</th></tr>';
    while ($row=mysqli_fetch_array($result))
    {
      $whileRow = "<tr><td>".$row['rental_id']."</td><td>".$row['inventory_id']."</td><td>".$row['rental_date']."</td><td>".$row['return_date']."</td></tr>";
    }
    $_SESSION['rentalInfo3'] = $whileRow;
    // $_SESSION['rentalInfo4'] = "</table>";
    header('Location:../index.php');
    exit();
  }
  $query->free();

  mysqli_close($connection);
?>
