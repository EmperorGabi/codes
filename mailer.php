<?php
require importer().'/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


class Mailer {
    static function sendMail($customerMail, $subject, $body, $altBody=null) : bool {
        $myEmail = '';
        $mail = new PHPMailer(true);
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $myEmail;  // Your email
        $mail->Password = '';  // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Recipients
        $mail->setFrom($myEmail, 'My custom name');
        $mail->addAddress($customerMail);  // Replace with recipient email
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altBody ? $body : $altBody;
    
        return $mail->send();
    }

    static function sendBulkMail($customerMails, $subject, $body, $altBody=null) {
        $myEmail = '';
        $mail = new PHPMailer(true);
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $myEmail;  // Your email
        $mail->Password = '';  // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($myEmail, 'My custom name');
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altBody ? $body : $altBody;

        // Send to each recipient individually
        $response = [];
    foreach ($customerMails as $email) {
        $mail->clearAddresses(); // Clears previous recipient
        $mail->addAddress($email);

        if (!$mail->send()) {
            $response[] = "Failed to send email to: $email. Error: {$mail->ErrorInfo}";
        }
    }
    return $response;
    }
}
?>
