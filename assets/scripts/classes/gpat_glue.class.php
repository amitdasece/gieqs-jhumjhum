<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 17-10-2021
 *
 * DJT 2021
 *
 * License: LGPL
 *
 */



if ($_SESSION) {

    if ($_SESSION['debug'] == true) {

        error_reporting(E_ALL);

    } else {

        error_reporting(0);

    }
}

error_reporting(E_ALL);

class gpat_glue extends gpat_score
{

    private $id; //int(11)

    private $connection;

    public function __construct()
    {
        require_once 'DatabaseMyssqlPDOLearning.class.php';

        $this->connection = new DataBaseMysqlPDOLearning();
    }

    /*housekeeping */

    //determine report card number

    public function determineReportCardNumber ($id, $userid)
    {
        //little boy
        //output number of report card in sequential order via created field
        //false if no report card for this user


        $q = "SELECT `id`, `created` FROM `gpat_score` WHERE `user_id` = '$userid' ORDER BY `created` ASC";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $x++;

                if ($row['id'] == $id){

                    return $x;
                }

                //$rowReturn[] = $row['fraction'];
                


            }

            //return $x;

        } else {
            

            return false;
        }


    }

    public function determineNumberofReportCards ($userid)
    {
        //little boy
        //output number of report card in sequential order via created field
        //false if no report card for this user


        $q = "SELECT `created` FROM `gpat_score` WHERE `user_id` = '$userid' ORDER BY `created` ASC";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                //$rowReturn[] = $row['fraction'];
                $x++;


            }

            return $x;

        } else {
            

            return false;
        }


    }

    public function checkUserOwnsGPAT ($userid, $id, $debug=false)
    {
        //little boy
        //output number of report card in sequential order via created field
        //false if no report card for this user


        $q = "SELECT `id` FROM `gpat_score` WHERE `user_id` = '$userid' AND `id` =  '$id' ORDER BY `created` ASC";

        echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            if ($debug){

                echo '1+ records match this user id combination';
            }
            return true;

        } else {
            
            if ($debug){

                echo 'No records match this id user combination';
            }

            return false;
        }


    }

    public function determineNumberofCompleteReportCards ($userid)
    {
        //little boy
        //output number of report card in sequential order via created field
        //false if no report card for this user


        $q = "SELECT `created` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` =  '1' ORDER BY `created` ASC";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                //$rowReturn[] = $row['fraction'];
                $x++;


            }

            return $x;

        } else {
            

            return 0;
        }


    }

    public function determineNumberofIncompleteReportCards ($userid)
    {
        //little boy
        //output number of report card in sequential order via created field
        //false if no report card for this user


        $q = "SELECT `created` FROM `gpat_score` WHERE (`user_id` = '$userid') AND (`complete` =  '0' OR `complete` IS NULL) ORDER BY `created` ASC";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                //$rowReturn[] = $row['fraction'];
                $x++;


            }

            return $x;

        } else {
            

            return false;
        }


    }


    //individual score SMSA weighting (probably should be saved and done when saving or will be extensive processing here)

    /*

    use the SMSA to weight the fraction score 

    

    */

    public function weight_fraction_score($fraction, $SMSA){

        //options SMSA 2, 3, 4, 5 (plus)

        if ($SMSA == 1){

            return false;
        }else if ($SMSA == 2){

            $weightedFraction = $fraction * 0.25;

        }else if ($SMSA == 3){

            $weightedFraction = $fraction * 0.5;

        }else if ($SMSA == 4){

            $weightedFraction = $fraction * 0.75;

        }else if ($SMSA == 5){

            $weightedFraction = $fraction;

        }else{

            return false;
        }

        return $weightedFraction;


    }



    //calculate all time fraction

    //get scores for this user

    public function getUserFractionNonWeighted($userid, $last3, $debug){

        // $last3  1 = last 3 moths, 2 = before last 3 , 3 = all data

        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        $sql_date = $date_today->format('Y-m-d');



        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` >= \'' . $sql_date . '\'';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date . '\'';

        }elseif ($last3 == 3) {

            $last3text = '';
        } else {

            $last3text = '';
        }

        $q = "SELECT `fraction` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` = '1' $last3text";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row['fraction'];


            }

            return $rowReturn;

        } else {
            

            return false;
        }

    






    }

    public function getUserFractionWeighted($userid, $last3, $debug){

        // $last3  1 = last 3 moths, 2 = before last 3 , 3 = all data
        // only complete procedures

        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        $sql_date = $date_today->format('Y-m-d');



        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` >= \'' . $sql_date . '\'';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date . '\'';

        }elseif ($last3 == 3) {

            $last3text = '';
        } else {

            $last3text = '';
        }

        $q = "SELECT `weighted_fraction` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` = '1' $last3text";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row['weighted_fraction'];


            }

            return $rowReturn;

        } else {
            

            return false;
        }

    






    }

    public function getDeltaWeightedFraction($userid, $last3, $debug){

        // $last3  1 = last 3 months, 2 = LAST MONTH , 3 = LAST YEAR
        // only complete procedures

        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        
        
        $sql_date_3_months_ago = $date_today->format('Y-m-d');

        $date_today = new DateTime();
        $interval = new DateInterval('P1M');
        $date_today->sub($interval);


        $sql_date_1_month_ago = $date_today->format('Y-m-d');


        $date_today = new DateTime();
        $interval = new DateInterval('P1Y');
        $date_today->sub($interval);


        $sql_date_1_year_ago = $date_today->format('Y-m-d');

        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` < \'' . $sql_date_3_months_ago . '\'';
            $last3textcomparator = 'AND `date_procedure` >= \'' . $sql_date_3_months_ago . '\'';
            $last3debugtext = 'Last 3 month change GPAT';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date_1_month_ago . '\'';
            $last3textcomparator = 'AND `date_procedure` >= \'' . $sql_date_1_month_ago . '\'';
            $last3debugtext = 'Last 1 month change GPAT';


        }elseif ($last3 == 3) {

            $last3text = 'AND `date_procedure` < \'' . $sql_date_1_year_ago . '\'';
            $last3textcomparator = 'AND `date_procedure` >= \'' . $sql_date_1_year_ago . '\'';
            $last3debugtext = 'Last 1 year change GPAT';


        } else {

            $last3text = '';
        }

        if ($debug){

            echo 'Runing Query to determine' . $last3debugtext;

        }

        $q = "SELECT `weighted_fraction` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` = '1' $last3text";
        $q2 = "SELECT `weighted_fraction` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` = '1' $last3textcomparator";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($debug){

            echo 'to subtract query was';
            echo ' ' . $q; 

        }

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row['weighted_fraction'];


            }

            $tosubtract = $this->averageArray($rowReturn, $debug); 

        } else {
            
            if ($debug){

                echo 'There was no data to subtract';
                echo '<br/>' . $last3debugtext;

                echo 'Query was ' . $q;

            }
            return false;
        }

        $rowReturn = [];

        $result2 = $this->connection->RunQuery($q2);
        
        $x = 0;
        $nRows = $result2->rowCount();

        if ($debug){

            echo 'to start query was';
            echo ' ' . $q2; 

        }

        if ($nRows > 0) {

            while($row = $result2->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row['weighted_fraction'];


            }

            if ($debug){

                print_r($rowReturn);
            }
            $tostart = $this->averageArray($rowReturn, $debug); 

        } else {
            
            if ($debug){

                echo 'There was no data to start';
                echo '<br/>' . $last3debugtext;
                echo 'Query was ' . $q2;

            }

            return false;
        }    



        return floatval($tostart - $tosubtract); //need to get a - or + sign here TODO


    }

    public function averageArray($array, $debug=false){

        error_reporting(E_ALL);

        $x=0;

        $sum = 0;

        //echo 'hello';
        if (is_array($array)){

        foreach ($array as $key=>$value){

            if (is_numeric($value)){
            $sum = $sum + floatval($value);

            $x++;
            }

        }

        if ($debug){

            echo '$x is ' . $x;
            echo '<br/>';
            echo '$sum is ' . $sum;
            echo '<br/>';
            echo '<br/>';
        }


        return round($sum / $x, 2);

        }else{

            return 'no data';
        }

    }

    public function doesUserHave30CompleteProcedures($userid, $debug=false){

        if ($this->determineNumberofCompleteReportCards($userid) >= 30){

            return true;

        }else{

            return false;
        }

    }

    public function statusText ($userid){

        if ($this->doesUserHave30CompleteProcedures($userid) === false){

            $proceduresRequired = 30 - $this->determineNumberofCompleteReportCards($userid);

            $statement = 'You require ' . $proceduresRequired . ' more procedures to start Certification';

        }

        if ($this->doesUserHave30CompleteProcedures($userid) === true){

            
            $weighted_gpat = $this->averageArray($this->getUserFractionWeighted($userid, 3, false), false);

            //testing

            //$weighted_gpat = 0.87;

            if ($weighted_gpat >= 0 && $weighted_gpat < 0.13){

                $statement = 'Score Insufficient to Credential';

            }else if ($weighted_gpat >= 0.13 && $weighted_gpat < 0.38){

                $statement = 'SMSA 2 Credentialled';

            }else if ($weighted_gpat >= 0.38 && $weighted_gpat < 0.63){

                $statement = 'SMSA 3 Credentialled';

            }else if ($weighted_gpat >= 0.63 && $weighted_gpat < 0.88){

                $statement = 'SMSA 4 Credentialled';

            }else if ($weighted_gpat >= 0.88){

                $statement = 'SMSA + Credentialled';

            }


        }



        return $statement;

    }

    public function certificationText ($userid){

        //obsolete

        if ($this->doesUserHave30CompleteProcedures($userid) === false){

            $proceduresRequired = 30 - $this->determineNumberofCompleteReportCards($userid);

            $statement = 'Uncertified in Polypectomy.  Ineligible to start Certification';

        }

        if ($this->doesUserHave30CompleteProcedures($userid) === true){

            
            $weighted_gpat = $this->averageArray($this->getUserFractionWeighted($userid, 3, false), false);

            //testing

            //$weighted_gpat = 0.87;

            if ($weighted_gpat >= 0 && $weighted_gpat < 0.13){

                $statement = 'GPAT Insufficient to start SMSA 2 Certification';

            }else if ($weighted_gpat >= 0.13 && $weighted_gpat < 0.38){

                $statement = 'SMSA 2 Certification Eligible';

            }else if ($weighted_gpat >= 0.38 && $weighted_gpat < 0.63){

                $statement = 'SMSA 3 Certification Eligible';

            }else if ($weighted_gpat >= 0.63 && $weighted_gpat < 0.88){

                $statement = 'SMSA 4 Certification Eligible';

            }else if ($weighted_gpat >= 0.88){

                $statement = 'SMSA + Certification Eligible';

            }


        }



        return $statement;

    }

    public function howDoICertify ($userid){

        $statement = [];

        if ($this->doesUserHave30CompleteProcedures($userid) === false){

            $proceduresRequired = 30 - $this->determineNumberofCompleteReportCards($userid);

            $statement['currentcertificationstatus'] = 'Uncertified in Polypectomy.  <br/>Ineligible to start Certification';
            $statement['howdoi'] = 'Complete 30 GPAT Assessments';
            $statement['deltagpat'] = 'n/a';

        }

        if ($this->doesUserHave30CompleteProcedures($userid) === true){

            
            $weighted_gpat = $this->averageArray($this->getUserFractionWeighted($userid, 3, false), false);

            //testing

            //$weighted_gpat = 0.87;

            if ($weighted_gpat >= 0 && $weighted_gpat < 0.13){

                $statement['currentcertificationstatus'] = 'GPAT Insufficient to start SMSA 2 Certification';
                $statement['howdoi'] = 'Attain a Weighted GPAT &ge; to 0.13 to become eligible for SMSA 2';
                $statement['deltagpat'] = 0.13 - $weighted_gpat;


            }else if ($weighted_gpat >= 0.13 && $weighted_gpat < 0.38){

                $statement['currentcertificationstatus'] = 'SMSA 2 Certification Eligible';
                $statement['howdoi'] = 'Attain a Weighted GPAT &ge; to 0.38 to become eligible for SMSA 3';
                $statement['deltagpat'] = 0.38 - $weighted_gpat;


            }else if ($weighted_gpat >= 0.38 && $weighted_gpat < 0.63){

                $statement['currentcertificationstatus'] = 'SMSA 3 Certification Eligible';
                $statement['howdoi'] = 'Attain a Weighted GPAT &ge; to 0.63 to become eligible for SMSA 4';
                $statement['deltagpat'] = 0.63 - $weighted_gpat;


            }else if ($weighted_gpat >= 0.63 && $weighted_gpat < 0.88){

                $statement['currentcertificationstatus'] = 'SMSA 4 Certification Eligible';
                $statement['howdoi'] = 'Attain a Weighted GPAT &ge; to 0.88 to become eligible for SMSA +';
                $statement['deltagpat'] = 0.88 - $weighted_gpat;


            }else if ($weighted_gpat >= 0.88){

                $statement['currentcertificationstatus'] = 'SMSA + Certification Eligible';
                $statement['howdoi'] = 'You are eligible for SMSA+ certification';
                $statement['deltagpat'] = 'n/a';


            }


        }



        return $statement;

    }

    public function getSMSAUserReportCards($userid, $last3, $numberOrWeight, $returnType, $debug=false){

        // $last3  1 = last 3 months, 2 = before last 3 , 3 = all data
        // $numberOrWeight 1 = numbers, 2 = weights
        // $returnType 1 = standard array , 2 = datapoints for chart


        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        $sql_date = $date_today->format('Y-m-d');



        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` >= \'' . $sql_date . '\'';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date . '\'';

        }elseif ($last3 == 3) {

            $last3text = '';
        } else {

            $last3text = '';
        }

        $q = "SELECT `SMSA_group`, `numeratorSMSAplus`, `fraction` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` = '1' $last3text";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        $SMSA2 = 0;
        $SMSA3 = 0;
        $SMSA4 = 0;
        $SMSAplus = 0;

        //of course  these  are actually unweighted

        $SMSA2weightedgpat = [];
        $SMSA3weightedgpat = [];
        $SMSA4weightedgpat = [];
        $SMSAplusweightedgpat = [];


        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){


                if ($row['numeratorSMSAplus'] > 0){

                    $SMSAplus = $SMSAplus + 1;
                    $SMSAplusweightedgpat[] = $row['fraction'];
                    
                }else{

                    if ($row['SMSA_group'] == 2){

                        $SMSA2 = $SMSA2 + 1;
                        $SMSA2weightedgpat[] = $row['fraction'];


                    }

                    if ($row['SMSA_group'] == 3){

                        $SMSA3 = $SMSA3 + 1;
                        $SMSA3weightedgpat[] = $row['fraction'];

                        
                    }

                    if ($row['SMSA_group'] == 4){

                        $SMSA4 = $SMSA4 + 1;
                        $SMSA4weightedgpat[] = $row['fraction'];

                        
                    }

                 }

            if (count($SMSA2weightedgpat) > 0){            
                $average_SMSA2weightedgpat = $this->averageArray($SMSA2weightedgpat);
            }else{

                $average_SMSA2weightedgpat = 'no data';
            }
            if (count($SMSA3weightedgpat) > 0){            

            $average_SMSA3weightedgpat = $this->averageArray($SMSA3weightedgpat);
            }else{

                $average_SMSA3weightedgpat = 'no data';
            }
            if (count($SMSA4weightedgpat) > 0){            

            $average_SMSA4weightedgpat = $this->averageArray($SMSA4weightedgpat);
            }else{

                $average_SMSA4weightedgpat = 'no data';
            }
            if (count($SMSAplusweightedgpat) > 0){            

            $average_SMSAplusweightedgpat = $this->averageArray($SMSAplusweightedgpat);
            }else{

                $average_SMSAplusweightedgpat = 'no data';
            }


                


            }

            if ($numberOrWeight == 1){


                if ($returnType == 1){

                    $dataPoints = [
                        
                        
                        'SMSA2'=>$SMSA2,
                        'SMSA3'=>$SMSA3,
                        'SMSA4'=>$SMSA4,
                        'SMSAplus'=>$SMSAplus,
                
                
                ];

                    return $dataPoints;

                }elseif ($returnType == 2){

                        $dataPoints = array( 
                            array("y" => $SMSA2, "label" => "SMSA 2" ),
                            array("y" => $SMSA3, "label" => "SMSA 3" ),
                            array("y" => $SMSA4, "label" => "SMSA 4" ),
                            array("y" => $SMSAplus, "label" => "SMSA +" ),
                            
                        );

                        return $dataPoints;

                }

            }elseif ($numberOrWeight == 2){

                if ($returnType == 1){

                    $dataPoints = [
                        
                        
                        'SMSA2weightedgpat'=>$average_SMSA2weightedgpat,
                        'SMSA3weightedgpat'=>$average_SMSA3weightedgpat,
                        'SMSA4weightedgpat'=>$average_SMSA4weightedgpat,
                        'SMSAplusweightedgpat'=>$average_SMSAplusweightedgpat,
                
                
                    ];

                    return $dataPoints;

                }elseif ($returnType == 2){

                        $dataPoints = array( 
                            array("y" => $average_SMSA2weightedgpat, "label" => "SMSA 2" ),
                            array("y" => $average_SMSA3weightedgpat, "label" => "SMSA 3" ),
                            array("y" => $average_SMSA4weightedgpat, "label" => "SMSA 4" ),
                            array("y" => $average_SMSAplusweightedgpat, "label" => "SMSA +" ),
                            
                        );

                        return $dataPoints;

                }

            }

        } else {
            

            return false;
        }



    }
    
    public function getDomainSpecificsReportCards($userid, $last3, $debug=false){

        // $last3  1 = last 3 moths, 2 = before last 3 , 3 = all data

        //define today
        $date_today = new DateTime();
        $interval = new DateInterval('P3M');
        $date_today->sub($interval);
        $sql_date = $date_today->format('Y-m-d');



        //-3m
        //convert to mysql string

        if ($last3 == 1){

            $last3text = 'AND `date_procedure` >= \'' . $sql_date . '\'';

        }elseif ($last3 == 2){

            $last3text = 'AND `date_procedure` < \'' . $sql_date . '\'';

        }elseif ($last3 == 3) {

            $last3text = '';
        } else {

            $last3text = '';
        }

        $q = "SELECT `global_numerator`, `injection_numerator`, `snare_numerator`, `safety_numerator`, `defect_numerator`, `accessory_numerator`, `global_denominator`, `injection_denominator`, `snare_denominator`, `safety_denominator`, `defect_denominator`, `accessory_denominator` FROM `gpat_score` WHERE `user_id` = '$userid' AND `complete` = '1' $last3text";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        $global = 0;
        $injection = 0;
        $snare = 0;
        $safety = 0;
        $defect = 0;
        $accessory = 0;

        $globalGPAT = [];
        $injectionGPAT = [];
        $snareGPAT = [];
        $safetyGPAT = [];
        $defectGPAT = [];
        $accessoryGPAT = [];



        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                //print_r($row);

                //check if denominator 0
                //if 0 do not include it and do not inc x

                if ($row['global_denominator'] > 0){

                $globalGPAT[] = $row['global_numerator'] / $row['global_denominator'];

                }

                if ($row['injection_denominator'] > 0){

                $injectionGPAT[] = $row['injection_numerator'] / $row['injection_denominator'];

                }
                
                if ($row['snare_denominator'] > 0){

                $snareGPAT[] = $row['snare_numerator'] / $row['snare_denominator'];

                }
                
                if ($row['safety_denominator'] > 0){

                $safetyGPAT[] = $row['safety_numerator'] / $row['safety_denominator'];

                }
                
                if ($row['defect_denominator'] > 0){

                $defectGPAT[] = $row['defect_numerator'] / $row['defect_denominator'];

                }
                
                if ($row['accessory_denominator'] > 0){

                $accessoryGPAT[] = $row['accessory_numerator'] / $row['accessory_denominator'];

                }
                
                $x++;

            }

            //work out averages

            $average_global = $this->averageArray($globalGPAT);
            $average_injection = $this->averageArray($injectionGPAT);
            $average_snare = $this->averageArray($snareGPAT);
            $average_safety = $this->averageArray($safetyGPAT);
            $average_defect = $this->averageArray($defectGPAT);
            $average_accessory = $this->averageArray($accessoryGPAT);



            //write array

            $dataPoints = array( 
                array("y" => $average_global, "label" => "Global" ),
                array("y" => $average_injection, "label" => "Injection" ),
                array("y" => $average_snare, "label" => "Snare Placement" ),
                array("y" => $average_safety, "label" => "Safety" ),
                array("y" => $average_defect, "label" => "Defect Assessment" ),
                array("y" => $average_accessory, "label" => "Accessory Use" ),
                
            );

            return $dataPoints;

        } else {
            

            return false;
        }



    }


    //per domain scoring

    /*

    //define domains
        global, injection, snare placement, safety checks, defect assessment, accessory techniques





    */

    public function returnDomainSpecificScore($gpatid, $domain){

        //global = 1, injection = 2, snare placement = 3, safety checks = 4, defect assessment = 5, accessory techniques = 6

        //write into java and save




    }

    //data split last 3 versus current 3

    //overall score

    //overall score weighted





    //datatables


    public function getUserLogbook ($userid, $debug=false)
    {
        //little boy
        //output number of report card in sequential order via created field
        //false if no report card for this user


        $q = "SELECT `id`, `user_gpat_id`, `date_procedure`, `fraction`, `weighted_fraction`, `SMSA_group`, `numeratorSMSAplus`, `complete` FROM `gpat_score` WHERE `user_id` = '$userid' /* AND `complete` =  '1' */ ORDER BY `date_procedure` DESC";

        //echo $q . '<br><br>';

        $rowReturn = [];

        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $rowReturn[] = $row;
                $x++;


            }

            return $rowReturn;

        } else {
            

            return false;
        }


    }


    
    //are there 30 records for the user (credentialling allowed)

    /**
     * Close mysql connection
     */
    public function endgpat_glue()
    {
        $this->connection->CloseMysql();
    }

}