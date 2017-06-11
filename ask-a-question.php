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
	<h3 class="text-center text-muted">Some Asked Questions</h3>
	<hr>
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