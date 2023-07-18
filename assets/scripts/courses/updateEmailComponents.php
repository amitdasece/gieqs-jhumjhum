<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $emailLink = new emailLink;
            $emailContent = new emailContent;
            
            //error_reporting(E_ALL);
            $debug = TRUE;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }else{

                echo 'no data array';
            }


            foreach ($data as $key=>$value){


                if ($emailContent->Return_row($value['id'])){

                    $emailContent->Load_from_key($value['id']);

                    if ($value['type'] == 'video'){

                      //is video
                      
                      //$emailContent->setvideo($value['content']);
                      $emailContent->setvideo($value['video']);
                      $emailContent->settext($value['text']);
                      $emailContent->setdisplay_order($value['order']);
                      echo $emailContent->prepareStatementPDOUpdate();

                    }elseif ($value['type'] == 'img'){

                        //is video
                        
                        $emailContent->setimg($value['img']);
                      $emailContent->settext($value['text']);
                        $emailContent->setdisplay_order($value['order']);
                        echo $emailContent->prepareStatementPDOUpdate();

  
                      }elseif ($value['type'] == 'text'){

                        //is video
                        
                        $emailContent->settext($value['content']);
                        $emailContent->setdisplay_order($value['order']);
                        echo $emailContent->prepareStatementPDOUpdate();

  
                      }


                }else{

                    echo 'id not found';
                }


            }


           



            ?>





<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>