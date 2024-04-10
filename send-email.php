<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'] ?? '';  // Assign empty string if not set
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  echo "Please fill out all required fields.";
  exit;
}

try {
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "adefthukom0@gmail.com";  
  $mail->Password = "trvq dvhk vsee hplt";  
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  $mail->setFrom($mail->Username, "Tiskerti Contact Page"); 

  $mail->addAddress('adefthkom0@gmail.com');

  $mail->isHTML(false);
  $mail->Subject = $subject;
  $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

  $mail->send();
  header('Location: index.php?success=true');  
  exit;

} catch (Exception $e) {
  echo "Error sending email: {$mail->ErrorInfo}";
}

