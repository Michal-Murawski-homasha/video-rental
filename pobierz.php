<?php

//$imie = $_POST['imie'];
if(isset($_POST['imie']) && ($_POST['imie'] != '' || $_POST['imie'] != NULL))
	{
		$imie=$_POST['imie'];
	}
	else
	{
		header('Location:formularz.php');
	}
//$email = $_POST['email'];
if(isset($_POST['email'])){$email=$_POST['email'];}else{$email=0;}
//$haslo = $_POST['haslo'];
if(isset($_POST['haslo'])){$haslo=$_POST['haslo'];}else{$haslo=0;}
$plec = $_POST['plec'];
$auta = $_POST['auta'];

if(isset($_POST['regulamin'])) {
	$regulamin = 1;
} else {
	$regulamin = 0;
}

if(isset($_POST['politykaprywatnosci'])) {
	$politykaprywatnosci = 1;
} else {
	$politykaprywatnosci = 0;
}

echo $imie.'<br />'.$email.'<br />'.$haslo.'<br />'.$plec.'<br />'.$regulamin.'<br />'.$politykaprywatnosci.'<br />'.$auta;

?>