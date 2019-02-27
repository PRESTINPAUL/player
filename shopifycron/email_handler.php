<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
include_once 'global_config.php';

class EmailHandler {

	private $subject;
	private $attachment;
	private $body;

	function EmailHandler($subject = null, $body = null, $attachment = null) {
		$this->subject = $subject;
		$this->body = $body;
		if (!empty($attachment)) {
			$this->attachment = $attachment;
		}

	}

	public function sendMail() {

		$mail = new PHPMailer(); // Passing `true` enables exceptions
		try {
			//Server settings
		//	$mail->SMTPDebug = 2; // Enable verbose debug output
			$mail->isSMTP();
			$mail->CharSet = "UTF-8"; // Set mailer to use SMTP
			$mail->Host = SMTP_HOST; // Specify main and backup SMTP servers
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = SMTP_USER_NAME; // SMTP username
			$mail->Password = SMTP_PASSWORD; // SMTP password
			$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; // TCP port to connect to
			//Recipients
			$mail->setFrom(SMTP_SEND_FROM, SMTP_SENDER_NAME);
			$mail->addAddress(SMTP_RECEIVER); // Add a recipient
			// Name is optional
			//Attachments
			if (!empty($this->attachment)) {
				$mail->addAttachment(SMTP_ATTACHMENT_PATH . $this->attachment); // Add attachments
			}
			//Content
			$mail->isHTML(true); // Set email format to HTML
			$mail->Subject = $this->subject;
			$mail->Body = $this->body;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();
			return true;

		} catch (Exception $e) {
			//echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			return false;
		}
	}

}

?>
