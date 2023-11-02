<?php
include_once "IConnectionInfo.php";

class UniversalConnect implements IConnectionInfo
{
	private static string $server = IConnectionInfo::HOST;
	private static string $currentDB = IConnectionInfo::DBNAME;
	private static string $user = IConnectionInfo::USERNAME;
	private static string $password = IConnectionInfo::PASSWORD;
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
		} elseif (mysqli_connect_error(self::$hookup)) {
			echo "Przyczyną błędu połączenia z bazą jest: " . mysqli_connect_error() . ". ";
		}
		return self::$hookup;
	}
}

?>
