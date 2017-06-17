<?php
include("include/dbconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
   <?php include("include/head.php"); ?>
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
   border:solid 1px grey; border-radius:15px 0px 15px 0px; background:#fefefe;margin:10px;
   }
   .questions{
    padding: 12px;
    margin:12px;

   }
   .ques_parag{
    padding:0px 15px 0px 15px;
   }
   .answer-box{
    border:solid 1px grey; border-radius:0px 15px 0px 15px;background:#fefefe;margin:10px;
   }
   .answers{
         padding: 12px;
    margin:12px;
    
   }
   .textareas{
    resize:none;width:100%;height:150px;padding:10px; margin:12px 0px 12px 0px;
   }
   .doc_answer{
    border:solid 1px #dddddd;border-radius:10px; margin:10px; padding:10px;background:#e9edf7; 
    }
    .ans_parag{
    padding:14px 35px 14px 35px;
     }
     .answered_container{
      border: solid 1px red;
     }
</style>
</head>
<body >
 <?php include('include/header.php'); ?>
<!--main navigation part with logo-->
 <!--contaiener of services options-->
<div class="bg-color">
<?php
include("include/navig.php");
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

<div class="question_box" >
 
	<h3 class="text-center text-muted" style="">Asked Questions</h3>
	<hr>
            
<div class="questions">
<?php
          $ques_id=$_GET['ques_id'];
           $query2="SELECT * FROM asked_questions where ques_id=$ques_id";
           $query_run2=mysqli_query($connect,$query2);
           while ($rowa=mysqli_fetch_assoc($query_run2)){
    	     echo '<h3 class="ques_head text-capitalize">'; echo $rowa['ques_topic']; echo '</h3>
    	      <p class="ques_parag ">'; echo $rowa['ques_details']; echo '</p>
    	      <div class="ques_head text-right">       
            <span class="fa fa-user ques_parag text-danger text-capitalize">&nbsp'; echo $rowa['sex'].",".$rowa['age']; echo '</span>
            <span class="text-warning fa fa-calendar-o ">&nbsp'; echo $rowa['date']; echo '</span>
            </div>';  
            echo '<hr>';     
          };
  ?> 
</div>
</div>



<div class="answer-box" style="">
   
    <?php 
    $queryans="SELECT * FROM questions_answers join employee_detail 
    where ques_id=$ques_id 
    AND questions_answers.emp_id=employee_detail.emp_id
    order by ans_id DESC";
    $run_queryans=mysqli_query($connect,$queryans);
    $r=mysqli_num_rows($run_queryans);
    echo '<h3 class="text-center text-muted" style="">Doctors Answers';echo '<span class="text-danger">&nbsp('.$r.')</span></h3>';
    echo '<hr>';
    if(mysqli_num_rows($run_queryans)>0){   
    while($rowans=mysqli_fetch_assoc($run_queryans)){
      $doc_id=$rowans['emp_id'];
       echo '<div class="doc_answer">';
        echo '<h5 class="ques_parag text-right text-capitalize"><span class="fa fa-calendar-o text-warning">&nbsp';
        echo $rowans['date']; echo '</span></h5>
        <div class="row">
            <div style="width:100px;height:120px;"class="col-sm-6 col-md-6 col-xs-6">';
                   echo '<img src="images/doc_images/';
                   echo $rowans['images'];
                   echo ' " class=" img-circle img-responsive">';
            echo '</div>';
            echo'
            <div class="col-sm-6 col-md-6 col-xs-6"><br>
            <span class="fa fa-user-md text-capitalize"><a href="docprofile.php?id='.$doc_id.'">&nbsp Dr.';echo $rowans['name']; echo'</a></span>
            <br><span class="fa fa-stethoscope text-capitalize">&nbsp'; echo $rowans['field']; echo'</span>
            </div>
       </div>';
       
       echo '
       <div  class="ans_parag">
       <p>'; 
       echo $rowans['answer'];
       echo'
        </p>
       </div>';
        echo '</div>'; 
        }
      }
      else{
            echo '<span class="text-center text-danger ans_parag">';
          echo "No Answers!" ;
          echo '</span>';
      
      }
        
    ?>
</div>
</div>
</body>
</html>