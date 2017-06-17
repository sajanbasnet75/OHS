<?php
include("include/dbconnection.php");
if (isset($_POST['submit'])) {
    $username=mysqli_real_escape_string($connect,$_POST['username']);
    $phone=mysqli_real_escape_string($connect,$_POST['phone']);
    $query="select * from users natural join patient_detail where username like '$username' and phone like '$phone'";
    if($query_run=mysqli_query($connect,$query))
      if(mysqli_num_rows($query_run)==NULL)
        $wrong='You have entered incorrect username or phone number.';
      else{
        $code=rand(10000,99999);
        $row=mysqli_fetch_assoc($query_run);
        require 'mail/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'projectohs5@gmail.com';                 // SMTP username
        $mail->Password = 'projectohs55';                           // SMTP password
        $mail->Port = 25;                                    // TCP port to connect to
        $mail->setFrom('projectohs5@gmail.com','OHS');
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
            $_SESSION['new']=1;
            header('Location:logreg.php');
        }
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include("include/head.php"); ?>
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