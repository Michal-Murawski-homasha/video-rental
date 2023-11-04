<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../config/UniversalConnect.php';
$worker = new UniversalConnect();
$worker->doConnect();
$emailLogin = $_POST['emailLogin'];
$passwordLogin = md5($_POST['passwordLogin']);

$query = "SELECT * FROM employee WHERE emailUser = '$emailLogin' AND passwordUser = '$passwordLogin'";
$resultLogin = $worker->doConnect()->query($query);

if ($resultLogin->num_rows == 0) {
	$_SESSION['loginStatus'] = 0;
	$_SESSION['loginInfo'] = "Błąd logowania";
	header('Location:login.php');
	exit();
} else {
	$_SESSION['loginStatus'] = 1;
	$_SESSION['loginInfo'] = "Jesteś zalogowany";
	$_SESSION['transactionId'] = md5(time() + rand(1000, 9999));
	$row = mysqli_fetch_array($resultLogin);
	$_SESSION['infoUser'] = $row['firstNameUser'] . " " . $row['lastNameUser'];
	$_SESSION['email'] = $row['emailUser'];
	header('Location:../index.php');
	exit();
}
?>

