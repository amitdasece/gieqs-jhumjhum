<?php
ob_start();
error_reporting(0);


$checkDate = '';
$programmeDate = new DateTime($response[0]['date']);

//echo $programmeDate->format('D d M Y');
//print_r($response);

//further iterations the same with the sessionItem data

//generate the HTML



?>


<div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
<div class="modal-header">

<div class="modal-title d-flex align-items-left" id="modal-title-change-username">
<div>
<div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
    <img src="<?php echo BASE_URL;?>/assets/img/icons/gieqsicon.png">
</div>
</div>
<div class="text-left">
<h2><span class="h5 mb-0">GIEQs Conference plan for <?php echo $sessionView->getFacultyNamePrint($facultyid)?></span></h2>
<?php
    if ($edit == 1){
        echo '<span class="ml-3 editSession" data="' . $response[0]['sessionid'] . '"><i class="fas fa-edit"></i></span>';

    }

?>

</div>

</div>


</div>

<div class="modal-body">

<div class="programme-body">
<?php foreach ($response as $key=>$value){
        
        
       

        
        ?>

<hr>
<div class="sessionItem row d-flex align-items-left text-left align-middle">
<span class="sessionItemid" style="display:none;"><?php echo $value['sessionItemid'];?></span>
<div class="pl-2 pr-1 pb-0 pt-1 time">

<?php if ($checkDate != $value['date']){?>

    <h3><p><?php $checkDate = $value['date']; $programmeDate = new DateTime($value['date']);?>
    <span><?php echo $programmeDate->format('D d M Y');?></span>
    </p></h3>

<?php }?>
    <p><span style="font-weight:bold;">Session</span><span> : <?php echo $value['sessionTitle'];?></span> (<span><?php echo $value['timeFrom'] . ' - ' . $value['timeTo']; ?></span>)
    <span><br/><?php echo $value['sessionDescription'];?></span></span>
    

</p>
    <p>Role : <span style="font-weight: bold;"><?php if ($value['facultyid'] == $facultyid){echo 'Moderator '; continue;} elseif($value['live'] == 1){echo 'Live Case';}else{echo 'Lecture   ';}?></span></p>
    <span class="timeFrom"><?php echo $value['sessiontimeFrom'];?></span> - <span class="timeTo"><?php echo $value['sessiontimeTo'];?></span>
    : <span style="font-weight: bold;" class="h6 sessionTitle"> <?php echo $value['sessionItemTitle'];?></span>

</div>


</div>
<div class="row d-flex align-items-left text-left align-middle">
<div class="pl-3 pr-1 pb-0 pt-0 time">
    <span class="sessionDescription"><?php echo $value['sessionItemDescription'];?></span>

    <p class="pt-2 h6 faculty"><?php 
    
    $faculty = $sessionView->getFacultyName($value['faculty']);

    echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];
    
    
    ?></p>

    <?php  $assets = $sessionView->getAssets($value['sessionItemid']);

    //print_r($assets); 
    
    if ($assets){
    
    ?>

    <p class="pt-3 pl-6 assets"><span class="h6">Session Assets</span>


        
        <?php

        foreach ($assets as $key=>$value){



            if ($edit == 1){
                echo '<span class="ml-3 editAsset"><i class="fas fa-edit"></i></span>';
                echo '<span class="ml-3 deleteAsset"><i class="fas fa-times"></i></span>';

            }

        }
        
        
        if ($edit == 1){
            //because we only want one plus button
        echo '<span class="ml-3 addAsset"><i class="fas fa-plus"></i></span>';
        }

    }

    ?>
    </p>
</div>
</div>


<?php }?>

</div>
<hr>
<div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
<p class="text-muted text-sm">Programme subject to change without notice.  We will reconfirm sessions with you nearer the time.</p>
</div>
</div>
<div class="modal-footer">

</div>
</div>

<?php 
return ob_get_clean();
?>
