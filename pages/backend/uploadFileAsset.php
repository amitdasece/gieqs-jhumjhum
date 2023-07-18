<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2

print_r($_FILES);

$errors = array();

if (!empty($_FILES)) {

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['file']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
            'ppt' => 'application/vnd.ms-powerpoint',
            'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'mp4' => 'video/mp4',
            'mov' => 'video/quicktime',
            'html' => 'text/html',
        ),
        true
    )) {
        $errors[]='Files must be of defined types';
    }
   
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    //move to temporary assets folder
    //keep track of the name

    //move to assets folder and files
     
    $targetFile =  $targetPath. 'ASSET' . $_FILES['file']['name'];  //5

    //echo $targetFile;

    if (empty($errors)){

    
 
        $successMove = move_uploaded_file($tempFile,$targetFile); //6

        if ($successMove){

            echo 'ASSET' . $_FILES['file']['name'];
            //TODO IF FILE EXISTS DO NOT WRITE AND ERROR
        }


    }else{

        print_r($errors);

    }
     
}
?>