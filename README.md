# Sample Email Send
## Install Needs
- `composer install`
## Configs in mail-send.php file
- `$mail->Host       = 'smtp.gmail.com';`
- `$mail->SMTPAuth   = true;`
- `$mail->Username   = '<<sender_email>>'; `
- `$mail->Password   = '<<password>>'; `
- `$mail->SMTPSecure = 'TLS';`
- `$mail->Port       = 587;`
- `$mail->setFrom('<<sender_email>>', '<<Sender_Name>>');`