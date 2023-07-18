<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-06-2020
 *
 * DJT 2022
 *
 * License: LGPL
 *
 */



if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}

//error_reporting(E_ALL);

//require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');


Class question_manager {

	
    private $connection;
    private $sessionView;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();

        require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
        $this->sessionView = new sessionView();
            
        require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');
        $this->programmeView = new programmeView;
	}

    /**
     * get a select2 box
     *
     */


     //define whether an asset has pre-test questions

     public function asset_has_pre_test_questions($assetid, $debug=false){

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '1')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            /* while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['user_id'];
            } */
        
            return true;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function asset_has_post_test_questions($assetid, $debug=false){

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '0')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            /* while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['user_id'];
            } */
        
            return true;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_asset_pre_test_questions($assetid, $debug=false){

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '1')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_choices_question($question_id, $debug=false){

        $q = "SELECT a.`id`
        FROM `choices` as a
        INNER JOIN `questions` as b on b.`id` = a.`question_id` 
        WHERE b.`id` = '$question_id'";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_choices_text($choice_id){


            $q = "SELECT *
            FROM `choices` as a 
            WHERE a.`id` = '$choice_id'
            ORDER BY `number` ASC";
            //echo $q;
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows == 1) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    
                return $row['text'];

                }
    
            } else {
                
    
                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                
                
                return false;
            }
    
    
        


    }

    public function is_choice_correct($choice_id){


        $q = "SELECT *
        FROM `choices` as a 
        WHERE a.`id` = '$choice_id'
        ORDER BY `number` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows == 1) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


            return $row['correct'];

            }

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    


}

    public function get_asset_pre_test_questions_formatted($assetid, $debug=false){

        //define array of a b c d e f g h i j k l m n

        if ($this->get_asset_pre_test_questions_number($assetid) > 0){

        $alphabet_array = [

            1 => 'a',
            2 => 'b',
            3 => 'c', 
            4 => 'd',
            5 => 'e',
            6 => 'f', 
            7 => 'g', 
            8 => 'h',


        ];

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '1')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $returnStatement = null;
        $x = 0;
        $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $question_text = '<br/>' . $row['question_order'] . '. ' . strip_tags($row['text']);

                    //get the choices

                    $choices_question = null;
                    $choices_question = $this->get_choices_question($row['id']);
                    //var_dump($choices_question);

                    foreach ($choices_question as $key=>$value){

                        $question_text .= '<br/>' . $alphabet_array[$key+1] .  '. ' . strip_tags($this->get_choices_text($value));


                    }
                    
                    $returnStatement .= $question_text . '<br/>';
                }
            
                return $returnStatement;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                
                
                return false;
            }

        }else{

        return 'There are no pre-test questions available';
         }


    }

    public function get_asset_test_questions_html_form($assetid, $pretest=true, $randomise=true, $debug=false){

        /* template
                
                <form>
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div>
        </form>
        
        */

        //define array of a b c d e f g h i j k l m n

        if ($this->get_asset_pre_test_questions_number($assetid) > 0){

        $alphabet_array = [

            1 => 'a',
            2 => 'b',
            3 => 'c', 
            4 => 'd',
            5 => 'e',
            6 => 'f', 
            7 => 'g', 
            8 => 'h',


        ];

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid')";

        if ($pretest){

            $q .= "AND (`pre` = '1')";
            $preposttext = 'pre';
        }else{

            $q .= "AND (`pre` = '0')";
            $preposttext = 'post';
        }


        if ($randomise){

            $q .= "ORDER BY RAND();";
        }else{

            $q .= "ORDER BY `question_order` ASC;";
        }
        
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $returnStatement = '<form id="' . $preposttext . '-test-form" data-asset-id="' . $assetid . '">';
        $x = 1;
        $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $question_text =  '<div class="form-group">';

                    if ($randomise){

                        $question_order_text = $x;

                    }else{

                        $question_order_text = $row['question_order'];
                    }

                    $question_text .= '<label for="' . $preposttext . 'question' . $row['id'] . '">' . $question_order_text . '. ' . strip_tags($row['text']) . '</label>';
                    $question_text .= '<select id="' . $preposttext . 'question' . $row['id'] . '" name="' . $preposttext . 'question' . $row['id'] . '" class="form-control question" data-question-id="' . $row['id'] . '">';
                    $question_text .= '<option disabled selected>Please select an option...</option>';
                    //get the choices

                    $choices_question = null;
                    $choices_question = $this->get_choices_question($row['id']);
                    //var_dump($choices_question);

                    foreach ($choices_question as $key=>$value){

                        $question_text .= '<option value="' . $value . '" data-choice-id="' . $value . '" data-choice-correct="' . $this->is_choice_correct($value) . '">' . $alphabet_array[$key+1] .  '. ' . strip_tags($this->get_choices_text($value)) . '</option>';


                    }
                    
                    $returnStatement .= $question_text . '</select></div>';
                    $x++;
                }
            
                return $returnStatement . '</form>';

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                
                
                return false;
            }

        }else{

        return 'There are no ' . $preposttext . '-test questions available';
         }


    }

    public function get_asset_post_test_questions_formatted($assetid, $debug=false){

        //define array of a b c d e f g h i j k l m n

        if ($this->get_asset_post_test_questions_number($assetid) > 0){

        $alphabet_array = [

            1 => 'a',
            2 => 'b',
            3 => 'c', 
            4 => 'd',
            5 => 'e',
            6 => 'f', 
            7 => 'g', 
            8 => 'h',


        ];

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '0')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $returnStatement = null;
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $question_text = '<br/>' . $row['question_order'] . '. ' . strip_tags($row['text']);

                //get the choices

                $choices_question = null;
                $choices_question = $this->get_choices_question($row['id']);
                //var_dump($choices_question);

                foreach ($choices_question as $key=>$value){

                    $question_text .= '<br/>' . $alphabet_array[$key+1] .  '. ' . strip_tags($this->get_choices_text($value));


                }
                
                $returnStatement .= $question_text . '<br/>';
            }
        
            return $returnStatement;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }

    }else{

        return 'There are no post-test questions available';
    }


    }

