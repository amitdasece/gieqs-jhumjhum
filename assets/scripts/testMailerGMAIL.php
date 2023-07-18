<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="At GIEQs we aim to make everyday endoscopy better.  Endoscopy is performed by a team of doctors and nurses.  Both parts of the team are important and so a nursing symposium is part of GIEQs.">
    <meta name="author" content="gieqs">
    <title>Ghent International Endoscopy Symposium</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo BASE_URL;?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">

    <style>
      .modal-backdrop
      {
          opacity:0.75 !important;
      }
      @media screen and (max-width: 400px) {
        
        
        .scroll{

          font-size: 1em;

          }

          .h5{

          font-size: 1em;
          }

          .tiny {
          font-size: 0.75em;

          }

          .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
          }
      }
    

    </style>
</head>

<body>
<div class="container">

<?php

// error_reporting(-1);

$debug=true;

$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';

$page_title='Administration GIEQs';

?>

<p class="h5">iACE - Admin - Dashboard Data Mail Generator</p>

<?php
// include ($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/simple_header.php');
//use the referring id as the user id to change the password for
//alternatively use a randomly generated string

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/lib/SendGrid.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/sendgrid-php.php');



echo 'hello';

require(BASE_URI.'/vendor/autoload.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/PHPMailer.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;
//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/SMTP.php');

function Mailer ($email, $subject, $filename){
		
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
				try {
					//Server settings
					if ($debug){
                        $mail->SMTPDebug = 3;                                 // Enable verbose debug output
                        }else{
    
                            $mail->SMTPDebug = 0; 
                        }
                        $mail->SMTPDebug = 3;    
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 587;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->SMTPAuth = true;  
    
                        $mail->Username = 'admin@gieqs.com';
                        $mail->Password = 'tgluoskrezwktjrc';
    
					//Recipients
					$mail->setFrom('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					$mail->addAddress('admin@gieqs.com');
					foreach ($email as $key=>$value){
						
						$mail->addBCC($value);
						
					}
					
					     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					$mail->addReplyTo('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');

					//Attachments
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = $subject;
                    
                    $mail->msgHTML(file_get_contents(BASE_URI . $filename), __DIR__);
                    // $mail->Body    = $txt;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
                    echo 'Message has been sent';
                    if (save_mail($mail)) {
                        echo "Message saved!";
                    }
					//$this->setAccommodationUpdateDone($guestid);
				} catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
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

 error_reporting(E_ALL);

$emailList = new emailList;

$subject = "Registration is Open! Ghent International Endoscopy Quality Symposium, October 2020";

$emailString = "Hans Van Vlierberghe <hans.vanvlierberghe@uzgent.be>, Lobke Desomer <lobkedesomer@gmail.com>, Pieter Hindryckx <pieter.hindryckx@uzgent.be>, Tania Helleputte <tania.helleputte@uzgent.be>, Helena Degroote <helena.degroote@ugent.be>, Danny De Looze <danny.delooze@uzgent.be>, Ewoud <edemunter@hotmail.com>";
$emailArray = explode(',', $emailString);


print_r($emailList);
//print_r($myArray);


//get all emails from the emailList database ; specific function written into the emailList class

$emailArray = $emailList->getAllEmails();

//print_r($emailArray);

Mailer(array(0 => 'djtate@gmail.com'), $subject, '/assets/email/new_template/promo_mail_participants_june.php');





//Mailer($emailArray, $subject, '/assets/email/emailTemplateInline.html');
//then can use myArray here











	
?>

</div>
    </body>
    </html>


