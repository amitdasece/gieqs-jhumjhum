<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 21-06-2022
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
            session_start(); //do this
          }
          
          if ($_SESSION){
          
          if ($_SESSION['debug'] == true){
          
          error_reporting(E_ALL);
          
          }else{
          
          error_reporting(0);
          
          }
          }


Class curriculum_manager {

	
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
        require_once(BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php');
            $this->usersMetricsManager = new usersMetricsManager();

	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */

     public function getsectionscurriculum($id, $debug=false){



            $q = "SELECT `id`, CAST(`section_order` AS UNSIGNED), `long_name` FROM `curriculum_sections` WHERE `curriculum_id` ='$id' ORDER BY `section_order` ASC";
        
        //echo $q . '<br><br>';
        
        
        
        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();
        $rowReturn = [];

        if ($nRows > 0) {
        
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $rowReturn[$x] = $row['id'];
                $x++;
        
        
            }
        
        
            return $rowReturn;
        
        } else {
            
        
            if ($debug){
        
                echo 'no programmes contained within this asset';
            }
        
            return false;
        
            
        }
        
        
        
        
        



     }
     
     
     public function getitemssection($id, $debug=false){



            $q = "SELECT `id`, `section_id`, CAST(`item_order` AS UNSIGNED), `type`, `link_to_content`, `image_url`, `statement`, `evidence_level` FROM `curriculum_items` WHERE `section_id` = '$id'  ORDER BY `item_order` ASC";
        
        //echo $q . '<br><br>';
        
        
        
        $result = $this->connection->RunQuery($q);
        
        $x = 0;
        $nRows = $result->rowCount();
        $rowReturn = [];

        if ($nRows > 0) {
        
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
        
                $rowReturn[$x] = $row['id'];
                $x++;
        
        
            }
        
        
            return $rowReturn;
        
        } else {
            
        
            if ($debug){
        
                echo 'no programmes contained within this asset';
            }
        
            return false;
        
            
        }
        
        
        
        
        



     }

     public function getreferencescurriculumitem($id, $debug=false){



        $q = "SELECT `reference_id` FROM `curriculum_references` WHERE `curriculum_item_id` = '$id'";
    
    //echo $q . '<br><br>';
    
    
    
    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['reference_id'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 
    
    
    
    
    



 }

 public function getreferences($reference_id_array, $debug=false){


    $final_array = [];
    $x = 0;


    foreach ($reference_id_array as $key=>$value){

        $q = "SELECT `id`, `PMID`, `DOI`, `formatted`, `authors`, `journal` FROM `references` WHERE `id` = '$value'";


        $result = $this->connection->RunQuery($q);

        $nRows = $result->rowCount();
        $rowReturn = [];

        if ($nRows > 0) {

            while($row = $result->fetch(PDO::FETCH_ASSOC)){

                $final_array[$x] = $row['id'];
                $x++;


            }



        } 

    }

    return $final_array;
















}


public function gettagscurriculumitem($id, $debug=false){



    $q = "SELECT `tag_id` FROM `curriculum_tags` WHERE `curriculum_item_id` = '$id'";

    if ($debug){
echo $q . '<br><br>';

    }



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();
$rowReturn = [];

if ($nRows > 0) {

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $rowReturn[$x] = $row['tag_id'];
        $x++;


    }


    return $rowReturn;

}
else{
    return $rowReturn;
}  








}


public function counttagscurriculumitem($id, $debug=false){



    $q = "SELECT `tag_id` FROM `curriculum_tags` WHERE `curriculum_item_id` = '$id'";

    if ($debug){
echo $q . '<br><br>';

    }



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

return $nRows;








}

public function countBestPracticeVideos($id, $debug=false){


    $q = "SELECT `video_id` FROM `curriculum_demonstrations` WHERE `curriculum_item_id` = '$id'";

    if ($debug){
echo $q . '<br><br>';

    }



$result = $this->connection->RunQuery($q);

$x = 0;
$nRows = $result->rowCount();

return $nRows;

}

public function getVideoCurriculum($curriculum_item_id, $debug=false) {


    $q = "SELECT `video_id` FROM `curriculum_demonstrations` WHERE `curriculum_item_id` = '$curriculum_item_id'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $video_id = $row['video_id'];


        }


        return $video_id;

    }else{

        return false;
    }

    


}

public function getChapterCurriculum($curriculum_item_id, $debug=false) {


    $q = "SELECT `chapter_id` FROM `curriculum_demonstrations` WHERE `curriculum_item_id` = '$curriculum_item_id'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $chapter_id = $row['chapter_id'];


        }


        return $chapter_id;

    }else{

        return false;
    }

    


}

