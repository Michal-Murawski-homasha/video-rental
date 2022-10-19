<?php
interface IConnectionInfo
{
	const HOST = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "sakila";
	public function doConnect();
}
?>