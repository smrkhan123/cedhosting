<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";
$email = $_GET['email'];
$robo = 'sameerpathan1997@gmail.com';
$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 0;
    $mailer->isSMTP();

    if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    }


    $mailer->Host = 'ssl://smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'sameerpathan1997@gmail.com';
    $mailer->Password = 'sameer786';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setFrom('sameerpathan1997@gmail.com', 'Sameer');
    $mailer->addAddress($email, 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'Email Verification';
    $mailer->Body = 'Hi, Please click the link to verify your email <a href="http://localhost/CedHosting/verify.php?email='.md5($email).'">Click Here</a>';
    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "<script>alert('Email sent successfully.');</script>";
    echo "<script>window.location.href = 'verification.php?resend=".md5($email)."';</script>";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}

?>