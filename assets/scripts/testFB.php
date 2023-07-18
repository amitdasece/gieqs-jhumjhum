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

error_reporting(E_ALL);

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

require(BASE_URI.'/vendor/autoload.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/PHPMailer.php');

//use PHPMailer\PHPMailer\Exception;
//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/SMTP.php');


$fb = new \Facebook\Facebook([
    'app_id' => '493045018280075',
    'app_secret' => 'f39b271fe0b64c36e040c3c3393af5f3',
    'default_graph_version' => 'v2.10',
    'default_access_token' => 'EAAHAaZC0sQIsBAPUkIZBWOzTZApwrzapH11SMS6qgRtfoGLdov3EPGe5CqnyPMzds5rt120FNaHKvOEUvNN8kyKGqDc5PZBmxI7oc5MjzEKiA2mVJXSRasKL5fZCe7186UTQ9cW16lCIq6eKMiMpiMytFFwIZBbXZA8ZA7aL7sBEkwZDZD', // optional
  ]);

?>



<getStandardToken>
https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=493045018280075&client_secret=f39b271fe0b64c36e040c3c3393af5f3&fb_exchange_token=EAAHAaZC0sQIsBAFNzujkDSfk470l4He3JLzpK8SCjG6ttKxowo1dUUaQSLWHAzUGed6Chdx5dUdWn4TEAXZC05zUOcYtVdhTQ4EJ3g4wMOQrQ5nwPxODJ0JSREUtJKI1hPb1iBrWw6HcTO7SFL0vZBcphElikWrcRodjNlisoSRYtx183aNxlPN1VBz5DQZD</getStandardToken>

<token>EAAHAaZC0sQIsBAFNzujkDSfk470l4He3JLzpK8SCjG6ttKxowo1dUUaQSLWHAzUGed6Chdx5dUdWn4TEAXZC05zUOcYtVdhTQ4EJ3g4wMOQrQ5nwPxODJ0JSREUtJKI1hPb1iBrWw6HcTO7SFL0vZBcphElikWrcRodjNlisoSRYtx183aNxlPN1VBz5DQZD</token>



<?php



function Mailer ($email, $subject, $filename){
		
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
					//$this->setAccommodationUpdateDone($guestid);
				} catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}

		
		
		
}

?>

	
 <?php

$subject = "Ghent International Endoscopy Quality Symposium, October 2020";

$emailString = "Hans Van Vlierberghe <hans.vanvlierberghe@uzgent.be>, Lobke Desomer <lobkedesomer@gmail.com>, Pieter Hindryckx <pieter.hindryckx@uzgent.be>, Tania Helleputte <tania.helleputte@uzgent.be>, Helena Degroote <helena.degroote@ugent.be>, Danny De Looze <danny.delooze@uzgent.be>, Ewoud <edemunter@hotmail.com>";
$emailArray = explode(',', $emailString);
//print_r($myArray);

//Mailer(array(0 => 'david.tate@uzgent.be'), $subject, '/assets/email/emailTemplateInline.html');





//Mailer($emailArray, $subject, '/assets/email/emailTemplateInline.html');
//then can use myArray here

$pageAccessToken = 'EAAHAaZC0sQIsBAJNyxd30KENIbP3fHoGBoCCuPLslZABzA8yN9yZAcoXxHTgTXDVmgu7vrgzIHnNJpEGW9AqHmiL6tZB8WmmgsXT7UYcXtlPDqylZB2vaLzL8pyVbKZBY8eAfB8xAd7mN9RAtu3mXw1HWE1CSph1wpMCIEa6SeQYWfZASylaRg7caNwL8djT6zEBfzYkMtZCGabOCiKpXKrEzY6DDC5BhfuNivxVRh7CrgZDZD';

//Post property to Facebook
$linkData = [
    'link' => 'www.gieqs.com',
    'message' => 'Come to the Ghent International Endoscopy Symposium'
   ];
   
   
   try {
    $response = $fb->post('/me/feed', $linkData, $pageAccessToken);
   } catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: '.$e->getMessage();
    exit;
   } catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: '.$e->getMessage();
    exit;
   }
   $graphNode = $response->getGraphNode();
   print_r($graphNode);









	
?>

</div>
    </body>
    </html>


