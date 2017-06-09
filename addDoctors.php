<!-- this will be for admin page to upload news-->
<?php
include("include/dbconnection.php");
?>
<!DOCTYPE html>
<html>
<head>

   <?php include("include/head.php"); ?>
</head>
<body >
 <?php include('include/header.php'); ?>

<form action="" method="POST" enctype="multipart/form-data" role="form">
 <input type="text" required placeholder="Doctor Name" name="doctor_name" ><br>
	<label for="image"> Choose Image of the news:</label>
        <input type="file" name="news_img_file" required ><br>
 <input type="textarea" placeholder="speciality" required name="field"><br>
<br>
       <input type="date" required name="date"><br>
       <input type="textarea" name="news_txt_file" required placeholder="news paragraph">
       <br>
<input type="submit" name="submit" value="upload">

</form>

<?php
if (isset($_POST['submit'])){
	if(isset($_FILES['news_img_file']) && isset($_POST['news_txt_file']) && isset($_POST['doctor_name']) && isset($_POST['date'])&& isset($_POST['field'])) {
        $author_nam=$_POST['doctor_name'];
        $date=$_POST['date'];
        $field=$_POST['field']; 
        $news_details=$_POST['news_txt_file'];
        //for image file 		
		$img_file=$_FILES['news_img_file'];       
        //image file properties
		$img_file_name=$img_file['name'];
		$img_file_folder=$img_file['tmp_name'];
		$img_file_size=$img_file['size'];
	    $img_file_error=$img_file['error'];

		$img_file_ext=explode('.', $img_file_name); 
		$img_file_ext=strtolower(end($img_file_ext)); //store extension of the file

		//file checking process
		$allowed=array('png','jpg','jpeg');

		if(in_array($img_file_ext, $allowed)){
			if($img_file_error===0){
				if($img_file_size<=2097152){
		          
				 $new_img_name=uniqid('',true).'.'.$img_file_ext;
				 $img_file_destination="images/newsImg/".$new_img_name;
				 if(move_uploaded_file($img_file_folder, $img_file_destination)){
	              echo "hurray";
	              echo $img_file_destination;
				 }
				 }
	        }	
		}
		else{
			echo "please select image file only";
		}

	}


$query="INSERT INTO news (author,image,field,date,detail) VALUES('$author_nam','$new_img_name','$field','$date','$news_details')";
mysqli_query($connect,$query) or die(mysql_error());
}
?>



</body>
</html>