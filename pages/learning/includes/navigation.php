

    <?php

//error_reporting(E_ALL);


      //define user access level

      
      ?>

<div class="d-flex align-items-end">
        <?php

        //$requiredTagCategories = ['39', '40', '41', '42'];

        ?>
        <div class="container mt-4 p-2 bg-dark text-white" style="border: 1px solid #1b385d;">
        <div class="d-flex">
            <span class='mr-auto p-2'>Navigator</span>
            
            <!-- <form class="d-flex">
                                                    
                                                    <div class="form-group mr-2 mt-1 ml-auto">
                                                        
                                                        <div class="input-group input-group-merge">
                                                          <select name="filter" id="filter" class="form-control form-control-sm">
                                                            <option hidden inactive>sort by</option>
                                                            <option value="0">Video type (lecture, trainee etc...)</option>
                                                            <option value="1">Title</option>
                                                            <option value="2">Oldest First</option>
                                                            <option value="3">Newest First</option>
                                                            <option value="4">Author</option>
                                                            </select>
                                                    
                                                        </div>

                                                    </div>
                                                   
                            
                                                </form> -->
            <?php if ($currentUserLevel < 3){?>

            <form class="d-flex">
                                                    
                                                    <div class="form-group mt-1 ml-auto">
                                                        
                                                        <div class="input-group input-group-merge">
                                                          <select name="active" id="active" class="form-control form-control-sm">
                                                            <option hidden inactive>choose status</option>
                                                            <option value="0">Not shown, not tagged, inactive video</option>
                                                            <option value="1" selected>Shown on Live site</option>
                                                            <option value="2">Needs tagging</option>
                                                            <option value="3">Shown on Live site and available free</option>
                                                            </select>
                                                         
                                                        </div>
                                                      </div>
                                                   
                            
                                                </form>
                                                <?php }?>

            <span class='p-2 mr-2 bd-highlight text-muted'><span id='itemCount'></span> video(s) shown</span>
            <span id="certification-modal-open" class="p-2"><i class="fa fa-certificate cursor-pointer hover-text-gold" aria-hidden="true"></i></span>
            
            <span id='refreshNavigation' class='p-2 bd-highlight' data-toggle="tooltip" data-placement="bottom" title="refresh"><i class="cursor-pointer fas fa-redo"></i></span>
            <span class='p-2 bd-highlight' data-toggle="tooltip" data-placement="bottom" title="search" data-action="omnisearch-open" data-target="#omnisearch"><i class="cursor-pointer fas fa-search"></i></span>
            
                    <span class='p-2 bd-highlight'><i id="navigatorCollapseButton" class="cursor-pointer fas fa-chevron-down"
                    data-toggle="collapse" data-target="#navigatorCollapse"></i></span>

        </div>
        <div id="shown-tags" class="d-flex flex-wrap justify-content-start mt-4 mb-4 pt-0 bg-dark text-white">
            </div>
        <div id="navigatorCollapse" class="collapse show">
            <div class="d-flex flex-wrap justify-content-start mt-1 pt-0 bg-dark text-white">

        <?php

        foreach ($requiredTagCategories as $key=>$value){

           //echo $value;

           $tagCategory = $value;

            $data = $navigator->generateNavigationSingle($value);

            
            ?>

            <div class="d-flex m-2 pt-0 bg-dark-light text-white text-sm flex-nav navigator-item">
            
            <a class='p-2 bd-highlight' data-toggle="dropdown" data-flip="false"><i class="cursor-pointer fas fa-chevron-down"></i></a>

            <div class="dropdown-menu bg-dark-light text-white" aria-labelledby="dropdownMenuButton">
            <?php

            foreach ($data as $key=>$value){

                //generate HTML

                ?>

                   
                    
                        <a class="dropdown-item text-white">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input tag" id="tag<?php echo $value['id'];?>" data="<?php echo $value['id'];?>">
                                <label class="custom-control-label" for="tag<?php echo $value['id'];?>"><?php echo $value['name'];?></label>
                            </div>
                        </a>


            <?php 
                    }

            ?>
                    </div>
                    <span class='mr-auto p-2 cursor-pointer' data-toggle="dropdown"><?php echo $general->getCategoryName($tagCategory);?></span>
                    <!--<span class='p-2 bd-highlight'>x</span>-->

                </div>

                <?php

            

            

        }
        
       

        ?>
            </div>
           

        </div>
    </div>
</div>