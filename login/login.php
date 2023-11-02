<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../config/UniversalConnect.php';

unset($_SESSION['accountExists']);
unset($_SESSION['errorFirstName']);
unset($_SESSION['errorLastName']);
unset($_SESSION['errorEmailAddress']);
unset($_SESSION['errorPassword']);
unset($_SESSION['errorRepeatPassword']);
?>
<!DOCTYPE html>
<html lang="pl">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Wypożyczalnia wideo - Login</title>

	<!-- Custom fonts for this template-->
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Logowanie</h1>
									<?php
									$worker = new UniversalConnect();
									$worker->doConnect();
									?><br>
									<?php
									if (!isset($_SESSION['loginStatus'])) {
										echo '';
									} else {
										if ($_SESSION['loginStatus'] == 1) {
											?>
											<div class="alert alert-success" role="alert">
												<?php echo $_SESSION['loginInfo'] . " jako " . $_SESSION['infoUser']; ?>
											</div>
											<?php
										} elseif ($_SESSION['loginStatus'] == 0) {
											?>
											<div class="alert alert-danger" role="alert">
												<?php echo $_SESSION['loginInfo']; ?>
											</div>
											<?php
										}
									}
									?>
									<form class="user" action="userlogin.php" method="post">
										<div class="form-group">
											<input type="email" class="form-control form-control-user"
												   id="exampleInputEmail" aria-describedby="emailHelp"
												   placeholder="Enter Email Address..." name="emailLogin" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user"
												   id="exampleInputPassword" placeholder="Password" name="passwordLogin"
												   required>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember
													Me</label>
											</div>
										</div>
										<input type="submit" class="btn btn-primary btn-user btn-block" name=""
											   value="Login">
										<hr>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="../index.php">Strona główna</a>
									</div>
									<div class="text-center">
										<a class="small" href="register.php">Utwórz konto</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
