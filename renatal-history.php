<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
  require_once('config/connection.php');
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
                          <h1 class="h3 mb-0 text-gray-800">Historia wypożyczeń</h1>
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
                                              if (!isset($_SESSION['loginStatus']))
                                              {
                                                echo 'Zaloguj się';
                                              }
                                              else
                                              {
                                                $query = 'SELECT
                                                rental_date,
                                                return_date,
                                                inventory_id,
                                                first_name,
                                                last_name
                                                FROM
                                                rental AS F
                                                JOIN customer AS L ON F.customer_id = L.customer_id
                                                ORDER BY rental_date DESC
                                                LIMIT 10';
                                                $result = $connection->query($query);
                                                if (mysqli_num_rows($result) == 0)
                                                {
                                                  echo '';
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
