<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "adefthkom0@gmail.com";
$mail->Password = "trvq dvhk vsee hplt";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Post = 587;


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
  $mail->isSMTP();
  $mail->Host = $host;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = $port;

  $mail->Username = $username;
  $mail->Password = $password;
  $mail->setFrom($username, $from_name);

  $mail->addAddress('recipient_email@example.com');

  $mail->isHTML(false);
  $mail->Subject = $subject;
  $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

  $mail->send();
  echo 'Message has been sent successfully.';

} catch (Exception $e) {
  echo "Error sending email: {$mail->ErrorInfo}";
}
