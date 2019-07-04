<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';


$mail = $_POST['mail'];
$OTP = $_POST['OTP'];
$process = $_POST['process'];

$sendTo = $mail;
$message = 'Please enter the given OTP code given. Your OTP is : ' . $OTP;
if ($process == "register"){
    $subject = 'Registration Process [Talking Hands] - OTP';
} else {
    $subject = 'Forgot Password [Talking Hands] - OTP';
}

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'talkinghandscsb@gmail.com';
$mail->Password = 'Talkinghands123';
$mail->SetFrom('talkinghandscsb@gmail.com');
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($sendTo);

$mail->Send();


?>