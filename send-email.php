<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require "vendor/autoload.php"; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $names = $_POST["name"]; 
    $emails = $_POST["email"];
    $subjects = $_POST["subject"];
    $messages = $_POST["message"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = ""; 
        $mail->Password = ""; 

        // Loop through each form submission
        foreach ($emails as $key => $email) {
            // Set sender (From) and recipient (To) email addresses
            $mail->setFrom($email, $names[$key]);
            $mail->addAddress($email);
            
            // Email subject and body
            $mail->Subject = $subjects[$key];
            $mail->Body = $messages[$key];

            // Send email
            $mail->send();
        }
        
        // Redirect back to the contact page with success message
        header("Location: contact.php?success=true");
        exit();
    } catch (Exception $e) {
        // Handle errors
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
