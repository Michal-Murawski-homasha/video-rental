<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
		// isset($_SESSION['emlpoyee-card']);
	}
    include_once 'config/UniversalConnect.php';
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
						  <h1 class="h3 mb-0 text-gray-800">Karta pracowników</h1>
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
											$worker = new UniversalConnect();
											$worker->doConnect();
											  if (!isset($_SESSION['loginStatus']))
											  {
												echo 'Zaloguj się';
											  }
											  else
											  {
												if (isset($_GET['order']))
												{
												  $order = $_GET['order'];
												}
												else {
												  $order = 'firstNameUser';
												}

												if (isset($_GET['sort']))
												{
												  $sort = $_GET['sort'];
												}
												else {
												  $sort = 'ASC';
												}

												$query = "SELECT * FROM employee
												ORDER BY $order $sort";
												$result = $worker->doConnect()->query($query);
												if ($result->num_rows == 0)
												{
												  echo 'NIE';
												}
												else
												{
												  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

												  echo  "<table class='table'>
												  <thead class='table-dark'>
												  <tr>
												  <th><a href='?order=firstNameUser&&sort=$sort' class='text-light'>Imię</a></th>
												  <th><a href='?order=lastNameUser&&sort=$sort' class='text-light'>Nazwisko</a></th>
												  <th><a href='?order=emailUser&&sort=$sort' class='text-light'>Adres e-mail</a></th>
												  </tr>
												  </thead>";
												  while ($row = $result->fetch_assoc())
												  {
													$firstNameUser = $row['firstNameUser'];
													$lastNameUser = $row['lastNameUser'];
													$emailUser = $row['emailUser'];

													echo '<tbody>
													<td>'.$firstNameUser.'</td>
													<td>'.$lastNameUser.'</td>
													<td>'.$emailUser.'</td>
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
