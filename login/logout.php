<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../config/UniversalConnect.php';

unset($_SESSION['loginStatus']);
unset($_SESSION['accountExists']);
unset($_SESSION['errorFirstName']);
unset($_SESSION['errorLastName']);
unset($_SESSION['errorEmailAddress']);
unset($_SESSION['errorPassword']);
unset($_SESSION['errorRepeatPassword']);

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time() - 3600);
}
header('Location:../index.php');
?>
