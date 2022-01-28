
<!DOCTYPE html>
<html lang="pl">

<?php include('addons/head.php'); ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">

                        <!-- Loops area -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php $text = 'Pętle PHP'; echo $text;//echo "Pętle PHP"; ?></h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class = "col-md-4">
                                            <h5>Pętla WHILE</h5>
                                            <?php
                                                $a = 5;
                                                $b = 6;
                                                $suma = $a + $b;

                                                $x = NULL;
                                                $x = 1;
                                                while ($x <= 10) {
                                                    $suma = $a + $x;
                                                    echo '<p>'.$suma.'</p>';
                                                    $x++;
                                                }
                                            ?>
                                        </div>
                                        <div class = "col-md-4">
                                            <h5>Pętla FOR</h5>
                                            <?php
                                                for ($x = 1; $x <= 10; $x++) {
                                                    echo '<p>'.$x.'</p>';
                                                }
                                            ?>
                                        </div>
                                        <div class = "col-md-4">
                                            <h5>Petla DO..WHILE</h5>
                                            <?php
                                                $x = NULL;
                                                $x = 11;
                                                do {
                                                    echo '<p>'.$x.'</p>';
                                                    $x++;
                                                } while ($x <= 10)
                                            ?>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-12"><hr /></div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-6">
                                            <h5>Pętla Foreach</h5>
                                            <?php
                                                echo '<p>Tablica asocjacyjna</p>';

                                                $tabA = ['imie' => 'Adam', 'nazw' => 'Kowalski', 'wiek' => 21];

                                                foreach ($tabA as $key => $value) {
                                                    echo $key.' => '.$value.'<br />';
                                                }

                                                echo '<br /><br />';
                                                var_dump($tabA);
                                                echo '<br /><br />';
                                                print_r($tabA);
                                            ?>
                                        </div>
                                        <div class = "col-md-6">
                                            <?php
                                                echo '<br /><p>Tablice</p>';
                                                $tab = [1, 2, 3, 17];

                                                foreach ($tab as $val) {
                                                    echo $val.'<br/>';
                                                }

                                                echo '<br /><br />';
                                                var_dump($tab);
                                                echo '<br /><br />';
                                                print_r($tab);
                                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Loops area -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php $text = 'Instrukcje'; echo $text;//echo "Pętle PHP"; ?></h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class = "col-md-6">
                                            <h5>Instrukcja warunkowa IF</h5>
                                            <?php
                                                $imie = 'Anna';
                                                $wiek = 35;

                                                if ($imie == "Anna" && $wiek == 35) {
                                                    echo "Warunek został spełniony";
                                                } else {
                                                    echo "Warunek nie został spełniony";
                                                }
                                            ?>
                                        </div>
                                        <div class = "col-md-6">
                                            <h5>Instrukcja wybory SWITCH</h5>
                                            <?php
                                                switch ($wiek) {
                                                    case 35:
                                                        echo "Wiek wynosi 35";
                                                        break;

                                                    case 40:
                                                        echo "Wiek wynosi 40";
                                                        break;

                                                    default:
                                                         echo "Nie zanaleziono odpowiedniej instrukcji";
                                                        break;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php $text = 'Zadania'; echo $text;//echo "Pętle PHP"; ?></h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <h5>2.</h5>
                                            <?php
                                                $x = null;
                                                for($x = 1; $x <= 10; $x++)
                                                {
                                                    echo $x.'<br />';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>3.</h5>
                                            <?php
                                                $x = null;
                                                for($x = 10; $x > 0; $x--)
                                                {
                                                    echo $x.'<br />';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>4.</h5>
                                            <?php
                                            $x = null;
                                            $suma = 0;
                                                for($x = 1; $x <= 10; $x++)
                                                {
                                                    $suma = $suma + $x;
                                                    echo $suma.'<br />';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>5.</h5>
                                            <?php
                                                //$x = 1;
                                                // do
                                                // {
                                                //     if(($x / 2) == 0)
                                                //     {
                                                //         echo $x;
                                                //         $x++;
                                                //     }


                                                // } while ($x <= 10)

                                                // while ($x <= 10) {
                                                //   if(fmod($x, 2) == 0) {
                                                //     echo $x.'<br />';
                                                //     $x++;
                                                //   }
                                                // }
                                                for($x = 1; $x <= 10; $x++) {

                                                    echo ($x * 2).'<br />';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>6.</h5>
                                            <?php
                                                $x = 1;
                                                $y = 1000;
                                                $razem = 0;
                                                while ($x <= 12) {
                                                    $razem =  ($razem + $y) * 1.08;
                                                    echo round($razem, 2).'<br />';
                                                    $x ++;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>7.</h5>
                                            <?php
                                                $x = 1;
                                                $y = 5;
                                                while ($x <= 100) {
                                                    $y = $y + 10;
                                                    echo $y;
                                                    if($x < 100) {
                                                        echo ' - ';
                                                    };
                                                    $x ++;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>8.</h5>
                                            <?php
                                                $cegla = 10;
                                                echo pow($cegla, 2);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>9.</h5>
                                            <?php
                                                $x = 10;
                                                $y = 5;
                                                $z = 1;
                                                $ilosc = 0;
                                                while ($y > 0) {
                                                    $ilosc = $ilosc + $x;
                                                    echo $ilosc.'<br />';
                                                    $x = $x - $z;
                                                    $y--;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>10.</h5>
                                            <?php
                                                $x = 10;
                                                $y = 5;
                                                $z = 1;
                                                $ilosc = 0;
                                                while ($y >= 0) {
                                                    $ilosc = $ilosc + $x;
                                                    echo $ilosc.'<br />';
                                                    $x = $x - $z;
                                                    $y--;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <hr>
                                            <h5>10.</h5>
                                            <?php

                                                $k = 2;
                                                echo $cegla * $k;

                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-md-4">
                                            <hr>
                                            <h5>Warunki logiczne - 1</h5>
                                            <?php
                                                $wiek = 30;
                                                $plec = 'K';
                                                if($wiek == '30') {
                                                    echo "Warunek spełniony";
                                                } else {
                                                    echo "Warunek niespełniony";
                                                }
                                            ?>
                                        </div>
                                        <div class = "col-md-4">
                                            <hr>
                                            <h5>Warunki logiczne - 2</h5>
                                            <?php
                                                $wiek = 18;
                                                $plec = 'K';
                                                if ($wiek > 25 && $plec = 'K') {
                                                    echo "Warunek spełniony";
                                                } else {
                                                    echo "Warunek niespełniony";
                                                }
                                            ?>
                                        </div>
                                        <div class = "col-md-4">
                                            <hr>
                                            <h5>Warunki logiczne - 3</h5>
                                            <?php
                                                $wiek = 18;
                                                $plec = 'K';
                                                $wzrost = 180;
                                                if ($wiek > 25 || ($plec == 'K' && $wzrost > 170)) {
                                                    echo "Warunek spełniony";
                                                } else {
                                                    echo "Warunek niespełniony";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class = "row">
                                            <div class = "col-md-4">
                                            <hr>
                                            <h5>SWITCH + IF</h5>
                                            <?php
                                                $x = NULL;
                                                $wzrost = 1.90;
                                                $waga = 75;
                                                $bmi = round($waga / (pow($wzrost, 2)), 2);

                                                if ($bmi > 24.9 && $bmi <= 29.9) {
                                                    $x = 1; // Nadwaga
                                                } elseif($bmi < 19.4) {
                                                    $x = 2; // Niedowaga
                                                }  else {
                                                    if ($bmi > 34.9) {
                                                        $x = 4; //Skrajna
                                                    } elseif($bmi < 25) {
                                                        $x = 3; //OK
                                                    } else {
                                                        $x = 5; // Otylosc
                                                    }
                                                }


                                                echo 'Twoje BMI wynosi:'.$bmi.'<br/>Oznacza to, że ';

                                                switch ($x) {
                                                    case '1':
                                                        echo "masz nadwagę";
                                                        break;
                                                    case '2':
                                                        echo "masz niedowagę";
                                                        break;
                                                    case '3':
                                                        echo "Twoja waga jest OK";
                                                        break;
                                                    case '4':
                                                        echo "ledwo się ruszasz";
                                                        break;
                                                    case '5':
                                                        echo "masz otyłośc";
                                                        break;

                                                    default:
                                                        echo "nie mieścisz się w skali";
                                                        break;
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
