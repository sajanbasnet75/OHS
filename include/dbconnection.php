
<?php
$conn_error = 'Could not connect the database';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'ohs_db';
session_start();
$connect = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_db);
if(!$connect)
{
	die($conn_error);
}
?>