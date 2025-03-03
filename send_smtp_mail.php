<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
    $message = htmlspecialchars("You have a new subscriber: " . $email, ENT_QUOTES, 'UTF-8');

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com';  // Replace with your Gmail address
        $mail->Password = 'your-app-password';  // Replace with the app password generated
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  // Port for TLS

        // Recipients
        $mail->setFrom('your-email@gmail.com', 'Global SMTP Mail');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send the email
        $mail->send();
        echo "Thank you for subscribing!";
    } catch (Exception $e) {
        // Log the exception details
        error_log("Mailer Error: " . $mail->ErrorInfo);
        echo "Failed to send your subscription. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
