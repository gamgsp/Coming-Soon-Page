<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the email address from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Email details
    $to = "your@email.com"; // Replace with your email address
    $subject = "New Subscription Request";
    $message = "You have a new subscriber: " . $email;
    $headers = "From: no-reply@globalsmtpmail.com\r\n" .
               "Reply-To: no-reply@globalsmtpmail.com\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email using the mail() function
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for subscribing!";
    } else {
        echo "Failed to send your subscription. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
