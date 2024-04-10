<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'] ?? '';  
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

$emailSent = false;

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  $error = "Please fill out all required fields.";
} else {
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

    $mail->addAddress('achref.benammar404@gmail.com');

    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    $mail->send();
    
    $emailSent = true;
  } catch (Exception $e) {
    $error = "Error sending email: " . $mail->ErrorInfo;
  }
}

header('Content-Type: application/json');
echo json_encode(['emailSent' => $emailSent, 'error' => isset($error) ? $error : null]);
