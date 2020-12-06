<?php

// Replace this with your own email address
$siteOwnersEmail = 'prabhaim95@gmail.com';


if($_POST) {

   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $subject = trim(stripslashes($_POST['subject']));
   $message = trim(stripslashes($_POST['message']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($message) < 1) {
		$error['message'] = "Please enter your message. It should have at least 1 character.";
	}
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }


   // Set Message
   $message .= "Email from      : " . $name . "<br />";
   $message .= "Email address   : " . $email . "<br />";
   $message .= "Message         : " . $message . "<br />";
 
   $message .= "<br /> ----- <br /> This email was sent from your Online Resume web site's contact form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      $send = mail($siteOwnersEmail, $subject, $message, $headers);
		if ($send) { echo 'Thank you for connecting me'; }
     
		
	 # end if - no validation error

	else {
		echo 'error';

	} # end if - there was a validation error

}

?>
