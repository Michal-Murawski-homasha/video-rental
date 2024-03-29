<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/UniversalConnect.php';
?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wypożyczalnia wideo - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="/css/style.css" rel="stylesheet"> -->

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
                        $worker = new UniversalConnect();
                        $worker->doConnect();
                        if (!isset($_SESSION['accountExists'])) {
                            echo '';
                        } else {
                            ?>
                            <div class="alet alert-danger" role="alert">
                                <?php echo $_SESSION['accountExists']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Nowe Konto</h1>
                            <?php
                            //								  echo self::$connectInfo;
                            ?><br>
                        </div>
                        <form class="user" action="validation-of-registration.php" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           placeholder="<?php
                                           if (!isset($_SESSION['errorFirstName'])) {
                                               echo 'Podaj imię';
                                           } else {
                                               echo $_SESSION['errorFirstName'];
                                           }
                                           ?>" name="firstName" value="" required>


                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                           placeholder="<?php
                                           if (!isset($_SESSION['errorLastName'])) {
                                               echo 'Podaj nazwisko';
                                           } else {
                                               echo $_SESSION['errorLastName'];
                                           }
                                           ?>" name="lastName" value="" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                       placeholder="<?php
                                       if (!isset($_SESSION['errorEmailAddress'])) {
                                           echo 'Podaj e-mail';
                                       } else {
                                           echo $_SESSION['errorEmailAddress'];
                                       }
                                       ?>" name="emailAddress" value="" required>

                            </div>
                            <div class="form-group row">
                                <div class="inline-block col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="<?php
                                    if (!isset($_SESSION['errorPassword'])) {
                                        echo 'Podaj hasło';
                                    }
                                    if (isset($_SESSION['errorPassword'])) {
                                        echo 'Wpisz hasło ...';
                                    }
                                    ?>" name="password" value="" required>
                                    <?php
                                    if (isset($_SESSION['errorPassword'])) {
                                        echo $_SESSION['errorPassword'];
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="exampleRepeatPassword" placeholder="<?php
                                    if (!isset($_SESSION['errorRepeatPassword'])) {
                                        echo 'Powtórz hasło';
                                    } else {
                                        echo $_SESSION['errorRepeatPassword'];
                                    }
                                    ?>" name="repeatPassword" value="" required>

                                </div>
                            </div>
                            <input type="submit" value="Zarejestruj" class="btn btn-primary btn-user btn-block">

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="../index.php">Strona główna</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.php">Masz już konto? Zaloguj się!</a>
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
