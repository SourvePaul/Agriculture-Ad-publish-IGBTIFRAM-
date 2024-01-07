<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 'From: ' . $_POST['from'].'\r\n';
    $headers .= 'Reply-To: ' . $_POST['from'].'\r\n';
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        $lastError = error_get_last();
        echo "Failed to send email: " . $lastError['message'];
    }
    
}
?>