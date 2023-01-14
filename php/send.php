<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jakubflaczynski@gmail.com';                     //SMTP username
    $mail->Password   = 'owlqsbpklaucnnvg';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('jakubflaczynski@gmail.com', 'Portfolio website');
    $mail->addAddress('jakubflaczynski@gmail.com');  
    //Content
    $mail->isHTML(true);                                 //Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message']. '<br><br> sent by '. $_POST['email'];;
    $mail->send();
    header('Location: flaczynski.com');
} catch (Exception $e) {
}

?>