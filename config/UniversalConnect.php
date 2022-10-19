<?php
include_once "IConnectionInfo.php";

class UniversalConnect implements IConnectionInfo
{
	private static $server = IConnectionInfo::HOST;
	private static $currentDB = IConnectionInfo::DBNAME;
	private static $user = IConnectionInfo::USERNAME;
	private static $password = IConnectionInfo::PASSWORD;
	private static $hookup;

	public function doConnect()
	{
		self::$hookup = mysqli_connect(
			self::$server,
			self::$user,
			self::$password,
			self::$currentDB
		);
		if (self::$hookup) {
			echo "Połączono z bazą danych " . self::$currentDB . ". ";
		} elseif (mysqli_connect_error(self::$hookup)) {
			echo "Przyczyną błędu połączenia z bazą jest: " . mysqli_connect_error() . ". ";
		}
		return self::$hookup;
	}
}
?>
