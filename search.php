<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once 'config/UniversalConnect.php';
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
			<?php include('addons/topbar.php'); ?>
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
									<div class="col-md-12">
										<?php
										$worker = new UniversalConnect();
										$worker->doConnect();
										$search = $_POST['search'];
										echo '<h2 class="h5 mb-0 text-gray-700">Wyniki dla frazy: "' . $search . '"</h2><br>';

										if (!isset($_SESSION['loginStatus'])) {
											echo 'Zaloguj się';
										} else {
											if (isset($_POST['films'])) {
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
												$result = $worker->doConnect()->query($query);
												if ($result->num_rows == 0) {
													echo 'Brak danych';
												} else {
													echo '<table class="table">
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
													while ($row = $result->fetch_assoc()) {
														echo '<tbody>
                                                      <td>' . $row['film_id'] . '</td>
                                                      <td>' . $row['title'] . '</td>
                                                      <td>' . $row['release_year'] . '</td>
                                                      <td>' . $row['name'] . '</td>
                                                      <td>' . $row['length'] . '</td>
                                                      <td>' . $row['rental_rate'] . '</td>
                                                      </tbody>';
													}
													echo '</table>';
												}
											} elseif (isset($_POST['customer'])) {
												$query = "SELECT * FROM customer WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%'";
												$result = $worker->doConnect()->query($query);
												if ($result->num_rows == 0) {
													echo 'Brak danych';
												} else {
													echo '<table class="table">
                                                    <thead class="table-dark">
                                                    <tr>
                                                    <th>Wyniki wyszuliwań</th>
                                                    <th></th>
                                                    <th></th>
                                                    </tr>
                                                    </thead>';
													while ($row = $result->fetch_assoc()) {
														echo '<tbody>
                                                      <td>' . $row['first_name'] . '</td>
                                                      <td>' . $row['last_name'] . '</td>
                                                      <td>' . $row['email'] . '</td>
                                                      </tbody>';
													}
													echo '</table>';
												}
											} elseif (isset($_POST['rental'])) {
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
												$result = $worker->doConnect()->query($query);
												if ($result->num_rows == 0) {
													echo 'Brak danych';
												} else {
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
													while ($row = $result->fetch_assoc()) {
														echo
															'<tbody>
                                                        <td>' . $row['rental_date'] . '</td>
                                                        <td>' . $row['first_name'] . '</td>
                                                        <td>' . $row['last_name'] . '</td>
                                                        <td>' . $row['return_date'] . '</td>
                                                        </tbody>';
													}
													echo '</table>';
												}
											} elseif (isset($_POST['employee'])) {
												$query = "SELECT * FROM employee
                                                    WHERE firstNameUser LIKE '%$search%' OR lastNameUser LIKE '%$search%' OR emailUser LIKE '%$search%'";
												$result = $worker->doConnect()->query($query);
												if ($result->num_rows == 0) {
													echo 'Brak danych';
												} else {
													echo '<table class="table">
                                                      <thead class="table-dark">
                                                      <tr>
                                                      <th>Imię</th>
                                                      <th>Nazwisko</th>
                                                      <th>Adres e-mail</th>
                                                      </tr>
                                                      </thead>';
													while ($row = $result->fetch_assoc()) {
														echo '<tbody>
                                                        <td>' . $row['firstNameUser'] . '</td>
                                                        <td>' . $row['lastNameUser'] . '</td>
                                                        <td>' . $row['emailUser'] . '</td>
                                                        </tbody>';
													}
													echo '</table>';
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