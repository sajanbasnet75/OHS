<?php
include("../include/dbconnection.php");
if(!isset($_SESSION['id']))
  header('Location:../../ohs');
$id =$_SESSION['id'];
if(isset($_POST['register-submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $num=$_POST['num'];
     $sex=$_POST['sex'];
     $dob=$_POST['dob'];
     $history=$_POST['history'];
     $address=$_POST['address'];
     $field=$_POST['field'];
     $query="select max(user_id) as id from users";
      $query_run=mysqli_query($connect,$query);
      $row=mysqli_fetch_assoc($query_run);
      $id=$row['id'];
      $id++;
      $user=explode(' ',$name);
      $username=strtolower($user[0]).$id;
     $code=rand(10000,99999);
      require '../mail/PHPMailerAutoload.php';
      $mail = new PHPMailer;
      $mail->isSMTP();                                      // Set mailer to use SMTP
      require '../include/smtp.php';
      $mail->addAddress($email);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Your OHS account details';
      $mail->Body    = 'Dear Sir/Madam,<br>Greetings from OHS!<br>We would like to inform you that your account has been created. Your account details are as follows:<br>Username: '.$username.'<br>Password: '.$code.'<br>Please login in through the website <a href="http://localhost/ohs/logreg.php">www.ohs.com</a><br>Should you need any assistance please call our Customer Helpdesk Support at 1234567896.';
      $mail->WordWrap = 400;
      if(!$mail->send()) {
          $warning= 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
      } else {
          /*$query="insert into unverified(name, username, email, sex, dob, phone, address, password, code) VALUES ('$name','$username','$email','$sex','$dob','$num','$address','$pass','$code')";
          $run=mysqli_query($connect,$query);
          $success='A verification code has been sent to your email. Please enter your login information and enter the code.';*/
          $code=md5($code);
          $query="insert into users(user_id,username,password,position) values($id,'$username','$code','doctor')";
          $query_run=mysqli_query($connect,$query);
          $query="insert into employee_detail(emp_id,name,dob,address,email,phone,field,sex,history,images) values('$id','$name','$dob','$address','$email','$num','$field','$sex','$history',NULL)";
          $query_run=mysqli_query($connect,$query);
          $success='New doctor has been added and their account details have been sent to their e-mail.';
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?>
   <script type="text/javascript" src="../jquery/reg.js"></script>
<link rel="stylesheet" type="text/css" href="../css/reg.css">
    <title>OHS</title>
    <script>
  $(document).ready(function(){
    var date_input=$('input[name="dob"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
      orientation:"top",
      endDate:'0',
    })
  })
</script>
</head>
<body >
 <?php include('../include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("navig.php");
?>
  <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          <?php
            if(isset($warning)){ ?>
            <div class="alert alert-danger alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $warning;?>
            </div><?php
            } ?>
            <?php
            if(isset($success)){ ?>
            <div class="alert alert-success alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $success;?>
            </div><?php
            } ?>
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6" style="margin-left: 25%;">
                <a class="active" >Doctor details</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="register-form" id="eventForm" name="reg" action="#" method="post" role="form" style="display: block;" onSubmit="return check_all();">
                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" id="Name" tabindex="1" class="form-control" placeholder="Please enter full name" onKeyup="name_check();" value="" required="">
                    <p id="name_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" onchange="email_check()" required value="">
                    <p id="email_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Sex:</label><br>
                    <input type="radio" name="sex" tabindex="1" value="M" > Male<br>
                    <input type="radio" name="sex" tabindex="1" value="F" > Female<br>
                    <input type="radio" name="sex" tabindex="1" value="O" > Other
                  </div>
                  <div class="form-group">
                    <label>Specialist of:</label>
                    <select name="field" id="input" class="form-control specialist " required="required"  >
                      <option value="Cardiologist">Cardiologist</option>
                      <option value="Nureosurgeon">Nureosurgeon</option>
                      <option value="Orthopedician">Orthopedician</option>
                      <option value="Oncologist">Oncologist</option>
                      <option value="Dentist">Dentist</option>                
                      <option value="Nureologist">Nureologist</option>
                      <option value="Psychiatrist">Psychiatrist</option>
                      <option value="Pediatrician">Pediatrician</option>
                      <option value="Allergist">Allergist</option>
                      <option value="Anesthesiologist">Anesthesiologist</option>                
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Date of birth:</label>
                    <!--<div class="input-group date" data-provide="datepicker">
                      <input type="text" class="form-control">
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                  </div>--><br>
                  <input type="date" name="dob" value="" placeholder="yyyy-mm-dd">
                  </div>
                  <div class="form-group">
                    <label style="margin-top: 2px'" >Number:</label>
                    <input type="text" name="num" id="num" tabindex="1" class="form-control" onKeyUp="num_check()" required value="">
                    <p id="num_error"></p>
                  </div>
                  <div class="form-group">
                    <label>History:</label>
                    <input type="text" name="history" id="Name" tabindex="1" class="form-control" value="" required="">
                    <p id="name_error"></p>
                  </div>
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="address" id="address" tabindex="1" class="form-control" required value="">
                  </div>
                  <div class="form-group">
                    <input type="reset" tabindex="1" class="form-control btn" value="Reset">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Add Doctor">
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
</div>

<!--news part-->
<?php
include("news-headlines.php");
?>

 
</body>
</html>