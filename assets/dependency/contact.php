<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "shawon.taluckder2@gmail.com";
        $txt = "Name = " . $name . "\r\nEmail = " . $email . "\r\nSubject = " . $subject . "\r\nMessage = " . $message;
        $headers = "From: noreply@shawon.com" . "\r\n";

        if (mail($to, $subject, $txt, $headers)) {
            echo "Message sent.";
            exit;
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Invalid email address.";
    }
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>