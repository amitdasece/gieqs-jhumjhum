

<?php require '../../includes/config.inc.php';?>


<head>

    <?php


    error_reporting(0);

      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      //error_reporting(E_ALL);
      
      $general = new general;
      $users = new users;
      $users->Load_from_key($userid);
      

      require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
      $assetManager = new assetManager;

      require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
      $subscription = new subscriptions;
     

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">





    <style>
    .gieqsGold {

        color: rgb(238, 195, 120);


    }

    .tagButton {

        cursor: pointer;

    }

    .tagCard {

        background-color: #1b385d75;



    }

    .tagCardHeader {

        background-color: #162e4d;

    }



    .cursor-pointer {

        cursor: pointer;

    }

    @media (min-width: 992px) {
        .tagCard {


            left: -50vw;
            top: -20vh;


        }
    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

        }

        #collapseExample {

            position: absolute;
            max-width: 50vh;
            z-index: 25;
        }

        #selectDropdown {


            z-index: 25;
        }



    }
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>




    </header>

    <?php
		if (isset($_GET["showresult"]) && is_numeric($_GET["showresult"])){
			$id = $_GET["showresult"];
            $asset_determined_by_subscription = $assetManager->getAssetType($id);


		
		}else{
		
			$id = null;
            $asset_determined_by_subscription = false;
		}


				        
        $debug = false;
             
                        
		
        ?>

    <!-- load all video data -->

    <body>

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
        <div id="asset_determined_by_subscription" style="display:none;"><?php if ($asset_determined_by_subscription){echo $asset_determined_by_subscription;}?></div>


        <div class="main-content">
            <!-- Header (account) -->
            <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10"
                style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/resection/ai.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;"
                data-offset-top="#header-main">


                <!-- Header container -->
                <div class="container pt-0 pt-lg-0">
                    <div class="row">
                        <div class=" col-lg-12">
                            <!-- Salute + Small stats -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto mb-4 mb-md-0">
                                    <span class="h2 mb-0 text-white text-bold d-block">My Account
                                        <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                                    <span class="text-white">Setup your GIEQs account.</span>
                                </div>
                                <!-- video -->
                                <div class="col-auto flex-fill d-none d-xl-block">
                                    <!-- <div id="videoDisplay" class="embed-responsive embed-responsive-16by9">
                <iframe  id='videoChapter' class="embed-responsive-item"
                    src='https://player.vimeo.com/video/398791515' allow='autoplay'
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div> -->
                                </div>
                            </div>
                            <!-- Account navigation -->


                        </div>
                    </div>
                </div>
            </section>
            <section class="slice">
                <div class="container">
                    <div class="row row-grid">
                        <div class="col-lg-9 order-lg-2">
                            <!-- Change avatar -->
                            <?php require(BASE_URI . '/pages/learning/pages/account/memberCard.php');?>

                            <!--Site Wide Subscriptions
            Asset User connections
            -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-5 col-lg-8">
                                            <span class="h6">GIEQs Online Status Subscription</span>
                                        </div>
                                        <div class="col-7 col-lg-4 text-right">
                                            <!-- <img alt="Image placeholder" src="../../assets/img/icons/cards/mastercard.png" width="40" class="mr-2">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/visa.png" width="40" class="mr-2">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/skrill.png" width="40"> -->
                                        </div>
                                    </div>
                                </div>
                                <div>

                                    <!-- 

know the user level
-->

                                    <?php


//$debug = true;


?>

                                    <!--
  get linked subscription (should have value type of 1)
there should only be 1
to become a user 4 must have a linked subscription;

get expiry

