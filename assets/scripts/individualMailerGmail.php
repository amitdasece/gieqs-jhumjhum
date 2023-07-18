

<?php

//to include in another file
// error_reporting(-1);

//remove later
?>




<?php
// include ($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/simple_header.php');
//use the referring id as the user id to change the password for
//alternatively use a randomly generated string

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/lib/SendGrid.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/sendgrid-php.php');

require(BASE_URI.'/vendor/autoload.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/PHPMailer.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\Exception;
//use League\OAuth2\Client\Provider\Google;

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/SMTP.php');
date_default_timezone_set('Europe/Brussels');

//TODO get the array from the server
//NAME the array and put in correct format for emails

//FOREACH of the emails perform the mailer function
//PRIOR include this

function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}








function Mailer ($email, $subject, $filename, $emailVaryarray){
		
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
				try {
					//Server settings
                    
                    if ($debug){
                    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
                    }else{

                        $mail->SMTPDebug = 0; 
                    }
					$mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->SMTPAuth = true;  

                    $mail->Username = 'admin@gieqs.com';
                    $mail->Password = 'tgluoskrezwktjrc';



                    /* $mail->AuthType = 'XOAUTH2';

                    $email = 'admin@gieqs.com';
                    $clientId = 'RANDOMCHARS-----duv1n2.apps.googleusercontent.com';
                    $clientSecret = 'RANDOMCHARS-----lGyjPcRtvP';

                    $refreshToken = 'RANDOMCHARS-----DWxgOvPT003r-yFUV49TQYag7_Aod7y0';

                    $provider = new Google(
                        [
                            'clientId' => $clientId,
                            'clientSecret' => $clientSecret,
                        ]
                    );

                    $mail->setOAuth(
                        new OAuth(
                            [
                                'provider' => $provider,
                                'clientId' => $clientId,
                                'clientSecret' => $clientSecret,
                                'refreshToken' => $refreshToken,
                                'userName' => $email,
                            ]
                        )
                    ); */
                    
                    // Enable SMTP authentication
				                              // TCP port to connect to

					//Recipients
					$mail->setFrom('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					$mail->addReplyTo('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					foreach ($email as $key=>$value){
						
						$mail->addAddress($value);
						
					}
					
					     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('nele.coulier@seauton-international.com', 'Ghent International Endoscopy Quality Symposium');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');

					//Attachments
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = $subject;
                    
                    $mail->msgHTML(get_include_contents(BASE_URI . $filename, $emailVaryarray));
                    $mail->AltBody = strip_tags((get_include_contents(BASE_URI . $filename, $emailVaryarray)));
                    
                    //$mail->msgHTML(file_get_contents(BASE_URI . $filename), __DIR__);
                    // $mail->Body    = $txt;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
                    if ($debug){echo '<br/> Message to ' . $emailVaryarray['firstname'] . $emailVaryarray['surname'] . ' has been sent<br/>';}
                    
                    $emailWorked = true;
                    /* if (save_mail($mail)) {
                            echo "Message saved!";
                        } */
                    //echo '1';
					//$this->setAccommodationUpdateDone($guestid);
				} catch (Exception $e) {
                    
                    $emailWorked = false;
                    $reason = $mail->ErrorInfo;
                    //echo '2';
                    if ($debug){echo '<br/> Message to ' . $emailVaryarray['firstname'] . $emailVaryarray['surname'] . ' could not be sent. Mailer Error: ', $mail->ErrorInfo;}

                    //echo '<br/> Message to ' . $emailVaryarray['firstname'] . $emailVaryarray['surname'] . ' could not be sent. Mailer Error: ', $mail->ErrorInfo;

				}

		
		
		
}

function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

?>

	
 <?php


/* $emailVaryarray['firstname'] = $firstname;
$emailVaryarray['surname'] = $surname;
$emailVaryarray['email'] = $email;
$emailVaryarray['key'] = $key; */


    Mailer($email, $subject, $filename, $emailVaryarray);  //TEST MAIL
//echo 'hello';
   

    /* $oldEmail = array(0 => 'david.tate@uzgent.be');
    $oldFilename = '/assets/email/emailNewAccount.php';

$subject = "Ghent International Endoscopy Quality Symposium, October 2020";

$x=0; */



    //TODO change the reply to mail address
    //TODO work on dutch characters
    //TODO repeat if fails
    //TODO

   



//LOOP through mails



//












	
?>



