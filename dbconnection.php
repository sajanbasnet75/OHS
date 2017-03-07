
<?php
$conn_error = 'Could not connect the database';
$mysql_host = 'localhost';
$mysql_user = 'codemandu_user';
$mysql_pass = 'codemandu123';
$mysql_db = 'ohs_db';
$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_select = @mysqli_select_db($mysql_connect, $mysql_db);
if(!$mysql_connect || ! $mysql_select)
{
	//die($conn_error);
}
?>