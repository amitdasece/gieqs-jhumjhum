<?php

            $openaccess = 0;
			$requiredUserLevel = 6;
            $_SESSION['debug'] = false;			
            require ('../../../includes/config.inc.php');		
            
			
			
        
            function array_not_unique( $a = array())
            {
                return array_diff_key( $a , array_unique( $a ) );
            }
			
			$general = new general;			

            require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
            $assetManager = new assetManager;

            require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
            $programmeView = new programmeView;

            require_once(BASE_URI . '/pages/learning/pages/box/classes/box_code.class.php');
            $box_code = new box_code;

            require_once(BASE_URI . '/pages/learning/pages/box/classes/responses.class.php');
            $responses = new responses;

            require_once(BASE_URI . '/pages/learning/pages/box/classes/commands.class.php');
            $commands = new commands;

            require_once(BASE_URI . '/pages/learning/pages/box/classes/interaction_interaction.class.php');
           

            require_once(BASE_URI . '/pages/learning/pages/box/classes/interaction.class.php');
            $interaction_new = new interaction;
                       

            
            $data = json_decode(file_get_contents('php://input'), true);            
           

            $commandIds =  $data['command_ids'];            
            $responseIds =  $data['response_ids'];
            

           // $interaction->New_interaction_interaction(1,$response_id,$commands_id,1,'','');

            $debug = false;


            if ($debug) {
                print_r($commandIds);            
                print_r($responseIds);
            }

            $return_array = array();

            //$responses->Load_from_key($response_id);

          // $commands->Load_from_key($command_id);

           // $interaction->Load_from_key(1);

            //$commands->setspoken_word($command_text);
          // $commands->setdescription('');
           // $commands->setglobal(Null);

           // $return_array['commands_add'] = $commands->prepareStatementPDO();

          //$lastCommandId = $commands->saveCommandData();

            //$commands->endcommands();

           // $responses->settext($response_text);

           //$lastResponseId =$responses->saveResponseData();

         

           

          //  $interaction1->setresponses_id($lastResponseId);


          //  $noOfrowsInteraction1 = $interaction1->numberOfRows();
          //  $interaction1->setorder($noOfrowsInteraction1+1);
          //  $interaction1->setinteraction_id(1);

           // $interaction1->saveInteractionData();

          //  $noOfrowsInteraction = $interaction->numberOfRows();

           // $interaction->setcommands_id($lastCommandId);
          //  $interaction->setorder($noOfrowsInteraction+1);
          //  $interaction->setinteraction_id(1);

           // $interaction->saveInteractionData();
           

          //  $responses->endresponses();



          $interaction_new->Load_from_key(1);
          $interaction_new->setreport_text('The caecum was successfully intubated and the CCIS score was 1.  The terminal ileum was successfully intubated.  Right colon retroflexion was performed.');
            $lastId = $interaction_new->saveInteractionNewData();

           // $commandIdsArr = explode(',', $commandIds);

          $NoofTotalRow = count($commandIds);

           $i = 0;
           $orderCount = 1;
           for($i = 0; $i < $NoofTotalRow; $i++) 
           {

          //  foreach($commandIds as $cIds)
         //   {
                $interaction1 = new interaction_interaction;
                $interaction1->setcommands_id($commandIds[$i]);


                //$noOfrowsInteraction1 = $interaction1->numberOfRows();
                $interaction1->setorder($orderCount);
                $interaction1->setinteraction_id($lastId);
                $interaction1->saveInteractionData();
            //}

           // $respnseIdsArr = explode(',', $respnseIds);
           // foreach($responseIds as $resIds)
           // {
               
                $interaction = new interaction_interaction;
                $interaction->setresponses_id($responseIds[$i]);

                $orderCount = $orderCount+1;
                $noOfrowsInteraction = $interaction->numberOfRows();
                $interaction->setorder($orderCount);
                $interaction->setinteraction_id($lastId);
                $interaction->saveInteractionData();
                $orderCount++;
                
           }
          //  }

            

            echo json_encode('success');


            
            