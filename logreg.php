<?php
  include("include/dbconnection.php");
  if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    unset($_SESSION['email']);
  }
  if(isset($_POST['login-submit'])&&isset($_POST['username'])&&isset($_POST['password'])){
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $pass=md5($pass);
    $query="select * from users where username like '$uname' and password like '$pass'";
    if($query_run=mysqli_query($connect,$query)){
      if(mysqli_num_rows($query_run)==NULL){
        $query="select * from unverified where username like '$uname' and password like '$pass'";
        if($query_run=mysqli_query($connect,$query))
          if(mysqli_num_rows($query_run)!=NULL){
            //Not verified
            $row=mysqli_fetch_assoc($query_run);
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];
            header('Location:unverified.php');
          }
          else{
            //User not present
            $error='You have entered incorrect username or password.';
          }
      }
      else{
        $row=mysqli_fetch_assoc($query_run);
                
        //echo 'Login vayo';
        if(isset($_POST['remember'])){
          //echo '<br>cookie on garnu paryo';
          setcookie('id',$row['user_id'],time()+60*60*24*14);
        }
        // log in sucessful
        $_SESSION['id']=$row['user_id'];
        $loc=$row['position'];
        header('Location:'.$loc);
      }
    }
  }
  if(isset($_POST['register-submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $num=$_POST['num'];
     $username=$_POST['username'];
     $pass=$_POST['password'];
     $pass=md5($pass);
     $sex=$_POST['sex'];
     $dob=$_POST['dob'];
     $address=$_POST['address'];
     $query="select * from users where username like '$username'";
     $run=mysqli_query($connect,$query);
     $query="select * from unverified where username like '$username'";
     $run1=mysqli_query($connect,$query);
     $code=rand(10000,99999);
     if(mysqli_num_rows($run)==NULL&&mysqli_num_rows($run1)==NULL){
      //username does not exist
       /*$query="insert into unverified(name, username, email, sex, dob, phone, address, password, code) VALUES ('$name','$username','$email','$sex','$dob','$num','$address','$pass','$code')";
       $run=mysqli_query($connect,$query);*/
        require 'mail/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'projectohs5@gmail.com';                 // SMTP username
        $mail->Password = 'projectohs55';                           // SMTP password
        $mail->Port = 25;                                    // TCP port to connect to
        $mail->setFrom('projectohs5@gmail.com','OHS');
        $mail->addAddress($email);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Verification code';
        $mail->Body    = 'Your code is <b>'.$code.'</b>';
        $mail->AltBody = 'Your code is'.$code;
        if(!$mail->send()) {
            $warning= 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $query="insert into unverified(name, username, email, sex, dob, phone, address, password, code) VALUES ('$name','$username','$email','$sex','$dob','$num','$address','$pass','$code')";
            $run=mysqli_query($connect,$query);
            $success='A verification code has been sent to your email. Please enter your login information and enter the code.';
        }
        //$success=1;
       //$_SESSION['error']='You have been sucessfully registered';
       //header('Location:login.php');
     }
     else{
      //username already exists.
      $rerror=1;
     }
  }
?>
<!DOCTYPE html>
<html>
<head>
   <?php include("include/head.php"); ?>
<script type="text/javascript" src="jquery/reg.js"></script>
<link rel="stylesheet" type="text/css" href="css/reg.css">


</head>
<body onload="all_check();" >
 <?php include('include/header.php'); ?>

<!--main navigation part with logo-->

 <!--container of services options-->
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("include/navig.php");
?>
       <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <?php
           if(isset($error)){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $error;?>
            </div><?php
            }
            if(isset($warning)){ ?>
            <div class="alert alert-danger alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $warning;?>
            </div><?php
            }
            if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $_SESSION['error'];?>
            </div><?php
            unset($_SESSION['error']);
            }
           if(isset($success)){ ?>
            <div class="alert alert-info alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $success;?>
            </div><?php
           }
           if(isset($_SESSION['new'])){ ?>
            <div class="alert alert-info alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $_SESSION['new'];?>
            </div><?php
            unset($_SESSION['new']);
           }
          ?>
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" <?php if(!isset($rerror)) echo 'class="active"';?> id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6">
                <a href="#" id="register-form-link" <?php if(isset($rerror)) echo 'class="active"';?> >Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="#" method="post" role="form" style="display:<?php if(!isset($rerror)) echo 'block'; else echo 'none'; ?>;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="forget.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" id="eventForm" name="reg" action="#" method="post" role="form" style="display: <?php if(isset($rerror)) echo 'block'; else echo 'none'; ?>;" onSubmit="return check_all();">
                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" id="Name" tabindex="1" class="form-control" placeholder="Please enter your full name" onKeyup="name_check();" value="<?php if(isset($rerror)) echo $name; ?>" required="">
                    <p id="name_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" onKeyup="uname();" required value="<?php if(isset($rerror)) echo $username; ?>">
                    <p id="uname_error"><?php if(isset($rerror)) echo 'Username already exists'; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" onchange="email_check()" required value="<?php if(isset($rerror)) echo $email; ?>">
                    <p id="email_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Sex:</label><br>
                    <input type="radio" name="sex" tabindex="1" value="M" <?php if(isset($sex)) if($sex=='M') echo 'checked';?>>Male<br>
                    <input type="radio" name="sex" tabindex="1" value="F" <?php if(isset($sex)) if($sex=='F') echo 'checked';?>>Female<br>
                    <input type="radio" name="sex" tabindex="1" value="O" <?php if(isset($sex)) if($sex=='O') echo 'checked';?>>Other
                  </div>
                  <div class="form-group">
                    <label class="control-label">Date of birth:</label>
                    <!--<div class="input-group date" data-provide="datepicker">
                      <input type="text" class="form-control">
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                  </div>--><br>
                  <input type="date" name="dob" value="<?php if(isset($rerror)) echo $dob; ?>">
                  </div>
                  <div class="form-group">
                    <label style="margin-top: 2px'" >Number:</label>
                    <input type="text" name="num" id="num" tabindex="1" class="form-control" onKeyUp="num_check()" required value="<?php if(isset($rerror)) echo $num; ?>">
                    <p id="num_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="address" id="address" tabindex="1" class="form-control" required value="<?php if(isset($rerror)) echo $address; ?>">
                  </div>
                  <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Must contain 5 or more characters" onChange="pass_check()" required value="">
                    <p id="pass_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Confirm password:</label>
                    <input type="password" name="confirm-password" id="cpassword" tabindex="2" class="form-control" placeholder="Re-enter the password" onKeyUp="same_check()" required value="">
                    <p id="not_same_error"></p> 
                  </div>
                  <div class="form-group">
                    <input type="reset" tabindex="1" class="form-control btn" value="Reset">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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