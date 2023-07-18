<?php

            $openaccess = 0;

			$requiredUserLevel = 6;

            $_SESSION['debug'] = false;
			
            require ('../../../includes/config.inc.php');		
            
			
			
        
            function array_not_unique( $a = array() )
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

            
            $data = json_decode(file_get_contents('php://input'), true);


            $debug = true;


            if ($debug){
            
            print_r($data);
            }

            exit();

            $return_array = array();

            $responses->Load_from_key($response_id);

            $commands->Load_from_key($command_id);

            $commands->setspoken_word($command_text);

            $return_array['commands_update'] = $commands->prepareStatementPDOUpdate();

            $commands->endcommands();

            $responses->settext($response_text);

            $return_array['responses_update'] = $responses->prepareStatementPDOUpdate();

            $responses->endresponses();

            echo json_encode($return_array);


            
            