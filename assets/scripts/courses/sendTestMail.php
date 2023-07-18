<?php

            $openaccess = 1;

            require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            $emailLink = new emailLink;
            $emailContent = new emailContent;
            $emails = new emails;
            
            $debug = false;


            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $emailid = $data['emailid'];
            $databaseName = $data['databaseName'];
            
    
            $location = BASE_URL . '/index.php';


            $_SESSION['debug'] = false;

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
            $general = new general;
            require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
            $users = new users;

            require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
            $userFunctions = new userFunctions;


            require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
            $assetManager = new assetManager;

            require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
            $assets_paid = new assets_paid;

            require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
            $subscription = new subscriptions;

            require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
            $user_email = new user_email;



            require_once BASE_URI . "/vendor/autoload.php";

            spl_autoload_unregister ('class_loader');

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            $mail = new PHPMailer;



            //$debug = false;

            if ($debug){

                error_reporting(E_ALL);
            }

            function get_include_contents($filename, $variablesToMakeLocal) {
                extract($variablesToMakeLocal);
                if (is_file($filename)) {
                    ob_start();
                    include $filename;
                    return ob_get_clean();
                }
                return false;
            }


            if ($emails->Return_row($emailid)){

                if ($debug){

                    echo 'email found';
                }

                $emails->Load_from_key($emailid);

                if ($debug){

                    echo 'email loaded';
                }


                    $email_id = $emails->getemail_id();
                    $subject = $emails->getsubject();
                    

                    $population = ['1']; //blank while the script is on the server

                    if ($debug){
                    
                    print_r($population);

                    }

                    foreach ($population as $key=>$value){

                        $users->Load_from_key($value);
                        $emailVaryarray['firstname'] = $users->getfirstname();
                        $emailVaryarray['surname'] = $users->getsurname();
                        $emailVaryarray['email'] = $users->getemail();
                        $email = $users->getemail();
                        $emailVaryarray['key'] = $users->getkey();
                        $emailVaryarray['preheader'] = $emails->getpreheader();
                    

                        $_GET['emailid'] = $emailid;

                        //create a file
                        //ob_start();
                        /* PERFORM COMLEX QUERY, ECHO RESULTS, ETC. */
                        $page = get_include_contents(BASE_URI . '/assets/scripts/courses/generateEmail.php', $emailVaryarray);

                        //ob_end_clean();
                        $file = BASE_URI . '/assets/scripts/courses/generatedEmail.php';
                        @chmod($file,0755);
                        $fw = fopen($file, "w") or die ('Unable to open file for writing');
                        fputs($fw,$page, strlen($page));
                        fclose($fw);
                        //die();

                        if ($debug){

                            echo PHP_EOL;
                            print_r($emailVaryarray);
                            echo BASE_URI . '/assets/scripts/courses/generateEmail.php';
                            $mailTest = get_include_contents(BASE_URI . '/assets/scripts/courses/generateEmail.php', $emailVaryarray);
                            echo $mailTest;

                        }


                        $mail->ClearAllRecipients();
                        $mail->CharSet = "UTF-8";
                        $mail->Encoding = "base64";
                        $mail->Subject = $subject;
                        $mail->setFrom('admin@gieqs.com', 'GIEQs Online');
                        $mail->addAddress($emailVaryarray['email']);
                        $mail->msgHTML(get_include_contents($file, $emailVaryarray));
                        $mail->AltBody = strip_tags((get_include_contents($file, $emailVaryarray)));
                        $mail->preSend();
                        $mime = $mail->getSentMIMEMessage();
                        $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');


                        
                        if ($debug){

                            echo('email would now be sent');

                            print_r($mime);
                            $_GET['emailid'] = null;

                            
                        }else{


                            require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');
                            echo 'email to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . ' was sent. <br/><br/>'; 


                            //since testing don't add to the sent users list

                            //$user_email->New_user_email($value, $email_id);
                            //$user_email->prepareStatementPDO();
                            $_GET['emailid'] = null;


                        }

                    } 


            }

                

                    
                

                    
                




            




                        ?>





<?php
                    

                        
                    

                        
                        
            //$general->endgeneral();
            //$programme->endprogramme();
            //$userRegistrations->enduserRegistrations();
            ?>