<?php
require ('../../assets/includes/config.inc.php');		
require(BASE_URI . '/pages/backend/institution_header.php');
?>


            <div class="d-flex mt-3">

                <div class="p-4 border border-1">

                    <div class="d-flex">

                        <h4>Access Management</h4>

                     </div>

                    <div class="ps-2 d-flex justify-content-between align-items-center">
                       
                        <?php
                        
                        $tokens = $institutional_manager->getTokensInstitution($institution_id);

                        //var_dump($tokens);
                        
                        foreach ($tokens as $key=>$value){
                            ?>

                            <div class="">

                                <?php

                            $token->Load_from_key($value);
                            $date_created = null;
                            $date_created = new DateTime($token->getcreated());
                            $date_created_human = date_format($date_created, 'd/m/Y');
                            $assets_paid->Load_from_key($token->getasset_id());


                            ?>
                            
                            <h6>Token #<?php echo $token->getid();?></h6>
                            <p class='m-2'><?php echo $assets_paid->getname() . '<br/>Purchased: ' .  $date_created_human . '<br/>Value: &euro;' . $token->getcost(); ?></p>
                        
                        <button class="btn btn-sm bg-secondary text-white manage-token" data-tokenid="<?php echo $value;?>" data-tokencipher="<?php echo $token->getcipher();?>">Manage</button>
                        <button class="btn btn-sm bg-secondary text-white generate-token-link" data-tokenid="<?php echo $value;?>" data-tokencipher="<?php echo $token->getcipher();?>" data-assetid="<?php echo $assets_paid->getid();?>">Generate Link</button>
                        </div>
                        <?php
                    }
                    ?>


                </div>
               
                     </div>

                    


                </div>

                <!-- <div class="p-4 border border-1 ms-3">
                    <div class="d-flex">

                    <h4>Institution Management</h4>

                    </div>
                    <div class="d-flex justify-content-between align-items-center">


                    <button class="btn btn-sm bg-secondary text-white manage-token">Manage</button>
                    </div>

                </div> -->

                

<?php
            //exit();

            //$token->Load_from_key($id);

            




            echo '</div>';

            echo '<p class="mt-5" id="message"></p>';




            ?>
           
<script>

$(document).ready(function() {


    $(document).on('click', '.manage-token', function(){

        var tokenid = $(this).attr('data-tokenid');
        var institutionid = $(document).find('#institutionid').text();
        //var userid = $(this).attr('user-id');

        window.location.href = siteRoot + 'pages/backend/institution_token_who.php?institution_id=' + institutionid + '&token_id=' + tokenid;

        




    })

    $(document).on('click', '.generate-token-link', function(){

        var tokenid = $(this).attr('data-tokenid');
        var cipher = $(this).attr('data-tokencipher');
        var assetid = $(this).attr('data-assetid');
        var institutionid = $(document).find('#institutionid').text();
        //var userid = $(this).attr('user-id');

        var link = siteRoot + 'pages/program/program_generic.php?access_token=' + cipher + '&id=' + assetid;

        var link_html = '<a href="' + link + '">' + link + '</a>';

        $(document).find('#message').html(link_html);

        //window.location.href = siteRoot + 'pages/backend/institution_token_who.php?institution_id=' + institutionid + '&token_id=' + tokenid;






    })


})


</script>


<?php


                

$general->endgeneral;
$programme->endprogramme;
$session->endsession;
$faculty->endfaculty;
$sessionItem->endsessionItem;
$queries->endqueries;
$sessionView>endsessionView;?>