<?php
require 'vendor/autoload.php'; // Include SendGrid library

use SendGrid\Mail\Mail;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Email settings
    $to = "admin@example.com"; // Change this to your admin's email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // SendGrid settings
    $apiKey = 'YOUR_SENDGRID_API_KEY'; // Replace with your SendGrid API key
    $senderEmail = "your@example.com"; // Replace with your email address

    // Create a SendGrid object
    $email = new Mail();
    $email->setFrom($senderEmail, "Contact Form");
    $email->setSubject($subject);
    $email->addTo($to);
    $email->addContent("text/plain", $body);

    // Initialize SendGrid
    $sendgrid = new \SendGrid($apiKey);

    try {
        // Send email
        $response = $sendgrid->send($email);
        
        // Check if email was sent successfully
        if ($response->statusCode() === 202) {
            // Redirect back to the contact page with success message
            header("Location: contact.php?success=true");
            exit;
        } else {
            // Redirect back to the contact page with error message
            header("Location: contact.php?success=false");
            exit;
        }
    } catch (Exception $e) {
        // Redirect back to the contact page with error message
        header("Location: contact.php?success=false");
        exit;
    }
} else {
    // If the form is not submitted, redirect back to the contact page
    header("Location: contact.php");
    exit;
}
?>
