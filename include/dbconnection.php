
<?php
$conn_error = 'Could not connect the database';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'ohs_db';
date_default_timezone_set("Asia/Kathmandu");
session_start();
$connect = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_db);
mysql_query ("set character_set_results='utf8'");

if(!$connect)
{
	die($conn_error);
}
 $connect->set_charset("utf8");
?>