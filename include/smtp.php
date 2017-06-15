<?php $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'projectohs5@gmail.com';                 // SMTP username
$mail->Password = 'projectohs55';                           // SMTP password
$mail->SMTPSecure='ssl';
$mail->Port = 465;                        //25            // TCP port to connect to
$mail->setFrom('projectohs5@gmail.com','OHS');?>