get whether expiring soon su




 -->

                                    <ul class="list-group list-group-flush">

                                        <?php 
                  
                  if ($siteWide){

                    //use $siteWideSubscriptionid to get data from subscriptions


                    if ($debug){

                      echo $siteWideSubscriptionid . ' is $siteWideSubscriptionid';
                    }

                  //  error_reporting(E_ALL);

//                    echo 'hello';

                    $subscription->Load_from_key($siteWideSubscriptionid);


                    $expiry_date = null;

                    $expiry_date = new DateTime($subscription->getexpiry_date(), new DateTimeZone('UTC'));

                    $expiry_date_display = null;

                    $expiry_date_display = new DateTime($subscription->getexpiry_date(), new DateTimeZone('UTC'));

                    if ($users->gettimezone() != ''){

                    $expiry_date_display->setTimezone(new DateTimeZone($users->gettimezone()));

                    }


                    ?>

                                        <li class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-sm-4"><small
                                                        class="h6 text-sm mb-3 mb-sm-0">Plan</small></div>
                                                <div class="col-sm-5">
                                                    <strong><?php echo $assetManager->getAssetName($siteWideSubscriptionid);?></strong>
                                                    <br />
                                                    Expires : <span
                                                        class="expiry_date"><?php echo date_format($expiry_date_display,"d/m/Y");?></span>
                                                    <br />
                                                    Renews : <span
                                                        class="renewalFrequency"><?php if($assetManager->getRenewal($siteWideSubscriptionid, $debug)){ echo 'On Expiry';}else{ echo 'Does Not Renew';}?></span>
                                                </div>
                                                <div class="col-sm-3 text-sm-right">

                                                    <?php echo $assetManager->showButtonSubscription($siteWideSubscriptionid, $debug);   ?>

                                                </div>
                                            </div>
                                        </li>

                                        <?php 
                  }else{
                    ?>

                                        <?php if ($users->getUserAccessLevel($userid) < 5){ ?>

                                        <li class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-sm-4"><small
                                                        class="h6 text-sm mb-3 mb-sm-0">Plan</small></div>
                                                <div class="col-sm-5">
                                                    <strong>GIEQs Pro Membership Via Status</strong>
                                                    <br />
                                                    Expires : <span class="expiry_date">Never</span>
                                                    <br />
                                                    Renews : <span class="renewalFrequency">Not Applicable</span>
                                                </div>
                                                <div class="col-sm-3 text-sm-right">
                                                    <!--                           <a href="#" class="btn btn-sm btn-primary rounded-pill mt-3 mt-sm-0">Upgrade</a>
   -->
                                                </div>
                                            </div>
                                        </li>

                                        <?php } else { ?>

                                        <li class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-sm-4"><small
                                                        class="h6 text-sm mb-3 mb-sm-0">Plan</small></div>
                                                <div class="col-sm-5">
                                                    <strong>No Current Plan</strong>
                                                </div>
                                                <div class="col-sm-3 text-sm-right">

                                                    <!-- <button class="btn btn-sm btn-primary rounded-pill mt-3 mt-sm-0 new"
                                                        data-userid="<?php //echo $userid;?>" data-assetid="6">Buy
                                                        Plan</button> ADD BACK FOR LIVE-->

                                                    <!--                           <a href="#" class="btn btn-sm btn-primary rounded-pill mt-3 mt-sm-0">Upgrade</a>
 -->
                                                </div>
                                            </div>
                                        </li>

                                        <?php } ?>
                                        <?php

                  }
                  ?>


                                    </ul>
                                </div>
                            </div>

                            <!--Get Subscription Data-->

                            <?php
