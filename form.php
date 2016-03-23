<?php
require '/home/ubuntu/workspace/crotchRocketBoy.github.io/PHPMailer_5.2.0/class.phpmailer.php'; // this will include smtp and pop files.
 
 
 $first_name = $_POST['name']; // required
 $email_from = $_POST['email']; // required
 $msg_ = $_POST['message']; // required
 $email_to = "aose@ggc.edu";

try {
    
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	//$body             = file_get_contents('contact.html');
	//$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 465;                    // set the SMTP server port
	$mail->Host       = "smtp.gmail.com"; // SMTP server
	$mail->Username   = "";     // SMTP server username
	$mail->Password   = "";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->Subject  = "First PHPMailer Message";

 
    $mail->setFrom($email_from, $first_name);
 
    $mail->addAddress($email_to, 'Abunaw Ose');
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($msg_);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	echo 'Message has been sent.';
	
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}

?>