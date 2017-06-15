<?php include("../include/dbconnection.php");
if (isset($_POST['submit'])) {
	echo "clicked";
	$app_id=$_POST['app_id'];
	$docname='report'.$app_id;
	$report=$_FILES['report']['name'];
	$type=explode('.', $report);
	$tmp=$_FILES['report']['tmp_name'];
	if ($report) {
		$loc=$docname.'.'.$type[1];
		move_uploaded_file($tmp,'../report/'.$loc);
		$query="update appointment set report ='$docname' where app_id = '$app_id'";
		$query_run=mysqli_query($connect,$query);
	    require '../mail/PHPMailerAutoload.php';
	      $query="SELECT e.name as emp , p.name as pat ,date,time, p.email as email FROM appointment a join users u join employee_detail e join patient_detail p WHERE a.emp_id like u.user_id and e.emp_id like u.user_id and a.patient_id like p.patient_id and app_id like '$app_id'";
	      $run=mysqli_query($connect,$query);
	      $row=mysqli_fetch_assoc($run);
	      $email=$row['email'];
	      $doc=$row['emp'];
	      $date=$row['date'];
	        $mail = new PHPMailer;
	        $mail->isSMTP();                                      // Set mailer to use SMTP
	        require '../include/smtp.php';
	        $mail->addAddress($email);     // Add a recipient
	        $mail->isHTML(true);                                  // Set email format to HTML
	        $mail->Subject = 'Report uploaded';
	        $mail->Body    = 'Your report with Dr.'.$doc.' on '.$date.' has been uploaded';
	        $mail->AltBody = 'Your report with Dr.'.$doc.' on '.$date.' has been uploaded';
	        echo $email.$doc.$date;
	        if(!$mail->send()) {
	             $warning= 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
	        } else {
	            $query="update appointment set report ='$loc' where app_id = '$app_id'";
	            $run=mysqli_query($connect,$query);
	            $_SESSION['msg']=1;
	        }
	}
	else
		die('File not uploaded');
}
header('Location:report.php');
?>