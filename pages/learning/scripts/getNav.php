<?php

$openaccess = 1;
			//$requiredUserLevel = 4;
			
			require ('../includes/config.inc.php');		
			
			//require (BASE_URI.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			
			$general = new general;
			
            $navigator = new navigator;
            
            $tagsToMatch = json_decode(file_get_contents('php://input'), true);

            //print_r($data);

            //$key = $data['key'];

    

//error_reporting(E_ALL);


      //define user access level

      
      ?>

<div class="d-flex align-items-end bg-gradient-dark">
        <?php

        $requiredTagCategories = ['39', '40', '41', '42'];

        ?>
        <div class="container mt-10 pt-0 bg-dark text-white" style="border: 1px solid #1b385d;">
        <div class="d-flex">
            <span class='mr-auto p-2'>Navigator</span>

            <span class='p-2 bd-highlight'><i id="navigatorCollapseButton" class="cursor-pointer fas fa-chevron-down"
                    data-toggle="collapse" data-target="#navigatorCollapse"></i></span>

        </div>
        <div id="navigatorCollapse" class="collapse show">
            <div class="d-flex justify-content-start mt-1 pt-0 bg-dark text-white">

        <?php

        foreach ($requiredTagCategories as $key=>$value){

           //echo $value;

           $tagCategory = $value;

            $data = $navigator->generateNavigationSingle($value);

            $data2 = $navigator->generateNavigationSingleDisabledQuery($value, $tagsToMatch);

            $data3 = $navigator->getVideoTagsBasedOnVideosShown($data2);

            //print_r($data1);
           
           // print_r($data2);

            //print_r($data3); //gives the tags that can be enabled rest disabled
            
            ?>

            <div class="d-flex m-2 pt-0 bg-warning text-white flex-fill">
            <a class='p-2 bd-highlight' data-toggle="dropdown" data-flip="false"><i class="cursor-pointer fas fa-chevron-down"></i></a>
            <div class="dropdown-menu bg-warning text-white" aria-labelledby="dropdownMenuButton">
            <?php

            foreach ($data as $key=>$value){

                //generate HTML

                //check if $value['id'] is in $data3

                $disabled = true;

                foreach ($data3 as $key1=>$value1){

                    if ($value1['id'] == $value['id']){

                        $disabled = false;
                    }

                }

                ?>

                   
                    
                        <a class="dropdown-item text-white">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input tag" id="tag<?php echo $value['id'];?>" data="<?php echo $value['id'];?>" <?php if ($disabled){echo ' disabled';}?>>
                                <label class="custom-control-label" for="tag<?php echo $value['id'];?>"><?php echo $value['name'];?></label>
                            </div>
                        </a>


            <?php 
                    }

            ?>
                    </div>
                    <span class='mr-auto p-2'><?php echo $general->getCategoryName($tagCategory);?></span>
                    <span class='p-2 bd-highlight'>x</span>

                </div>

                <?php

            

            

        }
        
       

        ?>
            </div>


        </div>
    </div>
</div>