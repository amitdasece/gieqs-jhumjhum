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
      .b-fork {
	position: absolute;
	top: 0;
	left: 0;
	}
	.b-fork-link {
		display: block;

		padding: 10px 40px;
		margin: 2em 0 0 -3em;
	
		font: bold 16px/1 Helvetica, Arial, sans-serif;
		text-decoration: none;

		color: #FFF;
		background: #F40B00;
	
		-webkit-transform: rotate(-45deg);
		   -moz-transform: rotate(-45deg);
		     -o-transform: rotate(-45deg);
		        transform: rotate(-45deg);
		-webkit-transition: background .3s;
		   -moz-transition: background .3s;
		     -o-transition: background .3s;
		        transition: background .3s;
		}
	A.b-fork-link:hover {
		background: #0B00F4;
		}

BODY {
	font-family: Helvetica, Arial, sans-serif;
	}

h1 {
    text-align: center;
	}

/* Styles for polygons! */
.b-polygon {
    visibility: hidden;
    display: inline-block;

    overflow: hidden;

    vertical-align: middle;
    text-align: center;
    text-decoration: none;
    
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    .b-polygon-part {
        visibility: hidden;
        display: block;
        overflow: hidden;

        width: 100%;
        height: 100%;
        }
    .b-polygon-part_content:after {
        content:"";

        display: inline-block;

        height: 100%;

        vertical-align: middle;
        }
    .b-polygon-part_helper,
    .b-polygon-part_content {
        visibility: visible;
        }
    .b-polygon-part_content {
        color: #777;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.6), 0 1px 0 rgba(255,255,255,0.4);

        background: #EEE;
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0,0,0,0.1)), to(rgba(0,0,0,.4)));
        background-image: -webkit-linear-gradient(top,rgba(0,0,0,0.1),rgba(0,0,0,.4));
        background-image:    -moz-linear-gradient(top,rgba(0,0,0,0.1),rgba(0,0,0,.4));
        background-image:     -ms-linear-gradient(top,rgba(0,0,0,0.1),rgba(0,0,0,.4));
        background-image:      -o-linear-gradient(top,rgba(0,0,0,0.1),rgba(0,0,0,.4));
        background-image:         linear-gradient(top,rgba(0,0,0,0.1),rgba(0,0,0,.4));
        }
        .b-polygon:hover .b-polygon-part_content {
            color: #AAA;
            text-shadow: 0 1px 0 rgba(0,0,0,0.4), 0 -1px 0 rgba(255,255,255,0.6);

            background: #999;
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0,0,0,.4)), to(rgba(0,0,0,.1)));
            background-image: -webkit-linear-gradient(top,rgba(0,0,0,.4),rgba(0,0,0,.1));
            background-image:    -moz-linear-gradient(top,rgba(0,0,0,.4),rgba(0,0,0,.1));
            background-image:     -ms-linear-gradient(top,rgba(0,0,0,.4),rgba(0,0,0,.1));
            background-image:      -o-linear-gradient(top,rgba(0,0,0,.4),rgba(0,0,0,.1));
            background-image:         linear-gradient(top,rgba(0,0,0,.4),rgba(0,0,0,.1));
            }

.b-polygon_hexagon,
.b-polygon_dodecagon {
    -webkit-transform: rotate(120deg);
       -moz-transform: rotate(120deg);
        -ms-transform: rotate(120deg);
         -o-transform: rotate(120deg);
            transform: rotate(120deg);
    }
.b-polygon_hexagon>.b-polygon-part,
.b-polygon_dodecagon>.b-polygon-part,
.b-polygon_hexagon>.b-polygon-part>.b-polygon-part,
.b-polygon_dodecagon>.b-polygon-part>.b-polygon-part {
    -webkit-transform: rotate(-60deg);
       -moz-transform: rotate(-60deg);
        -ms-transform: rotate(-60deg);
         -o-transform: rotate(-60deg);
            transform: rotate(-60deg);
    }

.b-polygon_octagon {
    -webkit-transform: rotate(45deg);
       -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
         -o-transform: rotate(45deg);
            transform: rotate(45deg);
    }
.b-polygon_octagon2 {
    -webkit-transform: rotate(66.6deg);
       -moz-transform: rotate(66.6deg);
        -ms-transform: rotate(66.6deg);
         -o-transform: rotate(66.6deg);
            transform: rotate(66.6deg);
    }
.b-polygon_octagon>.b-polygon-part {
    -webkit-transform: rotate(-45deg);
       -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
         -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
    }
.b-polygon_octagon2>.b-polygon-part>.b-polygon-part {
    -webkit-transform: rotate(-21.6deg);
       -moz-transform: rotate(-21.6deg);
        -ms-transform: rotate(-21.6deg);
         -o-transform: rotate(-21.6deg);
            transform: rotate(-21.6deg);
    }


.hexagon-in2:hover {
    background-image: url(http://placekitten.com/241/241);
    }

.b-polygon_square {
    width: 100px;
    height: 100px;
    }
.b-polygon_octagon {
    width: 100px;
    height: 100px;
    }
.b-polygon_octagon2 {
    margin: 4px;
    }
    .b-polygon_octagon2 .b-polygon-part_content {
        width: 108px;
        height: 108px;
        margin: -4px;
        }
.b-polygon_hexagon {
    width: 200px;
    height: 100px;
    margin: 0 -42px;
    }
    .b-polygon_hexagon .b-polygon-part_content {
        width: 116px;
        height: 100px;
        margin: 0 42px;
        }
.b-polygon_hexagon2 {
    width: 100px;
    height: 200px;
    margin: -42px 0;
    }
    .b-polygon_hexagon2 .b-polygon-part_content {
        width: 100px;
        height: 116px;
        margin: 42px 0;
        }
.b-polygon_dodecagon {
    width: 100px;
    height: 100px;
    margin: 0;
    }

.b-polygons {
    text-align: center;
    padding-right: 27px;
    }

.b-megahexagon {
    width: 406px;
    margin: 0 auto 2em;
    padding: 0 36px 50px 18px;
    counter-reset:hexagon;
    }
    .b-megahexagon .b-polygon {
        margin: 0 -54px -50px 26px;
        }
    .b-megahexagon .b-polygon-part_content:before {
        content:counter(hexagon);
        counter-increment:hexagon;

        font-size: 3em;
        display: inline-block;
        vertical-align: middle;
        margin-left: 2px;
        }
    .b-megahexagon .b-polygon:nth-child(5n-1){
        margin-left: -60px;
        }
    .b-megahexagon .b-polygon:nth-child(5n+1) {
        margin-right: -100px;
        }
    .b-megahexagon .b-polygon:first-child,
    .b-megahexagon .b-polygon:last-child {
        margin-left: 112px;
        margin-right: 112px;
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
//$sponsorsArray = $sponsors->get_sponsor_emails_optouts_removed();

//print_r($sponsorsArray);



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
    //Mailer(array(0 => $email), $subject, '/assets/email/emailTemplateSponsorsJan.php', $emailVaryarray);

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
<a href="#lol" class="b-polygon b-polygon_octagon">
<img class="" alt="Click here to watch our teaser video for GIEQs" src="<?php echo BASE_URL;?>/assets/img/polyps/32305.jpg">
        </a>

</div>
    </body>
    </html>


