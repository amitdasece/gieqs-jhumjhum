<?php

$debug = false;

function getProgrammeStartTime($assetid, $assetManager, $sessionView, $programme){

    $debug=false;
    $programme_array = $assetManager->returnProgrammesAsset($assetid);
    $programme_defined = $programme_array[0];
    $access = [0=>['id'=>$programme_defined],];
    $access1 = null;
    $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);
    $access2 = null;
    $access2 = $sessionView->getStartEndProgrammes($access1, $debug);
    $programme->Load_from_key($programme_defined);
    $serverTimeZone = new DateTimeZone('Europe/Brussels');
    $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);
    $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");
    $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);
    $endTime = new DateTime($programme->getdate() . ' ' . $access2[0]['endTime'], $serverTimeZone);
    $humanStartTime = date_format($startTime, "H:i");
    $humanEndTime = date_format($endTime, "H:i T");
    return $startTime;

}

function getStatusUser($userid, $assetManager, $userFunctions, $debug=false){

    $siteWideSubscriptionid = $assetManager->getSiteWideSubscription($userid, false);
    
          if ($debug){
            echo 'SUBSCRIPTION ID IS ' . $siteWideSubscriptionid;
            }
    
          //find out which asset
    
          $assetid_subscription = $assetManager->getAssetid($siteWideSubscriptionid);
    
          if ($debug){
            echo 'ASSET ID IS ' . $assetid_subscription;
            }
    
          //allocate umber based on 6 FREE, 5 STANDARD, 4 PRO

          if ($userFunctions->isSuperuser($userid) === true){

            $sitewide_status = '2';


          }else{
    
          $sitewide_status = $assetManager->getMembershipStatusAssetid($assetid_subscription);
    
          if ($debug){
            echo 'SITE WIDE STATUS IS ' . $sitewide_status;
            }
        }


        return $sitewide_status;
}

function getPastAdvertisedAssets ($assetManager, $sessionView, $programme) {

    $assets = [];


    $assets2 = $assetManager->returnAdvertisedAssets(2, false);
    $assets3 = $assetManager->returnAdvertisedAssets(3, false);
    $assets4 = $assetManager->returnAdvertisedAssets(4, false);


    //define date today
    $today = new DateTime('now');

    //add them all to an array

    foreach ($assets2 as $key=>$value){
        
        foreach ($value as $key2=>$value2){

            //add the id to the array ONLY if the start time is not in the future
            if (getProgrammeStartTime($value['id'], $assetManager, $sessionView, $programme) < $today){
                    $assets[] = $value['id']; 
                    break;
            }

        }
        


    }

    foreach ($assets3 as $key=>$value){

        foreach ($value as $key2=>$value2){
            //var_dump($value['id']);

            //add the id to the array ONLY if the start time is not in the future

            if (getProgrammeStartTime($value['id'], $assetManager, $sessionView, $programme) < $today){
                $assets[] = $value['id']; 
                break;

            }

        }


    }

    foreach ($assets4 as $key=>$value){

        //no dates in these assets

        foreach ($value as $key2=>$value2){
            //var_dump($value['id']);

            $assets[] = $value['id'];
            break;


        }


    }

    return $assets;


}