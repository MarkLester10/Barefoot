<?php
require_once ROOT_PATH . '/app/config/constants.php';
require_once ROOT_PATH . '/vendor/autoload.php';
require_once ROOT_PATH . '/app/emails/EmailTemplates.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $username, $token)
{
  global $mailer;
  $body = verifyAccountTemplate($token, $username);
  // Create a message
  $message = (new Swift_Message('Verify your email address'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

  // Send the message
  $result = $mailer->send($message);
}


function sendPasswordResetLink($userEmail, $token)
{
  global $mailer;
  $body = passwordResetTemplate($token);
  // Create a message
  $message = (new Swift_Message('Barefoot Password reset'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

  // Send the message
  $result = $mailer->send($message);
}