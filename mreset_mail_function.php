<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/src/Exception.php');
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');

function sendreset_link($email) {
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

        $mail->Subject = 'Link To Reset Your password';
        $mail->Body = '<a href="localhost/project/mreset_password.php?email='.$email.'">Click here to reset your password</a>';

        $result= $mail->send();

        return $result;
}
?>