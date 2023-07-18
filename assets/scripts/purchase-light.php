<!-- Modals NEW GENERIC -->

<?php
require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;
require_once BASE_URI . '/assets/scripts/classes/users.class.php';
$users = new users;
//error_reporting(E_ALL);

?>

<div id="subscription_level" style="display:none;"><?php echo $sitewide_status;?></div>
<div id="stripe-status-live" style="display:none;"><?php if ($stripe_status_live){echo 'true';}else{echo 'false';}?></div>


<?php

/*

if a pro member
and its a course, free

if a pro member and its a symposium, check if more than 2 months ago then free

derive some varibles
allow them to determine access validated

*/


if (!isset($access_validated)){


    $access_validated = false;

}

if (!isset($access_token)){


    $access_token = false;
}




?>


<div class="modal modal-new" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-new"
    aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6" id="modal_title_6">Buy New GIEQs Online Course</h5>
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
                    <hr />
                    <h5 class="heading h4 mt-4">New GIEQs Online Course Purchase</h5>
                    <p class="heading h5 mt-4">Course : <span class="" id="asset-name"></span></p>

                    <p class=""><span class="text-muted" id="asset-type"></span></p>
                    <p class="">Duration : <span class="text-muted" id="renew-frequency"></span><span
                            class="text-muted"> Month(s) after Live Date</span></p>
                    <p class="">Cost :
                        <?php 
                            if ($access_validated){

                                echo ' FREE with your Complimentary Link';

                            }else{?>

                        <span class="text-muted" id="cost">&euro;</span>


                        <?php }?>

                        <?php $has_coins = $coin->user_has_coins($userid);

                                if ($has_coins){

?>

                        <a class="btn btn-sm cursor-pointer bg-dark btn-icon rounded-pill hover-translate-y-n3 use-coin"
                            id="asset_id_coin_button">
                            <span class="btn-inner--icon">
                                <img src="<?php echo BASE_URL . "/assets/img/icons/coin.svg"?>"
                                    alt="use GIEQs Coin for this purchase" height="24" width="24" />
                            </span>
                            <span class="btn-inner--text gieqsGold">Use GIEQs Coin</span>
                        </a>

                        <?php } ?>

                    </p>

                    <p class=" text-justify mt-4">
                        Discount : <span class="text-muted d-none" id="symposium-discount"></span>

                    </p>
                    <p class=" text-justify mt-4">
                        Description : <span class="text-muted" id="asset-description"></span>

                    </p>
                    <hr />

                    <?php
                        if  (!$userid){?>

                    <p class="">You need a GIEQs Online User Account (free) to Register for this Course
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>

                <button id="button-login" class="btn btn-sm btn-white button-login">I have a GIEQs Online
                    Account</button>
                <button id="button-signup" class="btn btn-sm btn-white button-signup">I have no account, sign me
                    up!</button>


            </div>

            <?php }else{?>

            <?php if (!($access_validated)){?>

            <p class="text-sm mt-4">
                By clicking Start Payment you will be taken to our customised checkout (partnered with Stripe) to start
                the payment process.
                The payment process is not final until you confirm with the payment provider.
                Once complete your subscription will be active immediately and you will receive a
                confirmation email.
                <!-- This subscription will automatically renew after the expiry term. This can easily be
                            switched off your account settings. -->
                We do not store any payment details whatsoever on GIEQs.com. We believe this is best handled by
                Stripe who have a
                track record in industry standard procedures in this regard.
                All subscriptions and payments are covered by our <a
                    href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php" target="_blank">terms
                    and conditions</a>.
            </p>

            <?php }else{?>

            <p class="text-sm mt-4">

                No payment is required for this subscription.
            </p>


            <?php }   ?>
        </div>
    </div>

    <?php 

        //determine action 
       

        if ($access_validated){

            //allow free register

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/generate_free_subscription.php';


        }else{

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/charge.php';


        }


        ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-white cancel-button" data-dismiss="modal">Cancel</button>
        <form id="confirm-new" action="<?php echo $form_action_path;?>" method="POST">
            <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
            <input type="hidden" id="cipher_hidden" name="cipher_hidden" value="<?php echo $access_token;?>">

            <input type="hidden" id="gieqs_coin_used" name="gieqs_coin_used" value="false">
            <input type="hidden" id="gieqs_coin_used_amount" name="gieqs_coin_used_amount" value="0">

            <input type="hidden" id="symposium" name="symposium" value="0">
            <input type="hidden" id="cost_symposium" name="cost_symposium" value="0">

            <input type="hidden" id="course_date" name="course_date"
                value="<?php if (isset($programmeDate)){echo date_format($programmeDate, "Y-m-d H:i:s");}?>">

            <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                value="<?php $result = $access_validated ? 'Register' : 'Start Payment'; echo $result;?>">
        </form>
    </div>

    <?php } ?>
</div>
</div>
</div>


<!-- Modals SUBSCRIPTION GENERIC -->

<?php
if ($users){

if ($userid){

    $users->Load_from_key($userid);

}

}

?>

<!--new modal for entering amount of GIEQs Coin to use-->

