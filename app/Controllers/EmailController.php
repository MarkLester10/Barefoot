<?php
require_once ROOT_PATH . '/app/config/constants.php';
require_once ROOT_PATH . '/vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
  global $mailer;
  $body = '<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Verfiy Email</title>
    </head>
    <body>
      <div class="wrapper">
        <p>
          Thank you for signing up on our website. Please click on the link below
          to verify your email address
        </p>
        <a
          href="http://localhost/webapp/index.php?token=' . $token . '"
        class="btn btn-primary btn-success btn-block"
        >Verfify your email address</a>
        </div>
        </body>

        </html>
';
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
  $body = '<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Verfiy Email</title>
    </head>
    <body>
      <div class="wrapper">
        <p>
          Hi there,

          You recently requested to reset your password for your Barefoot account. Click the link below to reset your password.
        </p>
        <a
          href="http://localhost/webapp/index.php?password-token=' . $token . '"
        class="btn btn-primary btn-success btn-block"
        >Reset password</a>
        </div>
        </body>

        </html>
';
  // Create a message
  $message = (new Swift_Message('Barefoot Password reset'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

  // Send the message
  $result = $mailer->send($message);
}