<?php
  include_once('IConnectInfo.php');

  class UniversalConnect implements IConnectInfo
  {
    private static $server = IConnectInfo::HOST;
    private static $currentDB = IConnectInfo::DBNAME;
    private static $user = IConnectInfo::USERNAME;
    private static $password = IConnectInfo::PASSWORD;
    private static $hookup;

    public function doConnect();
      {
        self::$hookup = mysqli_connect(self::$server, self::$user, self::$password, self::$currentDB);
        if (self::$hookup)
        {
          echo "Połączono z bazą danych ".$currentDB;
        }
        elseif (mysqli_connect_error(self::$hookup)) {
          echo "Przyczyną błędu połączenia z bazą jest: ".mysqli_connect_error();
        }
        return self::$hookup;
      }
  }
?>
