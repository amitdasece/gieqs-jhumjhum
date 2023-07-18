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

$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';

$page_title='Administration GIEQs';

$sponsors = new sponsors;

?>

<p class="h5">Sponsors MAILER</p>

<?php
// include ($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/simple_header.php');
//use the referring id as the user id to change the password for
//alternatively use a randomly generated string

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/lib/SendGrid.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/sendgrid-php.php');

require(BASE_URI.'/vendor/autoload.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/PHPMailer.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/SMTP.php');

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

//ARRAY of addresses

//$sponsorsArray = $sponsors->get_sponsor_emails();
$sponsorsArray = $sponsors->get_sponsor_emails_optouts_removed();

print_r($sponsorsArray);

echo '<br/><br/>';





function Mailer ($email, $subject, $filename, $emailVaryarray){
		
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
				try {
					//Server settings
					$mail->SMTPDebug = 3;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'n3plcpnl0016.prod.ams3.secureserver.net';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'admin@gieqs.com';                 // SMTP username
					$mail->Password = 'Nel67fnvr2';                           // SMTP password
					$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 465;                                    // TCP port to connect to

					//Recipients
					$mail->setFrom('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					
					foreach ($email as $key=>$value){
						
						$mail->addBCC($value);
						
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
					echo '<br/> Message to ' . $emailVaryarray['firstname'] . $emailVaryarray['surname'] . ' has been sent<br/>';
					//$this->setAccommodationUpdateDone($guestid);
				} catch (Exception $e) {
                    
                    echo '<br/> Message to ' . $emailVaryarray['firstname'] . $emailVaryarray['surname'] . ' could not be sent. Mailer Error: ', $mail->ErrorInfo;

				}

		
		
		
}

?>

	
 <?php

$subject = "Ghent International Endoscopy Quality Symposium, October 2020";

$x=0;

foreach ($sponsorsArray AS $key=>$value){

    $firstname = $value['firstname'];
    $surname = $value['surname'];
    $email = $value['email'];

    $emailVaryarray['firstname'] = $firstname;
    $emailVaryarray['surname'] = $surname;
    $emailVaryarray['email'] = $email;


    //ACTIVE MAILER FROM THE DATABASE
    //Mailer(array(0 => $email, 1 => 'david.tate@uzgent.be', 2 => 'pieter.hindryckx@uzgent.be', 3 => 'triana.lobaton@uzgent.be', 4 => 'admin@gieqs.com', 5 => 'nele@seauton-international.com'), $subject, '/assets/email/emailTemplateSponsorsJanIBD.php', $emailVaryarray);

    //TEST MAILER
    //Mailer(array(0 => 'david.tate@uzgent.be'), $subject, '/assets/email/emailTemplateSponsorsJan.php', $emailVaryarray);  //TEST MAIL
    
    //TODO change the reply to mail address
    //TODO work on dutch characters
    //TODO repeat if fails
    //TODO

    $x++;

}

//LOOP through mails



//












	
?>

</div>
    </body>
    </html>


