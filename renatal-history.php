<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include_once('config/ConnectionClient.php');
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
                    <h1 class="h3 mb-0 text-gray-800">Historia wypożyczeń</h1>
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
                                        if (!isset($_SESSION['loginStatus'])) {
                                            echo 'Zaloguj się';
                                        } else {
                                            if (isset($_GET['order'])) {
                                                $order = $_GET['order'];
                                            } else {
                                                $order = 'rental_date';
                                            }

                                            if (isset($_GET['sort'])) {
                                                $sort = $_GET['sort'];
                                            } else {
                                                $sort = 'DESC';
                                            }

                                            $query = "SELECT
                                                rental_date,
                                                return_date,
                                                inventory_id,
                                                first_name,
                                                last_name
                                                FROM
                                                rental AS F
                                                JOIN customer AS L ON F.customer_id = L.customer_id
                                                ORDER BY $order $sort
                                                LIMIT 10";
                                            $result = self::$connectInfo->query($query);
                                            if (mysqli_num_rows($result) == 0) {
                                                echo 'Brak danych';
                                            } else {
                                                $sort == 'ASC' ? $sort = 'DESC' : $sort = 'ASC';

                                                echo
                                                "<table class='table'>
                                                  <thead class='table-dark'>
                                                  <tr>
                                                  <th><a href='?order=rental_date&&sort=$sort' class='text-light'>Data wypożyczenia</a></th>
                                                  <th><a href='?order=first_name&&sort=$sort' class='text-light'>Imię</a></th>
                                                  <th><a href='?order=last_name&&sort=$sort' class='text-light'>Nazwisko</a></th>
                                                  <th><a href='?order=return_date&&sort=$sort' class='text-light'>Data zwrotu</a></th>
                                                  </tr>
                                                  </thead>";
                                                while ($row = $result->fetch_assoc()) {
                                                    $rentalDate = $row['rental_date'];
                                                    $firstName = $row['first_name'];
                                                    $lastName = $row['last_name'];
                                                    $returnDate = $row['return_date'];

                                                    echo
                                                        '<tbody>
                                                    <td>' . $rentalDate . '</td>
                                                    <td>' . $firstName . '</td>
                                                    <td>' . $lastName . '</td>
                                                    <td>' . $returnDate . '</td>
                                                    </tbody>';
                                                }
                                                echo '</table>';
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