public function getChapterNumberCurriculum($chapterid, $debug=false) {


    $q = "SELECT `number` FROM `chapter` WHERE `id` = '$chapterid'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $chapter_number = $row['number'];


        }


        return $chapter_number;

    }else{

        return false;
    }

    


}

public function gettags($tag_id_array, $debug=false){


$final_array = [];
$x = 0;


foreach ($tag_id_array as $key=>$value){

    $q = "SELECT `id`, `curriculum_item_id`, `tag_id`, `created`, `updated` FROM `curriculum_tags` WHERE `id` = '$value'";


    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $final_array[$x] = $row['id'];
            $x++;


        }



    } 

}

return $final_array;
















}

public function getFullReferenceListCurriculumItem ($curriculum_item_id){

    //this for imageset then another for video, merge same and return

    $q = "SELECT a.`id` as curriculumitemid, c.`id` as `referenceid`, c.`authors`, c.`formatted`, c.`DOI`, c.`journal`, c.`PMID` 
    from `curriculum_items` as a 
    INNER JOIN `curriculum_references` as b on a.`id` = b.`curriculum_item_id` 
    INNER JOIN `references` as c on c.`id` = b.`reference_id`
    WHERE a.`id` = $curriculum_item_id
    ORDER BY c.`formatted` ASC";

    //echo $q;

    $references = '';
    $x = 1;
    $result = $this->connection->RunQuery($q);
    $nRows = $result->rowCount();


    if ($nRows > 0){

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $PMID = $row['PMID'];
            
            $references .= '<p class="referencelist cursor-pointer" style="font-size:1.0rem !important;" data="' . $PMID . '" data-id="' . $row['referenceid'] . '" style="text-align:left;" >' . $x . ' - ';
            
            $authors = explode( ',', $row['authors'] );
            $n = count($authors);
            $references .= $authors[0] . ', ' . $authors[1] . ', ' . $authors[$n-1];
            $references .= '. ';
            $references .= '<strong>' . $row['formatted'] . '</strong>';
            $references .= ' ';
            $references .= $row['journal'];
            $references .= ' ';
            if ($row['DOI'] <> ''){

                $references .= $row['DOI'];
                $references .= '.';
            }
            $references .= '</p>';
            
            
            $x++;
        }

        echo $references;
    }else{

        echo '<p style="text-align:left; font-size:1.0 !important;">No references yet</p>';
    }

    




}

public function countReferences ($curriculum_item_id){

    //this for imageset then another for video, merge same and return

    $q = "SELECT a.`id` as curriculumitemid, c.`authors`, c.`formatted`, c.`DOI`, c.`journal`, c.`PMID` 
    from `curriculum_items` as a 
    INNER JOIN `curriculum_references` as b on a.`id` = b.`curriculum_item_id` 
    INNER JOIN `references` as c on c.`id` = b.`reference_id`
    
    WHERE a.`id` = $curriculum_item_id
    
    ORDER BY c.`formatted` ASC";

    //echo $q;

    $references = '';
    $x = 1;
    $result = $this->connection->RunQuery($q);
    $nRows = $result->rowCount();

    return $nRows;


}

public function section_viewed_last_day ($curriculum_section_id, $user_id, $debug=false){


    //define current datetime

    $utcTimezone = new DateTimeZone('UTC');
    $currentDate = new DateTime('now', $utcTimezone);
    $currentDate->modify("-1 day");
    $sqlDate = $currentDate->format('Y-m-d H:i:s');

    //sql format

    $q = "SELECT `id`, `recentView` FROM `usersViewsCurriculumStatement` WHERE `curriculum_section_id` = '$curriculum_section_id' AND `user_id` = '$user_id' AND `recentView` > '$sqlDate'";
    if ($debug){
        echo $q;
    }

    $result = $this->connection->RunQuery($q);

    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        return TRUE; // was a view within last day

    }else{

        return false;  // no view within last day
    }


}

public function recordRecentCurriculumView ($section_array, $user_id, $debug=false) {

    $utcTimezone = new DateTimeZone('UTC');
    $currentDate = new DateTime('now', $utcTimezone);
    $sqlDate = $currentDate->format('Y-m-d H:i:s');

    //var_dump($section_array);

    foreach ($section_array as $key => $value){

        //echo 'in loop';

        if (!($this->section_viewed_last_day($value, $user_id, $debug))){ //no view within last day

            
            $q = "INSERT INTO `usersViewsCurriculumStatement`(`user_id`, `curriculum_section_id`, `recentView`) VALUES ('$user_id','$value','$sqlDate')";
            //echo $q;

            $result2 = $this->connection->RunQuery($q);


        }else{

            //echo 'wrong';
            //no view to record
        }



    }



}

