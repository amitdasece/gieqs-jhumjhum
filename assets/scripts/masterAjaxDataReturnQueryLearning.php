<?php

			$openaccess = 0;
			$requiredUserLevel = 4;
			
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');


//print_r('hello');

//error_reporting(E_ALL);
$general = new accessClassLearning;



function ne($v) {
	return $v != '';
}



//$connection = new DataBaseMysql();

//required GET variables  table, query, fieldsToGetObject, outputFormat

//e.g. with table

//1 jsonm
//2 table
//3 check data value exists
//4 check multiple values exist

/*

	http://localhost:90/dashboard/esd/scripts/masterAjaxDataReturnQuery.php?table=tags&outputFormat=2&Identifier%5C=id&1=tagName

	as shown the table header can be specified as the first part of the data string

*/


//check count of get variables

if (count($_GET) > 0){




	$data = $general->sanitiseGET($_GET);

	foreach ($data as $key=>$value){

		$GLOBALS[$key] = $value;

	}

	//print_r($GLOBALS);
	//print_r($data);

	if (!isset($table)){

		echo 'Table key not set';
		exit();

	}

	/*if (!isset($query)){

		echo 'Query key not set';
		exit();

	}*/

	if (!isset($outputFormat)){

		echo 'Output format key not set';
		exit();

	}

	if ($outputFormat == 1 || $outputFormat == 2 || $outputFormat == 3){

		unset($data['table']);
		unset($data['query']);
		unset($data['outputFormat']);

		//print_r($data);


		foreach($data as $key=>$value)
		{
			if(is_null($value) || $value == '' || $value == 'undefined')
				unset($data[$key]);
		}

		//print_r($data);


		$dataString2 = implode('` , `', $data);


		//echo $dataString2;

		//SELECT the required fields from the database

		if ($query){

			$q = "SELECT `$dataString2` FROM `$table` WHERE $query";

			//echo $q;

		}else {

			$q = "SELECT `$dataString2` FROM `$table`";

			//echo $q;


		}



		//echo $q;

		$result = $general->connection->RunQuery($q);

		//if ($result->num_rows > 1){

		//$returnArray = array();

		//print_r($result->fetch_array(MYSQLI_ASSOC));

		if ($outputFormat == 1){

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = array_map('utf8_encode', $row);
			}


			echo json_encode($rows);

		}else if ($outputFormat == 2){

				echo '<table id="dataTable">';

				echo '<tr>';

				foreach ($data as $key=>$value){


					echo '<th>' . $key . '</th>';




				}

				echo '</tr>';

				while($row = $result->fetch_array(MYSQLI_ASSOC)){

					echo '<tr class="'.$table.'row">';

					foreach($data as $key=>$value){


						echo '<td>';
						echo $row[$value];
						echo '</td>';

					}

					echo '</tr>';


				}



				echo '</table>';




			}else if ($outputFormat == 3){

				//echo 'database query is ' . $q;

				if ($result->num_rows == 1){

					echo 1;

				}else {

					echo 0;

				}



			}

	}

	if ($outputFormat == 4){

		unset($data['table']);
		//unset($data['query']);
		unset($data['outputFormat']);
		
		//parent/foreign key identifier array
		
		//$dataString = implode('` , `', $pfkeyidarray);
		
		//parent/foreign key data array
		
		//$dataString2 = implode('` , `', $pfkeydataarray);
		
		print_r($data);
		
		//unset($data['pfkeyidarray']);
		//unset($data['pfkeydataarray']);


		foreach($data as $key=>$value)
		{
			if(is_null($value) || $value == '' || $value == 'undefined')
				unset($data[$key]);
		}
		
		//remaining should be array of data pairs to check
		
		
		//  Arry => 1 =>Array([images_id] => , [tags_id] => )
		//
		//
		
		$errors=0;
		
		foreach ($data as $key=>$value)	{
			
			//get the keys once
			
			$keys = array();
			
			$keys = array_keys($value);
			
			
		}
		
		foreach ($data as $key=>$value) {
			
			foreach ($value as $k=>$v){
				
				
				$q = "SELECT `" . implode('` , `', $keys) . "` FROM `$table` WHERE `$k` = $v";
				
				$result = $general->connection->RunQuery($q);
				
				if ($result->num_rows == 1){
					
					$errors++;
		
				}else {
		
				
				}
				
			}
			
			
			
		}
		
		if ($errors == 0){
			
			echo 0;
			
		}else{
			
			echo 1;
			
		}


	}

	//}else{

	//return NULL;

	//}






	//remove the preset global variables

	foreach ($data as $key=>$value){

		unset($GLOBALS[$key]);


	}

}else{

	echo 'No variables passed';

}

$general->endaccessClassLearning();
