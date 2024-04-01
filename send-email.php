<?php
session_start(); // Start the session

// Check if the CSRF token is set in the session
if (!isset($_SESSION['csrf_token'])) {
    die("CSRF token is not set in the session.");
}

// Check if the CSRF token is present in the form submission
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF token validation failed!");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Retrieve admin email from environment variable
    $admin_email = $_ENV['ADMIN_EMAIL'];

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Send email
    if (mail($admin_email, $subject, $message, $headers)) {
        // Redirect to contact page with success message
        header("Location: contact.php?success=true");
        exit;
    } else {
        // Redirect to contact page with error message
        header("Location: contact.php?success=false");
        exit;
    }
} else {
    // Redirect to contact page if form is not submitted
    header("Location: contact.php");
    exit;
}
?>
