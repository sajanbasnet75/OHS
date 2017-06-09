<?php
include('DB.php');

include('db/db.php');


 class Image{
   var 
   $id,
   $name,
   $image;
  function insert(){
   if(isset($_FILES['txt_image']))
   {
        if ($_FILES['txt_image']['size'] > 200*1024) {
            echo "<script language='javascript' type='text/javascript'>
	 alert('File size too large.');
	 </script>";//goto a;
        } else {
        $tempname = $_FILES['txt_image']['tmp_name'];
        $originalname =$_FILES['txt_image']['name'];
        $size =($_FILES['txt_image']['size']/5242888). "MB<br>";
        $type=$_FILES['txt_image']['type'];
        $image=$_FILES['txt_image']['name'];
        move_uploaded_file($_FILES['txt_image']['tmp_name'],"images/".$_FILES['txt_image']['name']);
        }
   }
    $query1 = "update employee_det set image = '$image' where id=".$_GET['id'];
	  mysql_query($query1);
  /*  if(mysql_query($query1)){
     echo "<script language='javascript' type='text/javascript'>
	 alert('Insert success');
	 </script>";
    }
    else
    {a:
     echo "<script language='javascript' type='text/javascript'>
	 alert('Insert not success');
	 </script>";
    }
	*/
	   function get_all_image_list(){
   		$sql = "select * from employee_det where id=".$_GET['id'];
   		//$result = $connect->query($sql);
		   $result = mysql_query($sql);
   		return $result;
	   }
   }
}
$obj_image = new Image();
if(@$_POST['Submit'])
{
 	$obj_image->image=str_replace("'", "''", $_POST['txt_image']);
	$obj_image->insert(); 
	$data_image=$obj_image->get_all_image_list();
 	$row1=mysql_num_rows($data_image);
	
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>..ohs..</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/javascript" href="bootstrap/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet"  href="bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css"/>
  <link rel="icon"  type="image/x-icon" sizes="16x16 32x32 64x64" href="images/icons/favicon.ico"> 
  <?php include("jquery-ajax-links.php");?>
  <script src="bootstrap/js/bootstrap.js"></script>
    
</head>
<body>
<div id="top"><div>
<div  style="min-height:100%;">
<?php
include("navig.php");
?>

 
<?php
include("login.php");
?>
	
<!--main navigation part with logo-->

 <!--container of services options-->
 
<div class="container-fluid mybanner">
<div class="bg-color">

     <nav class="navbar navbar-default main-nav" role="navigation" >
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header navbar-left" >
             <a class="navbar-brand"><a href="index.php" style="text-decoration:none;" ><img src="images/logo.png" class="img-responsive pull-left logoimg"  id="logo" alt="logo"/></a>
             </a>
                    <button type="button" class="navbar-toggle collapsed" style="background-color:#06a5e0;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                        <span class="sr-only" >Toggle Navigation</span>
                        <span class="icon-bar" style="background-color: #00102a" ></span>
                        <span class="icon-bar" style="background-color: #00102a"></span>
                        <span class="icon-bar" style="background-color: #00102a"></span>
                    </button>
           
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" >
                    
                    <ul class="nav navbar-nav navbar-right navi">
                        <li><a href="index.php" style="color:#00102a;">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="About Us.php"  style="color:#00102a;">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"  style="color:#00102a;">Our Services<span class="caret"></span></a>
                            <ul class="dropdown-menu " role="menu">
                                <li><a href="booking.php">Book an appointment</a></li>
                                <li class="divider"></li>
                                <li><a href="">Find a Doctor</a></li>
                                <li class="divider"></li>
                                <li><a href="">Video tutorials</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#00102a;">blabla<span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">a</a></li>
                                <li class="divider"></li>
                                <li><a href="#">b</a></li>
                                <li class="divider"></li>
                                <li><a href="#">c</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#00102a;">blabla <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="">fdhgi</a></li>
                                <li class="divider"></li>
                                <li><a href="">dfgsd </a></li>
                                <li class="divider"></li>
                                <li><a href="">dfkjgh</a></li>
                            </ul>
                        </li>
                        <li><a href="#" style="color:#00102a;">Contact Us</a></li>
                         <a  href="logreg.php"><button type="button" class="btn btn-info" style="margin-top:3px; color:#ffd; font-size:18px;">Sign up/Login</button></a>
                    </ul>
                    

                   
                </div><!-- navbar collapse end -->
            </div><!-- container-fluid end -->
</nav>


<div class="container" style="padding: 2%; ">
 <?php

$query="SELECT * FROM employee_det WHERE id=" . $_GET["id"];
$query_run=mysqli_query($connect,$query);

// Associative array
$row=mysqli_fetch_assoc($query_run);

 ?>
  <div class="row">
    <div class="col-md-8"><b>Name:</b><?php echo $row["fname"]." ".$row["lname"]?>
  		<div class="row">
  		 	<div class="col-md-12"><b>Dob:</b><?php echo $row["dob"]?></div>
  			<div class="col-md-12"><b>Address:</b><?php echo $row["address"]?></div>
  			<div class="col-md-12"><b>Email:</b><?php echo $row["email"]?></div>
  		  	<div class="col-md-12"><b>Phone:</b><?php echo $row["phone"]?></div>
  	    	<div class="col-md-12"><b>Field:</b><?php echo $row["field"]?></div>

  		</div>
  	</div>
  	<div class="col-md-4">
		<img src="<?php echo 'images/'.$row['image'];?>" height="150px" width="150px" alt="No Image."/>
  		<div class="row">
  			<div class="col-md-12">
			<form method="post" enctype="multipart/form-data">
				<input type="file" name="txt_image"></input>
				<input type="submit" name="Submit" value="Upload"></input>Img less than 200KB.
			</form>
			</div>
  		</div>
  	</div>
  </div>
</div>
  
 
 </div>
</div>

<!--news part-->
<?php
include("news-headlines.php");
?>
<!--
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
<div class="container">
    <span>Winning!</span>
</div>
</nav>
-->
<button onclick="#top">top</button>
</body>
</html>