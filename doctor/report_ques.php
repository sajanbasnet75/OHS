<?php
include("../include/dbconnection.php");

if(isset($_GET['ques_id'])){
  $ques_id=$_GET['ques_id']; 
  $query_ri="SELECT * FROM asked_questions where ques_id=$ques_id";
  $query_run_r=mysqli_query($connect,$query_ri);
  while($row_r=mysqli_fetch_assoc($query_run_r)){
  	$user_id=$row_r['user_id'];
  	$ques_id=$row_r['ques_id'];
  	$ques_topic=$row_r['ques_topic'];
  	$ques_details=$row_r['ques_details'];
  	$symptoms=$row_r['symptoms'];
  	$field=$row_r['field'];
  	$sex=$row_r['sex'];
  	$date=$row_r['date'];
  	$age=$row_r['age'];
    }

  $query_in="INSERT INTO reported_ques(user_id,ques_id,ques_topic,ques_details,symptoms,field,sex,date,age)
   VALUES('$user_id','$ques_id','$ques_topic','$ques_details','$symptoms','$field','$sex','$date','$age')"; 
   mysqli_query($connect,$query_in);
 
  $query_rd="DELETE FROM asked_questions where ques_id=$ques_id";
  $query_run_r=mysqli_query($connect,$query_rd);
  if ($query_run_r==true){
  	echo "Your report has been send";
  }
  else
  	echo "no";
}
?>
  
  