<div class="modal modal-specify-gieqscoin fade" id="specify-gieqscoin" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Use GIEQs Coin to Pay for this Content.</h5>

                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6> You have <?php echo $coin->current_balance($userid);?> coins remaining</h6>
                <div class="d-none" id="coins_remaining"><?php echo $coin->current_balance($userid);?></div>
                <h6> Item Cost : &euro;&nbsp;<span id="asset_cost"></span></h6>

                <form id="coins-spend">
                    <div class="form-group">
                        <input id="number_coins" name="number_coins" type="text" class="form-control"
                            placeholder="Enter the number of coins to use for this item (whole number)">
                    </div>
                </form>
                <!--  <p>Would you like to upgrade to GIEQs <strong>STANDARD</strong> or <strong>PRO?</strong></p>
                <p><a
                        class="key-features cursor-pointer btn-sm bg-gieqsGold btn-icon rounded-pill hover-translate-y-n3 mt-5">
                        <span class="btn-inner--icon">
                            <i class="fas fa-fire text-dark"></i>
                        </span>
                        <span class="btn-inner--text text-dark">Show Key Features</span>
                    </a></p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-dark" onclick="launchSubscriptionDialog(1);">get STANDARD</button> -->
                <button type="button" id="spend-coins" class="btn btn-dark gieqsGold"><span id="coin-spinner"
                        class="spinner-border mr-2" style="display:none;" role="status" aria-hidden="true"></span>Spend
                    Coins</button>

            </div>
        </div>
    </div>
</div>


<!--new modal for pro, premium-->
<!-- Modal -->
<div class="modal modal-pro-premium fade" id="propremium" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Get the most out of GIEQs Online with a Monthly Subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Would you like to upgrade to a GIEQs <strong>STANDARD</strong> or <strong>PRO Monthly Plan?</strong></p>
               
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-dark" onclick="launchSubscriptionDialog(1);">get STANDARD</button>
                <button type="button" class="btn btn-dark gieqsGold" onclick="launchSubscriptionDialog(2);">get
                    PRO</button>

            </div>
            <div class="modal-footer">
            <p><a
                        class="key-features cursor-pointer btn-sm bg-gieqsGold btn-icon rounded-pill hover-translate-y-n3 mt-5">
                        <span class="btn-inner--icon">
                            <i class="fas fa-fire text-dark"></i>
                        </span>
                        <span class="btn-inner--text text-dark">Show Key Features of each Plan</span>
                    </a></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div class="modal modal-subscribe-new" id="modal_subscribe" tabindex="-1" role="dialog" aria-labelledby="modal-new"
    aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6" id="modal_title_6">Start New GIEQs Subscription</h5>
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
                    <hr />
                    <h5 class="heading h4 mt-4">New GIEQs Online Subscription</h5>
                    <p class="heading h5 mt-4">Subscription : <span class="" id="asset-name"></span></p>

                    <p class=""><span class="text-muted" id="asset-type"></span></p>
                    <p class="">Type : <span class="text-muted" id="user-type">

                            <?php if ($users->gettrainee() == 1){echo "Trainee ";}?>

                            <?php if ($users->getendoscopistType() == 1){echo "Medical Endoscopist";}
                        if ($users->getendoscopistType() == 2){echo "Surgical Endoscopist";}
                        if ($users->getendoscopistType() == 3){echo "Nurse Endoscopist";}
                        if ($users->getendoscopistType() == 4){echo "Endoscopy Nurse (assistant)";}
                        if ($users->getendoscopistType() == 5){echo "Medical Student";}
                        if ($users->getendoscopistType() == 6){echo "Nursing Student";}?></span><span
                            class="text-muted"> - you can change this in <a
                                href="<?php echo BASE_URL . '/pages/learning/pages/account/profile.php';?>">my
                                account</a>.</span></p>
                    <p class="">Duration : <span class="text-muted" id="renew-frequency"></span><span
                            class="text-muted"> Month(s) with automatic renewal until cancelled</span></p>
                    <p class="">Cost :
                        <?php 
                            if ($access_validated){

                                echo ' FREE with your Complimentary Link';

                            }else{?>

                        <span class="text-muted" id="cost">&euro; </span> <span class="text-muted">per month</span>
                    </p>

                    <?php }?>


                    <p class=" text-justify mt-4">
                        Description : <span class="text-muted" id="asset-description"></span>

                    </p>
                    <hr />

                    <?php
                        if  (!$userid){?>

                    <p class="">You need a GIEQs Online User Account (free) to Upgrade
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>

                <button id="button-login" class="btn btn-sm btn-white button-login">I have a GIEQs Online
                    Account</button>
                <button id="button-signup" class="btn btn-sm btn-white button-signup">I have no account, sign me
                    up!</button>


            </div>

            <?php }else{?>

            <?php if (!($access_validated)){?>

            <p class="text-sm mt-4">
                To take advantage of reduced pricing and access trainee or medical student rates please update your
                public profile with this information in <a
                    href="<?php echo BASE_URL . '/pages/learning/pages/account/profile.php';?>">my account</a>.
                </p<>
            <p class="text-sm mt-4">
                By clicking Start Payment you will be taken to our customised checkout (partnered with Stripe) to start
                the payment process.
                The payment process is not final until you confirm with the payment provider.
                Once complete your subscription will be active immediately and you will receive a
                confirmation email.
                This subscription will automatically renew after the expiry term. This can easily be
                switched off your account settings.
                All new GIEQs Pro subscriptions come with a free trial [if subscribing for the first time]. If you
                cancel within the trial period you will
                never be charged.
                We do not store any payment details whatsoever on GIEQs.com. We believe this is best handled by
                Stripe who have a
                track record in industry standard procedures in this regard.
                All subscriptions and payments are covered by our <a
                    href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php" target="_blank">terms
                    and conditions</a>.
            </p>

            <?php }else{?>

            <p class="text-sm mt-4">

                No payment is required for this subscription.
            </p>


            <?php }   ?>
        </div>
    </div>

    <?php 

        //determine action 

        if ($access_validated){

            //allow free register

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/generate_free_subscription.php';


        }else{

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/charge.php';


        }


        ?>
    <div class="modal-footer subscribe-footer">
        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
        <form id="confirm-new-subscription" action="<?php echo $form_action_path;?>" method="POST">
            <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
            <input type="hidden" id="alreadyHasSiteWide" name="alreadyHasSiteWide" value="">

            <input type="hidden" id="course_date" name="course_date"
                value="<?php if (isset($programmeDate)){echo date_format($programmeDate, "Y-m-d H:i:s");}?>">
            <!-- CHANGE ME UPDATE TODO MAKE THIS COME FROM THE PROGRAM -->

            <input type="submit" id="button-confirm-new-subscription" class="btn btn-sm btn-white button-confirm-new"
                value="<?php $result = $access_validated ? 'Register' : 'Start Payment'; echo $result;?>">
        </form>
    </div>

    <?php } ?>
