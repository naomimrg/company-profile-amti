<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

// Mengambil data dari formulir
$name = htmlspecialchars($_POST['name']);
$surname = htmlspecialchars($_POST['surname']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Membuat instance PHPMailer
$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.yourdomain.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@yourdomain.com'; 
    $mail->Password   = 'your-email-password'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Pengaturan Email
    $mail->setFrom('your-email@yourdomain.com', 'Your Name');
    $mail->addAddress(''); 
    // Konten Email
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body    = "<p>Name: $name $surname</p><p>Email: $email</p><p>Message:</p><p>$message</p>";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
