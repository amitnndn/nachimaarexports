<?php
// Check for empty fields
require "sendMail.php";
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$address = strip_tags(htmlspecialchars($_POST['address']));
$companyName = strip_tags(htmlspecialchars($_POST['companyName']));
$country = strip_tags(htmlspecialchars($_POST['country']));
   
// Create the email and send the message
$to = 'info@nachimaarexports.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Enquiry Form:  $name";
$email_body = "You have received a new message from your website contact form.<br/>".
				"Here are the details:<br/><br/>Name: $name<br/><br/>".
				"Email: $email_address<br/><br/>Phone: $phone<br/><br/>".
				"Message:<br/>$message<br/><br/>Address:<br/> $address<br/><br/>".
				"Company Name: $companyName<br/><br/>Country: $country<br/><br/>";
$headers = "From: noreply@nachimaarexports.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
sendMail($to ,$email_body,$email_subject,$name);

$email_body = "Hi $name,<br/><br/>Thank you for contacting Nachimaar Exports Pvt. Ltd. Our representative will get back to you shortly.<br/><br/>If you think your contact details are wrong, please reply back to this mail with the correct contact details.<br/><br/>Regards,<br/>Team Nachimaare Exports Pvt. Ltd.";
$email_subject = "Thank you for contacting Nachimaare Exports Pvt. Ltd.";
sendMail($email_address,$email_body,$email_subject,$name);
return true;         
?>
