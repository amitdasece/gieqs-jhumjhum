<?php

$filters = array
  (
  "centreID" => array
    (
    "filter"=>FILTER_SANITIZE_STRING,
    ),
  "Duration" => array
    (
    "filter"=>FILTER_VALIDATE_INT,
    "options"=>array
      (
      "min_range"=>15,
      "max_range"=>600
      )
    ),
  );
filter_input_array(INPUT_GET, $filters);


$centreID = $_GET['centreID'];
$endoscopistID = $_GET['endoscopistID'];
$traineeID = $_GET['traineeID'];
$listDate = $_GET['listDate'];
$Duration = $_GET['Duration'];
$StartTime = $_GET['StartTime'];


require '../classes/List.class.php';

$PolypList = new PolypList;
$PolypList->PolypList();
$PolypList->New_List($centreID,$endoscopistID,$traineeID,$listDate,$Duration,$StartTime);

echo $PolypList->Save_Active_Row_as_New();

//returns Inserted if successful and Not inserted if not

//echo $PolypList->Get_Last_Entered_Success();

//echo jsonss_encode($Endoscopists->Endoscopist_given_centre($_GET['centreID']));


?>