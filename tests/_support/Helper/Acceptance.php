<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    public function sendEmail(string $to, string $subject, string $body, bool $isHtml = false, ?string $encoding = null, array $attachments = [])
    {
        $phpmailer = new \PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = '127.0.0.1';
        $phpmailer->Port = 1025;
        if (null !== $encoding) {
            $phpmailer->Encoding = $encoding;
        }
        foreach ($attachments as $attachmentName => $attachment) {
            $phpmailer->addAttachment($attachment, $attachmentName);
        }

        $phpmailer->addAddress($to);
        $phpmailer->Subject = $subject;
        $phpmailer->Body = $body;
        $phpmailer->isHTML($isHtml);
        $phpmailer->send();
    }
}
