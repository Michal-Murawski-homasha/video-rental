<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
  require_once('config/connection.php');
  // unset($_SESSION['films']);
  // unset($_SESSION['customer']);
  // unset($_SESSION['rental']);
  // unset($_SESSION['employee']);
?>

<html lang="pl">
  <body id="page-top">

      <!-- Page Wrapper -->
      <div id="wrapper">

          <!-- Sidebar -->
          <?php include('addons/sidebar.php'); ?>
          <!-- End of Sidebar -->

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
              <div id="content">

                  <!-- Topbar -->
                  <?php include('addons/topbar.php');  ?>
                  <!-- End of Topbar -->

                  <!-- Begin Page Content -->
                  <div class="container-fluid">

                      <!-- Page Heading -->
                      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                          <h1 class="h3 mb-0 text-gray-800">Wyszukiwarka</h1>
                      </div>

                      <div class="row">

                          <!-- Loops area -->
                          <div class="col-xl-12 col-lg-12">
                              <div class="card shadow mb-4">
                                  <!-- Card Body -->
                                  <div class="card-body">
                                      <div class="row">
                                          <div class = "col-md-12">
                                            <?php
                                              $search = $_POST['search'];
                                              // $searchName = $_GET['action'] ?? NULL;
                                              // $films = $_POST['films'];
                                              // $customer = $_POST['customer'];
                                              // $rental = $_POST['rental'];
                                              // $employee = $_POST['employee'];
                                              // $_SESSION['films'] = $films;
                                              // $_SESSION['customer'] = $customer;
                                              // $_SESSION['rental'] = $rental;
                                              // $_SESSION['employee'] = $employee;
                                              echo '<p>Wyniki dla frazy: "'.$search.'"</p><br>';
                                              // var_dump($_POST['search']);
                                              // var_dump($_POST['films']);
                                              // var_dump($_POST['customer']);
                                              // var_dump($_POST['rental']);
                                              // var_dump($_POST['employee']);

                                              if (!isset($_SESSION['loginStatus']))
                                              {
                                                echo 'Zaloguj się';
                                              }
                                              else
                                              {
                                                if ($_POST['films'])
                                                {
                                                  // $_SESSION['films'] = 1;
                                                  // echo $_POST['films'];
                                                  $query = "SELECT
                                                  film_id,
                                                  title,
                                                  release_year,
                                                  name,
                                                  length,
                                                  rental_rate
                                                  FROM
                                                  film AS F
                                                  JOIN language AS L ON F.language_id = L.language_id
                                                  WHERE title LIKE '%$search%'";
                                                  $result = $connection->query($query);
                                                  if (mysqli_num_rows($result) == 0)
                                                  {
                                                    echo 'Brak danych';
                                                  }
                                                  else
                                                  {
                                                    echo  '<table class="table">
                                                    <thead class="table-dark">
                                                    <tr>
                                                    <th>ID</th>
                                                    <th>Tytuł</th>
                                                    <th>Data produkcji</th>
                                                    <th>Jęyk</th>
                                                    <th>Czas</th>
                                                    <th>Cena</th>
                                                    </tr>
                                                    </thead>';
                                                    while ($row = $result->fetch_assoc())
                                                    {
                                                      echo '<tbody>
                                                      <td>'.$row['film_id'].'</td>
                                                      <td>'.$row['title'].'</td>
                                                      <td>'.$row['release_year'].'</td>
                                                      <td>'.$row['name'].'</td>
                                                      <td>'.$row['length'].'</td>
                                                      <td>'.$row['rental_rate'].'</td>
                                                      </tbody>';
                                                    }
                                                    echo  '</table>';
                                                  }
                                                }
                                                elseif ($_POST['customer'])
                                                {
                                                  // $_SESSION['customer'] = 1;
                                                  echo $_POST['customer'];
                                                  $query = "SELECT * FROM customer WHERE first_name OR last_name OR email LIKE '%$search%'";
                                                  $result = $connection->query($query);
                                                  if (mysqli_num_rows($result) == 0)
                                                  {
                                                    echo 'Brak danych';
                                                  }
                                                  else
                                                  {
                                                    echo  '<table class="table">
                                                    <thead class="table-dark">
                                                    <tr>
                                                    <th>Wyniki wyszuliwań</th>
                                                    <th></th>
                                                    <th></th>
                                                    </tr>
                                                    </thead>';
                                                    while ($row = $result->fetch_assoc())
                                                    {
                                                      echo '<tbody>
                                                      <td>'.$row['first_name'].'</td>
                                                      <td>'.$row['last_name'].'</td>
                                                      <td>'.$row['email'].'</td>
                                                      </tbody>';
                                                    }
                                                    echo  '</table>';
                                                  }
                                                }
                                                elseif ($_POST['rental'])
                                                {
                                                  // $_SESSION['rental'] = 1;
                                                  // echo $_POST['rental'];
                                                  $query = "SELECT
                                                  rental_date,
                                                  return_date,
                                                  inventory_id,
                                                  first_name,
                                                  last_name
                                                  FROM
                                                  rental AS F
                                                  JOIN customer AS L ON F.customer_id = L.customer_id
                                                  WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'
                                                  ORDER BY rental_date DESC
                                                  LIMIT 10";
                                                  $result = $connection->query($query);
                                                  if (mysqli_num_rows($result) == 0)
                                                  {
                                                    echo 'Brak danych';
                                                  }
                                                  else
                                                  {
                                                    echo
                                                    '<table class="table">
                                                    <thead class="table-dark">
                                                    <tr>
                                                    <th>Data wypożyczenia</th>
                                                    <th>Imię</th>
                                                    <th>Nazwisko</th>
                                                    <th>Data zwrotu</th>
                                                    </tr>
                                                    </thead>';
                                                    while ($row = $result->fetch_assoc())
                                                    {
                                                      echo
                                                      '<tbody>
                                                      <td>'.$row['rental_date'].'</td>
                                                      <td>'.$row['first_name'].'</td>
                                                      <td>'.$row['last_name'].'</td>
                                                      <td>'.$row['return_date'].'</td>
                                                      </tbody>';
                                                    }
                                                    echo  '</table>';
                                                  }
                                                }
                                                elseif ($_POST['employee'])
                                                {
                                                  // $_SESSION['employee'] = 1;
                                                  $query = "SELECT * FROM employee
                                                  WHERE firstNameUser OR lastNameUser OR emailUser LIKE '%$search%'";
                                                  $result = $connection->query($query);
                                                  if (mysqli_num_rows($result) == 0)
                                                  {
                                                    echo 'Brak danych';
                                                  }
                                                  else
                                                  {
                                                    echo  '<table class="table">
                                                    <thead class="table-dark">
                                                    <tr>
                                                    <th>Imię</th>
                                                    <th>Nazwisko</th>
                                                    <th>Adres e-mail</th>
                                                    </tr>
                                                    </thead>';
                                                    while ($row = $result->fetch_assoc())
                                                    {
                                                      echo '<tbody>
                                                      <td>'.$row['firstNameUser'].'</td>
                                                      <td>'.$row['lastNameUser'].'</td>
                                                      <td>'.$row['emailUser'].'</td>
                                                      </tbody>';
                                                    }
                                                    echo  '</table>';
                                                  }
                                                }
                                              }
                                            ?>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /.container-fluid -->

              </div>
              <!-- End of Main Content -->

              <!-- Footer -->
              <?php include('addons/footer.php'); ?>
              <!-- End of Footer -->

          </div>
          <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <?php include('addons/scroll.php'); ?>

      <!-- Logout Modal-->
      <?php include('addons/logoutmodal.php'); ?>

      <!-- Bootstrap core JavaScript-->
      <?php include('addons/js.php'); ?>

  </body>
</html>
