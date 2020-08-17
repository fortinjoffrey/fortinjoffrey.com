<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
$contactSection = '#contact-section';

if (isset($_POST['submit'])) {
  $subject = $_POST['subject'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$name = $_POST['name'];

	if (empty($subject) || empty($email) || empty($name)) {
	}
	else {
		if (empty($message)) { $message = " "; }

	  $message = "Message de : " .$name . "<br><br>" .$message;

    $mail = new PHPMailer();
    
		$mail->addAddress('inbox@fortinjoffrey.com');
		$mail->setFrom($email);
		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $message;

		if ($mail->send()) {
      header('Location: index.html?mail=sent'.$contactSection);
		}
		else {
      header('Location: index.html?mail=error'.$contactSection);
		}

		exit();
	}
}

header('Location: index.html?state=done'.$contactSection);
