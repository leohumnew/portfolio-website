<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$to      = 'EMAIL_TO';
$subject = 'leohumnew Contact Form';
$message = "From: " . addslashes($data['name']) . "\r\nEmail: " . addslashes($data['email']) . "\r\nMessage: " . addslashes($data['message']);
$headers = 'From: EMAIL_FROM' . "\r\n" .
                'Reply-To: EMAIL_FROM' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    $json = array("status"=>"sent");
} else {
    $json = array("status"=>"failed");
}

echo json_encode($json);
?>