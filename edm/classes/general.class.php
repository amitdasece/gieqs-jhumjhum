<?php


if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}
//error_reporting(E_ALL);

require_once 'DataBaseMysql.class.php';



//spl_autoload_unregister ('class_loader');
		
		//require('/Applications/XAMPP/xamppfiles/htdocs/dashboard/learning/scripts/autoload.php');
		//use Vimeo\Vimeo;

class general {


	public $connection;

	public function __construct (){
		$this->connection = new DataBaseMysql();
	}

	//!Sanitise form input and other important functions

	public function sanitiseInput ($data) {

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	public function sanitiseGET ($data) {

		$dataSanitised = array();

		foreach ($data as $key=>$value){

			$sanitisedValue = trim($value);
			//$sanitisedValue = addslashes($sanitisedValue);
			//$sanitisedValue = htmlspecialchars($sanitisedValue);
			//consider htmlentitydecode here, this converts back so &amp to &, special chars & to &amp 
			$dataSanitised[$key] = $sanitisedValue;

		}


		return $dataSanitised;


	}

	public function getVimeoID ($id) {

		$q = "SELECT  `id`, `url`  FROM  `video`  WHERE  `id`  = $id";

		$result = $this->connection->RunQuery($q);

		if ($result){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$vimeoid = $row['url'];


			}

		}


		return  $vimeoid;

	}

	public function getVideoTitle ($id) {

		$q = "SELECT  `id`, `name`  FROM  `video`  WHERE  `id`  = $id";

		$result = $this->connection->RunQuery($q);

		if ($result){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$vimeoid = $row['name'];


			}

		}


