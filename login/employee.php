<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

	//   require_once('../config/connection.php');
	include_once('config/IConnenctInfo.php');

	unset($_SESSION['accountExists']);
	unset($_SESSION['errorFirstName']);
	unset($_SESSION['errorLastName']);
	unset($_SESSION['errorEmailAddress']);
	unset($_SESSION['errorPassword']);
	unset($_SESSION['errorRepeatPassword']);

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$emailAddress = $_POST['emailAddress'];
	//$passw = $_POST['password'];
	//$passw = new passwordHash();
	$password = md5($_POST['password']);
	$repeatPassword = md5($_POST['repeatPassword']);

	// echo '<p>Imię: '.$fName.'</p>';
	// echo '<p>Nazwisko: '.$lName.'</p>';
	// echo '<p>e-mail: '.$eAddress.'</p>';
	// echo '<p>Hasło: '.$passw.'</p>';


	//////////////////////////////////////////////////////////////////////////////////
	// Validation
	if (preg_match('@^[A-Z][a-z]{2,10}$@', $firstName))
	{
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorFirstName'] = "";
	}
	else
	{
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorFirstName'] = "Wpisz poprawnie imię";
	// $errorFirstName = "Wpisz poprawnie imię";
	header('Location:register.php');
	}

	if (preg_match('@^[A-Z][a-z]{2,10}$@', $lastName))
	{
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorLastName'] = "";
	}
	else
	{
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorLastName'] = "Wpisz poprawnie nazwisko";
	// $errorLastName = "Wpisz poprawnie nazwisko";
	header('Location:register.php');
	}

	if (preg_match('@^[a-z]+[\@]{1}[a-z]{2,}[\.]{1}[a-z]{2,5}[\.]{0,1}[a-z]{0,}$@', $emailAddress))
	{
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorEmailAddress'] = "";
	}
	else
	{
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorEmailAddress'] = "Wpisz poprawnie e-mail";
	// $errorEmailAddress = "Wpisz poprawnie e-mail";
	header('Location:register.php');
	}

	if (preg_match('@^[A-Za-z0-9]{8,16}$@', $password))
	{
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorPassword'] = "";
	}
	else
	{
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorPassword'] = '<abbr class="" title="... zawierające od 8 do 16 dużych i małych liter oraz cyfr"><i class="fas fa-question fa-sm"></i></abbr>';
	// $errorPassword = "Wpisz hasło zawierające od 8 do 16 dużych i małych liter oraz cyfr";
	header('Location:register.php');
	}

	if ($repeatPassword == $password)
	{
	$_SESSION['infoValidation'] = 0;
	// $_SESSION['errorRepeatPassword'] = "";
	}
	else
	{
	$_SESSION['infoValidation'] = 1;
	$_SESSION['errorRepeatPassword'] = "Powtórzone hasło się różni";
	// $errorRepeatPassword = "Powtórz hasło";
	header('Location:register.php');
	}

	///////////////////////////////////////////////////////////////////////////////////
	// Checking if an account exists
	// $queryUsers = mysqli_query($connection, "SELECT COUNT(1) AS ilosc FROM users WHERE emailUsers = '$eAddress'");
	if (!$_SESSION['errorFirstName'] && !$_SESSION['errorLastName'] && !$_SESSION['errorEmailAddress'] && !$_SESSION['errorRepeatPassword'])
	{
	$query = "SELECT count(1) AS ilosc FROM employee WHERE emailUser = '$emailAddress'";
	$select = $connection->query($query);

	while ($row = mysqli_fetch_array($select))
	{
		$ilosc = $row['ilosc'];
		if ($ilosc>0)
		{
		$_SESSION['accountExists'] = "Konto z takim emailem już istnieje!";
		header('Location:register.php');
		exit();
		}
		else
		{
		$insert = "INSERT INTO employee (firstNameUser, lastNameUser, emailUser, passwordUser) VALUES ('$firstName', '$lastName', '$emailAddress', '$password')";
		$add = $connection->query($insert);
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
	}
	else
	{
	header('Location:register.php');
	}

	/////////////////////////////////////////////////////////////////////////////////
	// Login user
	// $emailLogin = trim($_POST['emailLogin']);
	// $passwordLogin = $_POST['passwordLogin'];
	//
	// $queryLogin = "SELECT emailUser FROM users WHERE emailUser = '$emailLogin'";
	// // $selectLogin = $connection->query($selectLogin);
	//
	// $records = mysql_query($queryLogin);
	// if(mysql_num_rows($records) == 0) {
	//   $_SESSION['infoLogin'] = "Błędny email!";
	//   header('Location:login.php');
	//   exit();
	// }
	// else {
	//   $_SESSION['infoLogin'] = "";
	//   header('Location:index.php');
	// }

	//   // Sprawdza czy pole jest puste
	//   if (empty($fName)) {
	//     echo "Proszę podać imię";
	//   } else (strlen(trim($fName)) > 2);
	//
	//   if (empty($lName)) {
	//     echo "Proszę podać nazwisko";
	//   } else (strlen(trim($lName)) > 2);
	//
	//   if (empty($eAddress)) {
	//     echo "Proszę podać e-mial";
	//   } else (strlen(trim($eAddress)) > 5);
	//
	//   if (empty($passw)) {
	//     echo "Proszę podać hasło";
	//   } else (strlen(trim($passw)) > 3);
	//
	//   if (empty($rPassw)) {
	//     echo "Proszę powtórzyć hasło";
	//   } else (strlen(trim($rPassw)) === $passw);
	//
	//     // Walidacja danych rejestracji
	//     /* $fNameErr = $lNameErr = $eAddressErr = $passwErr = $rPasswErr;
	//     $fName = $lName = $eAddress = $passw = $rPassw;
	//
	//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//       if (empty($_POST["firstName"])) {
	//         $fNameErr = "Name is required";
	//       } else {
	//         $name = test_input($_POST["firstName"]);
	//       }
	// }
	//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//       if (empty($_POST["lastName"])) {
	//         $lNameErr = "Name is required";
	//       } else {
	//         $name = test_input($_POST["lastName"]);
	//       }
	// }
	//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//       if (empty($_POST["emailAddress"])) {
	//         $eAddressErr = "Name is required";
	//       } else {
	//         $name = test_input($_POST["emailAddress"]);
	//       }
	// }
	//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//       if (empty($_POST["password"])) {
	//         $passwErr = "Name is required";
	//       } else {
	//         $name = test_input($_POST["password"]);
	//       }
	// }
	//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//       if (empty($_POST["repeatPassword"])) {
	//         $rPasswErr = "Name is required";
	//       } else {
	//         $name = test_input($_POST["repeatPassword"]);
	//       }
	// } */
	//     /* $fName = $_POST["firstName"];
	//     $lName = $_POST["lastName"];
	//     $eAddress = $_POST["emailAddress"];
	//     $passw = $_POST["password"];
	//     $rPassw = $_POST["repeatPassword"];
	//
	//     if ($_SESSION['info'] == "POST") {
	//       $fName = test_input($_POST["firstName"]);
	//       $lName = test_input($_POST["lastName"]);
	//       $eAddress = test_input($_POST["emailAddress"]);
	//       $passw = test_input($_POST["password"]);
	//       $rPassw = test_input($_POST["repeatPassword"]);
	//     }
	//
	//     function test_input($data) {
	//       $data = trim($data);
	//       $data = stripslashes($data);
	//       $data = htmlspecialchars($data);
	//       return $data;
	//     } */
	//
	//   /* echo $_POST['firstName'];
	//
	//   if (isset($_POST['firstName'])) {
	//     echo 'JEST';
	//   } else {
	//     echo 'NIE MA';
	//   } */
	//
  ?>
