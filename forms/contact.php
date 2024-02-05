<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "your@email.com"; // Change this to your email address

    // Compose email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Compose email content
    $email_content = "
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
    ";

    // Attempt to send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "success"; // Return success message to the JavaScript code
    } else {
        echo "error"; // Return error message to the JavaScript code
    }
} else {
    echo "Invalid request";
}
?>
