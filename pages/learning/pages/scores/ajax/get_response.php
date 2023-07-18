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
			

    
            $json_data = file_get_contents('php://input');

            $data = json_decode($json_data, true);

            // create & initialize a curl session
            $curl = curl_init();

            // set our url with curl_setopt()
            curl_setopt($curl, CURLOPT_URL, "api.example.com");

            // return the transfer as a string, also with setopt()
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            // curl_exec() executes the started curl session
            // $output contains the output string
            $output = curl_exec($curl);

            // close curl resource to free up system resources
            // (deletes the variable made by curl_init)
            curl_close($curl);


            function callAPI($method, $url, $data){
                $curl = curl_init();
                switch ($method){
                   case "POST":
                      curl_setopt($curl, CURLOPT_POST, 1);
                      if ($data)
                         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                      break;
                   case "PUT":
                      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                      if ($data)
                         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
                      break;
                   default:
                      if ($data)
                         $url = sprintf("%s?%s", $url, http_build_query($data));
                }
                // OPTIONS:
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                   'APIKEY: 111111111111111111111',
                   'Content-Type: application/json',
                ));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                // EXECUTE:
                $result = curl_exec($curl);
                if(!$result){die("Connection Failure");}
                curl_close($curl);
                return $result;
             }

             $make_call = callAPI('POST', 'http://13.39.22.177/is-curative', json_encode($data));
            //$response = json_decode($make_call, true);

            echo $make_call;

             //print_r($response);


            //$errors   = $response['response']['errors'];
            //$data     = $response['response']['data'][0];

            exit();

            //from site https://weichie.com/blog/curl-api-calls-with-php/#:~:text=PHP%20cURL%20GET%20request,data%20with%20a%20GET%20call.

            

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
            //print_r($return_array);

            if ($return_array != false){


            //returning the next response id
            $return_array_2 = $box_code->get_next_response_given_interaction_id_and_order($return_array['id'], $return_array['order']);

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
            
            
            