<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/src/Exception.php');
require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
include('Config.php');
require_once 'vendor/autoload.php';



function send_code($email,$code) {
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

        $mail->Subject = 'Takeaway Code';
        $mail->Body = 'Thank you for choosing our restaurant. You takeaway code is '.$code.'Kindly show this code at the time of receiving your order.';
        $result= $mail->send();

        return $result;
        

}

?>