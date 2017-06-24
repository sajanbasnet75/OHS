<?php
include("include/dbconnection.php");
if (isset($_POST['submit'])) {
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $query="select * from users where username like '$username'";
    $query_run=mysqli_query($connect,$query);
	if(mysqli_num_rows($query_run)==NULL)
        $wrong='You have entered incorrect username or phone number.';
    else{
    	$row=mysqli_fetch_assoc($query_run);
    	$id=$row['user_id'];
    	$pos=$row['position'];
    	if($pos=='patient')
    		$query="select * from patient_detail where patient_id like '$id' and phone like '$phone'";
    	else
    		$query="select * from employee_detail where emp_id like '$id' and phone like '$phone'";
    if($query_run=mysqli_query($connect,$query))
      if(mysqli_num_rows($query_run)==NULL)
        $wrong='You have entered incorrect username or phone number.';
      else{
        $code=rand(10000,99999);
        $row=mysqli_fetch_assoc($query_run);
        require 'mail/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        include 'include/smtp.php';
        $mail->addAddress($row['email']);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'New password';
        $mail->Body    = 'Your new password is <b>'.$code.'</b>';
        $mail->AltBody = 'Your new password is'.$code;
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $code=md5($code);
            $query="update users set password = '$code' where username like '$username'";
            $run=mysqli_query($connect,$query);
            $_SESSION['new']='New password has been sent to your email';
            header('Location:logreg.php');
        }
      }
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("include/head.php"); ?>
  <title>Forget password</title>
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
          <div class="container well" style="width: 40%;">
          <?php
           if(isset($wrong)){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $wrong; ?>
            </div><?php
            }
          ?>
           <form action="#" method="POST" role="form">
             <legend style="">Forgot your password</legend>
             <div class="form-group">
               <input type="text" class="form-control" name="username" required placeholder="Enter your username">
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="phone" required placeholder="Enter your phone number">
             </div>
             <button type="submit" name="submit" class="btn btn-primary">Submit</button>
           </form>
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