<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	// require_once('../config/connection.php');
	include_once('config/IConnenctInfo.php');

	$emailLogin = $_POST['emailLogin'];
	$passwordLogin = md5($_POST['passwordLogin']);

	$resultLogin = mysqli_query($connection, "SELECT * FROM employee WHERE emailUser = '$emailLogin' AND passwordUser = '$passwordLogin'");

	if (mysqli_num_rows($resultLogin) == 0)
	{
		$_SESSION['loginStatus'] = 0;
		$_SESSION['loginInfo'] = "Błąd logowania";
		header('Location:login.php');
		exit();
	}
	else
	{
		$_SESSION['loginStatus'] = 1;
		$_SESSION['loginInfo'] = "Jesteś zalogowany";
		$_SESSION['transactionId'] = md5(time() + rand(1000,9999));
		$row = mysqli_fetch_array($resultLogin);
		$_SESSION['infoUser'] = $row['firstNameUser']." ".$row['lastNameUser'];
		$_SESSION['email'] = $row['emailUser'];
		header('Location:../index.php');
		exit();
	}

	// // Login user
	// $emailLogin = $_POST['emailLogin'];
	// $passwordLogin = $_POST['passwordLogin'];
	//
	// $queryLogin = "SELECT emailUser FROM users WHERE emailUser = '$emailLogin' AND passwordUser = '$passwordLogin'";
	// $selectLogin = $connection->query($selectLogin);
	//
	// $records = mysql_query($queryLogin);
	// if(mysql_num_rows($records) == 0) {
	//   $_SESSION['infoLogin'] = "Błędny email!";
	//   header('Location:login.php');
	//   exit();
	// }
	// else {
	//   // $_SESSION['infoLogin'] = "";
	//   header('Location:index.php');
	// }

	// if($_SERVER["REQUEST_METHOD"] == "POST") {
	//       // username and password sent from form
	//
	//       $myLogin = mysqli_real_escape_string($db,$_POST['emailLogin']);
	//       $myPassword = mysqli_real_escape_string($db,$_POST['passwordLogin']);
	//
	//       $sql = "SELECT idUser FROM users WHERE emailUser = '$myLogin' and passwordUser = '$myPassword'";
	//       $result = mysqli_query($db,$sql);
	//       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	//       $active = $row['active'];
	//
	//       $count = mysqli_num_rows($result);
	//
	//       // If result matched $myusername and $mypassword, table row must be 1 row
	//
	//       if($count == 1) {
	//          // session_register("myLogin");
	//          $_SESSION['login_user'] = $myLogin;
	//
	//          header('Location:../index.php');
	//       }else {
	//         $_SESSION['login_user'] = $error;
	//          $error = "Your Login Name or Password is invalid";
	//       }
	//    }

?>