$subscriptionsList = $assetManager->returnCombinationUserSubscriptionList($userid, false);
$subscriptions = $assetManager->returnCombinationUserSubscription($userid, false);


            $current_date = new DateTime('now', new DateTimeZone('UTC'));

            //this is a comparator so not user timezone

            //$current_date->setTimezone(new DateTimeZone($users->gettimezone()));

          if ($debug){
          print_r($subscriptions);
          }

          ?>

                            <!-- Section title -->

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-5 col-lg-8">
                                            <span class="h6">Subscriptions</span>
                                        </div>
                                        <div class="col-7 col-lg-4 text-right">
                                        <form method="POST" action="<?php echo BASE_URL;?>/pages/learning/scripts/account/redirect-customer-portal.php">
                                        <button class="btn btn-sm btn-primary rounded-pill mt-3 mt-sm-0 text-white mr-auto" type="submit">Manage Billing</a>
        </form>

                                            <!-- <img alt="Image placeholder" src="../../assets/img/icons/cards/mastercard.png" width="40" class="mr-2">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/visa.png" width="40" class="mr-2">
                    <img alt="Image placeholder" src="../../assets/img/icons/cards/skrill.png" width="40"> -->
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <ul class="list-group list-group-flush">

                                        <?php

                                        error_reporting(E_ALL);

                                        if ($subscriptionsList){

foreach ($subscriptionsList as $key=>$value){

$timezone = $users->gettimezone();

if (!isset($timezone)){

$timezone =  'UTC';

}
  $start_date = null;

  $start_date_display = null;

  $start_date = new DateTime($value['start_date'], new DateTimeZone('UTC'));

  $start_date_display = $start_date;

  if ($users->gettimezone() != ''){

    $start_date_display->setTimezone(new DateTimeZone($users->gettimezone()));


  }

  //$start_date_display->setTimezone(new DateTimeZone($timezone));

  $expiry_date = null;

  $expiry_date_display = null;

  $expiry_date = new DateTime($value['expiry_date'], new DateTimeZone('UTC'));

  $expiry_date_display = $expiry_date;
  
  if ($users->gettimezone() != ''){


  $expiry_date->setTimezone(new DateTimeZone($timezone));

  }

  $assetManager->subscription_state($value['id'], $debug);

?>


                                        <li class="list-group-item" data="<?php echo $value['id']?>">
                                            <div class="row align-items-center">
                                                <div class="col-sm-1">

                                                    <span class="badge badge-lg badge-dot">

                                                        <?php if ($assetManager->subscription_expires_soon($value['id'], $debug) === true){ ?>
                                                        <i class="bg-warning" title="Expires Soon"
                                                            data-toggle="tooltip"></i>


                                                        <?php } elseif ($assetManager->isSubscriptionActive($value['id'], $current_date, $debug) === true){ ?>
                                                        <i class="bg-success" title="Active" data-toggle="tooltip"></i>
                                                        <?php } else { ?>

                                                        <i class="bg-danger" title="Inactive or Unpaid"
                                                            data-toggle="tooltip"></i>


                                                        <?php } ?>

                                                    </span>



                                                </div>
                                                <div class="col-sm-4"><strong
                                                        class="h6 text-sm mb-3 mb-sm-0"><?php echo $assetManager->getAssetName($value['id']);?></strong>


                                                    <small><br /><?php echo $assetManager->getAssetTypeText($value['asset_type']);?></small>
                                                    <small><br /><?php echo $value['renew_frequency'];?> Monthly
                                                        Renewal</small>
                                                </div>
                                                <div class="col-sm-2">
                                                    <small><?php echo $expiry_date < $current_date ? 'Expired' : 'Expires : ' . date_format($expiry_date_display,"d/m/Y");?></small>


                                                </div>
                                                <div class="col-sm-2">
                                                    <small><?php echo $assetManager->getRenewal($value['id'], $debug) ? 'Auto Renews : ' . date_format($expiry_date_display,"d/m/Y") : 'Does Not Renew';?></small>


                                                </div>
                                                <div class="col-sm-3 text-sm-right">
                                                    <!-- if ending soon show renew, if expired show renew, if active show cancel renew always if auto-renew on -->

                                                    <?php echo $assetManager->showButtonSubscription($value['id'], $debug);   ?>

                                                </div>
                                            </div>
                                        </li>


                                        <?php 

                } //end foreach

              }else{//end if subscriptions

                ?>

                <p class="pt-3 px-3">No Current Subscriptions</p>
                <p class="pt-1 px-3">To start a subscription navigate to the section of the site you are interested in and select the required subscription.  Once purchased it will appear here.</p>


<?php              }

