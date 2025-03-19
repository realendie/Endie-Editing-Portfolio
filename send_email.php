<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = filter_var($_POST["name"]);
    $contact = filter_var($_POST["contact"]);
    $project = filter_var($_POST["project"]);
    $references = filter_var($_POST["references"]);

    // Set email recipient and subject
    $to = "enderprooffical@gmail.com";
    $subject = "New Project Inquiry from $name";

    // Compose the email message
    $message = "
    <html>
    <head>
        <title>New Project Inquiry</title>
    </head>
    <body>
        <h2>New Project Inquiry</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Contact Info:</strong> $contact</p>
        <p><strong>Project Description:</strong><br>$project</p>
        <p><strong>References:</strong><br>$references</p>
    </body>
    </html>
    ";

    // Set email headers for HTML content
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: endies-editing.netlify.app" . "\r\n";

    // Send the email
    $success = mail($to, $subject, $message, $headers);

    // Provide feedback to the user
    if ($success) {
        // Redirect to a thank you page or show a success message
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Form Submitted</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .success {
                    background-color: #d4edda;
                    color: #155724;
                    padding: 15px;
                    border-radius: 5px;
                    margin-bottom: 20px;
                }
                a {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 15px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 4px;
                }
            </style>
        </head>
        <body>
            <div class='success'>
                <h2>Thank you for your submission!</h2>
                <p>Your inquiry has been sent successfully. I'll get back to you soon.</p>
            </div>
            <a href='index.html'>Return to Home</a>
        </body>
        </html>
        ";
    } else {
        // Show an error message
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Form Submission Error</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .error {
                    background-color: #f8d7da;
                    color: #721c24;
                    padding: 15px;
                    border-radius: 5px;
                    margin-bottom: 20px;
                }
                a {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 15px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 4px;
                }
            </style>
        </head>
        <body>
            <div class='error'>
                <h2>Oops! Something went wrong.</h2>
                <p>We couldn't send your message. Please try again later or contact me directly at enderprooffical@gmail.com.</p>
            </div>
            <a href='index.html'>Return to Home</a>
        </body>
        </html>
        ";
    }
    exit;
} else {
    // If someone tries to access this file directly without submitting the form
    header("Location: index.html");
    exit;
}
