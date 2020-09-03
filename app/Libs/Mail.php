<?php

namespace Application\Libs;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
class Mail
{
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        //Server settings
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->SMTPDebug  = 0;
        $this->mail->Host       = HOST_MAIL;                              // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = USER_MAIL;                              // SMTP username
        $this->mail->Password   = PASSWORD_MAIL;                               // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;
        $this->mail->CharSet    = 'UTF-8';

        // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    }
    public function send($data)
    {
        try {
            //Recipients
            $this->mail->setFrom(USER_MAIL, $data['tienda']);
            $this->mail->addAddress($data['email'], $data['nombre']);     // Add a recipient

            if (isset($data['archivo']) && !empty($data['archivo'])) {
                // Attachments
                $this->mail->addAttachment($data['archivo']);
            }
            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $data['subject'];
            $this->mail->Body    = $data['body'];
            if ($this->mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}

// Instantiation and passing `true` enables exceptions
