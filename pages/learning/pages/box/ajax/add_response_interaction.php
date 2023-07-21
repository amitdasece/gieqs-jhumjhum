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
            $interaction = new interaction_interaction; 
            $interaction1 = new interaction_interaction;            

            
            $data = json_decode(file_get_contents('php://input'), true);            
           

            $command_text = $data['command_text'];            
            $command_id = $data['command_id'];
            $response_text = $data['response_text'];
            $response_id = $data['response_id'];
           $pre_response_id = $data['pre_response_id'];
            $pre_command_id = $data['pre_command_id'];

           // $interaction->New_interaction_interaction(1,$response_id,$commands_id,1,'','');

            $debug = false;


            if ($debug) {
                print_r($command_id);            
                print_r($data);
            }

            $return_array = array();

            $responses->Load_from_key($response_id);

            $commands->Load_from_key($command_id);

           // $interaction->Load_from_key(1);

            $commands->setspoken_word($command_text);
            $commands->setdescription('');
            $commands->setglobal(Null);

           // $return_array['commands_add'] = $commands->prepareStatementPDO();

          $lastCommandId = $commands->saveCommandData();

          $return_array['commands_add'] = 1;
          $commands->endcommands();

            //$commands->endcommands();

            $responses->settext($response_text);

           $lastResponseId = $responses->saveResponseData();

           $return_array['response_add'] = 1;
           $responses->endresponses();

         
          $noOfrowsInteraction = $interaction->checkOrder($pre_response_id); 
          
          foreach($noOfrowsInteraction['dataArr'] as $dataArr) {

            $interaction_update = new interaction_interaction;
            $newOrder = $dataArr['order'] + 2;
            $interaction->updateInteractionData($newOrder,$dataArr['row_id']);

          }

           $interaction->setcommands_id($lastCommandId);
           $interaction->setorder($noOfrowsInteraction['order']+1);
           $interaction->setinteraction_id($noOfrowsInteraction['interaction_id']);

           $interaction->saveInteractionData();
           

            $interaction1->setresponses_id($lastResponseId);


            $noOfrowsInteraction1 = $interaction1->checkOrder($pre_response_id);
            $interaction1->setorder($noOfrowsInteraction1['order']+2);
            $interaction1->setinteraction_id($noOfrowsInteraction1['interaction_id']);

            $interaction1->saveInteractionData();           

            echo json_encode($return_array);


            
            