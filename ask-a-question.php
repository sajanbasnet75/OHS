<?php
include("include/dbconnection.php");
if(isset($_GET['submit_search'])){
$search=$_GET['search_item'];
$query_search="SELECT * FROM asked_questions where ques_details and ques_topic like $search;";
$query_search_run=mysqli_query($connect,$query_search_run);
if(mysqli_num_rows() 
}
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
<h1 class="news-headline text-center headline" ><span style="border-bottom:ridge 1px grey;">ASK QUESTIONS</span></h1>
<p class="text-center newsp" id="newsparag">Ask all the medical questions and <br>Get professional medical advice and answers.  </p>

<div class="container">
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
           
      }                    
                   
       ?>
   </div>
   <hr>
<div class="" style="border:solid 1px grey; border-radius:15px 0px 15px 0px; background:#fefefe">
	<div>
  <h3 class="text-center text-muted" style="">Some Asked Questions</h3>
  <form class="text-right" method="GET" action="">
    <input type="text" placeholder="Search questions" class="selects"  minlength="3" required name="search_item">
    <button type="submit" class="selects" name="submit_search" style=" background-color: #06a5e0;"><img src="images/search-icon.png" width="20px" height="20px" /></button>
  </form>
	</div>
  <hr>
     <div class="questions">
     <?php
 $query2="SELECT * FROM asked_questions ORDER BY date  and ques_id ASC  ";
 $query_run2=mysqli_query($connect,$query2);
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
      ?> 

     </div>
     
</div>
</div>
</div>
</body>
</html>