

<?php
include("include/dbconnection.php");
?>
<?php
if (isset($_POST['submit'])){

}
?>
<!DOCTYPE html>
<html>
<head>

   <?php include("include/head.php"); ?>
</head>
<body >
 <?php include('include/header.php'); ?>
<video autobuffer autoloop loop controls width="500px">
	<source src="hhh.mp4" type="video/mp4" media="screen">
</video>
<form action="" method="POST" accept-charset="utf8"> 
<textarea name="comments"></textarea>
</form>
<form action="" method="POST" accept-charset="utf8">
  <input type="text" name="name" maxlength="5">
  <input type="email" name="email">
  <input type="submit" name="submit">
</form>


</body>
</html>