</div>
</div>
</div>


<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
switch (true) {
    case winLocation('gieqs.com'):

        var rootFolder2 = 'https://www.gieqs.com/';
        break;
    case winLocation('localhost'):
        var rootFolder2 = 'http://localhost/gieqs/';
        break;
    // case winLocation('gieqs.co.uk'):
    // var rootFolder2 = 'https://gieqs.co.uk/';
    // break;   
    // case winLocation("gieqs.localhost"):
    //     var rootFolder2 = "http://localhost/gieqs/";
    // break;    
    default: // set whatever you want
        var rootFolder2 = window.location.origin +'/';
        break;
}

var max_cost = 0;

var siteRoot2 = rootFolder2;

if ($("#action").text() != '') {
    var videoPassed = $("#action").text();
} else {

    var videoPassed = false;
}

if ($("#access_token").text() != '') {
    var access_token = $("#access_token").text();
} else {

    var access_token = false;
}

if ($(document).find("#asset_id").text() != '') {
    var asset_id = $(document).find("#asset_id").text();
} else {

    var asset_id = false;
}



var userid = '<?php echo $userid;?>';

if (userid == '') {

    userid = false;

}

var stripestatuslive = $('#stripe-status-live').text();


var waitForFinalEvent = (function() {
    var timers = {};
    return function(callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();


//CHANGE FOR STRIPE TEST
//should be getting this from somewhere where it can't be read

// var stripe = Stripe(
//     "pk_live_51IsKqwEBnLMnXjogQz5j1PCrt1qBSBOE8K3Uqdy8qCviiijTFG5ROoD6M0Uqze22rd31Af3cniEaIppFtLeFYBMZ00bwAzjNcf"); //live keys
 
   /*  var stripe = Stripe(
    "pk_test_51IsKqwEBnLMnXjogDG3ebg9q8KEVEbKtvHai719tJNPGsr9i77V4OdSYtPiBS1Y8bd4rknYYyAUkJ1sDweS2ubdF00GDL2mLNn"); //test keys publishable
 */
if ($('#stripe-status-live').text() == 'false'){

var stripe = Stripe(
"pk_test_51IsKqwEBnLMnXjog1piEiWnSuMEjfbD9sYcUKjvdwxzLq5IwApUVyVB9PvoGDDMG4Xk4EbWiEkkFC3y8bEMHFs8H003WFXDods"); //test keys publishable


}else{

var stripe = Stripe(
"pk_live_51IsKqwEBnLMnXjogQz5j1PCrt1qBSBOE8K3Uqdy8qCviiijTFG5ROoD6M0Uqze22rd31Af3cniEaIppFtLeFYBMZ00bwAzjNcf"); //live keys

}
    


function isInt(value) {
    return !isNaN(value) && (function(x) {
        return (x | 0) === x;
    })(parseFloat(value))
}

var loggedin;


function isUserLoggedin(){
    //to fix the issue that logged out prevents the form loading

    const dataToSend2 = {

        userid: userid,

    }

    

    const jsonString2 = JSON.stringify(dataToSend2);

    var request3 = $.ajax({
        url: rootFolder2 +
            "pages/learning/scripts/loggedin.php",
        type: "POST",
        crossDomain: true,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        },
        contentType: "application/json",
        data: jsonString2,

        timeout: 5000,
        fail: function(xhr, textStatus, errorThrown) {
            alert(
                'Something went wrong. Please try that again.'
            );
            $(button).find('i').remove();
            $(button).attr('disabled', false);
        }
    });

    request3.done(function(data) {

        
            data = data.trim();
           
            //if data is 0 reload page

            if (data == '0'){

                if (loggedin == 1){
                 window.location.reload();
                }

                loggedin = 0;

            }else{

                loggedin = 1;

            }

        
            //return loggedin;
        


    })

    return loggedin;


}

isUserLoggedin();

setInterval(isUserLoggedin, 60*1000);

function useGIEQsCoin(asset_id_specific) {

    //alert('click');
    $('.modal-new').modal('hide');

    $('.modal-specify-gieqscoin').modal('show');
    $('.modal-specify-gieqscoin #asset_cost').text(asset_id_specific);


    console.log(asset_id_specific);

    //when clicking on use GIEQs coin $('.use-coin').click()

    //check using database that user has GIEQs coin remaining easy, hasCoin function

    //chain by returning the ajax object and then()

    //popup asking how many they want to use, same as pro premium popup

    //check the entered amount against the database checkAmount function in coin TODO

    //if successful write a separate variable to the ajax command for stripe which is reduction

    //also include the coin spend id

    //in the stripe payment system pass the coin spend id and check the amount to take away, if can't find it abort

    //once the transaction is complete nothing else to do

    //if stripe payment fails refund the coin balance


}

function performCoinTransaction() {


    //get the object from  the validated form

    var amount = $('#number_coins').val();

    const dataToSend2 = {

        amount: amount,
        asset_id: asset_id,

    }

    $('#spend-coins').attr('disabled', true);
    $('#coin-spinner').show();


    //first check that user type is filled

    const jsonString2 = JSON.stringify(dataToSend2);

    var request3 = $.ajax({
        url: rootFolder2 +
            "pages/learning/scripts/coin/coin_transact.php",
        type: "POST",
        crossDomain: true,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        },
        contentType: "application/json",
        data: jsonString2,

        timeout: 5000,
        fail: function(xhr, textStatus, errorThrown) {
            alert(
                'Something went wrong. Please try that again.'
            );
            $(button).find('i').remove();
            $(button).attr('disabled', false);
        }
    });

    request3.done(function(data) {


        data = data.trim();
        var result = JSON.parse(data);
        console.dir(result);

        //var originalCost = $('.modal-new #cost').text();
        originalCost = parseInt(result.cost);
        paidInCoin = parseInt(result.spend);


        $('.modal-specify-gieqscoin').modal('hide');

        $('.modal-new #cost').text(originalCost - paidInCoin + ' euro remaining after GIEQs Coin Use');
        $('.modal-new .cancel-button').addClass('cancel-coin');
        $('.modal-new .cancel-button').removeAttr('data-dismiss');

        //coin-only

        if ((originalCost - paidInCoin) == 0) {

            $('.modal-new .button-confirm-new').removeClass('button-confirm-new');
            $('.modal-new #button-confirm-new').addClass('coin-only');

            $('.modal-new #button-confirm-new').removeAttr('id');

        }

        if (paidInCoin > 0) {

            $('.modal-new #gieqs_coin_used_amount').val(result.spend);
            $('.modal-new #gieqs_coin_used').val(true);

        }





        //disable use GIEQs Coin button

        $('.modal-new .use-coin').hide();


        //add a hidden field for spend



        //add a hidden field that GIEQs Coin Used
        //prevent cancel without roll-back
        //if press cancel refresh but ask first


        $('.modal-new').modal('show');




        //need to edit the amount in the other dialog
        //and record that there was a coin transaction so that it was reduced


    })

    return request3;

    //must return response
}


function launchSubscriptionDialog(subscriptionType) {

    var button = $(document).find('.subscribe-now');

    $(button).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
    $(button).attr('disabled', true);

    //here pass the variable subscriptionType to get the correct asset back

    const dataToSend2 = {

        subscriptionType: subscriptionType,

    }

    //first check that user type is filled

    const jsonString2 = JSON.stringify(dataToSend2);

    var request3 = $.ajax({
        url: rootFolder2 +
            "pages/learning/scripts/subscriptions/check_user_type_filled.php",
        type: "POST",
        crossDomain: true,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        },
        contentType: "application/json",
        data: jsonString2,

        timeout: 5000,
        fail: function(xhr, textStatus, errorThrown) {
            alert(
                'Something went wrong. Please try that again.'
            );
            $(button).find('i').remove();
            $(button).attr('disabled', false);
        }
    });

    request3.done(function(data) {


        data = data.trim();
        var result = JSON.parse(data);
        console.dir(result);

        if (result.typeFilled === true) {


            var asset_id = result.asset;

            console.log(asset_id);
            $('.subscribe-footer #button-confirm-new').attr('data-assetid', '' + asset_id);

            //get the modal data
            const dataToSend = {

                asset_id: asset_id,

            }

            //first check that user type is filled

            const jsonString = JSON.stringify(dataToSend);

            //alert('true');

            var request = $.ajax({
                url: siteRoot2 +
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
                        'Something went wrong. We could not load the subscription data.'
                    );
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);
                }
            });

            request.done(function(data) {


                data = data.trim();
                console.log(data);

                try {

                    externalTest = $.parseJSON(data);
                    console.dir(externalTest);
                    if (data) {


                        try {
                            document.querySelectorAll('form').forEach(form => {
                                form.addEventListener('submit', (e) => {
                                    // Prevent if already submitting
                                    if (form.classList.contains('is-submitting')) {
                                        e.preventDefault();
                                    }

                                    // Add class to hook our visual indicator on
                                    form.classList.add('is-submitting');
                                });
                            });

                            if (externalTest.location_jump) {

                                $('.modal-subscribe-new').modal('hide');
                                window.location.href = externalTest.location_jump;
                                return;

                            }

                        } catch (error) {



                        }

                        if (externalTest.alreadyHasSiteWide == true) {

                            var upgrade = true;

                            alert(
                                'You already have a GIEQs Online Subscription.\n\nIf you choose to upgrade, your existing subscription will be cancelled and replaced with the new subscription.\n\nYou will be credited for the outstanding month and charged immediately for the new subscription.'
                                );

                        }




                        $('.modal-subscribe-new #asset-name').text(externalTest.asset_name);
                        $('.modal-subscribe-new #asset-type').text(externalTest.asset_type);
                        $('.modal-subscribe-new #renew-frequency').text(externalTest
                            .renew_frequency);
                        $('.modal-subscribe-new #asset-description').text(externalTest
                            .description);
                        $('.modal-subscribe-new #asset_id_hidden').val(externalTest
                            .asset_id);

                        $('.modal-subscribe-new #alreadyHasSiteWide').val(externalTest
                            .alreadyHasSiteWide);
                        $('.modal-subscribe-new #cost').text(externalTest.cost + ' euro');
                        //fill trainee here 


                        $('.modal-subscribe-new').modal('show');
                        $(button).find('i').remove();
                        $(button).attr('disabled', false);

                    } else {

                        alert(
                            'Something went wrong. We could not load the subscription data.');
                        $(button).find('i').remove();
                        $(button).attr('disabled', false);


                    }

                } catch (error) {

                    alert(data);
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);

                }


            });

        } else {

            alert(
                'We need to check your user type first.  Please update your profile with your status, either Endoscopist, Medical Student or Nurse, and ensure you specify trainee or not.  Then try this again.'
            );
            PopupCenter(siteRoot2 + '/pages/learning/pages/account/profile.php',
                'Update your profile', 600, 400);


        }



    })

}