public function recordRecentReferenceView ($reference_id, $user_id, $debug=false) {

    $utcTimezone = new DateTimeZone('UTC');
    $currentDate = new DateTime('now', $utcTimezone);
    $sqlDate = $currentDate->format('Y-m-d H:i:s');




            
            $q = "INSERT INTO `usersViewsReferences`(`user_id`, `reference_id`, `recentView`) VALUES ('$user_id','$reference_id','$sqlDate')";
            //echo $q;

            $result2 = $this->connection->RunQuery($q);





    



}

public function getAllCurriculumReferences ($curriculum_id){

    $q = "SELECT c.`id` as referenceid, c.`authors`, c.`formatted`, c.`DOI`, c.`journal`, c.`PMID` from `curriculum_items` as a INNER JOIN `curriculum_references` as b on a.`id` = b.`curriculum_item_id` INNER JOIN `references` as c on c.`id` = b.`reference_id` inner join `curriculum_sections` as d on d.`id` = `a`.`section_id` inner join `curriculae` as e on `e`.`id` = `d`.`curriculum_id` WHERE e.`id` = '$curriculum_id' GROUP BY c.`id` ORDER BY c.`formatted` ASC";


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['referenceid'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 


}

public function getAllCurriculumTags ($curriculum_id){

    $q = "SELECT a.`tag_id` FROM `curriculum_tags` as a INNER JOIN `curriculum_items` as b on a.`curriculum_item_id` = b.`id` INNER JOIN `curriculum_sections` as c on c.`id` = b.`section_id` INNER JOIN `curriculae` as d on d.`id` = c.curriculum_id WHERE d.`id` = '$curriculum_id' GROUP BY a.`tag_id`";


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['tag_id'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 



}

public function getAllCurriculumVideos ($curriculum_id){

    $q = "SELECT
    g.`id`
        FROM
            `curriculum_tags` AS a
        INNER JOIN `curriculum_items` AS b
        ON
            a.`curriculum_item_id` = b.`id`
        INNER JOIN `curriculum_sections` AS c
        ON
            c.`id` = b.`section_id`
        INNER JOIN `curriculae` AS d
        ON
            d.`id` = c.curriculum_id
        INNER JOIN `chapterTag` AS e
        ON
            `e`.`tags_id` = `a`.`tag_id`
        INNER JOIN `chapter` as f 
        ON
            f.`id` = `e`.`chapter_id`
        INNER JOIN `video` as g
        ON 
            g.`id` = `f`.`video_id`
        WHERE d.`id`='$curriculum_id'
        GROUP BY g.`id`";


    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 



}

public function getAllBestPracticeCurriculumVideos ($curriculum_id){


    $q = "SELECT a.`video_id` FROM `curriculum_demonstrations` as a INNER JOIN `curriculum_items` AS b ON a.`curriculum_item_id` = b.`id` INNER JOIN `curriculum_sections` AS c ON c.`id` = b.`section_id` INNER JOIN `curriculae` AS d ON d.`id` = c.curriculum_id WHERE d.`id` = '$curriculum_id'";

    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['video_id'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 

}

public function getAllActiveCurricula (){


    $q = "SELECT `id`, `name`, `long_name`, `description` FROM `curriculae` WHERE `active` = '1'";

    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
    
        return $rowReturn;
    
    } 

}

public function getAllCurriculumOpensEverUser ($user_id){

    $q = "SELECT c.`id` FROM `usersViewsCurriculumStatement` as a INNER JOIN `curriculum_sections` AS b ON b.`id` = a.`curriculum_section_id` INNER JOIN `curriculae` AS c ON c.`id` = `b`.`curriculum_id` WHERE `user_id` = '$user_id' GROUP BY c.`id` ORDER BY `recentView` DESC";

    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
    
        return $rowReturn; //returns array of curriculum ids
    
    }else{

        return false;

    }



}

public function getAllCurriculumOpensEverUserSpecificCurriculum ($user_id, $curriculum_id){

    $q = "SELECT
        a.`id`, a.`recentView`
        FROM
            `usersViewsCurriculumStatement` as a
        INNER JOIN `curriculum_sections` AS b
        ON
            b.`id` = a.`curriculum_section_id`
        INNER JOIN `curriculae` AS c
        ON
            c.`id` = `b`.`curriculum_id`
        WHERE `user_id` = '$user_id' AND c.`id` = '$curriculum_id'
        ORDER BY `recentView` DESC";

    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn[$x] = $row['id'];
            $x++;
    
    
        }
    
    
        return $rowReturn; //returns array of curriculum ids
    
    }else{

        return false;

    }



}

