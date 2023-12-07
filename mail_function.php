<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/src/Exception.php');
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');

function sendOTP($email,$otp) {
    $mail= new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'spiceitup495@gmail.com';
        $mail->Password = 'vcthcxoanipncged';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('spiceitup495@gmail.com');

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'OTP for Verification';
        $mail->Body = 'You OTP for email verification is '.$otp;

        $result= $mail->send();

        return $result;
}
?>