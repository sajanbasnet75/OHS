<?php
include("../include/dbconnection.php");
$user_id=$_SESSION['id'];
$query1="SELECT * FROM patient_detail where patient_id=$user_id";
$query_run1=mysqli_query($connect,$query1);
$row1=mysqli_fetch_array($query_run1);
$user_sex=$row1['sex'];
 if($user_sex=='M'){
  $sex="Male";
 }
 else{
  $sex="Female";
 }
$today_date= date('Y M d');
$user_dob=$row1['dob'];
$user_age=$today_date-$user_dob;


date_default_timezone_set("Asia/Kathmandu");
if(isset($_POST['submit_questions'])){
  $ques_topic= mysqli_real_escape_string($connect,$_POST['ques_topic']);
  $ques_details= mysqli_real_escape_string($connect,$_POST['ques_details']);
  $symptoms= mysqli_real_escape_string($connect,$_POST['symptoms']);
  $dates= date('Y M d');
    $dateandtime= mysqli_real_escape_string($connect,$dates);
    $speciality= mysqli_real_escape_string($connect,$_POST['field']);
    $query="INSERT INTO asked_questions(user_id,ques_topic,ques_details,symptoms,field,sex,date,age) VALUES('$user_id','$ques_topic','$ques_details','$symptoms','$speciality','$sex','$dateandtime','$user_age')";
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

   }
   .ques_parag{
   	padding:0px 15px 0px 15px;
   }
   .answers{
         padding: 12px;
   	margin:12px;
   	border-bottom: solid 1px black;
	
   }
   .textareas{
    resize:none;width:100%;height:150px;padding:10px; margin:10px 0px 10px 0px;
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
         
         <input type="text" name="ques_topic" value="" required placeholder="Write the topic of your question" class="form-text textareas" style="height:40px; ">
         
         <textarea name="ques_details" required placeholder="Ask your question here." minlength="80px"  class="textareas"></textarea> 	
         
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
<div class="" style="border:solid 1px #dddddd; border-radius:15px 0px 15px 0px; background:#fefefe">
  <div>
  <h3 class="text-center text-muted" style="">Some Asked Questions</h3>
  <form class="text-right" method="GET">
    <input type="text" placeholder="Search questions" class="selects"  name="search_item">
    <button type="submit" class="selects" name="submit_search" style=" background-color: #06a5e0;"><img src="../images/search-icon.png" width="20px" height="20px" /></button>
  </form>
  </div>
     <div class="questions">
	 <?php
    if(isset($_GET['submit_search'])){
      $searched=mysqli_real_escape_string($connect,$_GET['search_item']);
      $searched_questions="%".$searched."%"; 
     }
     else{
          $searched_questions="%";
        }
         $query2="SELECT * FROM asked_questions where ques_topic LIKE '$searched_questions' or ques_details LIKE '$searched_questions' ORDER BY date  and ques_id ASC  ";
         $query_run2=mysqli_query($connect,$query2);
         if(mysqli_num_rows($query_run2)==NULL){
          echo '<span class="text-center text-danger ans_parag">';
          echo "No such Questions!" ;
          echo '</span>';
         }
         else{
          while ($rowa=mysqli_fetch_assoc($query_run2)){
         $ques_id=$rowa['ques_id'];
        echo '<h3 class="ques_head text-capitalize">'; echo $rowa['ques_topic']; echo '</h3>
        <p class="ques_parag ">'; echo $rowa['ques_details']; echo '</p>
        <div class="ques_head text-right">       
        <span class="fa fa-user ques_parag text-danger text-capitalize">&nbsp'; echo $rowa['sex'].",".$rowa['age']; echo '</span>
        <span class="text-warning fa fa-calendar-o ">&nbsp'; echo $rowa['date']; echo '</span>
        </div>';
          $queryans="SELECT * FROM questions_answers join employee_detail 
          where ques_id=$ques_id 
          AND questions_answers.emp_id=employee_detail.emp_id
          order by ans_id DESC";
          $run_queryans=mysqli_query($connect,$queryans);
          $r=mysqli_num_rows($run_queryans);
          echo '<span class="btn btn-danger" style="margin:4px;">Answers &nbsp'; echo $r; echo'</span>'; 
         echo '<a href="asked_question.php?ques_id='.$ques_id.'" class="btn btn-success text-right ques_head">View</a>';  
        echo '<hr>'; 
        
      }
    }
      ?> 
     
 </div>
     
</div>
</div>
</div>
</body>
</html>