/*     public function get_asset_post_test_questions_html_form($assetid, $debug=false){  obsolete since integrated into one function
 */



    

    public function get_asset_pre_test_questions_number($assetid, $debug=false){

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '1')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();

        return $nRows;


    }

    public function get_asset_post_test_questions_number($assetid, $debug=false){

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '0')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();

        return $nRows;


    }

    public function get_asset_post_test_questions($assetid, $debug=false){

        $q = "SELECT * FROM `questions`
        WHERE (`asset_id` = '$assetid') AND (`pre` = '0')
        ORDER BY `question_order` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['id'];
                $x++;
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_user_pre_test_responses($assetid, $user_id, $debug=false){

        $q = "SELECT b.`question_id` 
        FROM `responses` as a 
        INNER JOIN `choices` as b on b.`id` = a.`choice_id` 
        INNER JOIN `questions` as c on c.`id` = b.`question_id` 
        WHERE (c.`asset_id` = '$assetid') AND (a.`user_id` = '$user_id') AND (c.`pre` = '1') 
        ORDER BY c.`id` ASC";

        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['question_id'];
                $x++;
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_user_post_test_responses($assetid, $user_id, $debug=false){

        $q = "SELECT b.`question_id` 
        FROM `responses` as a 
        INNER JOIN `choices` as b on b.`id` = a.`choice_id` 
        INNER JOIN `questions` as c on c.`id` = b.`question_id` 
        WHERE (c.`asset_id` = '$assetid') AND (a.`user_id` = '$user_id') AND (c.`pre` = '0') 
        ORDER BY c.`id` ASC";

        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[$x] = $row['question_id'];
                $x++;
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_user_pre_test_correct($assetid, $user_id, $debug=false){

        $q = "SELECT b.`correct` 
        FROM `responses` as a 
        INNER JOIN `choices` as b on b.`id` = a.`choice_id` 
        INNER JOIN `questions` as c on c.`id` = b.`question_id` 
        WHERE (c.`asset_id` = '$assetid') AND (a.`user_id` = '$user_id') AND (c.`pre` = '1') 
        ORDER BY c.`id` ASC";

        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $x = $x + intval($row['correct']);
                
            }
        
            return $x;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function get_user_post_test_correct($assetid, $user_id, $debug=false){

        $q = "SELECT b.`correct` 
        FROM `responses` as a 
        INNER JOIN `choices` as b on b.`id` = a.`choice_id` 
        INNER JOIN `questions` as c on c.`id` = b.`question_id` 
        WHERE (c.`asset_id` = '$assetid') AND (a.`user_id` = '$user_id') AND (c.`pre` = '0') 
        ORDER BY c.`id` ASC";

        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $x = $x + intval($row['correct']);
                
            }
        
            return $x;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            
            
            return false;
        }


    }

    public function has_user_completed_all_pre_test_questions($assetid, $user_id, $debug=false){

        //define array of pre-test questions

        $pre_test_all_array = $this->get_asset_pre_test_questions($assetid);

        if ($debug){

            var_dump($pre_test_all_array);
        }

        $pre_test_completed_array = $this->get_user_pre_test_responses($assetid, $user_id);


        if ($debug){

            var_dump($pre_test_completed_array);
        }

        //ensure the arrays contain the same numbers whatever the orders

        //cover if no responses

        if (empty($pre_test_completed_array)){

            return false;

        }else{

            if (empty(array_diff($pre_test_all_array, $pre_test_completed_array))){

                //all completed

                return true;

            }else{

                return false;
            }

       }


        //$post_test_completed_array = $this->get_user_post_test_responses($assetid, $user_id);



    }

    public function return_user_uncompleted_pre_test_questions($assetid, $user_id, $debug=false){

        //define array of pre-test questions

        $pre_test_all_array = $this->get_asset_pre_test_questions($assetid);

        if ($debug){

            var_dump($pre_test_all_array);
        }

        $pre_test_completed_array = $this->get_user_pre_test_responses($assetid, $user_id);


        if ($debug){

            var_dump($pre_test_completed_array);
        }

        //ensure the arrays contain the same numbers whatever the orders

        if (empty(array_diff($pre_test_all_array, $pre_test_completed_array))){

            //all completed

            return false;

        }else{

            return array_diff($pre_test_all_array, $pre_test_completed_array);
        }


        //$post_test_completed_array = $this->get_user_post_test_responses($assetid, $user_id);



    }

    

    public function has_user_completed_all_post_test_questions($assetid, $user_id, $debug=false){


        //returns true if there are NO pre test questions

        //define array of pre-test questions

        $post_test_all_array = $this->get_asset_post_test_questions($assetid);

        if ($debug){

            var_dump($post_test_all_array);
        }

        $post_test_completed_array = $this->get_user_post_test_responses($assetid, $user_id);


        if ($debug){

            var_dump($post_test_completed_array);
        }

        //ensure the arrays contain the same numbers whatever the orders

        if (empty($post_test_completed_array)){

            return false;

        }else{

        if (empty(array_diff($post_test_all_array, $post_test_completed_array))){

            //all completed

            return true;

        }else{

            return false;
        }

        }


        //$post_test_completed_array = $this->get_user_post_test_responses($assetid, $user_id);



    }

    public function return_uncompleted_user_post_test_questions($assetid, $user_id, $debug=false){


        //returns true if there are NO pre test questions

        //define array of pre-test questions

        $post_test_all_array = $this->get_asset_post_test_questions($assetid);

        if ($debug){

            var_dump($post_test_all_array);
        }

        $post_test_completed_array = $this->get_user_post_test_responses($assetid, $user_id);


        if ($debug){

            var_dump($post_test_completed_array);
        }

        //ensure the arrays contain the same numbers whatever the orders

        if (empty(array_diff($post_test_all_array, $post_test_completed_array))){

            //all completed

            return false;

        }else{

            return array_diff($post_test_all_array, $post_test_completed_array);
        }


        //$post_test_completed_array = $this->get_user_post_test_responses($assetid, $user_id);



    }
    

    public function Load_records_limit_json_datatables($y, $x = 0, $tokenid, $institution_id)
            {
            $q = "SELECT `id` FROM `subscriptions` WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=" . $tokenid . "%' AND `gateway_transactionId` LIKE '%INSTITUTIONAL_ID=" . $institution_id . "%')";
            //echo $q;
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return $rowReturn;

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return $rowReturn;
            }

        }


    public function getUsersToken($tokenid, $debug=false){

        $q = "SELECT * FROM `subscriptions` WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=$tokenid%') GROUP BY `user_id` ORDER BY `start_date` ASC";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['user_id'];
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['data'] = [];
            
            return $rowReturn;
        }


    }

    public function getTokensInstitution($institution_id, $debug=false){

        $q = "SELECT `id` FROM `token` WHERE `institutional_id` = '$institution_id'";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['id'];
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['data'] = [];
            
            return $rowReturn;
        }

    }

    public function getUsersInstitution($institution_id, $debug=false){

        $q = "SELECT `user_id` FROM `institution_user` WHERE `institution_id` = '$institution_id'";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['user_id'];
            }
        
            return $rowReturn;

        } else {
            

            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['data'] = [];
            
            return $rowReturn;
        }

    }

    public function getInstitutionUser ($user_id, $debug){

        //supports more than one

        $q = "SELECT `institution_id` FROM `institution_user` WHERE `user_id` = '$user_id'";
        //echo $q;
        $result = $this->connection->RunQuery($q);
        $rowReturn = array();
        $x = 0;
        $nRows = $result->rowCount();
        if ($nRows > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $rowReturn[] = $row['institution_id'];
            }
        
            return $rowReturn;

        } else {
            
/* 
            //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
            $rowReturn['data'] = []; */
            
            return false;
        }



    }

    public function duplicatePreTestQuestion ($question_id, $debug=false){


        $q = "CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM `questions` WHERE `id` = '$question_id';
        UPDATE tmptable_1 SET `id` = NULL;
        UPDATE tmptable_1 SET `pre` = '0';
        INSERT INTO `questions` SELECT * FROM tmptable_1;
        DROP TEMPORARY TABLE IF EXISTS tmptable_1;";

        $result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();

        if ($nRows > 0) {

            return true;
        }else{

            return false;
        }

    }






    
    

  

    

        





	
    /**
     * Close mysql connection
     */
	public function endquestion_manager (){
		$this->connection->CloseMysql();
	}

}