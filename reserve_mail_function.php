<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/src/Exception.php');
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');

function send_code($email,$code) {
    $mail= new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'spiceitup495@gmail.com';
        $mail->Password = 'vcthcxoanipncged';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('meetyourhunger@gmail.com');

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Table Reservation Code';
        $mail->Body = 'Thank you for choosing our restaurant. You table reservation code is '.$code;

        $result= $mail->send();

        return $result;
}
?>