public function getAllCurriculumOpensEverUserSpecificCurriculum_perday ($user_id, $curriculum_id){

    $q = "SELECT
        DATE_FORMAT(a.`recentView`, '%Y-%m-%d') AS date, count(a.`id`) as count
        FROM
            `usersViewsCurriculumStatement` as a
        INNER JOIN `curriculum_sections` AS b
        ON
            b.`id` = a.`curriculum_section_id`
        INNER JOIN `curriculae` AS c
        ON
            c.`id` = `b`.`curriculum_id`
        WHERE `user_id` = '$user_id' AND c.`id` = '$curriculum_id'
        GROUP BY `date`
        ";

    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();

    return $nRows;
    /* $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $count = $row['count'];
            return $count;
    
        }
    
    
        return $rowReturn; //returns array of curriculum ids
    
    }else{

        return false;

    } */



}

public function count_all_sections ($curriculum_id){

    $q = "SELECT
    count(a.`id`) as `count`
    FROM
        `curriculum_sections` as a 
    INNER JOIN 
        `curriculae` as b on `b`.`id` = `a`.`curriculum_id`
    WHERE
        b.`id` = '$curriculum_id'";

    $result = $this->connection->RunQuery($q);

    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $count = $row['count'];


        }


        return $count;

    }else{

        return false;

    }


}

public function count_user_viewed_sections ($user_id, $curriculum_id){


    $q = "SELECT
    count(DISTINCT b.`id`) as `count`
        FROM
            `usersViewsCurriculumStatement` as a
        INNER JOIN `curriculum_sections` AS b
        ON
            b.`id` = a.`curriculum_section_id`
        INNER JOIN `curriculae` AS c
        ON
            c.`id` = `b`.`curriculum_id`
        WHERE `user_id` = '$user_id' AND c.`id` = '$curriculum_id'
        ORDER BY `recentView` DESC";

    $result = $this->connection->RunQuery($q);

    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $count = $row['count'];


        }


        return $count;

    }else{

        return false;

    }

}

public function getCompletionVideos ($user_id, $video_array){

    //takes an array of video ids

    $tagged_videos_denominator = count($video_array);

    //var_dump($video_array);

    $video_completion_user = [];

    $overall_video_completion = 0;

    $completion = 0;


    foreach ($video_array as $key => $value){

        $completion = null;

        $completion = round($this->usersMetricsManager->userCompletionVideo($user_id, $value), 1);

        $video_completion_user[$value] = $completion;

        $overall_video_completion += $completion;

    }

    $overall_video_completion_final = $overall_video_completion / $tagged_videos_denominator;

    return [

        'numerator' => $overall_video_completion,
        'denominator' => $tagged_videos_denominator,
        'completion' => $overall_video_completion_final,


    ];


}

public function user_viewed_references ($user_id, $curriculum_id){

    $q = "SELECT
    count(DISTINCT
    c.`id`) as `count`
FROM
    `usersViewsReferences` as a 
INNER JOIN
	`curriculum_references` as b on `b`.`reference_id` = a.`reference_id`
INNER JOIN
	`references` as c on c.`id` = `b`.`reference_id`
INNER JOIN
	`curriculum_items` as d on `d`.`id` = `b`.`curriculum_item_id`
INNER JOIN 
	`curriculum_sections` as e on `e`.`id` = `d`.`section_id`
INNER JOIN
	`curriculae` as f on `f`.`id` = e.`curriculum_id`
WHERE `a`.`user_id` = '1' AND f.`id` = '5'
ORDER BY `a`.`recentView` DESC;c.`id`) as `count`
FROM
    `usersViewsReferences` as a 
INNER JOIN
	`curriculum_references` as b on `b`.`reference_id` = a.`reference_id`
INNER JOIN
	`references` as c on c.`id` = `b`.`reference_id`
INNER JOIN
	`curriculum_items` as d on `d`.`id` = `b`.`curriculum_item_id`
INNER JOIN 
	`curriculum_sections` as e on `e`.`id` = `d`.`section_id`
INNER JOIN
	`curriculae` as f on `f`.`id` = e.`curriculum_id`
WHERE `a`.`user_id` = '$user_id' AND f.`id` = '$curriculum_id'
ORDER BY `a`.`recentView` DESC";

    $result = $this->connection->RunQuery($q);

    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            $count = $row['count'];


        }


        return $count;

    }else{

        return false;

    }



}

