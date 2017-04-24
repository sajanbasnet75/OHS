<?php
include("include/dbconnection.php");
  if(!isset($_SESSION['username'])&&!isset($_SESSION['email']))
    header('Location:logreg.php');
  $username=$_SESSION['username'];
  $email=$_SESSION['email'];
  if (isset($_POST['submit'])) {
    $code=$_POST['code'];
    $query="select * from unverified where username like '$username' and email like '$email' and code like '$code'";
    if($query_run=mysqli_query($connect,$query))
      if(mysqli_num_rows($query_run)==NULL)
        $wrong=1;
      else{
        $row=mysqli_fetch_assoc($query_run);
        $name=$row['name'];
        $sex=$row['sex'];
        $dob=$row['dob'];
        $phone=$row['phone'];
        $address=$row['address'];
        $password=$row['password'];
        $query="insert into users(user_id,username,password,position) values(DEFAULT,'$username','$password','patient')";
        $query_run=mysqli_query($connect,$query);
        $query="select user_id from users where username like '$username'";
        $query_run=mysqli_query($connect,$query);
        $row=mysqli_fetch_assoc($query_run);
        $id=$row['user_id'];
        $query="insert into patient_detail(patient_id,name,dob,address,email,phone) values('$id','$name','$dob','$address','$email','$phone')";
        $query_run=mysqli_query($connect,$query);
        $query="delete from unverified where username like '$username' and email like '$email' and code like '$code'";
        $query_run=mysqli_query($connect,$query);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('Location:logreg.php');
      }
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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet"  href="bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css"/>
   
  <?php include("include/jquery-ajax-links.php");?>
  <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body >
 <?php include('include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("include/navig.php");
?>
     <div class="container">
       <h2><?php if(!isset($wrong))
       echo 'You have not been verified yet.';
       else
        echo 'You have entered the wrong code.'; ?></h2>
       <p>A verification code has been sent to your email address:<b><?php echo $email; ?></b></p>
       <form action="#" method="POST" role="form">
         <legend style="width:200px;">Enter your code</legend>
         <div class="form-group">
           <input type="text" class="form-control" name="code" required style="width:10%;" maxlength="5">
         </div>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </form>
       <br>
       <p>If you have not received the verification code please <a href="#">press here..</a></p>
     </div>      
    </div>
 </div>

</div>
</div>

<!--news part-->
<?php
include("include/news-headlines.php");
?>

 
</body>
</html>