<?php
  require_once('../config/connection.php');
  session_start();
  // echo $_SESSION['info'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                      <div class="p-5">
                              <?php
                                if(isset($_SESSION['info'])) {
                              ?>
                              <div class="alert alert-danger" role="alert">
                              A simple danger alert—check it out!

                              <?php
                                  $_SESSION['info']; // = 0;
                                // } else {
                                // $_SESSION['info']++;
                              ?>
                              <?php
                                }
                              ?>
                            </div>
                            <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">Nowe Konto</h1>
                                <?php
                                  echo $connectionInfo;

                                  session_destroy();
                                  unset($_SESSION['info']);
                                ?><br>
                            </div>
                            <form class="user" action="users.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="firstName" method="post" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="lastName" required>
                                            <?php
                                              if (empty($_POST[''])) {
                                                echo "Nie podałeś Nazwiska";
                                            } else {
                                              echo "Podaj nazwisko";
                                            }
                                            ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="emailAddress" required>
                                        <?php
                                          if (empty($_POST[''])) {
                                            echo "Nie podałeś adresu e-mail";
                                        } else {
                                          echo "Podaj adres e-mail";
                                        }
                                        ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" required>
                                            <?php
                                              if (empty($_POST[''])) {
                                                echo "Nie podałeś hasła";
                                            } else {
                                              echo "Podaj hasło";
                                            }
                                            ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repeatPassword" required>
                                    </div>
                                </div>
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">

                                <hr>
                                <!--<a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>-->
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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