public function getCurriculumInfo ($curriculum_id){

    $q = "SELECT `id`, `name`, `long_name`, `description`, `active`, `owner`, `created`, `updated` FROM `curriculae` WHERE `id` = '$curriculum_id'";

    $result = $this->connection->RunQuery($q);
    
    $x = 0;
    $nRows = $result->rowCount();
    $rowReturn = [];

    if ($nRows > 0) {
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
            $rowReturn['id'] = $row['id'];
            $rowReturn['name'] = $row['name'];
            $rowReturn['long_name'] = $row['long_name'];
            $rowReturn['description'] = $row['description'];
    
    
        }
    
    
        return $rowReturn; //returns array of curriculum ids
    
    }else{

        return false;

    }


}

public function curriculum_completion_stats_user ($user_id, $debug=false){


    $returnArray = [];

    $user_accessed_curriculae = $this->getAllCurriculumOpensEverUser($user_id);

    foreach ($user_accessed_curriculae as $key=>$value){




        $returnArray[$value] = [
            'curriculum_name' => $this->getCurriculumInfo($value)['name'],
            'statement_views' => count($this->getAllCurriculumOpensEverUserSpecificCurriculum($user_id, $value)), 
            'views_per_day' => $this->getAllCurriculumOpensEverUserSpecificCurriculum_perday($user_id, $value),
            'statement_completion' => [
                'numerator' => intval($this->count_user_viewed_sections($user_id, $value)),
                'denominator' => $this->count_all_sections($value),
                'completion' => intval($this->count_user_viewed_sections($user_id, $value)) / intval($this->count_all_sections($value)) * 100,

            ],
            'best_practice_completion' => $this->getCompletionVideos($user_id, $this->getAllBestPracticeCurriculumVideos($value)),
            'all_video_completion' => $this->getCompletionVideos($user_id, $this->getAllCurriculumVideos($value)),
            'reference_completion' => [
                'numerator' => $this->user_viewed_references($user_id, $value),
                'denominator' => count($this->getAllCurriculumReferences($value)),
                'completion' => $this->user_viewed_references($user_id, $value) / count($this->getAllCurriculumReferences($value)) * 100,

                ],
            'overall_completion' => '',


        ];

        //overall completion weights all factors equally

        $returnArray[$value]['overall_completion'] = (intval($returnArray[$value]['statement_completion']['completion']) + intval($returnArray[$value]['best_practice_completion']['completion']) + intval($returnArray[$value]['all_video_completion']['completion']) + intval($returnArray[$value]['reference_completion']['completion']))/4;
    

    }

    return $returnArray;


    


}

public function curriculum_completion_stats_user_specific_curriculum ($user_id, $value, $debug=false){


    //$value is curriculum_id 

    $returnArray = [];




        $returnArray = [
            'curriculum_name' => $this->getCurriculumInfo($value)['name'],
            'statement_views' => count($this->getAllCurriculumOpensEverUserSpecificCurriculum($user_id, $value)), 
            'views_per_day' => $this->getAllCurriculumOpensEverUserSpecificCurriculum_perday($user_id, $value),
            'statement_completion' => [
                'numerator' => intval($this->count_user_viewed_sections($user_id, $value)),
                'denominator' => $this->count_all_sections($value),
                'completion' => intval($this->count_user_viewed_sections($user_id, $value)) / intval($this->count_all_sections($value)) * 100,

            ],
            'best_practice_completion' => $this->getCompletionVideos($user_id, $this->getAllBestPracticeCurriculumVideos($value)),
            'all_video_completion' => $this->getCompletionVideos($user_id, $this->getAllCurriculumVideos($value)),
            'reference_completion' => [
                'numerator' => $this->user_viewed_references($user_id, $value),
                'denominator' => count($this->getAllCurriculumReferences($value)),
                'completion' => $this->user_viewed_references($user_id, $value) / count($this->getAllCurriculumReferences($value)) * 100,

                ],
            'overall_completion' => '',


        ];

        //overall completion weights all factors equally

        $returnArray['overall_completion'] = (intval($returnArray['statement_completion']['completion']) + intval($returnArray['best_practice_completion']['completion']) + intval($returnArray['all_video_completion']['completion']) + intval($returnArray['reference_completion']['completion']))/4;
    

/*         var_dump($returnArray);
 */    

    return $returnArray;


    


}

     


    /**
     * Close mysql connection
     */
	public function endcurriculum_manager(){
		$this->connection->CloseMysql();
	}

}