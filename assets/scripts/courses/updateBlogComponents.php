<?php

            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $blogLink = new blogLink;
            $blogContent = new blogContent;
            
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


                if ($blogContent->Return_row($value['id'])){

                    $blogContent->Load_from_key($value['id']);

                    if ($value['type'] == 'video'){

                      //is video
                      
                      //$emailContent->setvideo($value['content']);
                      $blogContent->setvideo($value['video']);
                      $blogContent->settext($value['text']);
                      $blogContent->setdisplay_order($value['order']);
                      echo $blogContent->prepareStatementPDOUpdate();

                    }elseif ($value['type'] == 'img'){

                        //is video
                        
                        $blogContent->setimg($value['img']);
                        $blogContent->settext($value['text']);
                        $blogContent->setdisplay_order($value['order']);
                        echo $blogContent->prepareStatementPDOUpdate();

  
                      }elseif ($value['type'] == 'text'){

                        //is video
                        
                        $blogContent->settext($value['content']);
                        $blogContent->setdisplay_order($value['order']);
                        echo $blogContent->prepareStatementPDOUpdate();

  
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