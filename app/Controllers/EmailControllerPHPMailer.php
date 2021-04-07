<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once ROOT_PATH . '/app/config/constants.php';
require_once ROOT_PATH . '/app/emails/EmailTemplates.php';

require ROOT_PATH . '/vendor/phpmailer/phpmailer/src/Exception.php';
require ROOT_PATH . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require ROOT_PATH . '/vendor/phpmailer/phpmailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = EMAIL;                     //SMTP username
$mail->Password   = 'barefoot@blog';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


function sendVerificationEmail($userEmail, $userName, $token)
{
  global $mail;
  //Recipients
  $mail->setFrom(EMAIL, 'Barefoot');
  $mail->addAddress($userEmail, $userName);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Barefoot: Account Verification';
  $mail->Body    = verifyAccountTemplate($token, $userName);
  $mail->AltBody = 'Barefoot: Account Verification';


  $mail->send();
}

function sendPasswordResetLink($userEmail, $token)
{
  global $mail;
  //Recipients
  $mail->setFrom(EMAIL, 'Barefoot');
  $mail->addAddress($userEmail);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Barefoot Account: Request for change of password';
  $mail->Body    = passwordResetTemplate($token);
  $mail->AltBody = 'Barefoot Account: Request for change of password';


  $mail->send();
}