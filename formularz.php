<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Formularz</title>
</head>
<body>
	<form action = "pobierz.php" method = "POST">
		<p>Imię:</p>	
		<input type = "text" name = "imie">

		<p>Hasło:</p>	
		<input type = "password" name = "haslo">

		<p>Email:</p>	
		<input type = "email" name = "email">
		
		<br />
		<p>Płeć</p>
		<input type = "radio" name = "plec" value = "K" checked = "true"> Kobieta
		<input type = "radio" name = "plec" value = "M"> Mężczyzna

		<br />
		<input type = "checkbox" name = "regulamin"> Przeczytałem regulamin
		<input type = "checkbox" name = "politykaprywatnosci"> Akceptuje polityke prywatności

		<br />
		<select name="auta">
		  <option value="volvo">Volvo</option>
		  <option value="saab">Saab</option>
		  <option value="opel">Opel</option>
		  <option value="audi">Audi</option>
		</select>

		<br />
		<input type="submit" name="" value = "Zapisz">
	</form>

</body>
</html>
