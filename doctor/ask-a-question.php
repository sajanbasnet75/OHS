<?php
include("../include/dbconnection.php");
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
   margin: 55px auto 20px auto;
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

<div class="container headline">
     <?php
        if(!isset($_SESSION['id'])){
        $_SESSION['requestURL']=$_SERVER['REQUEST_URI'];
        $h=$_SESSION['requestURL'];
        $a=explode('/', $h);
        $_SESSION['requestURL0']=$a[0];
        $_SESSION['requestURL1']=$a[1];
        $_SESSION['requestURL2']=$a[2];

      echo ' ';  
          }
      else{
           
      }                    
                   
       ?>
<div class="" style="border:solid 1px grey; border-radius:15px 0px 15px 0px; background:#fefefe">
  <div>
  <h3 class="text-center text-muted" style="">Asked Questions</h3>
  <form class="text-right">
    <input type="text" placeholder="Search questions" class="selects" >
    <button type="submit" class="selects" name="submit" style=" background-color: #06a5e0;"><img src="../images/search-icon.png" width="20px" height="20px" /></button>
  </form>
  </div>
	<hr>
     <div class="questions">
     <?php

$emp_id=$_SESSION['id'];
$queryd="SELECT * FROM employee_detail where emp_id=$emp_id";
$run_query=mysqli_query($connect,$queryd);
while($row=mysqli_fetch_assoc($run_query)){
$field=$row['field'];}

 $query2="SELECT * FROM asked_questions where field='$field' order by date  and ques_id ASC ";
 $query_run2=mysqli_query($connect,$query2);
 if(mysqli_num_rows($query_run2)>0){
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
        
      };
      }
      else{
        echo '<span class="text-center text-danger ">';
          echo "No Questions!" ;
          echo '</span>';
      }
      ?> 
     </div>
     
</div>
</div>
</div>
</body>
</html>