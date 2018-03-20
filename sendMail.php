<?php
include 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'almirakhonsa@gmail.com';
$mail->Password = 'almi08161620306';
$mail->SMTPSecure = 'ssl';

$mail->From = 'almirakhonsa@gmail.com';
$mail->FromName = 'Al mira';
$mail->addAddress('recipient@example.com');

$mail->isHTML(true);

$mail->Subject = 'Test Mail Subject!';
$mail->Body    = 'This is SMTP Email Test';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent';
}
?>