?>

                                    </ul>
                                </div>
                            </div>



                            <!-- Payment history
            GIEQs Pro
            Then other specifics 
            Use Asset User connection
            Order desc

            

            -->
                            <div class="mt-5">
                                <div class="actions-toolbar py-2 mb-4">
                                    <h5 class="mb-1">Payment history</h5>
                                    <p class="text-sm text-muted mb-0">A history of your payments and attempted payments.</p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-cards align-items-center">
                                        <thead>
                                            <th></th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Invoice Number</th>
                                            <th>Decription</th>
                                            <th>Amount</th>

                                        </thead>
                                        <tbody>

                                            <?php 
          
            
          
          if ($subscriptions) {
          
          foreach ($subscriptions as $key=>$value){


            $start_date = null;

            $start_date = new DateTime($value['start_date'], new DateTimeZone('UTC'));

            if ($users->gettimezone()){

              $userTimezoneDatabase = $users->gettimezone();
          
            }else{
          
              $userTimezoneDatabase = 'Europe/Brussels';
          
           }
            
            $start_date->setTimezone(new DateTimeZone($userTimezoneDatabase));

            $expiry_date = null;

            $expiry_date = new DateTime($value['expiry_date'], new DateTimeZone('UTC'));

            $expiry_date->setTimezone(new DateTimeZone($userTimezoneDatabase));



            if ($debug){
            echo $value['id'];
            echo $value['asset_id'];
            
            echo '<br/>' . date_format($start_date,"d/m/Y H:i:s");
            echo '<br/>';
            echo $users->gettimezone();
            echo '<br/>';
            echo '<br/>';
            echo '<br/>' . date_format($start_date,"d/m/Y H:i:s");
            echo '<br/>';
            echo $value['start_date'];

            echo '<br/>' . date_format($expiry_date,"d/m/Y H:i:s");
            echo '<br/>';
            echo $users->gettimezone();
            echo '<br/>';
            echo '<br/>';
            echo '<br/>' . date_format($expiry_date,"d/m/Y H:i:s");
            echo '<br/>';
            echo $value['expiry_date'];


            echo $value['expiry_date'];
            echo $value['active'];

            echo $assetManager->subscription_expires_soon($value['id'], $debug);
            

            }

            $cost = $assetManager->getCost($value['id']);
            ?>



                                            <tr data="<?php echo $value['id'];?>">
                                                <th scope="row">
                                                    <span class="badge badge-lg badge-dot">

                                                        <?php if ($assetManager->subscription_expires_soon($value['id'], $debug) === true){ ?>
                                                        <i class="bg-warning" title="Expires Soon"
                                                            data-toggle="tooltip"></i>


                                                        <?php } elseif ($assetManager->isSubscriptionActive($value['id'], $current_date, $debug) === true){ ?>
                                                        <i class="bg-success" title="Active" data-toggle="tooltip"></i>
                                                        <?php } else { ?>

                                                        <i class="bg-danger" title="Inactive or Unpaid"
                                                            data-toggle="tooltip"></i>


                                                        <?php } ?>

                                                    </span>
                                                </th>
                                                <!-- <td class="identifier" style="display:none;">
                <?php echo $value['id'];?>
              </td> -->
                                                <td>
                                                    <i class="fas fa-calendar-alt mr-2"></i>
                                                    <span
                                                        class="h6 text-sm"><?php echo date_format($start_date,"d/m/Y");?></span>
                                                </td>
                                                <td>
                                                    <i class="fas fa-calendar-alt mr-2"></i>
                                                    <span
                                                        class="h6 text-sm"><?php echo date_format($expiry_date,"d/m/Y");?></span>
                                                </td>
                                                <td>#<?php echo $value['id'];?></td>
                                                <td>
                                                    <!-- <i class="fas fa-credit-card mr-2"></i>Electronic --><?php echo $assetManager->getAssetName($value['id']);?>
                                                </td>
                                                <td><?php echo $cost;?> EUR</td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <div class="dropdown">
                                                            <a class="action-item" href="#" role="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="mailto:gieqs@seauton-international.com?subject=Invoice Please for GIEQs.com Subscription ID <?php echo $value['id'];?>"><i
                                                                        class="fas fa-file-pdf"></i>Request invoice</a>
                                                                <!--  <a class="dropdown-item" href="#"><i class="fas fa-file-archive"></i>See details</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>Delete</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="table-divider"></tr>




                                            <?php
          } //end subscriptions foreach

          }else{ //end subscriptions if

            ?>
          
          <p class="pt-3 px-3">No Previous Payments</p>



          <?php }
          ?>






                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Attach a new card -->

                        </div>
                        <?php require BASE_URI . '/pages/learning/pages/account/sidenav.php';?>
                    </div>
                </div>
            </section>

        </div>

        <!-- Modals -->

        <div class="modal modal-activate-auto-renew modal-success fade" id="modal-activate-auto-renew" tabindex="-1"
            role="dialog" aria-labelledby="modal_success" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h6" id="modal_title_6">Activate Auto Renew</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-circle fa-4x"></i>
                            <h5 class="heading h4 mt-4">Activation of Auto-Renewal for Subscription ID #<span
                                    id="modal-activate-auto-renew-subscriptionid"></span></h5>
                            <p>
                                This will activate auto-renewal for the associated subscription.
                                Your account will be charged automatically on the date identified for expiry.
                                Your payment method will be charged automatically.
                                You can turn this setting off at any time.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-sm btn-white button-activate-auto-renew">Activate</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Subscription Success -->

        <div class="modal modal-subscription-success modal-success fade" id="modal-subscription-success" tabindex="-1"
            role="dialog" aria-labelledby="modal_success" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h6" id="modal_title_6">Subscription Activated Successfully</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-circle fa-4x"></i>
                            <h5 class="heading h4 mt-4">Thank you for your payment!<br /> Subscription ID #<span
                                    id="modal-subscription-success-id"></span> is now active</h5>
                            <p>
                                Please check your email for details. We very much appreciate your support of GIEQs Online and the GIEQs Foundation! </p>
                            <p>You can access your purchase from the 'Courses and Pro Content' menu in GIEQs Online</p>

                                <p class="small">
                                Didn't receive a mail? Check your spam and don't worry.  If there is an ongoing issue please contact us!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal Subscription Success -->

         <div class="modal modal-congress-success modal-success fade" id="modal-congress-success" tabindex="-1"
            role="dialog" aria-labelledby="modal_success" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h6" id="modal_title_6">GIEQs IV Access Activated Successfully</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-circle fa-4x"></i>
                            <h5 class="heading h4 mt-4">Thank you for your payment!<br /> Subscription ID #<span
                                    id="modal-congress-success-id"></span> for GIEQs IV is now active</h5>
                            <p>
                                Please check your email for all details related to the symposium. We very much appreciate your support of GIEQs Online and the GIEQs Foundation! </p>
                            <p>You can access your purchase from the 'Courses and Pro Content' menu in GIEQs Online once the Symposium is Live.</p>

                                <p class="small">
                                Didn't receive a mail? Check your spam and don't worry.  If there is an ongoing issue please contact us!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals Cancel AutoRenew -->

        <div class="modal modal-cancel-auto-renew modal-warning fade" id="modal-cancel-auto-renew" tabindex="-1"
            role="dialog" aria-labelledby="modal_success" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h6" id="modal_title_6">Cancel Auto Renew</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-circle fa-4x"></i>
                            <h5 class="heading h4 mt-4">Cancellation of Auto-Renewal for Subscription ID #<span
                                    id="modal-cancel-auto-renew-subscriptionid"></span></h5>
                            <p>
                                This will cancel auto-renewal for the associated subscription.
                                Your account will no longer be charged automatically on the date identified for expiry.
                                Your payment method will no longer be charged automatically.
                                You can re-activate this setting at any time.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Continue with
                            Auto-Renew</button>
                        <button type="button" class="btn btn-sm btn-white button-cancel-auto-renew">Cancel
                            Auto-Renew</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals RENEW GENERIC -->

        <div class="modal modal-renew fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-renew"
            aria-hidden="true">
            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h6" id="modal_title_6">Renew Subscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-0"
                            style="min-height: 100px; background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                        </div>
                        <div class="py-3 text-left">
                            <!-- <i class="fas fa-exclamation-circle fa-4x"></i> -->
                            <h5 class="heading h4 mt-4">Renew GIEQs Online Subscription</h5>
                            <p class="heading h5 mt-4">Subscription : <span id="asset-name"></span></p>

                            <p class="text-muted"><span id="asset-type"></span></p>
                            <p class="text-muted">Duration : <span id="renew-frequency"></span> Month(s)</p>



                            <p class="text-justify mt-4">
                                <span id="asset-description"></span>

                            </p>

                            <p class="text-sm mt-8">
                                By clicking confirm you will be taken to PayPal to start the payment process.
                                Once complete your subscription will be renewed and you will receive a confirmation
                                email.
                                This subscription will automatically renew after the expiry term. This can easily be
                                switched off in the settings.
                                All subscriptions and payments are covered by our <a
                                    href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php"
                                    target="_blank">terms and conditions</a>.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                        <form id="confirm-renew"
                            action="<?php echo BASE_URL;?>/pages/learning/scripts/subscriptions/charge.php"
                            method="POST">
                            <input type="hidden" id="subscription_id_hidden" name="subscription_id" value="">
                            <input type="submit" id="button-confirm-renew"
                                class="btn btn-sm btn-white button-confirm-renew" value="Confirm Renewal">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals NEW GENERIC -->

        <div class="modal modal-new fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-new"
            aria-hidden="true">
            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h6" id="modal_title_6">Buy New Subscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-0"
                            style="min-height: 100px; background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                        </div>
                        <div class="py-3 text-left">
                            <!-- <i class="fas fa-exclamation-circle fa-4x"></i> -->
                            <h5 class="heading h4 mt-4">New GIEQs Online Subscription</h5>
                            <p class="heading h5 mt-4">Subscription : <span id="asset-name"></span></p>

                            <p class="text-muted"><span id="asset-type"></span></p>
                            <p class="text-muted">Duration : <span id="renew-frequency"></span> Month(s)</p>



                            <p class="text-justify mt-4">
                                <span id="asset-description"></span>

                            </p>

                            <p class="text-sm mt-8">
                                By clicking confirm you will be taken to PayPal to start the payment process.
                                The payment process is not final until you confirm with the payment provider.
                                Once complete your subscription will be active immediately and you will receive a
                                confirmation email.
                                This subscription will automatically renew after the expiry term. This can easily be
                                switched off your account settings.
                                All subscriptions and payments are covered by our <a
                                    href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php"
                                    target="_blank">terms and conditions</a>.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                        <form id="confirm-new"
                            action="<?php echo BASE_URL;?>/pages/learning/scripts/subscriptions/charge.php"
                            method="POST">
                            <input type="hidden" id="subscription_id_hidden" name="subscription_id" value="">
                            <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                                value="Start Payment">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php require BASE_URI . '/footer.php';?>

        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <!-- <script src="assets/js/purpose.core.js"></script> -->
        <!-- Page JS -->
        <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
        <script src="assets/libs/typed.js/lib/typed.min.js"></script>
        <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
        <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
        <!-- Google maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
        <!-- Purpose JS -->
        <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
        <!-- <script src="assets/js/generaljs.js"></script> -->
        <script>
        if ($("#id").text() != '') {
            var videoPassed = $("#id").text();
        } else {

            var videoPassed = false;
        }

        var shown = false;
        </script>

        <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
                "0"); //insert new object

            esdLesionObject.done(function(data) {

                console.log(data);

                var dataTrim = data.trim();

                console.log(dataTrim);

                if (dataTrim) {

                    try {

                        dataTrim = parseInt(dataTrim);

                        if (dataTrim > 0) {

                            alert("Thank you for your details.  We will keep you updated on everything GIEQs.");
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });

                        }

                    } catch (error) {

                        //data not entered
                        console.log('error parsing integer');
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });


                    }

                    //$('#success').text("New esdLesion no "+data+" created");
                    //$('#successWrapper').show();
                    /* $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                      $("#successWrapper").slideUp(500);
                    });
                    edit = 1;
                    $("#id").text(data);
                    esdLesionPassed = data;
                    fillForm(data); */




                } else {

                    alert("No data inserted, try again");

                }


            });
        }

        $(document).ready(function() {



            //modal operations

            if (videoPassed) {


                if (!shown) {

                    var asset_type = $("#asset_determined_by_subscription").text();
                    console.log('asset type is ' + asset_type);

                    if (asset_type == '2'){

                        $(".modal-body #modal-congress-success-id").text(videoPassed);

                        $('.modal-congress-success').modal('show');



                    }else{

                        $(".modal-body #modal-subscription-success-id").text(videoPassed);

                        $('.modal-subscription-success').modal('show');

                    }


                    shown = true;

                }


            }

            // new

            $('.new').click(function(event) {

                var button = $(this);

                $(this).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
                $(this).attr('disabled', true);
                //var asset_type = $(this).data('assettype');
                var asset_id = $(this).data('assetid');

                console.log(asset_id);
                $('.modal-footer #button-confirm-new').attr('data-assetid', '' + asset_id);

                //get the modal data
                const dataToSend = {


                    asset_id: asset_id,

                    //options: myOpts,

                }

                const jsonString = JSON.stringify(dataToSend);
                //console.log(jsonString);



                var request = $.ajax({
                    url: siteRoot +
                        "pages/learning/scripts/subscriptions/get_new_subscription_data.php",
                    type: "POST",
                    crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                    contentType: "application/json",
                    data: jsonString,
                    timeout: 5000,
                    fail: function(xhr, textStatus, errorThrown) {
                        alert(
                            'Something went wrong.  We could not load the subscription data.');
                        $(this).find('i').remove();
                        $(this).attr('disabled', false);
                    }
                });

                request.done(function(data) {


                    data = data.trim();
                    console.log(data);
                    externalTest = $.parseJSON(data);
                    console.dir(externalTest);
                    if (data) {

                        /* alert('Auto Renew Cancelled');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-cancel-auto-renew').modal('hide');
                        location.reload(); */

                        $('.modal-new #asset-name').text(externalTest.asset_name);
                        $('.modal-new #asset-type').text(externalTest.asset_type);
                        $('.modal-new #renew-frequency').text(externalTest.renew_frequency);
                        $('.modal-new #asset-description').text(externalTest.description);
                        $('.modal-new #asset_id_hidden').val(externalTest.asset_id);


                        $('.modal-new').modal('show');
                        $(button).find('i').remove();
                        $(button).attr('disabled', false);

                    } else {

                        alert(
                        'Something went wrong.  We could not load the subscription data.');

                        $(this).find('i').remove();
                        $(this).attr('disabled', false);


                    }

                });

                //don't show the modal until the data is loaded

                //add a loading spinner to the button of renew





                //$(".modal-body #modal-renew-subscriptionid").text( subscription_id );



            });

            //renew

            $('.renew, .buy-again').click(function(event) {

                var button = $(this);

                $(this).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
                $(this).attr('disabled', true);
                var subscription_id = $(this).data('subscriptionid');
                console.log(subscription_id);
                $('.modal-footer #button-confirm-renew').attr('data-subscriptionid', '' +
                    subscription_id);

                //get the modal data
                const dataToSend = {



                    subscription_id: subscription_id,
                    //options: myOpts,

                }

                const jsonString = JSON.stringify(dataToSend);
                //console.log(jsonString);



                var request = $.ajax({
                    url: siteRoot + "pages/learning/scripts/subscriptions/get_renewal_data.php",
                    type: "POST",
                    crossDomain: true,
                    headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    },
                    contentType: "application/json",
                    data: jsonString,
                    timeout: 5000,
                    fail: function(xhr, textStatus, errorThrown) {
                        alert('Something went wrong.  We could not load the renewal data.');
                        $(this).find('i').remove();
                        $(this).attr('disabled', false);
                    }
                });

                request.done(function(data) {


                    data = data.trim();
                    console.log(data);
                    externalTest = $.parseJSON(data);
                    console.dir(externalTest);
                    if (data) {

                        /* alert('Auto Renew Cancelled');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-cancel-auto-renew').modal('hide');
                        location.reload(); */

                        $('.modal-renew #asset-name').text(externalTest.asset_name);
                        $('.modal-renew #asset-type').text(externalTest.asset_type);
                        $('.modal-renew #renew-frequency').text(externalTest.renew_frequency);
                        $('.modal-renew #asset-description').text(externalTest.description);
                        $('.modal-renew #subscription_id_hidden').val(subscription_id);


                        $('.modal-renew').modal('show');
                        $(button).find('i').remove();
                        $(button).attr('disabled', false);

                    } else {

                        alert('Something went wrong.  We could not load the renewal data.');

                        $(this).find('i').remove();
                        $(this).attr('disabled', false);


                    }

                });

                //don't show the modal until the data is loaded

                //add a loading spinner to the button of renew





                //$(".modal-body #modal-renew-subscriptionid").text( subscription_id );



            });

            $('.button-confirm-renew').click(function(event) {


                var subscription_id = $(this).data('subscriptionid');
                console.log(subscription_id);

                $(".modal-body .btn").prop('disabled', true);

                //now we need to get cost from modal, and redirect url codes which would be subscription_id and user_id but this coded within a php script

                //ajax 

                const dataToSend = {



                    subscription_id: subscription_id,
                    //options: myOpts,

                }

                const jsonString = JSON.stringify(dataToSend);
                //console.log(jsonString);



                var request = $.ajax({
                    url: siteRoot + "pages/learning/scripts/subscriptions/execute_renewal.php",
                    type: "POST",
                    crossDomain: true,
                    headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    },
                    contentType: "application/json",
                    data: jsonString,
                });



                request.done(function(data) {


                    data = data.trim();
                    console.log(data);
                    //externalTest = $.parseJSON(data);
                    if (data == 1) {

                        /* alert('Auto Renew Cancelled');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-cancel-auto-renew').modal('hide');
                        location.reload(); */

                    } else {

                        /* alert('Something went wrong.  We didn\'t change anything.');

                $(".modal-body .btn").prop('disabled', false);
                $('.modal-cancel-auto-renew').modal('hide');
 */

                    }

                });

            });

            //cancel auto renew

            $('.cancel-auto-renew').click(function(event) {


                var subscription_id = $(this).data('subscriptionid');
                $(".modal-body #modal-cancel-auto-renew-subscriptionid").text(subscription_id);
                $('.modal-cancel-auto-renew').modal('show');


            });



            $('.button-cancel-auto-renew').click(function(event) {


                var subscription_id = $(".modal-body #modal-cancel-auto-renew-subscriptionid").text();
                $(".modal-body .btn").prop('disabled', true);

                //ajax 

                const dataToSend = {



                    subscription_id: subscription_id,
                    //options: myOpts,

                }

                const jsonString = JSON.stringify(dataToSend);
                //console.log(jsonString);



                var request = $.ajax({
                    url: siteRoot +
                        "pages/learning/scripts/subscriptions/cancel_auto_renew.php",
                    type: "POST",
                    crossDomain: true,
                    headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    },
                    contentType: "application/json",
                    data: jsonString,
                });



                request.done(function(data) {


                    data = data.trim();
                    console.log(data);
                    //externalTest = $.parseJSON(data);
                    if (data == 1) {

                        alert('Auto Renew Cancelled');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-cancel-auto-renew').modal('hide');
                        location.reload();

                    } else {

                        alert('Something went wrong.  We didn\'t change anything.');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-cancel-auto-renew').modal('hide');


                    }

                });

            });


            //activate auto renew

            $('.activate-auto-renew').click(function(event) {


                var subscription_id = $(this).data('subscriptionid');
                $(".modal-body #modal-activate-auto-renew-subscriptionid").text(subscription_id);
                $('.modal-activate-auto-renew').modal('show');


            });

            $('.button-activate-auto-renew').click(function(event) {


                var subscription_id = $(".modal-body #modal-activate-auto-renew-subscriptionid").text();
                $(".modal-body .btn").prop('disabled', true);

                //ajax 

                const dataToSend = {



                    subscription_id: subscription_id,
                    //options: myOpts,

                }

                const jsonString = JSON.stringify(dataToSend);
                //console.log(jsonString);



                var request = $.ajax({
                    url: siteRoot +
                        "pages/learning/scripts/subscriptions/activate_auto_renew.php",
                    type: "POST",
                    crossDomain: true,
                    headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    },
                    contentType: "application/json",
                    data: jsonString,
                });



                request.done(function(data) {


                    data = data.trim();
                    console.log(data);
                    //externalTest = $.parseJSON(data);
                    if (data == 1) {

                        alert('Auto Renew Status Updated');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-activate-auto-renew').modal('hide');
                        location.reload();

                    } else {

                        alert('Something went wrong.  We didn\'t change anything.');

                        $(".modal-body .btn").prop('disabled', false);
                        $('.modal-activate-auto-renew').modal('hide');


                    }

                });

            });







            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#selectDropdown').length &&
                    $('#selectDropdown').is(":visible")) {
                    $('#selectDropdown').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample2').length &&
                    $('#collapseExample2').is(":visible")) {
                    $('#collapseExample2').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample3').length &&
                    $('#collapseExample3').is(":visible")) {
                    $('#collapseExample3').collapse('hide');
                }
            });

            $(document).on('click', '.tagsClose', function() {

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function() {


                //get the tag name

                var searchTerm = $(this).attr('data');

                //console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

                PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
                    'PubMed Search (endoWiki)', 800, 700);





            })

            $('.referencelist').on('mouseenter', function() {

                $(this).css('color', 'rgb(238, 194, 120)');
                $(this).css('cursor', 'pointer');

            })

            $('.referencelist').on('mouseleave', function() {

                $(this).css('color', 'white');
                $(this).css('cursor', 'default');

            })


        })
        </script>
    </body>

</html>