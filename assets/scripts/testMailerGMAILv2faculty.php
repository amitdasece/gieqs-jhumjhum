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

$debug=false;

error_reporting(E_NONE);

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

$userFunctions = new userFunctions;

$programmeReports = new programmeReports;

$general = new general;
$programme = new programme;
$session = new session;
$faculty = new faculty;
$sessionItem = new sessionItem;
$queries = new queries;
$sessionView = new sessionView;

require(BASE_URI.'/vendor/autoload.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/PHPMailer.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;
//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/SMTP.php');

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
                        $mail->Password = 'zybza0-Cogmaw-sypfur';
    
					//Recipients
					$mail->setFrom('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					//$mail->addAddress('admin@gieqs.com');
					foreach ($email as $key=>$value){
						
						$mail->addAddress($value);
						
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
                    
                    $mail->msgHTML(get_include_contents(BASE_URI . $filename, $emailVaryarray));
                    $mail->AltBody = strip_tags((get_include_contents(BASE_URI . $filename, $emailVaryarray)));

                    // $mail->Body    = $txt;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
                    echo '<br/>Message to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . 'has been sent';
                    $info[] = 'Message to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . 'has been sent';
                   
					//$this->setAccommodationUpdateDone($guestid);
				} catch (Exception $e) {
                    echo '<br/>Message to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    $info[] = 'Message to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . 'Message could not be sent. Mailer Error: '.  $mail->ErrorInfo;
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


//print_r($emailList);
//print_r($myArray);


//get all emails from the emailList database ; specific function written into the emailList class

$emailArray = $userFunctions->getAllEmailsFaculty();

//print_r($emailArray);

//Mailer(array(0 => 'djtate@gmail.com'), $subject, '/assets/email/new_template/promo_mail_participants_june.php');


$subject = "GIEQs Faculty Message.  Please reconfirm your participation";

$i=0;

$info = [];

foreach ($emailArray AS $key=>$value){

    //print_r($key);
    //print_r($value);

    //get faculty details using class





    $firstname = $value['firstname'];
    $surname = $value['surname'];
    $email = $value['email']; 
    $title = $value['title']; 

    if ($email == 'michael@citywestgastro.com.au' || $email == 'sjheitma@ucalgary.ca' || $email == 'Hans.VanVlierberghe@UZGENT.be' || $email == 'tim.vanuytsel@kuleuven.be' || $email == 'eric.vancutsem@uzleuven.be' || $email == 'Ercan.cesmeli@azstlucas.be' || $email == 'j.poley@erasmusmc.nl' || $email == 'Marc.Peeters@uza.be' || $email == 'marc.ferrante@uzleuven.be' || $email == 'XAVIER.VERHELST@UGent.be' || $email == 'guy.desmet@ugent.be'){

        continue;

    }


    $emailVaryarray['firstname'] = $firstname;
    $emailVaryarray['surname'] = $surname;
    $emailVaryarray['email'] = $email;
    $emailVaryarray['title'] = $title;



    $id = $value['id']; 
    $facultyid = $id;

    $response =  $programmeReports->generateReport($id);

    //print_r($response);

    $edit = 0;

    $var = include('mailerAddOnFaculty.php');

    //echo $var;

    $emailVaryarray['var'] = $var;


    //echo 'emailArray is ' . $email;


    //ACTIVE MAILER FROM THE DATABASE


    //TEST
    //Mailer(array(0 => 'djtate@gmail.com'), $subject, '/assets/email/new_template/promo_mail_faculty_aug_remind.php', $emailVaryarray);  
    
    //ACTIVE MAILER , remember to remove limit below
   // Mailer(array(0=> $email, 1 => 'nele.coulier@seauton-international.com', 2=> 'gieqs@seauton-international.com'), $subject, '/assets/email/new_template/promo_mail_faculty_aug_remind.php', $emailVaryarray);


    //TODO change the reply to mail address
    //TODO work on dutch characters
    //TODO repeat if fails
    //TODO

    //$x++;
    
    //LIMITER  
    //$i++;
    //if($i==4) break;


}


print_r($info);








	
?>

</div>
    </body>
    </html>


