<?php
require 'PHPMailerAutoload.php';
//Create a new PHPMailer instance
function sendMail($toEmail, $content, $subject, $name){
	$mail = new PHPMailer();
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 4;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	// $mail->Username = "info@nachimaarexports.com";
	$mail->Username = "nachimaarexports@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "N@vy@245!";
	// $mail->Password = "WeExport1!";
	//Set who the message is to be sent from
	$mail->setFrom('info@nachimaarexports.com', 'Nachimaar Exports');
	//Set an alternative reply-to address
	$mail->addReplyTo('info@nachimaarexports.com', 'Nachimaar Exports');
	//Set who the message is to be sent to
	$mail->addAddress($toEmail, $name);
	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML($content);
	//Replace the plain text body with one created manually
	$mail->AltBody = $content;
	//Attach an image file
	// $mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}
}