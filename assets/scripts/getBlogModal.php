<?php
header('Access-Control-Allow-Origin: *');
            $openaccess = 1;
			//$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');

            //$general = new general;
            //$programme = new programme;
            $blogLink = new blogLink;
            $blogs = new blogs;
            $userFunctions = new userFunctions();
            $assetManager = new assetManager();
            
            //error_reporting(E_ALL);
            $debug = false;

            //$print_r()

            $data = json_decode(file_get_contents('php://input'), true);

            
            if ($debug){
            print_r($data);
            }

            $blogid = $data['blogid'];
            $databaseName = $data['databaseName'];
            $blogs->Load_from_key($blogid);
            

            ?>


<div class="modal fade" id="modal-row-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

        <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
            <div class="modal-header">
                <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                    <div>
                        <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                            <img src="../../assets/img/icons/gieqsicon.png">
                        </div>
                    </div>
                    <div class="text-left">
                        <h5 class="mb-0">Edit <?php echo $databaseName;?></h5>
                        <span class="mb-0"></span>
                    </div>

                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <div>
                            <?php 
                            
                            /* if ($emails->getemail_id()){
                            $sent = $userFunctions->mailSent($emails->getemail_id());
                            }else{

                            $sent = false;
                            }

                            if ($sent === true){

                                $sentText = 'been sent';

                            }else if ($sent === false){

                                $sentText = 'never been sent';

                            } */
                            
                            ?>
