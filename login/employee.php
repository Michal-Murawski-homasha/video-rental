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

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$password = md5($_POST['password']);
$repeatPassword = md5($_POST['repeatPassword']);

//////////////////////////////////////////////////////////////////////////////////
// Validation
if (preg_match('@^[A-Z][a-z]{2,10}$@', $firstName)) {
	$_SESSION['infoValidation'] = 0;
} else {
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorFirstName'] = "Wpisz poprawnie imię";
	// $errorFirstName = "Wpisz poprawnie imię";
	header('Location:register.php');
}

if (preg_match('@^[A-Z][a-z]{2,10}$@', $lastName)) {
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorLastName'] = "";
} else {
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorLastName'] = "Wpisz poprawnie nazwisko";
	// $errorLastName = "Wpisz poprawnie nazwisko";
	header('Location:register.php');
}

if (preg_match('@^[a-z]+[\@]{1}[a-z]{2,}[\.]{1}[a-z]{2,5}[\.]{0,1}[a-z]{0,}$@', $emailAddress)) {
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorEmailAddress'] = "";
} else {
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorEmailAddress'] = "Wpisz poprawnie e-mail";
	// $errorEmailAddress = "Wpisz poprawnie e-mail";
	header('Location:register.php');
}

if (preg_match('@^[A-Za-z0-9]{8,16}$@', $password)) {
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorPassword'] = "";
} else {
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorPassword'] = '<abbr class="" title="... zawierające od 8 do 16 dużych i małych liter oraz cyfr"><i class="fas fa-question fa-sm"></i></abbr>';
	// $errorPassword = "Wpisz hasło zawierające od 8 do 16 dużych i małych liter oraz cyfr";
	header('Location:register.php');
}

if ($repeatPassword == $password) {
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorRepeatPassword'] = "";
} else {
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorRepeatPassword'] = "Powtórzone hasło się różni";
	// $errorRepeatPassword = "Powtórz hasło";
	header('Location:register.php');
}

///////////////////////////////////////////////////////////////////////////////////
// Checking if an account exists
// $queryUsers = mysqli_query($connection, "SELECT COUNT(1) AS ilosc FROM users WHERE emailUsers = '$eAddress'");
if (!$_SESSION['errorFirstName'] && !$_SESSION['errorLastName'] && !$_SESSION['errorEmailAddress'] && !$_SESSION['errorRepeatPassword']) {
	$query = "SELECT count(1) AS ilosc FROM employee WHERE emailUser = '$emailAddress'";
	$worker = new UniversalConnect();
	$worker->doConnect();
	$select = $worker->doConnect()->query($query);

	while ($row = $select->fetch_array()) {
		$ilosc = $row['ilosc'];
		if ($ilosc > 0) {
			$_SESSION['accountExists'] = "Konto z takim emailem już istnieje!";
			header('Location:register.php');
			exit();
		} else {
			$insert = "INSERT INTO employee (firstNameUser, lastNameUser, emailUser, passwordUser) VALUES ('$firstName', '$lastName', '$emailAddress', '$password')";
			$add = $worker->doConnect()->query($insert);
			$_SESSION['accountNotExists'];
			unset($_SESSION['accountExists']);
			unset($_SESSION['errorFirstName']);
			unset($_SESSION['errorLastName']);
			unset($_SESSION['errorEmailAddress']);
			unset($_SESSION['errorPassword']);
			unset($_SESSION['errorRepeatPassword']);
			header('Location:login.php');
		}
	}
} else {
	header('Location:register.php');
}
?>
