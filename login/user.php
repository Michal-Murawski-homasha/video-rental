<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<?php
require_once('../config/connection.php');

$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$eAddress = $_POST['emailAddress'];
$passw = md5($_POST['password']);
$rPassw = md5($_POST['repeatPassword']);

// Register new user
$worker = new UniversalConnect();
$worker->doConnect();
$query = "SELECT count(1) AS ilosc FROM users WHERE emailUser = '$eAddress'";
$select = $worker->doConnect()->query($query);

while ($row = $select->fetch_array) {
	$ilosc = $row['ilosc'];
	if ($ilosc > 0) {
		$_SESSION['info'] = "Konto z takim emialem już istnieje!";
		header('Location:register.php');
		exit();
	} else {
		$insert = "INSERT INTO users (firstNameUser, lastNameUser, emailUser, passwordUser) VALUES ('$fName', '$lName', '$eAddress', '$passw')";
		$add = $worker->doConnect()->query($insert);
		$_SESSION['info'] = "Utworzono nowe konto";
		header('Location:login.php');
	}
}

if (preg_match('@^[A-Z][a-z]{2,10}$@', $_POST['firstName'])) {
	$_SESSION['info'];
} else {
	$_SESSION['errorFirstName'] = "Wpisz poprawnie imię";
	header('Location:register.php');
}

if (preg_match('@^[A-Z][a-z]{2,10}$@', $_POST['lastName'])) {
	$_SESSION['info'];
} else {
	$_SESSION['errorLastName'] = "Wpisz poprawnie nazwisko";
	header('Location:register.php');
}

if (preg_match('@^[a-z]+[\@]{1}[a-z]{2,}[\.]{0,1}[a-z]{0,5}$@', $_POST['emailAddress'])) {
	$_SESSION['info'];
} elseif (preg_match('@^[^ ]+$@', $_POST['emailAddress'])) {
	$_SESSION['errorEmailAddress'] = "Wpisz poprawnie e-mail";
	header('Location:register.php');
}

if (preg_match('@^[A-Za-z0-9]{8,16}$@', $_POST['password'])) {
	$_SESSION['info'];
} else {
	$_SESSION['errorPassword'] = '<abbr title="Wpisz hasło zawierające od 8 do 16 dużych i małych liter oraz cyfr">Wpisz hasło zawierające...</abbr>';
	header('Location:register.php');
}

if (preg_match('@^[A-Za-z0-9]{8,16}$@', $_POST['repeatPassword'])) {
	$_SESSION['info'];
} else {
	$_SESSION['errorRepeatPassword'] = "Powtórz hasło";
	header('Location:register.php');
}
?>