$(document).ready(function() {

    $(document).on('submit', '#confirm-new', function(evt) {

        <?php         if ($access_validated){  ?>

            //allow free register

            //check this here v important for the free
            //alert('hhere');

            evt.preventDefault();

            $(document).find('#button-confirm-new').attr('disabled', true);

            $form = $(this).find('input, select, textarea').filter(function() {
                if ($(this).attr('data-disabled') == "true") return false;

                if ($(this).hasClass('select2-searchField') === true) return false;

                return true;
            });

            var formObject = $form.serializeObject();

            formObject['currentPage'] = '/pro-content/' + asset_id;

        console.dir(formObject);


        /* fetch(siteRoot + "/pages/learning/scripts/subscriptions/generate_free_subscription_ajax.php", {
                method: 'POST',
                timeout: 10000,
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formObject),
            })
            .then(function(response) {
                return response.json();
            }) */


            var request = $.ajax({
            url: siteRoot + "/pages/learning/scripts/subscriptions/generate_free_subscription_ajax.php",
            type: "POST",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            contentType: "application/json",
            data: JSON.stringify(formObject),
            timeout: 30000,
            fail: function(xhr, textStatus, errorThrown) {
                alert(
                    'Something went wrong. We could not load the subscription data.'
                );
                $(this).find('i').remove();
                $(this).attr('disabled', false);
            }
        });

        request.done(function(data) {


            data = data.trim();
            console.log(data);

            externalTest = $.parseJSON(data);
            console.dir(externalTest);

            try {

                if (externalTest.page) {

                    alert('Free Registration Successful.  Taking you to your purchase');

                    window.location.href = externalTest.page_url;

                }else{

                    $(document).find('#button-confirm-new').attr('disabled', false);

                    alert('There was a problem with this registration.  Please try again.');


                }

            } catch (error) {



            }

            

            /* try {

                externalTest = $.parseJSON(data);
                console.dir(externalTest);
                if (data) {


                    try {

                        if (externalTest.location_jump) {

                            window.location.href = externalTest.location_jump;

                        }

                    } catch (error) {



                    }






                    $('.modal-new #asset-name').text(externalTest.asset_name);
                    $('.modal-new #asset-type').text(externalTest.asset_type);
                    $('.modal-new #renew-frequency').text(externalTest.renew_frequency);
                    $('.modal-new #asset-description').text(externalTest.description);
                    $('.modal-new #asset_id_hidden').val(externalTest.asset_id);
                    $('.modal-new #asset_id_coin_button').attr('asset-id', externalTest.cost);

                    //var a global max cost asset for the coin use
                    max_cost = externalTest.cost;

                    $('.modal-new #cost').text(externalTest.cost + ' euro');


                    $('.modal-new').modal('show');
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);

                } else {

                    alert('Something went wrong. We could not load the subscription data.');
                    $(this).find('i').remove();
                    $(this).attr('disabled', false);


                }

            } catch (error) {

                alert(data);
                $(button).find('i').remove();
                $(button).attr('disabled', false);

            } */


        });
            

<?php }else{?>

        evt.preventDefault();

        $form = $(this).find('input, select, textarea').filter(function() {
            if ($(this).attr('data-disabled') == "true") return false;

            if ($(this).hasClass('select2-searchField') === true) return false;

            return true;
        });

        var formObject = $form.serializeObject();


        formObject['currentPage'] = '/pro-content/' + asset_id;

        console.dir(formObject);


        /*  fetch(siteRoot + "pages/learning/scripts/subscriptions/create-checkout-session.php" + new URLSearchParams({
    foo: 'value',
    bar: 2,
})), {
        method: "POST",
      }) */

        fetch(siteRoot + "pages/learning/scripts/subscriptions/create-checkout-session.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formObject),
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(session) {
                return stripe.redirectToCheckout({
                    sessionId: session.id
                });
            })
            .then(function(result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function(error) {
                console.error("Error:", error);
            });

            <?php } ?>



    })

    $(document).on('change', '#subscription_type', function() {

        alert('hello');
        $('.modal-subscribe-new').modal('hide');
        $(document).find('#subscribe-now').click();


    })

    $(document).on('click', '.key-features', function() {
        // alert('hello');
        $('.modal-pro-premium').modal('hide');
        window.location.href = siteRoot + 'upgrade.php#options-table';



    })


    $(document).on('submit', '#confirm-new-subscription', function(evt) {

        evt.preventDefault();





        $form = $(this).find('input, select, textarea').filter(function() {
            if ($(this).attr('data-disabled') == "true") return false;

            if ($(this).hasClass('select2-searchField') === true) return false;

            return true;
        });

        var formObject = $form.serializeObject();


        <?php

        $url = $_SERVER['REQUEST_URI'];

        $url = str_replace('/dashboard/gieqs' , '', $url);
        
        //preg_replace('/^dashboard/gieqs/', '', $url);



        ?>

        formObject['currentPage'] = '<?php echo $url;?>';

        console.dir(formObject);


        /*  fetch(siteRoot + "pages/learning/scripts/subscriptions/create-checkout-session.php" + new URLSearchParams({
    foo: 'value',
    bar: 2,
})), {
        method: "POST",
      }) */

        fetch(siteRoot2 +
                "pages/learning/scripts/subscriptions/create-checkout-session-subscription.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formObject),
                })
            .then(function(response) {
                return response.json();
            })
            .then(function(session) {
                return stripe.redirectToCheckout({
                    sessionId: session.id
                });
            })
            .then(function(result) {
                // If redirectToCheckout fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using error.message.
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function(error) {
                console.error("Error:", error);
            });



    })


    $('#button-login').click(function() {

        <?php 
            if ($access_validated){
                ?>

        window.location = siteRoot2 +
            "pages/authentication/login.php?destination=signup&assetid=" + asset_id + "&access_token=" +
            access_token;

        <?php 
            }else{
                ?>

        window.location = siteRoot2 +
            "pages/authentication/login.php?destination=signup&assetid=" + asset_id;

        <?php
            }
            ?>


    })

    $('.coin-only').click(function(event) {

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

        }

        const jsonString = JSON.stringify(dataToSend);

        if (userid) {

            if (loggedin == '1'){

                var url = siteRoot2 +
                "pages/learning/scripts/subscriptions/get_new_subscription_data.php";

            }else{

                var url = siteRoot2 +
                "pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

            }

            //closed version
           

        } else {

            //open version

            var url = siteRoot2 +
                "pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

        }

        var request = $.ajax({
            url: url,
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
                    'Something went wrong. We could not load the subscription data.'
                );
                $(this).find('i').remove();
                $(this).attr('disabled', false);
            }
        });

        request.done(function(data) {


            data = data.trim();
            console.log(data);

            try {

                externalTest = $.parseJSON(data);
                console.dir(externalTest);
                if (data) {


                    try {

                        if (externalTest.location_jump) {

                            window.location.href = externalTest.location_jump;

                        }

                    } catch (error) {



                    }






                    $('.modal-new #asset-name').text(externalTest.asset_name);
                    $('.modal-new #asset-type').text(externalTest.asset_type);
                    $('.modal-new #renew-frequency').text(externalTest.renew_frequency);
                    $('.modal-new #asset-description').text(externalTest.description);
                    $('.modal-new #asset_id_hidden').val(externalTest.asset_id);
                    $('.modal-new #asset_id_coin_button').attr('asset-id', externalTest.cost);

                    //var a global max cost asset for the coin use
                    max_cost = externalTest.cost;

                    $('.modal-new #cost').text(externalTest.cost + ' euro');


                    $('.modal-new').modal('show');
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);

                } else {

                    alert('Something went wrong. We could not load the subscription data.');
                    $(this).find('i').remove();
                    $(this).attr('disabled', false);


                }

            } catch (error) {

                alert(data);
                $(button).find('i').remove();
                $(button).attr('disabled', false);

            }


        });


    });



    $(document).on('click', '#login', function() {
        event.preventDefault();

        <?php 
            if ($access_validated){
                ?>

        window.location = siteRoot2 +
            "pages/authentication/login.php?destination=signup&assetid=" + asset_id + "&access_token=" +
            access_token;

        <?php 
            }else{
                ?>

        window.location = siteRoot2 +
            "pages/authentication/login.php?destination=signup&assetid=" + asset_id;

        <?php
            }
            ?>




      /*   window.location.href = siteRoot2 +
            '/pages/authentication/login.php?destination=signup&assetid=' + asset_id; */


    })

    $('#button-signup').click(function() {


        $('.modal-new').modal('hide');
        $('#registerInterest').modal('show');
        $('.modal').css('overflow', 'auto');



    })

    if (videoPassed == 'register') {

        //simulate click

        waitForFinalEvent(function() {

            if (typeof isSymposium !== 'undefined'){


                if (isSymposium === 'true'){

                    if (loggedin == '1'){

                        if (alreadyRegistered == 'false'){

                    $('.symposium-now').trigger('click');

                        }

                    }else{

                        $('.register-now').trigger('click');
    
                    }


                }else{

                $('.register-now').trigger('click');

                }

            }else{

                $('.register-now').trigger('click');


            }


        }, 500, "hello header");

    }

    $('.register-now').click(function(event) {

        var button = $(this);

        $(this).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
        $(this).attr('disabled', true);
        //var asset_type = $(this).data('assettype');
        var asset_id = $(this).data('assetid');

        console.log(asset_id);
        $('.modal-footer #button-confirm-new').attr('data-assetid', '' + asset_id);

        

        if (typeof isSymposium !== 'undefined'){



        }else{

            isSymposium = false;
        }




        //get the modal data
        const dataToSend = {

            asset_id: asset_id,
            isSymposium : isSymposium,

        }

        const jsonString = JSON.stringify(dataToSend);

        if (userid) {

            //closed version
            var url = siteRoot2 +
                "pages/learning/scripts/subscriptions/get_new_subscription_data.php";

        } else {

            //open version

            var url = siteRoot2 +
                "pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

        }

        var request = $.ajax({
            url: url,
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
                    'Something went wrong. We could not load the subscription data.'
                );
                $(this).find('i').remove();
                $(this).attr('disabled', false);
            }
        });

        request.done(function(data) {


            data = data.trim();
            console.log(data);

            try {

                externalTest = $.parseJSON(data);
                console.dir(externalTest);
                if (data) {


                    try {

                        if (externalTest.location_jump) {

                            window.location.href = externalTest.location_jump;
                            $('.modal-new').modal('hide');
                            $(button).find('i').remove();
                            $(button).attr('disabled', false);
                            return;

                        }

                    } catch (error) {



                    }

                    $('.modal-new #asset-name').text(externalTest.asset_name);
                    $('.modal-new #asset-type').text(externalTest.asset_type);
                    $('.modal-new #renew-frequency').text(externalTest.renew_frequency);
                    $('.modal-new #asset-description').text(externalTest.description);
                    $('.modal-new #asset_id_hidden').val(externalTest.asset_id);
                    $('.modal-new #asset_id_coin_button').attr('asset-id', externalTest.cost);


                    //workaround for symposium cost

                    //also needs to include 20% discount for those with long service or 
                    if (typeof isSymposium !== 'undefined'){

                        if (isSymposium == 'true'){

                            console.log('symposium is true from prgram generic');

                                if (externalTest.symposium === true){

                                    console.log('symposium is true from ajax');

                                    console.log('externalTest follows');
                                    console.dir(externalTest);



                                    //    $subscription_to_return['professionalMember'] = $symposium->getprofessionalMember();
                                    //    $subscription_to_return['longTermProMemberDiscount'] = $symposium->getlongTermProMemberDiscount();


                                    

                                        if (externalTest.cost == ''){ //open version

                                            $('.modal-new #cost').parent().addClass('d-none');

                                            $('.modal-new #cost').addClass('d-none');
                                            $('.modal-new #symposium-discount').parent().addClass('d-none');

                                        }else{ //closed logged in so determine cost will work


                                        //if there is a professional membership reduce 20% on the symposium cost

                                        if (externalTest.early_bird == 1){var earlyBirdReturn = true}else{var earlyBirdReturn = false};
                                    if (externalTest.group == null || externalTest.group == '' || externalTest.group == 0){var groupReturn = 0}else{var groupReturn = 1};


                                    var updatedCostObject = calculateCost(earlyBirdReturn, externalTest.registrationType, groupReturn, externalTest.includeGIEQsPro, false);

                                    console.log('updatedCostObject follows');

                                    console.dir(updatedCostObject);

                                            if (externalTest.professionalMember == '1' || externalTest.professionalMember == '2' || externalTest.professionalMember == '3' ||externalTest.longTermProMemberDiscount == '1'){

                                                var cost_symposium = updatedCostObject.symposiumcost;
                                                cost_symposium = parseInt(cost_symposium);
                                                cost_symposium = cost_symposium * 0.8;

                                                var finalcost = cost_symposium + updatedCostObject.normalCostGIEQsOnline - updatedCostObject.saving;

                                                max_cost = finalcost;

                                                $('.modal-new #cost').text(finalcost + ' euro');

                                                $('.modal-new #symposium').val(1);
                                                $('.modal-new #cost_symposium').val(finalcost);
                                                $('.modal-new #symposium-discount').text(' 20%');
                                                $('.modal-new #symposium-discount').removeClass('d-none');
                                                $('.modal-new #symposium-discount').parent().removeClass('d-none');



                                            }else{

                                                max_cost = updatedCostObject.cost;

                                                $('.modal-new #cost').text(updatedCostObject.cost + ' euro');



                                                $('.modal-new #symposium').val(1);
                                                $('.modal-new #cost_symposium').val(updatedCostObject.cost);
                                                $('.modal-new #symposium-discount').text('None');
                                                $('.modal-new #symposium-discount').addClass('d-none');
                                                $('.modal-new #symposium-discount').parent().addClass('d-none');


                                            }


                                    
                                    
                                    }

                            }else{


                                console.log('no symposium received from program generic');


                            }

                            //need to get the cost from the symposium database



                        }else{
                            //var a global max cost asset for the coin use
                            max_cost = externalTest.cost;

                            $('.modal-new #cost').text(externalTest.cost + ' euro');

                        }

                    }else{

                         //var a global max cost asset for the coin use
                         max_cost = externalTest.cost;

                        $('.modal-new #cost').text(externalTest.cost + ' euro');



                    }


                    $('.modal-new').modal('show');
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);

                } else {

                    alert('Something went wrong. We could not load the subscription data.');
                    $(this).find('i').remove();
                    $(this).attr('disabled', false);


                }

            } catch (error) {

                alert(data);
                $(button).find('i').remove();
                $(button).attr('disabled', false);

            }


        });


    });






    $('.subscribe-now').click(function(event) {


        //check the current subscription status

        var subscription_status = $('#subscription_level').text();

        //write to the page above

        if (subscription_status == '99') {

            $('#propremium').modal('show');

        } else if (subscription_status == '1') {


            launchSubscriptionDialog(2);

        } else {

            alert ('You already own a subscription!  Please contact us if there are issues with your access.');

        }



        //then and only then go to the subscribe page






    });

    $(document).on('click', '#submitPreRegister', function(event) {

        event.preventDefault();
        $('#NewUserForm').submit();

    })

    $("#NewUserForm").validate({

        invalidHandler: function(event, validator) {
            var errors = validator.numberOfInvalids();
            console.log("there were " + errors + " errors");
            if (errors) {
                var message = errors == 1 ?
                    "1 field contains errors. It has been highlighted" :
                    +errors + " fields contain errors. They have been highlighted";


                $('#error').text(message);
                //$('div.error span').addClass('form-text text-danger');
                //$('#errorWrapper').show();

                $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                    $("#errorWrapper").slideUp(500);
                });
            } else {
                $('#errorWrapper').hide();
            }
        },
        rules: {
            firstname: {
                required: true,

            },



            surname: {
                required: true,

            },

            gender: {
                required: true,

            },

            trainee: {
                required: true,

            },


            email: {
                required: true,
                email: true,

            },

            password: {
                required: true,
                minlength: 6,

            },

            passwordAgain: {
                equalTo: "#password",


            },


            centreCountry: {

                required: true,

            },
            endoscopistType: {

                required: true
            },

            checkterms: {

                required: true,

            },
            checkprivacy: {

                required: true
            }



        },
        messages: {



            password: {
                required: 'Please enter a password',
                minlength: 'Please use at least 6 characters'


            },
            passwordAgain: {

                equalTo: "The new passwords should match",



            },
        },
        submitHandler: function(form) {

            submitPreRegisterForm();

            //console.log("submitted form");



        }

    });

    $(document).on('click', '#spend-coins', function(event) {

        event.preventDefault();
        $('#coins-spend').submit();

    })

    $.validator.addMethod("maximum", function(value, element, desired) {

        console.log(value);
        console.log(desired);
        console.log(parseInt(max_cost));
        var coins_remaining = parseInt($('#coins_remaining').text());
        console.log(coins_remaining);


        if (value <= parseInt(coins_remaining) && value <= parseInt(max_cost) && value > 0 && isInt(
                value)) {
            console.log('true returned');

            return true;
        } else {
            console.log('false returned');

            return false;
        }

    });
    /* 
    $.validator.addMethod("coins_remaining", function (value, element, desired) {

    console.log(value);
    console.log(desired);
    var coins_remaining = parseInt($('#coins_remaining').text());
    console.log(coins_remaining);

    if (value <= parseInt(coins_remaining) && value >= 0 && isInt(value)) {
    console.log('true returned');

    return true;
    } else {
    console.log('false returned');

    return false;
    }

    }); */

    $("#coins-spend").validate({

        invalidHandler: function(event, validator) {
            var errors = validator.numberOfInvalids();
            console.log("there were " + errors + " errors");
            if (errors) {
                var message = errors == 1 ?
                    "1 field contains errors. It has been highlighted" :
                    +errors + " fields contain errors. They have been highlighted";


                $('#error').text(message);
                //$('div.error span').addClass('form-text text-danger');
                //$('#errorWrapper').show();

                $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                    $("#errorWrapper").slideUp(500);
                });
            } else {
                $('#errorWrapper').hide();
            }
        },
        rules: {


            number_coins: {
                required: true,
                maximum: true,


            },





        },
        messages: {



            number_coins: {
                required: 'Please enter an amount of coins',
                maximum: 'Please enter a valid amount of GIEQs Coin to spend on this product.  The amount of GIEQs Coin must be a whole number and be available in your account.',


            },

        },
        submitHandler: function(form) {



            console.log("submitted coin form");
            performCoinTransaction();



        }

    });

    $(document).on('click', '.editSessionFromPlan', function(event) {

        event.preventDefault();
        var sessionid = $(this).attr('data');
        window.open(siteRoot2 + "/pages/backend/sessionview.php?identifier=" + sessionid, '_blank');


    })

    $(document).on('click', '.use-coin', function(event) {

        var asset_id_specific = $(this).attr('asset-id');
        event.preventDefault();
        useGIEQsCoin(asset_id_specific);


    })

    $(document).on('click', '.coin-only', function(event) {

        var asset_id_specific = asset_id;
        console.log(asset_id_specific);
        event.preventDefault();
        $(this).attr('disabled', true);
        $(this).val('Please wait...');
        $('.modal-new .cancel-button').attr('disabled', true);

        alert(
            'This purchase is using GIEQs Coin Only.  No payment is required.  Please click close and wait for the transaction to complete.');
        //ajax just up to the 

        const dataToSend2 = {

            asset_id: asset_id_specific,
            //coin_amount: $(this).attr('coin-amount');

        }

        //first check that user type is filled

        const jsonString2 = JSON.stringify(dataToSend2);

        var request3 = $.ajax({
            url: rootFolder2 +
                "pages/learning/scripts/subscriptions/generate_free_subscription_coin.php",
            type: "POST",
            crossDomain: true,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        },
            contentType: "application/json",
            data: jsonString2,

            timeout: 50000,
            fail: function(xhr, textStatus, errorThrown) {
                alert(
                    'Something went wrong. Please try that again.'
                );
                $(button).find('i').remove();
                $(button).attr('disabled', false);
            }
        });

        request3.done(function(data) {


            data = data.trim();
            var result = JSON.parse(data);
            console.dir(result);

            if (result.complete === true) {

                window.location.replace(result.redirect);

            } else if (result.error == 1)

                alert(
                    'You already own this you cannot purchase it again.  Please cancel the transaction.'
                    );
            $(this).attr('disabled', false);
            $('.modal-new .cancel-button').attr('disabled', false);
            $(this).val('Cannot Purchase');



        })
    })

    $(document).on('click', '.cancel-coin', function(event) {

        event.preventDefault();

        $(this).attr('disabled', true);
        if (confirm(
                "Are you sure?  You already committed GIEQs Coin to this product.  If you cancel that transation will be reversed and the coins returned to your account."
                )) {


            var request3 = $.ajax({
                url: rootFolder2 +
                    "pages/learning/scripts/coin/coin_transact_reverse.php",
                type: "POST",
                crossDomain: true,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        },
                contentType: "application/json",
                data: '',

                timeout: 5000,
                fail: function(xhr, textStatus, errorThrown) {
                    alert(
                        'Something went wrong. Please try that again.'
                    );

                }
            });

            request3.done(function(data) {

                data = data.trim();
                var result = JSON.parse(data);
                console.dir(result);

                if (result.outcome == true) {

                    location.reload();


                }


            })



        } else {




        }


    })



})
</script>