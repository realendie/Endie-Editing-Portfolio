<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : '';
    $contact = isset($_POST["contact"]) ? htmlspecialchars($_POST["contact"]) : '';
    $project = isset($_POST["project"]) ? htmlspecialchars($_POST["project"]) : '';
    $references = isset($_POST["references"]) ? htmlspecialchars($_POST["references"]) : '';

    // Email details
    $to = "enderprooffical@gmail.com";
    $subject = "New Project Inquiry from " . $name;

    // Compose the email message
    $message = "Name: " . $name . "\r\n" .
        "Contact: " . $contact . "\r\n\r\n" .
        "Project Description:\r\n" . $project . "\r\n\r\n" .
        "References:\r\n" . $references;

    // Headers
    $headers = "From: enderprooffical@gmail.com" . "\r\n" .
        "Reply-To: " . $contact . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you.html");
        exit;
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    // Not a POST request, redirect to the form page
    header("Location: index.html");
    exit;
}
?>