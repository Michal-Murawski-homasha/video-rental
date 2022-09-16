<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
  // require_once('config/connection.php');
  require_once('config/UniversalConnect.php')

  // unset($_SESSION['accountExists']);
  // unset($_SESSION['errorFirstName']);
  // unset($_SESSION['errorLastName']);
  // unset($_SESSION['errorEmailAddress']);
  // unset($_SESSION['errorPassword']);
  // unset($_SESSION['errorRepeatPassword']);
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
                          <h1 class="h3 mb-0 text-gray-800">Panel główny</h1>
                      </div>

                      <div class="row">

                          <!-- Loops area -->
                          <div class="col-xl-12 col-lg-12">
                              <div class="card shadow mb-4">
                                  <!-- Card Header - Dropdown -->
                                  <div
                                      class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                                  </div>
                                  <!-- Card Body -->
                                  <div class="card-body">
                                      <div class="row">
                                          <div class = "col-md-12">
                                            <?php
                                              // echo '<table class="table">';
                                              // if (isset($_SESSION['filmConnect']))
                                              // {
                                              //   echo $_SESSION['filmsInfo2'];
                                              //   echo $_SESSION['filmsInfo3'];
                                              // }
                                              // elseif (isset($_SESSION['userConnect']))
                                              // {
                                              //   echo $_SESSION['userInfo'];
                                              // }
                                              // elseif (isset($_SESSION['rentalConnect']))
                                              // {
                                              // //   echo $_SESSION['rentalInfo1'];
                                              //   echo $_SESSION['rentalInfo2'];
                                              //   echo $_SESSION['rentalInfo3'];
                                              // //   echo $_SESSION['rentalInfo4'];
                                              // }
                                              // // } else {
                                              // //   echo 'Brak danych';
                                              // echo '</table>';
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
