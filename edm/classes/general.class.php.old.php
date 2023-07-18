<?php

require_once 'DataBaseMysql.class.php';

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
			$sanitisedValue = stripslashes($sanitisedValue);
			$sanitisedValue = htmlspecialchars($sanitisedValue);

			$dataSanitised[$key] = $sanitisedValue;

		}


		return $dataSanitised;


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



			echo '<table id="dataTable">';

			echo '<tr>';

			foreach ($data as $key=>$value){

				foreach ($value as $k=>$v){
					echo '<th>' . $k . '</th>';
				}

				break;
			}

			echo '</tr>';

			foreach ($data as $k=>$v){


				echo '<tr class="datarow">';

				foreach($v as $key=>$value){


					echo '<td>';
					echo $value;
					echo '</td>';

				}

				echo '</tr>';


			}



			echo '</table>';

		}else{
			
			echo 'No records in the database to show';
			
			//echo '<p>Error</p>';
			//print_r($this->connection->conn);
			
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
					echo '<tr class="datarow">';
					$x = 0;
					
				}
					
				$id = $v['id'];
				

				

				foreach($v as $key=>$value){

					

					if ($key == 'url'){
						echo '<td>';
						echo "<img class='lslimage' style='max-width:200px;' src='$roothttp$value'>";
						echo '</td>';
					}else{
						
						if ($x==0){
						
						echo '<td>';
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


	public function generateFormField ($table){

		$q = "SELECT `COLUMN_NAME` AS `name`, `ORDINAL_POSITION` AS `position`, `CHARACTER_MAXIMUM_LENGTH` AS `length`
	    FROM INFORMATION_SCHEMA.COLUMNS
	            WHERE TABLE_SCHEMA='ESD'
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
	            WHERE TABLE_SCHEMA='ESD'
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


		$q = "SELECT a.`id` AS imageid, a.`url`, a.`name`, b.`id` AS tagid
			  FROM `images` as a
			  INNER JOIN `imagesTag` as c ON a.`id` = c.`images_id`
			  INNER JOIN `tags` as b ON b.`id` = c.`tags_id`
				WHERE b.`id` = $tagid
				ORDER BY a.`id` ASC
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



}



?>