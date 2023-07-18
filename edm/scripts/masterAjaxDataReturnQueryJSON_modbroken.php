<?php

$openaccess = 0;
			$requiredUserLevel = 4;
			require ('../../includes/config.inc.php');		
			require (BASE_URI1.'/scripts/headerScript.php');

$general = new general;



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

$data = json_decode(file_get_contents('php://input'), true);

//print_r($data);

//check count of get variables

if (count($data) > 0){




	//$data = $general->sanitiseGET($data);

	/*foreach ($data as $key=>$value){

		$GLOBALS[$key] = $value;

	}*/

	//print_r($GLOBALS);
	//print_r($data);

	if (!isset($data['table'])){

		echo 'Table key not set';
		exit();

	}else{

		$table = $data['table'];

	}

	/*if (!isset($query)){

		echo 'Query key not set';
		exit();

	}*/

	if (!isset($data['outputFormat'])){

		echo 'Output format key not set';
		exit();

	}else{

		$outputFormat = $data['outputFormat'];
		//echo 'outputformat = ' + $outputFormat;

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

		//print_r($data);

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

		$values = array();

		$errors=0;

		foreach ($data as $key=>$value) {

			//get the keys once

			$keys = array();

			$keys = array_keys($value);


		}

		$i = 0;
		$ilen = count( $keys );

		foreach ($data as $key=>$value) {

			$y='';

			foreach ($keys as $k1=>$v1){

				$y .= '`' . $v1 . '` = ' .$value[$v1];

				if( ++$i != $ilen ){

					$y .= ' AND ';

				}

			}





			$q = "SELECT `" . implode('` , `', $keys) . "` FROM `$table` WHERE $y"; //only one key here!

			//echo $q;

			$result = $general->connection->RunQuery($q);

			if ($result->num_rows >= 1){

				$errors++;

			}else {


			}





		}

		if ($errors == 0){

			echo 0;

		}else{

			echo 1;

		}


	}

	if ($outputFormat == 5){

		unset($data['table']);
		unset($data['outputFormat']);

		foreach($data as $key=>$value)
		{
			if(is_null($value) || $value == '' || $value == 'undefined')
				unset($data[$key]);
		}

		$errors=0;

		$values = array();

		$output = array();

		foreach ($data as $key=>$value) {

			//get the keys once

			$keys = array();


			$keys = array_keys($value);


		}

		$ilen = count( $keys );

		foreach ($data as $key=>$value) {

			$y=0;

			foreach ($keys as $k1=>$v1){

				$values[$y] = $value[$v1];
				$y++;

			}

			$q = "INSERT INTO $table (`" . implode('` , `', $keys) . "`) VALUES (" . implode(' , ', $values) . " )";



			//echo $q;

			$result = $general->returnWithInsertID($q);

			if ($result){

				$output[] = $result;

			}else {

				$errors++;


			}





		}

		if ($errors == 0){

			//echo 0;
			//print_r($output);
			echo json_encode($output);
			//actually encode a JSON of the insert IDs

		}else{

			echo 0;
			//actually encode 0

		}



	}

	if ($outputFormat == 6){  //update script same as above

		unset($data['table']);
		unset($data['outputFormat']);

		//print_r($data);

		foreach($data as $key=>$value)
		{
			if(is_null($value) || $value == '' || $value == 'undefined')
				unset($data[$key]);
		}

		$errors=0;

		$values = array();

		$output = array();

		$keys = array();

		foreach ($data as $key=>$value) {


			$keys[] = $key;
			//get the keys once



		}

		$wherekey = $keys[0];

		unset($keys[0]);


		//print_r($keys);

		$ilen = count( $keys );

		// where id  $data[id][x]
		// set field1 $data[field1][x]
		// set field2 $data[field2][x]

		//foreach ($data as $key=>$value) {


		$y = count($data[$wherekey]);

		for ($x = 0; $x < $y; $x++){

			$q = "UPDATE $table SET ";

			$i=0;

			foreach ($keys as $k1=>$v1){

				$q .= "`$v1` = '{$data[$v1][$x]} '";

				if( ++$i != $ilen ){

					$q .= ', ';

				}


			}

			$q .= " WHERE `$wherekey` = {$data[$wherekey][$x]}";

			//echo $q;

			$result = $general->connection->RunQuery($q);

			if ($result == 1){

				//$output[] = $result;

			}else {

				$errors++;


			}

		}







		//echo $q;







		//}

		if ($errors == 0){

			//echo 0;
			//print_r($output);
			echo 1;
			//actually encode a JSON of the insert IDs

		}else{

			echo 0;
			//actually encode 0

		}



	}
	
	if ($outputFormat == 7){

		unset($data['table']);
		//unset($data['query']);
		unset($data['outputFormat']);

		//parent/foreign key identifier array

		//$dataString = implode('` , `', $pfkeyidarray);

		//parent/foreign key data array

		//$dataString2 = implode('` , `', $pfkeydataarray);

		//print_r($data);

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
		$rows = array();

		$values = array();

		$errors=0;

		foreach ($data as $key=>$value) {

			//get the keys once

			$keys = array();

			$keys = array_keys($value);


		}

		$i = 0;
		$ilen = count( $keys );

		foreach ($data as $key=>$value) {

			$y='';

			foreach ($keys as $k1=>$v1){

				$y .= '`' . $v1 . '` = ' .$value[$v1];

				if( ++$i != $ilen ){

					$y .= ' AND ';

				}

			}





			$q = "SELECT `" . implode('` , `', $keys) . "` FROM `$table` WHERE $y"; //only one key here!

			//echo $q;

			$result = $general->connection->RunQuery($q);

			if ($result->num_rows >= 1){

				

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$rows[] = array_map('utf8_encode', $row);
			


			echo json_encode($rows);

			}
			}else{
				
				$errors++;
				
			}





			




		}

		if ($errors == 0){

			print_r($rows);

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

$general->endGeneral();
