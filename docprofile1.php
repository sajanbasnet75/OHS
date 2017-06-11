<?php
  include("include/dbconnection.php");
  $id=$_GET['id'];
  $query="SELECT * FROM employee NATURAL JOIN employee_detail WHERE emp_id LIKE '$id'";
  $query_run=mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("include/head.php");
   ?>
</head>
<body >
 <?php include('include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid mybanner">
<div class="bg-color">
<?php
include("include/navig.php");
if(mysqli_num_rows($query_run)==NULL)
 echo '<h4 style="margin-left:4%">No result found</h4>';
else{
  $row=mysqli_fetch_assoc($query_run);
?>
       <div class="container well" style="width: 50%">
         <table class="table" >
           <tr><th>Profile</th></tr>
           <tr><td class="row"><b>Name: </b><?php echo $row['name'];?></td></tr>
           <tr><td class="row"><b>Field: </b><?php echo $row['field'];?></td></tr>
           <tr><td class="row"><b>Dob: </b><?php echo $row['dob'];?></td></tr>
           <tr><td class="row"><b>History: </b><?php echo $row['history'];?></td></tr>
           <tr><td class="row"><b>Email: </b><?php echo $row['email'];?></td></tr>
         </table>
         <a class="btn btn-default" href="appointment.php?doc_id=<?php echo $id;?>">Make appointment</a>
       </div>  
       <?php 
     }

       ?>
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