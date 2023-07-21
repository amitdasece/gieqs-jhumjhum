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

            
            $data = json_decode(file_get_contents('php://input'), true);

            $command_id = $data['command_id'];

            //$debug = true;


            if ($debug){
            print_r($command_id);
            print_r($data);
            }

            //returning the interaction id and interaction order of the current command
            $return_array = $box_code->get_command_interaction_and_position($command_id);

            if ($debug){

            print_r($return_array);
            }
           // print_r($return_array);

            if ($return_array != false){


            //returning the next response id
            $return_array_2 = $box_code->get_next_response_given_interaction_id_and_order($return_array['id'], $return_array['order']);
            //print_r($return_array_2);
            //return the next command array possibility

            //== the next command in any interaction which contains this command
            //== a command is always 2 steps further

            //so get the position of this command
            //add 2
            //then look for any command at this position of any interaction
            //add the array of these with their id and text to the array here

             $next_required_level = intval($return_array['order']) + 2;

            $next_level_commands = $box_code->get_specific_level_commands($next_required_level);

                //get the responses text

            if ($return_array_2 != false){

                $responses->Load_from_key($return_array_2['responses_id']);
                $responses_text = $responses->gettext();
                
                $return_array_2['responses_text'] = $responses_text;
                $return_array_2['interaction_id'] = $return_array['id'];
                $return_array_2['command_position'] = $return_array['order'];
                $return_array_2['next_level_commands'] = $next_level_commands;

    
                    echo json_encode($return_array_2);
                }else{
    
                    $return_array_2['responses_id'] = 'no response';
                    $return_array_2['responses_text'] = 'no response';
                    $return_array_2['interaction_id'] = $return_array['id'];
                $return_array_2['command_position'] = $return_array['order'];
                     echo json_encode($return_array_2);
                }


            }else{

                $return_array_2['responses_id'] = 'command does not exist within a known interaction';
                $return_array_2['responses_text'] = 'command does not exist within a known interaction';
                 echo json_encode($return_array_2);

            }
            
            
            