<!--                             <h6 class="mb-0"><?php //echo 'Email has ' . $sentText;?></h6>
 -->

                            <span id="modalMessageArea" class="mb-0"></span>

                        </div>
                        <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
                            <span id="topModalSuccess"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">

                <div class="<?php echo $databaseName;?>-body">
                    <form id="<?php echo $databaseName;?>-form">
                        <div class="form-group">
                            <!-- EDIT -->

                            <label for="blog_id">blog_id</label>
                            <div class="input-group mb-3">
                                <input id="blog_id" type="text" class="form-control" name="blog_id">
                            </div>

                            <label for="name">name</label>
                            <div class="input-group mb-3">
                                <input id="name" type="text" class="form-control" name="name">
                            </div>

                            <label for="subject">Category</label>
                            <div class="input-group mb-3">
                                <select id="subject" type="text" data-toggle="select" class="form-control"
                                    name="subject">
                                    <option value="" selected disabled hidden>please select an option</option>


                                    <?php $categories = $assetManager->getSuperCategories();
                                    
                                    foreach ($categories as $key=>$value){

                                        echo '<option value="' . $value['superCategory'] . '">' . $value['superCategory_t'] . '</option>';


                                    }
                                    
                                    
                                    ?>

                                    
                                </select>
                            </div>

                            <label for="preheader">Description</label>
                            <div class="input-group mb-3">
                                <textarea id="preheader" type="text" data-toggle="autosize" class="form-control"
                                    name="preheader"></textarea>
                            </div>

                            <label for="author">Author</label>
                            <div class="input-group mb-3">
                                <select id="author" type="text" data-toggle="select" class="form-control"
                                    name="author">
                                    <option value="" selected disabled hidden>please select an option</option>

                                <?php echo $userFunctions->generateUserNames();?>
                                </select>
                            </div>

                            <label for="featured">Hold in Featured Area?</label>
                            <div class="input-group mb-3">
                                <select id="featured" type="text" data-toggle="select" class="form-control"
                                    name="featured">
                                    <option value="" selected disabled hidden>please select an option</option>
                                    <option value="0">Not Featured</option>
                                    <option value="1">Featured</option>

                                

                                </select>
                            </div>

                            <!-- <label for="active">Active</label>
                            <div class="input-group mb-3">
                                <select id="active" type="text" data-toggle="select" class="form-control"
                                    name="active">
                                    <option value="" selected disabled hidden>please select an option</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Shown on Site</option>
                                </select>
                            </div> -->

                            <!-- <label for="audience">audience</label>
                            <div class="input-group mb-3">
                                <select id="audience" type="text" data-toggle="select" class="form-control"
                                    name="audience">
                                    <option value="" selected disabled hidden>please select an option</option>
                                    <option value="1">All Users</option>
                                    <option value="2">Mailing List Services Only (Users)</option>
                                    <option value="3">Expanded Mailing List + Users (Mailing List Services)</option>
                                    <option value="4">Expanded Mailing List Only</option>
                                    <option value="5">Specific Course Recipients</option>
                                    <option value="6">Specific Recipients, Listed below, Comma separated</option>
                                </select>
                            </div>

                            <label for="audience_specify">Specify Audience (required if 5 or 6 selected above, 5 asset id of course, 6 comma separated email addresses)</label>
                            <div class="input-group mb-3">
                                <textarea id="audience_specify" type="text" data-toggle="autosize" class="form-control"
                                    name="audience_specify"></textarea>
                            </div> -->

                            <input type="hidden" name="active">
                            <input type="hidden" name="updated" value="<?php echo $timestamp = date('Y-m-d H:i:s');?>">

                        </div>
                    </form>
                    <form id="emailContent-form">
                        <div class="emailBody">
                            <!-- get from ajax all associated emailCreators -->



                            <hr>
                            <hr>
                            <!-- get all connections for this email id -->
                            <?php 
                                
                                $emailContents = $blogLink->getEmailContents($blogid, false);

                                //var_dump($emailContents);

                                $x=0;

                                foreach ($emailContents as $key=>$value){

                                    if ($value['video'] != NULL){
                                        //is a video
?>

                            <div draggable="true" style="cursor: move;"
                                class="input-group input-group-merge mb-3 can-drag">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Video</span>
                                </div>

                                <input data-id="<?php echo $value['id'];?>" data-sort-order="<?php echo $x;?>"
                                    data-type="video" class="mx-1 p-2 form-control emailContent"
                                    value="<?php echo $value['video'];?>" placeholder="vimeo id">

                                <input data-id="<?php echo $value['id'];?>" data-type="text"
                                    data-sort-order="<?php echo $x;?>" type="text"
                                    class="form-control mr-1 p-2 emailContent" name="id"
                                    value="<?php echo $value['text'];?>" placeholder="video thumbnail img src">

                                <div class="input-group-append">

                                    <span class="input-group-text delete-email-content"
                                        data-id="<?php echo $value['id'];?>"
                                        style="cursor: pointer !important;">x</span>

                                </div>
                            </div>


                            <?php
                                    }else if($value['img'] != NULL){
                                        //is an image?>


                            <div draggable="true" class="input-group input-group-merge mb-3 can-drag">
                                <div class="input-group-prepend">

                                    <span class="input-group-text">Image</span>

                                </div>

                                <input data-id="<?php echo $value['id'];?>" data-sort-order="<?php echo $x;?>"
                                    data-type="img" type="text" class="p-2 mx-1 form-control emailContent" name="img"
                                    value="<?php echo $value['img'];?>" placeholder="image src">
                                <input data-id="<?php echo $value['id'];?>" data-type="text"
                                    data-sort-order="<?php echo $x;?>" type="text"
                                    class="form-control mr-1 p-2 emailContent" name="id"
                                    value="<?php echo $value['text'];?>" placeholder="href">

                                <div class="input-group-append">

                                    <span class="input-group-text delete-email-content"
                                        data-id="<?php echo $value['id'];?>"
                                        style="cursor: pointer !important;">x</span>

                                </div>

                            </div>
                            <?php
                                    }else{

                                        //is text
                                        ?>


                            <div draggable="true" class="input-group input-group-merge mb-3 can-drag"
                                style="cursor: move;">
                                <div class="input-group-prepend">

                                    <span class="input-group-text">Text</span>
                                </div>

                                <textarea data-id="<?php echo $value['id'];?>" data-type="text"
                                    data-sort-order="<?php echo $x;?>" type="text" data-toggle="autosize"
                                    class="form-control p-2 emailContent" name="id"
                                    data-toggle="autosize"><?php echo $value['text'];?></textarea>
                                <div class="input-group-append">

                                    <span class="input-group-text delete-email-content"
                                        data-id="<?php echo $value['id'];?>"
                                        style="cursor: pointer !important;">x</span>

                                </div>

                            </div>



                            <?php
                                        

                                    }

                                   
                                

                                    $x++;
                                }


                                
                                
                                ?>




                        </div>

                        <button class="addText btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            text</button>
                        <button class="addImg btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            img</button>
                        <button class="addVideo btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            video</button>

                            <button class="expand-components btn btn-sm m-2 px-2 py-0 bg-primary text-white form-control">Expand All Fields</button>
                            <button class="shrink-components btn btn-sm m-2 px-2 py-0 bg-primary text-white form-control">Shrink All Fields</button>
                        <!-- <button class="addTextButton btn btn-sm m-2 px-2 py-0 bg-gieqsGold text-dark form-control">+
                            button</button> -->




                </div>
                </form>

                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                </div>
            </div>
            <div class="modal-footer">
                <?php
            if ($blogs->getactive() == '1'){
?>

                <button type="button" class="btn btn-sm btn-warning uncommitEmail">Edit Blog</button>





                <?php
            }else{?>

                <?php if ($sent === true){?>

                <button type="button" class="btn btn-sm bg-gieqsGold text-dark clearRecipients">Clear
                    Recipients</button>



                <?php }?>

                <button type="button" class="btn btn-sm btn-warning text-dark commitEmail">Commit Blog</button>
                <!-- <button type="button" class="btn btn-sm bg-gieqsGold text-dark testEmail">Send Test Email</button>
 -->


                <?php  }?>


                <button type="button" class="btn btn-sm btn-info launchViewer">Launch Viewer Window</button>

                <button type="button"
                    class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

</div>




<?php
        

            
           

            
             
//$general->endgeneral();
//$programme->endprogramme();
//$userRegistrations->enduserRegistrations();
?>