<?php


error_reporting(E_ALL);
$openaccess = 1;
//$requiredUserLevel = 4;

require '../includes/config.inc.php';

$debug = false;

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');

function array_not_unique($a = array())
{
    return array_diff_key($a, array_unique($a));
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

$general = new general;

//$navigator = new navigator;

$user = new users;

//provide the required tag Categories

$data = json_decode(file_get_contents('php://input'), true);

$tagsToMatch = $data['tags'];

$loaded = $data['loaded'];

$loadedRequired = $data['loadedRequired'];

$loadedRequiredProduct = 10 * $loadedRequired;

if ($debug) {
    
    print_r($tagsToMatch);
}

$numberOfTagsToMatch = count($tagsToMatch);

if ($numberOfTagsToMatch < 1) {

    $tagsToMatch = null;

}

if ($debug) {
    print_r('number of tags to match' . $numberOfTagsToMatch);
}


?>


        <?php

        //CHANGE ME FOR NEW PAGES

$requiredTagCategories = $data['requiredTagCategories'];

//$requiredTagCategories = ['39', '40', '41', '42'];


$q = "SELECT a.`tagCategories_id` as `Category id`, a.`tagCategories_id`, a.`id`, a.`tagName` as `Tag` from `tags` as a WHERE a.`tagCategories_id` > 46 ORDER BY tagCategories_id, a.`id` ASC";


?>

        <?php

if ($requiredTagCategories){  //if some categories specified


$videos = [];
$x = 0;



foreach ($requiredTagCategories as $key => $value) {

    //echo $value;

    $tagCategory = $value;
    if ($debug) {

        echo 'checking category ' . $tagCategory;
        echo PHP_EOL;

    }

    


    $result = $general->connection->RunQuery($q);


		//print_r($result);

		if ($result->num_rows > 0){


			$data = array();
			
			echo '<table id="dataTable" class="table table-cards w-100">';
			echo '<thead>';
			echo '<tr class="header">';

			while($data[] = $result->fetch_array(MYSQLI_ASSOC));
			
			foreach ($data as $key=>$value){
				//echo '<th></th>';
				
				foreach ($value as $k=>$v){
					
					
					
					echo '<th data="'.$k.'">' . $k . '</th>';
				
					
				
				
				}
				echo '<th data="references">References</th>';
				echo '<th></th>';
				echo '<th></th>';
				

				break;
			}

			//echo '<th></th>';
			echo '</tr>';
			echo '</thead>';

			$x = 0;

			foreach ($data as $k=>$v){

				
				
				if ($id) {	
					if ($id <> $v['id']){
						
						
							echo '<td>';
							echo $this->getBriefReference($id);
							echo '</td>';
							
							
						
						echo '<td>';
								echo "<button class='reference btn btn-small bg-dark py-0'>Add reference</button>";
								echo '</td>';
						
						echo '<td>';
								echo "<button class='deleteTag btn btn-small bg-dark py-0'>Delete</button>";
								echo '</td>';
						
						
						
						echo '</tr>';
						//echo '<tr>';
						$x = 0;
	
					}
					
				}

				$id = $v['id'];
				$id = trim($id);



				foreach($v as $key=>$value){



					if ($key == 'url'){
						echo '<td class="datarow">';
						echo "<img class='lslimage' style='max-width:100px;' src='$roothttp/$value'>";
						echo '</td>';
					}else if ($key == 'tagCategories_id'){
						
						echo '<td class="datarow">';
						echo $this->getTagCategoryName($value);
						echo '</td>';
						
						
					}else{

						
						
						echo '<td class="datarow">';
							echo trim($value);
							echo '</td>';
						
						

					}

					$x++;


				}




			}



			echo '</table>';

		}else{
			
			echo '<p>There are no tags</p>';
			
		}









            
}

}else{

//get all categories

$result = $general->connection->RunQuery($q);


		//print_r($result);

		if ($result->num_rows > 0){


			$data = array();
			
			echo '<table id="dataTable" class="table table-cards w-100">';
			echo '<thead>';
			echo '<tr class="header">';

			while($data[] = $result->fetch_array(MYSQLI_ASSOC));
			
			foreach ($data as $key=>$value){
				//echo '<th></th>';
				
				foreach ($value as $k=>$v){
					
					
					
					echo '<th data="'.$k.'">' . $k . '</th>';
				
					
				
				
				}
				
				

				break;
			}

			//echo '<th></th>';
			echo '</tr>';
			echo '</thead>';

			$x = 0;

			foreach ($data as $k=>$v){

				
				
				if ($id) {	
					if ($id <> $v['id']){
						
						
						echo '</tr>';
						//echo '<tr>';
						$x = 0;
	
					}
					
                }
                
                if ($categoryid) {	
					if ($categoryid <> $v['tagCategories_id']){
						
						
						echo '</tr>';
						echo '<tr><td></td></tr>';
                        $x = 0;
                        
	
					}
					
				}

                $id = $v['id'];
                
                $id = trim($id);
                $categoryid = $v['tagCategories_id'];
                $categoryid = trim($categoryid);



				foreach($v as $key=>$value){



					if ($key == 'url'){
						echo '<td class="datarow">';
						echo "<img class='lslimage' style='max-width:100px;' src='$roothttp/$value'>";
						echo '</td>';
					}else if ($key == 'tagCategories_id'){
						
						echo '<td class="datarow">';
						echo $general->getTagCategoryName($value);
						echo '</td>';
						
						
					}else{

						
						
						echo '<td class="datarow">';
							echo trim($value);
							echo '</td>';
						
						

					}

					$x++;


				}




			}



			echo '</table>';

		}else{
			
			echo '<p>There are no tags</p>';
			
		}


        







            
}




?>
