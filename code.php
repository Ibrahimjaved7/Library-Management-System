<?php 
	$sts = "";
	$msg = "";
	function send_email($email_address,$subject,$email_body){
		global $sts;
 		global $msg;	
		$mail = new PHPMailer;
		 //Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
			
		//Set the SMTP port number - 587 for authenticated TLS
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "ibrahimjaved676@gmail.com";

		//Password to use for SMTP authentication
		$mail->Password = 'zwfwrbpqxdhimtkp';

		//Set who the message is to be sent from
		$mail->setFrom('ibrahimjaved676@gmail.com', 'Ibrahim Javed');

		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');

		//Set who the message is to be sent to
		$mail->addAddress($email_address, $subject);

		//Set the subject line
		$mail->Subject = $subject;

			 
		$body =$email_body;
		$mail->Body =$body ;

		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		$mail->isHTML(true);  
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if (!$mail->send()) {
		    $msg= "Mailer Error: " . $mail->ErrorInfo;
		    $sts="danger";
		    return false;
		} else{
			$msg="Email Sent Successfully...";
			$sts="success";
			  return true;
		}
		// echo $msg;

	}
	

 ?>
