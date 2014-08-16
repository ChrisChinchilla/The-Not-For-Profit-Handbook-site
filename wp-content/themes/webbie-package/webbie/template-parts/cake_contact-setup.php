<?php
/**
 * Template part for setting up contact form variables
 * 
 * By default, Ajax submission is enabled. 
 * You can find and modify the ajax submission behavior
 * in the main javascripts file "js/main.js" 
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;

// EMAIL ADDRESS
$cake_contact_email =  $NHP_Options->get('contact_form_email');

// SITE URL
$cake_contact_website = home_url();

// SITE NAME
$cake_name = get_bloginfo('name');

//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __('please enter your name.', 'cake');
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __('please enter your email address.', 'cake');
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __('Invalid email address.', 'cake');
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = __('please write a message.', 'cake');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $cake_contact_email;
			$subject = $name . ' sent you a message from your site';
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n$cake_contact_website";
			$headers = 'From:'.$cake_name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed ' . $cake_name;
				$headers = 'From:'  . $cake_name . '<'. $cake_contact_email .'>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
}
?>