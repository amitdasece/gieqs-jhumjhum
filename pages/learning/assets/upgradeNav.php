<?php

//require '../../includes/config.inc.php';	

require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
         


?>


<nav class="mt-2 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold"  style="z-index: 1 !important;">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>/pages/learning/index.php"><?php echo 'GIEQs Online';?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">


            
            <?php  if ($currentUserLevel == '6'){
                        ?>
                
                <li class="nav-item">
                   
                    <a class="nav-link nav-link-icon">
                       
                        
                        <span class="nav-link-inner--text ">GIEQs <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2">FREE</span> Member</span></a>
                      
                    
                    
                    


                           


                                <!-- <span class="nav-link-inner--text ">Complex</span> -->
                            
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon">

                        <span class="nav-link-inner--text ">You are missing out on key features.   <span class="subscribe-now gieqsGold cursor-pointer" data-assetid="5">Upgrade now!</span></span>
                    </a>
                </li>
                <?php
            }else if ($currentUserLevel == '4'){

                if ($sitewide_status == 1){
                ?>
                                           <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon" 
                       >
                       
                       <span class="nav-link-inner--text ">GIEQs <span class="subscribe-now badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">Standard</span> Member</span></a>
                     
                   
                   
                   


                          


                               <!-- <span class="nav-link-inner--text ">Complex</span> -->
                           
               </li>

               <li class="nav-item">
                   <a class="nav-link nav-link-icon" class="nav-link-inner--text"
                       >

                       <span class="nav-link-inner--text mr-2">Want access to ALL content and more?  <span class="subscribe-now gieqsGold cursor-pointer">Upgrade Now!</span>
                   </a>
               </li>
                <?php

                }elseif ($sitewide_status == 2){
                    ?>
                                               <li class="nav-item">
                       
                       <a class="nav-link nav-link-icon" 
                           >
                           
                           <span class="nav-link-inner--text ">GIEQs <span class="subscribe-now badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">PRO</span> Member</span></a>
                         
                       
                       
                       
    
    
                              
    
    
                                   <!-- <span class="nav-link-inner--text ">Complex</span> -->
                               
                   </li>
    
                   <li class="nav-item">
                       <a class="nav-link nav-link-icon" class="nav-link-inner--text"
                           >
    
                           <span class="nav-link-inner--text ">Thanks for your support!</span>                       </a>
                   </li>
                    <?php
    
                    }

                    }else {
                ?>
                                           <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon"
                       >
                       
                       <span class="nav-link-inner--text ">GIEQs&nbsp;<span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">PRO</span>Member</span></a>
                     
                   
                   
                   


                          


                               <!-- <span class="nav-link-inner--text ">Complex</span> -->
                           
               </li>

               <li class="nav-item">
                   <a class="nav-link nav-link-icon"
                       >

                       <span class="nav-link-inner--text ">Thanks for your support!</span>
                   </a>
               </li>
                <?php
                    }
                ?>

<li class="nav-item">

<a class="nav-link nav-link-icon"><?php echo $coin->current_balance($userid) . '&nbsp;';
?>
<img
src="<?php echo BASE_URL . "/assets/img/icons/coin.svg"?>"
alt="GIEQs Coin" 
/>
</a>


</li>

               
            </ul>

        </div>
    </div>
</nav>

<?php require BASE_URI . '/assets/scripts/purchase.php';?>
