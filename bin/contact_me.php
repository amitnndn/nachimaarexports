<?php
// Check for empty fields
require "sendMail.php";
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   empty($_POST['formType'])  ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$formType = strip_tags(htmlspecialchars($_POST['formType']));
$to = 'info@nachimaarexports.com';

switch($formType){
	case "contact-me":
		$status = 1;
		$email_subject = "Website Contact Form:  $name";
		$email_body = "You have received a new message from your website contact form.<br/>"."Here are the details:<br/><br/>Name: $name<br/><br/>Email: $email_address<br/><br/>Phone: $phone<br/><br/>Message:<br/>$message";
		$email_body_recepient = "Hi $name,<br/><br/>Thank you for contacting Nachimaar Exports Pvt. Ltd. Our representative will get back to you shortly.<br/><br/>If you think your contact details are wrong, please reply back to this mail with the correct contact details.<br/><br/>Regards,<br/>Team Nachimaare Exports Pvt. Ltd.";
		$email_subject_recepient = "Thank you for contacting Nachimaar Exports Pvt. Ltd.";
		break;
	case "enquiry": 
		$status = 1;
		$address = strip_tags(htmlspecialchars($_POST['address']));
		$companyName = strip_tags(htmlspecialchars($_POST['companyName']));
		$country = strip_tags(htmlspecialchars($_POST['country']));
		$email_subject = "Website Enquiry Form:  $name";
		$email_body = "You have received a new message from your website contact form.<br/>".
						"Here are the details:<br/><br/>Name: $name<br/><br/>".
						"Email: $email_address<br/><br/>Phone: $phone<br/><br/>".
						"Message:<br/>$message<br/><br/>Address:<br/> $address<br/><br/>".
						"Company Name: $companyName<br/><br/>Country: $country<br/><br/>";
		$email_body_recepient = "Hi $name,<br/><br/>Thank you for contacting Nachimaar Exports Pvt. Ltd. Our representative will get back to you shortly.<br/><br/>If you think your contact details are wrong, please reply back to this mail with the correct contact details.<br/><br/>Regards,<br/>Team Nachimaare Exports Pvt. Ltd.";
		$email_subject_recepient = "Thank you for contacting Nachimaar Exports Pvt. Ltd.";
		break;
	default: 
		$status = 0;
		echo "Select a valid option";
		break;
}
if($status){
	sendMail($to ,$email_body,$email_subject,$name);
	sendMail($email_address,$email_body_recepient,$email_subject_recepient,$name);
}

return true;         
?>