		return  $vimeoid;

	}

	public function getChapterSelector ($id) {

		$q = "SELECT a.`id`, a.`split`, b.`id` as `chapterid`, b.`timeFrom`, b.`timeTo`, b.`number`, b.`name` AS `chaptername` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` WHERE a.`id` = $id";

		$result = $this->connection->RunQuery($q);

		if ($result){

			$html = "<br><select id='chapterSelectorVideo{$id}' class='chapterSelector' style='width:100%;'>";

			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$chapterid = $row['chapterid'];
				$name = $row['chaptername'];
				$number = $row['number'];

				$html .= "<option value='{$chapterid}'>{$number} - {$name}</option>";

			}

			$html .= "</select>";

		}


		return  $html;

	}

	public function getVideoAndChapterData ($id) {

		$q = "SELECT a.`id`, a.`split`, b.`id` as `chapterid`, b.`timeFrom`, b.`timeTo`, b.`number`, b.`name` AS `chaptername`, b.`description`, d.`id` as `tagid`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` WHERE a.`id` = $id";

		$result = $this->connection->RunQuery($q);

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = array_map('utf8_encode', $row);
			}

			return json_encode($rows);


		}



	}
	
	public function getVideoData ($id) {

		$q = "SELECT `name`, `description`, `author` FROM `video` WHERE `id` = $id";

		$result = $this->connection->RunQuery($q);

		if ($result){


			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = array_map('utf8_encode', $row);
			}
			
			
			
			$author = $rows[0]['author'];
			$authorName = $this->getUserName($author);
			$rows[0]['author'] = $authorName;

			return json_encode($rows);


		}
		
		



	}
	
	public function getUserName ($id){
		
		$q = "SELECT `firstname`, `surname` FROM `users` WHERE `user_id` = $id";

		//echo $q;

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows == 1){

			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				
				$user = $firstname . ' ' . $surname;
				
				
			}
		
			return $user;
		}else{
			
			return null;
		}
	}






	public function returnYesNoDBQuery ($q){


		//print_r($q);


		$result = $this->connection->RunQuery($q);

		//print_r($result);

		//IF THERE is a database error return 2

		//IF THERE are no rows affected but no errors return 0

		//IF THERE is one row affected return 1

		if ($result){


			//print_r($this->connection->conn->affected_rows);

			//print_r($this->connection->conn, there is plenty else in this object including error_list as an array and connect_error);

			if ($this->connection->conn->affected_rows == 1){

				return 1;

			} else {

				return 0;

			}

		} else {

			return 2;

		}

	}

	public function returnWithInsertID($q) {


		//$result = $this->connection->RunQuery($q);

		if ($this->returnYesNoDBQuery($q) == 1){

			return $this->connection->conn->insert_id;

		}else{


			return false;

		}

		//$result = $this->connection->RunQuery($q);


	}



	public function endGeneral (){

		$this->connection->CloseMysql();


	}


	public function makeTable ($q){

		//echo $q;

		$result = $this->connection->RunQuery($q);


		if ($result->num_rows > 0){


			$data = array();

			while($data[] = $result->fetch_array(MYSQLI_ASSOC));



			echo '<table id="dataTable" class="table table-cards">';

			echo '<thead>';
			echo '<tr class="table-divider">';

			foreach ($data as $key=>$value){

				foreach ($value as $k=>$v){
					echo '<th>' . $k . '</th>';
				}

				break;
			}

			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';

			foreach ($data as $k=>$v){

				if ($v){
					echo '<tr class="datarow text-center">';

					foreach($v as $key=>$value){


						echo '<td>';
						echo $value;
						echo '</td>';

					}

					echo '</tr>';
				}

			}
			echo '</tbody>';


			echo '</table>';

		}else{

			echo '<p>Error</p>';
			print_r($this->connection->conn);

		}

	}

	public function makeTableImages ($q, $roothttp){

		//echo $q;
		//$result = $this->connection->RunQuery('USE ESD');
		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){


			$data = array();

			while($data[] = $result->fetch_array(MYSQLI_ASSOC));



			echo '<table id="dataTable">';

			echo '<tr>';

			foreach ($data as $key=>$value){
				echo '<th></th>';
				foreach ($value as $k=>$v){
					echo '<th>' . $k . '</th>';
				}

				break;
			}

			//echo '<th></th>';
			echo '</tr>';

			$x = 0;

			foreach ($data as $k=>$v){

				if ($id <> $v['id']){
					echo '</tr>';
					echo '<tr>';
					$x = 0;

				}

				$id = $v['id'];
				$id = trim($id);



				foreach($v as $key=>$value){



					if ($key == 'url'){
						echo '<td class="datarow">';
						echo "<img class='lslimage' style='max-width:50px;' src='$roothttp$value'>";
						echo '</td>';
					}else{

						if ($x==0){

							echo '<td>';
							echo "<button class='deleteSet'>Delete</button>";
							echo '</td>';

							echo '<td class="datarow">';
							echo "$value";
							echo '</td>';

						}

					}

					$x++;


				}




			}



			echo '</table>';

		}

	}
	
	public function makeTableImagesv2 ($q, $roothttp){

		//echo $q;
		//$result = $this->connection->RunQuery('USE ESD');
		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){


			$data = array();
			
			echo '<table id="dataTable">';
			
			echo '<tr>';

			while($data[] = $result->fetch_array(MYSQLI_ASSOC));
			
			foreach ($data as $key=>$value){
				//echo '<th></th>';
				foreach ($value as $k=>$v){
					
					if ($k == 'url'){
						
						echo '<th>' . 'Thumbnail' . '</th>';
						
					}else if ($k == 'type'){
						
						echo '<th>' . 'Title' . '</th>';
						
					}else{
					
					echo '<th>' . $k . '</th>';
				
					}
				
				
				}
				//echo '<th></th>';
				

				break;
			}

			//echo '<th></th>';
			echo '</tr>';

			$x = 0;

			foreach ($data as $k=>$v){

				if ($id) {	
					if ($id <> $v['id']){
						/*echo '<td>';
								echo "<button class='deleteSet'>Delete</button>";
								echo '</td>';*/
						
						echo '</tr>';
						echo '<tr>';
						$x = 0;
	
					}
					
				}

				$id = $v['id'];
				$id = trim($id);



				foreach($v as $key=>$value){



					if ($key == 'url'){
						echo '<td class="datarow">';
						echo "<img class='lslimage' style='max-width:100px;' src='$roothttp$value'>";
						echo '</td>';
					}else if ($key == 'author'){
						
						echo '<td class="datarow">';
						echo $this->getUserName($value);
						echo '</td>';
						
						
					}else if ($key == 'approved'){
						
						echo '<td class="datarow">';
							if ($value == NULL){
								
								echo 'pending';
								
							}elseif ($value == '1'){
								
								echo 'accepted';
								
							}elseif ($value == '0'){
								
								echo 'rejected';
								
							}
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

		}

	}
	
	public function makeTableImagesv3 ($q, $roothttp){

		//echo $q;
		//$result = $this->connection->RunQuery('USE ESD');
		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){


			$data = array();
			
			echo '<table id="dataTable">';
			
			echo '<tr>';

			while($data[] = $result->fetch_array(MYSQLI_ASSOC));
			
			foreach ($data as $key=>$value){
				//echo '<th></th>';
				foreach ($value as $k=>$v){
					
					if ($k == 'url'){
						
						echo '<th>' . 'Thumbnail' . '</th>';
						
					}else if ($k == 'type'){
						
						echo '<th>' . 'Title' . '</th>';
						
					}else{
					
					echo '<th>' . $k . '</th>';
				
					}
				
				
				}
				echo '<th></th>';
				echo '<th></th>';
				

				break;
			}

			//echo '<th></th>';
			echo '</tr>';

			$x = 0;

			foreach ($data as $k=>$v){

				if ($id) {	
					if ($id <> $v['id']){
						echo '<td>';
								echo "<button class='deleteSet'>Delete</button>";
								echo '</td>';
						echo '<td>';
								echo "<button class='approveSet'>Approve</button><br><br><button class='reject'>Reject</button>";
								echo '</td>';
						
						echo '</tr>';
						echo '<tr>';
						$x = 0;
	
					}
					
				}

				$id = $v['id'];
				$id = trim($id);



				foreach($v as $key=>$value){



					if ($key == 'url'){
						echo '<td class="datarow">';
						echo "<img class='lslimage' style='max-width:100px;' src='$roothttp$value'>";
						echo '</td>';
					}else if ($key == 'author'){
						
						echo '<td class="datarow">';
						echo $this->getUserName($value);
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
			
			echo '<p>There are no user submissions pending approval</p>';
			
		}

	}


	public function generateFormField ($table){

		$q = "SELECT `COLUMN_NAME` AS `name`, `ORDINAL_POSITION` AS `position`, `CHARACTER_MAXIMUM_LENGTH` AS `length`
	    FROM INFORMATION_SCHEMA.COLUMNS
	            WHERE TABLE_SCHEMA='esdv1'
	            AND TABLE_NAME = '$table'";

		//echo $q;

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$columns = array();

			while($columns[] = $result->fetch_array(MYSQLI_ASSOC));




			foreach ($columns as $key=>$value){



				foreach ($value as $k=>$v){

					if ($k == 'name'){

						if ($v != 'id'){

							echo 'echo $formv1->generateText(\'';

							echo $v . '\', \'' . $v . '\', ';

							echo '\'\', \'tooltip here\');' . PHP_EOL;

						}

					}


				}



				//echo '\n';


			}



		}






	}

	public function generateLogicValidate ($table){

		$q = "SELECT `COLUMN_NAME` AS `name`, `ORDINAL_POSITION` AS `position`, `CHARACTER_MAXIMUM_LENGTH` AS `length`
	    FROM INFORMATION_SCHEMA.COLUMNS
	            WHERE TABLE_SCHEMA='LearningTool'
	            AND TABLE_NAME = '$table'";

		//echo $q;

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$columns = array();

			while($columns[] = $result->fetch_array(MYSQLI_ASSOC));

			/*
				rules: {

	            timezone: {
	                required: true,
	            },
	            password: {
		            required: true,
		        },
		        password_again: {
				      equalTo: "#password",
				},



		        },
		        messages: {


		            timezone: {
		                required: \'a timezone is required for the user\',


		            },

		        },
		        */
			echo 'rules: {'. PHP_EOL;

			foreach ($columns as $key=>$value){

				//echo 'echo $formv1->generateText(\'text here\', \'';

				foreach ($value as $k=>$v){

					if ($k == 'name'){

						if ($v != 'id'){

							echo $v . ': { required: true },   '. PHP_EOL;
							//echo '<br><br>';

						}

					}


				}

			}

			echo '},';

			echo 'messages: {'. PHP_EOL;

			foreach ($columns as $key=>$value){

				//echo 'echo $formv1->generateText(\'text here\', \'';

				foreach ($value as $k=>$v){

					if ($k == 'name'){

						if ($v != 'id'){

							echo $v . ': { required: \'message\' },   '. PHP_EOL;
							//echo '<br><br>';

						}

					}


				}

			}

			echo '},';

		}






	}

	public function selectTenRandomImageSets ($tagid, $roothttp){

		//echo 'centre passed was ' . $centreid;


		$q = "SELECT a.`id` AS imageid, a.`url`, a.`name`, a.`order`, b.`id` AS tagid
			  FROM `images` as a
			  INNER JOIN `imagesTag` as c ON a.`id` = c.`images_id`
			  INNER JOIN `tags` as b ON b.`id` = c.`tags_id`
				WHERE b.`id` = $tagid
				ORDER BY a.`order` ASC
				";

		//modify this to only allow 8 picture groups in

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';

			echo "<div class='row'>";

			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				/*if ($lesionid == $row['imageid']){ //for imageset

					//do for more images

					$filename = $row['url'];
					//$position = $row['position'];
					$lesionid = $row['imageid'];
					$name = $row['name'];



					echo "<div class='col-1'>";

					echo "<img id='$lesionid' class='lslimage zoom' src='$roothttp/$filename'>";

					echo "</div>";

					$x++;

				}else{*/

				//first time x=0

				//if ($x==0){

				//do initial include define x as 1
				//$x=1;




				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['imageid'];
				$name = $row['name'];

				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				if($x % 4 == 0){echo "<div class='row'>";}

				echo "<div data='$x' class='col-3'>";

				echo "<img id='$lesionid' class='lslimage zoom' src='$roothttp/$filename'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>";}

				$x++;

				continue;


				//}elseif ($x>0){

				//images where there are less than 8 images
				/*
						if ($x>1){



							echo "<div data='$x' class='col-";

							if ($x==2){echo '7';}
							if ($x==3){echo '6';}
							if ($x==4){echo '5';}
							if ($x==5){echo '4';}
							if ($x==6){echo '3';}
							if ($x==7){echo '2';}
							if ($x==8){echo '1';}


							echo "'></div>"; // add remaining columns

							echo "</div>"; // close the row



							$x=1; //reset x

							echo "<div class='row'>";

									$filename = $row['url'];
							//$position = $row['position'];
							$lesionid = $row['imageid'];
							$name = $row['name'];

							echo "<div class='col-2' data='$x'><div class='description'>$name";
							echo "</div>";

							echo "</div>";

							echo "<div data='$x' class='col-1'>";

							echo "<img id='$lesionid' class='lslimage zoom' src='$roothttp/$filename'>";

							//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";

							echo "</div>";

							$x++;
							$y++;

*/


				//}





				//}



				//}



				/*if ($x % 8 == 0){

					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-2'></div>";

					} */





			}echo "</div>";



		}

	}
	
	
	public function getHighestRatedImagesCover ($roothttp) {
		
		$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE c.`type` = 1 LIMIT 12";
		

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){
			
			$x = 1;
			
			echo '<div class="row">';
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				if ($row['url'] == $imageSetid){
					
					continue;
					
				}
				
			
				echo '<div class="col-3 coverImages">';
				
					echo "<img class='cover' src='{$roothttp}{$row['url']}'>";

				echo '</div>';
				
				if ($x % 4 == 0){
					
					echo "</div>";  
					
					echo '<div class="row">';
					
					$x = 1;
					
					continue;
						
					
				}
				
				$x++;
				
				$imageSetid = $row['url'];


			}
			
			echo "</div>";
			

		}
		
		
	}
	
	public function getHighestRatedImagesCoverResection ($roothttp) {
		
		$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE c.`type` = 1 AND e.`tagCategories_id` = 40 LIMIT 12";
		

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){
			
			$x = 1;
			
			echo '<div class="row">';
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				if ($row['url'] == $imageSetid){
					
					continue;
					
				}
				
			
				echo '<div class="col-3 coverImages">';
				
					echo "<img class='cover' src='{$roothttp}{$row['url']}'>";

				echo '</div>';
				
				if ($x % 4 == 0){
					
					echo "</div>";  
					
					echo '<div class="row">';
					
					$x = 1;
					
					continue;
						
					
				}
				
				$x++;
				
				$imageSetid = $row['url'];


			}
			
			echo "</div>";
			

		}
		
		
	}

	public function getAllTagsInCategoryWithHighestRatedImages ($tagCategoriesid, $roothttp) {


		//shows highest rated (1) images from each tag category

		$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = $tagCategoriesid AND c.`type` = 1 ORDER BY e.`tagName` ASC, `imageSetid` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';
			echo "<hr>";
			echo "<div class='row tagSet'>";


			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				if ($tagName){
					if ($tagName != $row['tagName']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}

				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['imageid'];
				$imageSetid = $row['imageSetid'];
				$name = $row['name'];
				$tagName = $row['tagName'];
				$tags_id = $row['tags_id'];

				//get all the tags for this tag with their category
				//does this show all tags for a specific image


				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				if ($x == 1){echo "<div class='responsiveContainer'><div class='row'><div class='col-8'><h3 style='text-align:left; cursor:pointer;' id='tag{$tags_id}' class='tagLink'>$tagName</h3></div><div class='col-2'><button type='button' class='blueButton uptodateSearch'>Search UpToDate</button></div><div class='col-2'><button type='button' class='blueButton pubMedSearch'>Search PubMed</button></div></div></div>";}

				if($x % 4 == 0){echo "<div class='row'>";  }

				echo "<div data='$x' class='col-3 coverimages'>";

				echo "<img id='$lesionid' data='imageSet{$imageSetid}' class='lslimage zoom' src='$roothttp/$filename'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>";}

				$x++;

				continue;







			}echo "</div>";

		}

	}

	//filter the above function query to get the image ids for each tagCategory

	public function getImageIdsProcedure () {

		//get the tags within the procedure category


		$q = "SELECT e.`tagName`, e.`id` as `tagid` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = 36 AND c.`type` = 1 GROUP BY `tagName` ORDER BY e.`tagName` ASC, b.`imageSet_id` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$rows[] = array_map('utf8_encode', $row);

			}

			echo '<div id="procedureTags" style="display:none;">' . json_encode($rows) . '</div>';


		}

		//gets image ids of each tag within this category

		$q = "SELECT b.`image_id` as `imageid`, e.`tagName`, e.`id` as `tagid` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = 36 AND c.`type` = 1 ORDER BY e.`tagName` ASC, b.`imageSet_id` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$rows[] = array_map('utf8_encode', $row);

			}

			echo '<div id="imageMatchProcedure" style="display:none;">' . json_encode($rows) . '</div>';


		}


	}



	public function getTaggedImageSets ($tagid, $roothttp){

		$q = "SELECT a.`id` as imageSetid, b.`image_id` as imageid, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE d.`tags_id` = $tagid ORDER BY imageSetid ASC, c.`order` ASC";

		//modify this to only allow 8 picture groups in

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';

			echo "<div class='row'>";

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				if ($imageSetid){
					if ($imageSetid != $row['imageSetid']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<div class='row'>";
						$x=1;

					}
				}

				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['imageid'];
				$imageSetid = $row['imageSetid'];
				$name = $row['name'];

				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				if($x % 4 == 0){echo "<div class='row'>";}

				echo "<div data='$x' class='col-3 coverImages'>";

				echo "<img id='$lesionid' class='lslimage zoom' src='$roothttp/$filename'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>";}

				$x++;

				continue;







			}echo "</div>";



		}

	}

	public function getTaggedImageSetsv2 ($tagid, $roothttp) {


		//shows all images from each tag
		
		//prints only one set of search buttons
		
		//no hrs
		
		//currently sorted by imageSET  $imageSetDescription = $row['imageSetDescription'];

		//$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = $tagCategoriesid AND c.`type` = 1 ORDER BY e.`tagName` ASC, `imageSetid` ASC, c.`order` ASC";

		$q = "SELECT a.`id` as imageSetid, a.`name` as imageSetDescription, a.`type` as imageSetType, b.`image_id` as imageid, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE d.`tags_id` = $tagid ORDER BY imageSetid ASC, c.`order` ASC";



		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';
			echo "<hr>";
			echo "<div class='row tagSet'>";


			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				/* sort by tagset
				if ($tagName){
					if ($tagName != $row['tagName']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}
				
				*/
				
				$imageSetDescription = $row['imageSetDescription'];
				$imageSetType = $row['imageSetType'];

				if ($imageSetid){
					if ($imageSetid != $row['imageSetid']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						echo "<div class='row describer'><div class='col-8'><div class='row'><div class='col-12 imageSetTitle' style='text-align:left;font-size:20px;'><b>$imageSetType</b></div></div><div class='row'><div class='col-12' style='text-align:left;'>$imageSetDescription</div></div></div><div class='col-2'><button type='button' class='blueButton uptodateSearch'>Search UpToDate</button></div><div class='col-2'><button type='button' class='blueButton pubMedSearch'>Search PubMed</button></div></div></div>";
						$x=1;

					}
				}
				

				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['imageid'];
				$imageSetid = $row['imageSetid'];
				$name = $row['name'];
				$tagName = $row['tagName'];
				$tags_id = $row['tags_id'];
				
				//get all the tags for this tag with their category
				//does this show all tags for a specific image


				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				
				//removed from below line <h3 style='text-align:left; cursor:pointer;' id='tag{$tags_id}' class='tagLink'>$tagName</h3>
				
				
				if ($y == 1){echo "<div class='responsiveContainer'><div class='row describer'><div class='col-8' style='text-align:left;'><div class='row'><div class='col-12 imageSetTitle'  style='text-align:left;font-size:20px;'><b>$imageSetType</b></div></div><div class='row'><div class='col-12' style='text-align:left;'>$imageSetDescription</div></div></div><div class='col-2'><button type='button' class='blueButton uptodateSearch'>Search UpToDate</button></div><div class='col-2'><button type='button' class='blueButton pubMedSearch'>Search PubMed</button></div></div></div>"; $y=2;}

				if($x % 4 == 0){echo "<div class='row'>";  }

				echo "<div data='$x' class='col-3 coverImages'>";

				echo "<img id='$lesionid' data='imageSet{$imageSetid}' class='lslimage zoom' src='$roothttp/$filename'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>";}

				$x++;

				continue;







			}echo "</div>";

		}

	}
	
	public function getTaggedImageSetsv3 ($imageSetid, $roothttp) {


		//shows all images from each tag
		
		//prints only one set of search buttons
		
		//no hrs
		
		//currently sorted by imageSET

		//$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = $tagCategoriesid AND c.`type` = 1 ORDER BY e.`tagName` ASC, `imageSetid` ASC, c.`order` ASC";

		$q = "SELECT a.`id` as imageSetid, a.`name` as imageSetDescription, b.`image_id` as imageid, c.`url`, c.`name` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` WHERE a.`id` = $imageSetid ORDER BY c.`order` ASC";



		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';
			echo "<hr>";
			echo "<div class='row tagSet'>";


			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				/* sort by tagset
				if ($tagName){
					if ($tagName != $row['tagName']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}
				
				*/
				if ($imageSetid){
					if ($imageSetid != $row['imageSetid']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}
				

				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['imageid'];
				$imageSetid = $row['imageSetid'];
				$name = $row['name'];
				$tagName = $row['tagName'];
				$tags_id = $row['tags_id'];
				$imageSetDescription = $row['imageSetDescription'];

				//get all the tags for this tag with their category
				//does this show all tags for a specific image


				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				
				//removed from below line <h3 style='text-align:left; cursor:pointer;' id='tag{$tags_id}' class='tagLink'>$tagName</h3>
				
				
				if ($y == 1){echo "<div class='responsiveContainer'><div class='row describer'><div class='col-8'></div><div class='col-2'><button type='button' class='blueButton uptodateSearch'>Search UpToDate</button></div><div class='col-2'><button type='button' class='blueButton pubMedSearch'>Search PubMed</button></div></div><div class='row'>"; $y=2;}

				if($x % 4 == 0 || $x == 0){ }

				echo "<div data='$x' class='col-3'>";

				echo "<img id='$lesionid' data='imageSet{$imageSetid}' class='lslimage zoom' src='$roothttp/$filename'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>"; echo "<div class='row'>"; }

				$x++;

				continue;







			}echo "</div>";echo "</div>";

		}

	}
	
	public function getTaggedImageSetsv3Draft ($imageSetid, $roothttp) {


		//shows all images from each tag
		
		//prints only one set of search buttons
		
		//no hrs
		
		//currently sorted by imageSET

		//$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = $tagCategoriesid AND c.`type` = 1 ORDER BY e.`tagName` ASC, `imageSetid` ASC, c.`order` ASC";

		$q = "SELECT a.`id` as imageSetid, a.`name` as imageSetDescription, b.`image_id` as imageid, c.`url`, c.`name` FROM `imageSetDraft` as a INNER JOIN `imageImageSetDraft` as b ON a.`id` = b.`imageSet_id` INNER JOIN `imagesDraft` as c on b.`image_id` = c.`id` WHERE a.`id` = $imageSetid ORDER BY c.`order` ASC";



		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';
			echo "<hr>";
			echo "<div class='row tagSet'>";


			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				/* sort by tagset
				if ($tagName){
					if ($tagName != $row['tagName']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}
				
				*/
				if ($imageSetid){
					if ($imageSetid != $row['imageSetid']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}
				

				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['imageid'];
				$imageSetid = $row['imageSetid'];
				$name = $row['name'];
				$tagName = $row['tagName'];
				$tags_id = $row['tags_id'];
				$imageSetDescription = $row['imageSetDescription'];

				//get all the tags for this tag with their category
				//does this show all tags for a specific image


				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				
				//removed from below line <h3 style='text-align:left; cursor:pointer;' id='tag{$tags_id}' class='tagLink'>$tagName</h3>
				
				
				if ($y == 1){echo "<div class='responsiveContainer'><div class='row describer'><div class='col-8'></div><div class='col-2'><button type='button' class='blueButton uptodateSearch'>Search UpToDate</button></div><div class='col-2'><button type='button' class='blueButton pubMedSearch'>Search PubMed</button></div></div><div class='row'>"; $y=2;}

				if($x % 4 == 0 || $x == 0){ }

				echo "<div data='$x' class='col-3'>";

				echo "<img id='$lesionid' data='imageSet{$imageSetid}' class='lslimage zoom' src='$roothttp/$filename'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>"; echo "<div class='row'>"; }

				$x++;

				continue;







			}echo "</div>";echo "</div>";

		}

	}
	
	
	//!video atlas functions
	
	
	public function getVimeoThumb($id)
	{
	$vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
	print_r($vimeo);
	//echo $small = $vimeo[0]['thumbnail_small'];
	//echo $medium = $vimeo[0]['thumbnail_medium'];
	return $vimeo[0]['thumbnail_large'];
	}


	
	//!--VIDEO --get all videos
	
	public function getAllVideos ($tagCategoriesid, $roothttp) {

		//shows all videos in the tagCategory
		
		//$client = new Vimeo($vimeo_client_id, $vimeo_client_secret, $vimeo_token);
		
		$q = "SELECT a.`id`, a.`url`, d.`tagName`, d.`id` as `tags_id` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e on e.`id` = d.`tagCategories_id` WHERE e.`id` = $tagCategoriesid GROUP BY a.`id` ORDER BY d.`tagName` ASC";
		
		echo $q;
		
		//shows highest rated (1) images from each tag category

		//$q = "SELECT a.`id` as `imageSetid`, b.`image_id` as `imageid`, c.`url`, c.`name`, c.`order`, c.`type`, e.`tagName`, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = $tagCategoriesid AND c.`type` = 1 ORDER BY e.`tagName` ASC, `imageSetid` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){

			$x = 1;
			$y = 1;
			$lesionid='';
			echo "<hr>";
			echo "<div class='row tagSet'>";


			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				if ($tagName){
					if ($tagName != $row['tagName']){ //for imageset then reset the row somehow

						echo "</div>";
						echo "<hr>";
						echo "<div class='row tagSet'>";
						//echo "<h3 style='text-align:left;'>$tagName</h3>";
						$x=1;

					}
				}

				$filename = $row['url'];
				//$position = $row['position'];
				$lesionid = $row['id'];
				$imageSetid = $row['imageSetid']; //implement later for videoset
				$name = $row['name'];
				$tagName = $row['tagName'];
				$tags_id = $row['tags_id'];

				//get all the tags for this tag with their category
				//does this show all tags for a specific image


				//echo "<div class='col-2' data='$x'><div class='description'>$name";
				//echo "</div>";

				//echo "</div>";
				if ($x == 1){echo "<div class='responsiveContainer'><div class='row'><div class='col-8'><h3 style='text-align:left; cursor:pointer;' id='tag{$tags_id}' class='tagLink'>$tagName</h3></div><div class='col-2'><button type='button' class='blueButton uptodateSearch'>Search UpToDate</button></div><div class='col-2'><button type='button' class='blueButton pubMedSearch'>Search PubMed</button></div></div></div>";}

				if($x % 4 == 0){echo "<div class='row'>";  }

				echo "<div data='$x' class='col-3'>";

				$urlThumbnail = $this->getVimeoThumb($filename);
				
				echo "<img id='$lesionid' data='imageSet{$imageSetid}' class='lslimage zoom' src='$urlThumbnail'>";
				//echo "<img id='$lesionid' class='lslimage zoom' src='https://www.acestudy.net/studyserver/$filename'>";
				echo "<div class='caption'>$name</div>";
				//echo "</div>";
				echo "</div>";

				if($x % 4 == 0){echo "</div>";}

				$x++;

				continue;







			}echo "</div>";

		}

	}
	
	//filter the above function query to get the video ids for each tagCategory

	public function getVideoIdsProcedure () {

		//get the tags within the procedure category

		$q = "SELECT d.`id` as `tagid`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e on e.`id` = d.`tagCategories_id` WHERE e.`id` = 40 GROUP BY `tagName` ORDER BY d.`tagName` ASC";
		
		//$q = "SELECT e.`tagName`, e.`id` as `tagid` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = 36 AND c.`type` = 1 GROUP BY `tagName` ORDER BY e.`tagName` ASC, b.`imageSet_id` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$rows[] = array_map('utf8_encode', $row);

			}

			echo '<div id="procedureTags" style="display:none;">' . json_encode($rows) . '</div>';


		}

		//gets video ids of each tag within this category

		$q = "SELECT a.`id` as `videoid`, d.`tagName`, d.`id` as `tagid` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e on e.`id` = d.`tagCategories_id` WHERE e.`id` = 40 ORDER BY d.`tagName` ASC";
		
		//$q = "SELECT b.`image_id` as `imageid`, e.`tagName`, e.`id` as `tagid` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = 36 AND c.`type` = 1 ORDER BY e.`tagName` ASC, b.`imageSet_id` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$rows[] = array_map('utf8_encode', $row);

			}

			echo '<div id="imageMatchProcedure" style="display:none;">' . json_encode($rows) . '</div>';


		}


	}
	
	public function getVideoIdsAnderValAll () {

		//get the tags within the procedure category

		$q = "SELECT d.`id` as `tagid`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e on e.`id` = d.`tagCategories_id` WHERE e.`id` = 41 GROUP BY `tagName` ORDER BY d.`tagName` ASC";
		
		//$q = "SELECT e.`tagName`, e.`id` as `tagid` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = 36 AND c.`type` = 1 GROUP BY `tagName` ORDER BY e.`tagName` ASC, b.`imageSet_id` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$rows[] = array_map('utf8_encode', $row);

			}

			echo '<div id="procedureTags" style="display:none;">' . json_encode($rows) . '</div>';


		}

		//gets video ids of each tag within this category

		$q = "SELECT a.`id` as `videoid`, d.`tagName`, d.`id` as `tagid` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e on e.`id` = d.`tagCategories_id` WHERE e.`id` = 41 ORDER BY d.`tagName` ASC";
		
		//$q = "SELECT b.`image_id` as `imageid`, e.`tagName`, e.`id` as `tagid` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` INNER JOIN `tagCategories` as f on f.`id` = e.`tagCategories_id` WHERE f.`id` = 36 AND c.`type` = 1 ORDER BY e.`tagName` ASC, b.`imageSet_id` ASC, c.`order` ASC";

		$result = $this->connection->RunQuery($q);

		//print_r($result);

		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$rows[] = array_map('utf8_encode', $row);

			}

			echo '<div id="imageMatchProcedure" style="display:none;">' . json_encode($rows) . '</div>';


		}


	}
	
	
	//! counting functions
	
	public function countPendingApprovals () {
		
		$q = "SELECT COUNT(a.`id`) as number
FROM `imageSetDraft` as a 
INNER JOIN `imageImageSetDraft` as b ON a.`id` = b.`imageSet_id`
INNER JOIN `imagesDraft` as c on b.`image_id` = c.`id` WHERE a.`approved` IS NULL GROUP BY a.`id` ORDER BY a.`created` desc";

		$result = $this->connection->RunQuery($q);
		
		if ($result->num_rows > 0){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){


				$count = $row['number'];
			}
			
			return $count;

		
		
		}else{
			
			return 0;
			
		}
		
	}
	
	/**
	 * 
	 * Generic values code
	 * 
	 */

	public function writeSelect($svalue1, $svalue2, $tableNameValues){

		$q = "SELECT `".$svalue1."`, `".$svalue2."` FROM `$tableNameValues` WHERE `".$svalue1."` IS NOT NULL AND `".$svalue2."` <> ''";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		$returnString = "";

		if ($result){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnString .= "<option value=".$row[$svalue1];
				
					if (($row[$svalue1])==$post) {
						$returnString .= " selected = 'selected'";
					}
					$returnString .= ">".$row[$svalue1]." ".$row[$svalue2]."</option>"; 
			
			}
		}

		return $returnString;

	 }	

	 public function writeSelectWeight($svalue1, $svalue2, $tableNameValues, $weight){

		if ($weight == '1'){
			$q = "SELECT `".$svalue1."`, `".$svalue2."`, `".$svalue1."_weight`, `".$svalue1."_denominator` FROM `$tableNameValues` WHERE `".$svalue1."` IS NOT NULL AND `".$svalue2."` <> ''";
			//echo $q;
			$result = $this->connection->RunQuery($q);
			//print_r($result);

		}else{

			$q = "SELECT `".$svalue1."`, `".$svalue2."` FROM `$tableNameValues` WHERE `".$svalue1."` IS NOT NULL AND `".$svalue2."` <> ''";
			//echo $q;
			$result = $this->connection->RunQuery($q);
			//print_r($result);
		}

		$returnString = "";

		if ($result){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnString .= "<option value=".$row[$svalue1];

					//echo $weight;
					if ($weight) {

						$dataWeight = $row[$svalue1.'_weight'];
						$dataDenominator = $row[$svalue1.'_denominator'];

						$returnString .= " data-weight = '{\"weight\":\"$dataWeight\", \"denominator\":\"$dataDenominator\"}'";
					}
					$returnString .= ">".$row[$svalue1]." ".$row[$svalue2]."</option>"; 
			
			}
		}

		return $returnString;

	 }	

	 public function writeCheckedWeight($sname, $svalue1, $svalue2, $tableNameValues, $weight, $stext){

		if ($weight == '1'){
			$q = "SELECT `".$svalue1."`, `".$svalue2."`, `".$svalue1."_weight`, `".$svalue1."_denominator` FROM `$tableNameValues` WHERE `".$svalue1."` IS NOT NULL AND `".$svalue2."` <> ''";
			//echo $q;
			$result = $this->connection->RunQuery($q);
			//print_r($result);

		}else{

			$q = "SELECT `".$svalue1."`, `".$svalue2."` FROM `$tableNameValues` WHERE `".$svalue1."` IS NOT NULL AND `".$svalue2."` <> ''";
			//echo $q;
			$result = $this->connection->RunQuery($q);
			//print_r($result);
		}

		$returnString = "";

		if ($result){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnString .= '<div class="form-check"><input class="form-check-input forminputs" type="checkbox" name="' . $sname . $row[$svalue1] . '" id="' . $sname . $row[$svalue1] . '">';

				//$returnString .= "<input type='checkbox' class='custom-control-input forminputs' name='$sname" . $row[$svalue1] . "' id='$sname" . $row[$svalue1] . "'";

					//echo $weight;
					if ($weight) {

						$dataWeight = $row[$svalue1.'_weight'];
						$dataDenominator = $row[$svalue1.'_denominator'];

						$returnString .= " data-weight = '{\"weight\":\"$dataWeight\", \"denominator\":\"$dataDenominator\"}'";
					}
					$returnString .= "<label class='form-check-label' for='" . $sname . $row[$svalue1] . "'>" . $row[$svalue1] . " - " . $row[$svalue2] . "</label></div>"; 
			
			}
		}

		return $returnString;

	 }	

	 public function formIterator ($iterationForm, $tableNameSheet){

		$q = "SELECT `Name`, `Type`, `textType`, `Value1`, `Value2`, `Text`, `Message_t` FROM `$tableNameSheet` WHERE position=".$iterationForm." AND Type IS NOT NULL ORDER BY `Order` ASC";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		
		$returnArray = array();

		if ($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnArray[] = $row;

			}
			return $returnArray;
		}

		


	 }

	 public function formIteratorWeight ($iterationForm, $tableNameSheet){

		$q = "SELECT `Name`, `Type`, `textType`, `Value1`, `Value2`, `Text`, `Message_t`, `Weight`, `ForVideo`, `AlwaysRequired`, `RequiredIfCondition`, `Condition` FROM `$tableNameSheet` WHERE position=".$iterationForm." AND Type IS NOT NULL ORDER BY `Order` ASC";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		
		$returnArray = array();

		if ($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnArray[] = $row;

			}
			return $returnArray;
		}

		


	 }

	 public function getValueText($svalue1, $requiredIndex, $tableNameValues){

		$q = "SELECT `".$svalue1."_t` FROM `$tableNameValues` WHERE `".$svalue1."` = ".$requiredIndex."";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		$returnString = "";

		if ($result){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){



				$returnString .= $row[$svalue1 . '_t'];
				
			
			}
		}

		return $returnString;

	 }


	 //database manipulations

	 //update orders in pageLayout file
	 public function editValuesPosition(){

		for($x = 11; $x >= 5; $x=$x-1) {

			$y = $x + 1;

			//echo $y;

			$q = "UPDATE `pageLayoutPOEM` SET `Position` = '$y' WHERE `Position` = $x";

			//echo $q;

			//$result = $this->connection->RunQuery($q);
		
			print_r($result);

			if ($result == 1){
				
				echo $q . ' update performed <br/><br/>';

			}
			
		
		}

		
		
		

		//return $returnString;

	 }	
	 
	 public function insert_a_space($database, $position, $insert_at){

		//GET ARRAY OF THE ORDERRS AT THAT POSITION

		$q = "SELECT `Order` FROM `$database` WHERE `position`='$position' ORDER BY `Order` ASC";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		
		$returnArray = array();

		if ($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnArray[] = $row['Order'];

			}
			
		}

		//GET THE LAST VALUE OF THE ARRAY

		print_r($returnArray);

		echo $lastValue = end($returnArray);

		//echo 'hello';

		//USE IT BELOW

		

		for($x = $lastValue; $x >= $insert_at; $x=$x-1) {

			$y = $x + 1;

			//echo $y;

			$q = "UPDATE `$database` SET `Order` = '$y' WHERE `Position` = '$position' AND `Order` = $x";

			//echo $q;

			$result = $this->connection->RunQuery($q);
		
			//print_r($result);

			if ($result){
				
				echo $q . ' update performed <br/><br/>';

			}
			
		
		}

		
		
		

		//return $returnString;

	 }	

	 public function updateToVARCHAR($arrayFieldNames){

		foreach($arrayFieldNames as $key=>$value) {

			

			//echo $y;

			$q = "ALTER TABLE `POEM` CHANGE `$value` `$value` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;";

			//echo $q;

			$result = $this->connection->RunQuery($q);
		
			print_r($result);

			if ($result == 1){
				
				echo $q . ' update performed <br/><br/>';

			}else{

				echo $q . ' update NOT performed <br/><br/>';
			}
			
		
		}

		
		
		

		//return $returnString;

	 }	

}



?>