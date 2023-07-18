<?php

			$openaccess = 1;
			//$requiredUserLevel = 1; //superuser only script
			
			require ('../../includes/config.inc.php');		
			
            //require (BASE_URI1.'/scripts/headerCreatorV2.php');
            
  

            $formv1 = new formGenerator;
            $general = new general;
            $helpers = new helpers;

            $data = json_decode(file_get_contents('php://input'), true);

            

            $containerDatabase = "esdv1";

                $namedatabase = "POEM";
                $nameValueListDatabase = "valuesPOEM";
                $namePageLayoutDatabase = "pageLayoutPOEM";

                $databasesToBackup = [$namedatabase, $nameValueListDatabase, $namePageLayoutDatabase];

                print_r($databasesToBackup);

                //backup databases

                print_r($data);


                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $user = 'root';
                $pass = 'nevira1pine';
                $host = 'localhost';

                foreach ($databasesToBackup as $key=>$value){

                    $dir = BASE_URI1 . '/changes/sql/'.$containerDatabase. '_'. $value. '_backup_' .date("j_n_Y_gi"). '.sql';

                    echo "<p>Backing up database to `<code>{$dir}</code>`</p>";

                    exec("/Applications/XAMPP/xamppfiles/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$containerDatabase} {$value} --result-file={$dir} 2>&1", $output);

                }
                //$containerDatabase = 'esdv1';
                
                

                //var_dump($output);

                //insert a database entry
                $databaseField = [ 'name' => 'POEM', 'type' => ''];


                //insert a matching entry in the page layout
                $pageLayout = [ 'name' => '[[from above]]', 'position' => '', 'order' => '', 'type' => '', 'text' => '', 'toolTip' => ''];


                //insert, if required a value list entry
                $valueList = [ 'name' => '[[from above]]', 'options' => [ '0' => 'option0', '' => '']];

                print_r($valueList);
                
                
                //update changelog

                

                $log = date("F j, Y, g:i a") . PHP_EOL;
                $log .= "User with ID " . $_SESSION['user_id'] . " Created a new database field in $namedatabase of {$databaseField['name']}" . PHP_EOL;

                $log .= "Created a page layout entry $namePageLayoutDatabase at position {$pageLayout['position']}, order {$pageLayout['order']} of type {$pageLayout['type']} with text {$pageLayout['text']} and tooltip {$pageLayout['toolTip']}" . PHP_EOL;
                $log .= "Created a values list entry in $valueList with headings {$valueList['name']} and {$valueList['name']}_t" . PHP_EOL;
                $log .= "Included options were" . PHP_EOL;
                foreach($valueList['options'] as $key=>$value){

                    $log .= "$key = $value,";

                }

                echo '<br/><br/>';
                print_r($log);

                print_r(BASE_URI1 . '/changes/databaseModifications.log');

                file_put_contents(BASE_URI1 . '/changes/databaseModifications.log', $log, FILE_APPEND);
                