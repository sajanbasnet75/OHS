<?php
include("../include/dbconnection.php");
$user_id=$_SESSION['id'];
$query1="SELECT * FROM patient_detail where patient_id=$user_id";
$query_run1=mysqli_query($connect,$query1);
$row1=mysqli_fetch_array($query_run1);
$user_sex=$row1['sex'];
$user_age=$row1['age'];


date_default_timezone_set("Asia/Kathmandu");
if(isset($_POST['submit_questions'])){
  $ques_topic= mysqli_real_escape_string($connect,$_POST['ques_topic']);
  $ques_details= mysqli_real_escape_string($connect,$_POST['ques_details']);
  $symptoms= mysqli_real_escape_string($connect,$_POST['symptoms']);
  $dates= date('Y M d');
    $time=date("h:i:sa");
    $dateandtime= mysqli_real_escape_string($connect,$dates.' at '.$time);
    $speciality= mysqli_real_escape_string($connect,$_POST['field']);
    $query="INSERT INTO asked_questions(user_id,ques_topic,ques_details,symptoms,field,sex,date,age) VALUES('$user_id','$ques_topic','$ques_details','$symptoms','$speciality','$user_sex','$dateandtime','$user_age')";
    $t=mysqli_query($connect,$query);
    }
    ?>

<!DOCTYPE html>
<html>
<head>
   <?php include("head.php"); ?>
      <title>Ask Questions</title>
<style type="text/css" media="screen">
body{
    background-color:#f1f9fb;
   }
   .headline{
    color:#0b3c5d; 
    font-weight:bold;
   font-size:35px;
   margin: 35px auto 10px auto;
   }
   .newsp{
      font-size:20px;
      font-family: Arial Narrow, sans-serif;
   margin: 4px auto 23px auto;
   
   }
   .question_box{
   	padding:25px;
   	border:solid 1px #dddddd;
   	border-radius: 15px 0px 15px 0px;
   	height: auto;
   	margin:4px;
   }
   .questions{
   	padding: 12px;
   	margin:12px;
   	border-bottom: solid 1px black;

   }
   .ques_parag{
   	padding:0px 15px 0px 15px;
   }
   .answers{
         padding: 12px;
   	margin:12px;
   	border-bottom: solid 1px black;
	
   }
   
</style>
</head>
<body >
 <?php include('../include/header.php'); ?>
<!--main navigation part with logo-->
 <!--contaiener of services options-->
<div class="bg-color">
<?php
include("navig.php");
?>
<h1 class="news-headline text-center headline" ><span style="border-bottom:ridge 1px grey;">ASK QUESTIONS</span></h1>
<p class="text-center newsp" id="newsparag">Ask all the medical questions and <br>Get professional medical advice and answers.  </p>

<div class="container">
     <?php 
      if(isset($_POST['submit_questions']) && $t==true){
        echo '<div class="alert alert-danger alert-dismissable text-center" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <span class="text-center text-warning">Thank you!Your question has been recorded.</span>
       </div>';
      }
      ?>
     <div class="question_box">
     <?php
        if(!isset($_SESSION['id'])){
        $_SESSION['requestURL']=$_SERVER['REQUEST_URI'];
        $h=$_SESSION['requestURL'];
        $a=explode('/', $h);
        $_SESSION['requestURL0']=$a[0];
        $_SESSION['requestURL1']=$a[1];
        $_SESSION['requestURL2']=$a[2];

      echo '
               <a href="logreg.php" class="btn btn-danger btn-block">Login To Ask Question</a> ';  
          }
      else{
         echo '<form action="" method="POST" accept-charset="utf-8" >
         
         <input type="text" name="ques_topic" value="" required placeholder="Write the topic of your question" class="form-text text-capitalize" style="width:100%;height:40px; padding:10px;margin:8px 0px 8px 0px">
         
         <textarea name="ques_details" required placeholder="Ask your question here." style="resize:none;width:100%;height:150px;padding:10px; margin:10px 0px 10px 0px;"></textarea> 	
         
         <a class="symptom_button btn btn-success btn-block" style="margin:0px 0px 14px 0px;">Want to include some symptoms?</a>        
         <div class="include_symptom">
           <textarea name="symptoms" placeholder="please seperate each symptoms by coamma(,)" class=" ques_details" style="resize:none;width:100%;padding:10px; margin:10px 0px 10px 0px;"></textarea>
         </div>

        <div class="">
					<select name="field" id="input" class="form-control specialist " required="required" title="specialist is required" >
						<option value="">Select Specialist</option>
						<optgroup label="Top Specialist">
						<option value="Cardiologist">Cardiologist</option>
						<option value="Nureosurgeon">Nureosurgeon</option>
						<option value="Orthopedician">Orthopedician</option>
						<option value="Oncologist">Oncologist</option>
						<option value="Dentist">Dentist</option>              	
						</optgroup>
						<optgroup label="Other Specialist"><hr>
						<option value="Nureologist">Nureologist</option>
						<option value="Psychiatrist">Psychiatrist</option>
						<option value="Pediatrician">Pediatrician</option>
						<option value="Allergist">Allergist</option>
						<option value="Anesthesiologist">Anesthesiologist</option>              	
						</optgroup>
					</select>
				</div>
         
         <input type="submit" name="submit_questions" value="POST" class="btn btn-info btn-block" style="margin-top:12px;">
         </form>';  
      }                    
                   
       ?>
   </div>
   <hr>
<div class="" style="border:solid 1px grey; border-radius:15px 0px 15px 0px; background:#fefefe">
	<h3 class="text-center text-muted" style="text-decoration:underline;">Some Asked Questions</h3>
     <div class="questions">
	     <h3 class="ques_head">Why does my Cheast pains a lot?</h3>
	      <p class="ques_parag">I am a male 22 years old and suffering from chest pain a while ago.when i go to toilet i cant shit because of my cheast pain. so please provide me a solution and advice what to do?</p>
	      <div class="text-right text-danger ques_parag"><span class="fa fa-user">&nbsp</span>Male,22 years</div>
	      <div class="text-right text-warning ques_parag"><span class="fa fa-calendar-o ">&nbsp</span>2017 jun 10</div>
	      <a href="#" class="btn btn-success text-left">VIEW</a>
     </div>
     
</div>
</div>
</div>
</body>
</html>