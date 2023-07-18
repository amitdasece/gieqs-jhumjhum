<?php 

$debugAccess = false;
$test = false;
$testDate = '2022-09-30 00:00:00';


if (!$test){
if ($isSuperuser == 1){

  $courseTest = false;
}else{


  $courseTest = false;
}
}

if ($test){

$gieqs_iii_day = $assetManager->whichDayGIII($courseTest,false, $test, $testDate);



}else{

  $gieqs_iii_day = $assetManager->whichDay($courseTest,false);

}

if ($debugAccess){

  echo '<br/><br/>value of gieqs_iii_day = ' . $gieqs_iii_day;

} 

$gieqs_iii_is_live = $assetManager->gieqsIILive($gieqs_iii_day);

if ($debugAccess){

  echo '<br/><br/>value of gieqs_iii_is_live = ' . $gieqs_iii_is_live;

} 

if(isset($userid))
{
  $gieqs_iii_has_access_to_today = $assetManager->hasAccessGIEQsIII($gieqs_iii_day, $userid, false);
}


if ($debugAccess){

  echo '<br/><br/>value of gieqs_iii_has_access_to_today = ' . $gieqs_iii_has_access_to_today;

} 

$gieqs_iii_plenary_link = $assetManager->requiredAssetGIEQsIII($gieqs_iii_day,true);

if ($debugAccess){

  echo '<br/><br/>value of gieqs_iii_plenary_link = ' . $gieqs_iii_plenary_link;

} 

$gieqs_iii_complex_link = $assetManager->requiredAssetGIEQsIII($gieqs_iii_day,false);

if ($debugAccess){

  echo '<br/><br/>value of gieqs_iii_complex_link = ' . $gieqs_iii_complex_link;

} 