<?php

// Load Composer's autoloader
require 'vendor/autoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    
    $mail->SMTPDebug = 4;                              // Enable verbose debug output
    $mail->IsSMTP();                                   // Send using SMTP
    // $mail->SMTPOptions = array(
    //     'ssl' => array(
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true
    //     )
    // );
    $mail->Host       = '<<mail_server_host>>';                 // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                          // Enable SMTP authentication
    $mail->Username   = '<<sender_email>>';          // SMTP username
    $mail->Password   = '<<password>>';                    // SMTP password                            // SMTP password
    $mail->SMTPSecure = 'TLS';                         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->setFrom('<<sender_email>>', '<<Sender_Name>>');

    $mail->addAddress('<<receipient_email>>', '<<Recipient_Name>>');     // Add a recipient
    $mail->addCC('<<cc_email>>','<<CC_User_Name>>');
    $mail->addBCC('<<bcc_email>>');
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // Attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "<br/><b style='color:red;'>Message could not be sent. Mailer Error : </b><br/> <br>{$e}<br><a href='/'>Back</a>";
}