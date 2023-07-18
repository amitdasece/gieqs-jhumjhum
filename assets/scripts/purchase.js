<?php

<script>

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



var userid = '<?php echo $userid;?>';

if (userid == '') {

    userid = false;

}

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


    $(document).ready(function() {


$('#button-login').click(function() {

            <?php 
            if ($access_validated){
                ?>

window.location = siteRoot +
"pages/authentication/login.php?destination=imaging_signup&access_token=<?php echo $access_token;?>";

<?php 
            }else{
                ?>

window.location = siteRoot +
"pages/authentication/login.php?destination=imaging_signup";

<?php
            }
            ?>


})



$(document).on('click', '#login', function() {

event.preventDefault();
window.location.href = siteRoot +
'/pages/authentication/login.php?destination=imaging_signup';


})

$('#button-signup').click(function() {


$('.modal-new').modal('hide');
$('#registerInterest').modal('show');
$('.modal').css('overflow', 'auto');



})

if (videoPassed == 'register') {

//simulate click

waitForFinalEvent(function() {

$('.register-now').trigger('click');


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

//get the modal data
const dataToSend = {

asset_id: asset_id,

}

const jsonString = JSON.stringify(dataToSend);

if (userid) {

//closed version
var url = siteRoot +
"pages/learning/scripts/subscriptions/get_new_subscription_data.php";

} else {

//open version

var url = siteRoot +
"pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

}

var request = $.ajax({
url: url,
type: "POST",
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

if (externalTest.location_jump){

window.location.href = externalTest.location_jump;

}

}catch(error){



}




$('.modal-new #asset-name').text(externalTest.asset_name);
$('.modal-new #asset-type').text(externalTest.asset_type);
$('.modal-new #renew-frequency').text(externalTest.renew_frequency);
$('.modal-new #asset-description').text(externalTest.description);
$('.modal-new #asset_id_hidden').val(externalTest.asset_id);
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

$(document).on('click', '.editSessionFromPlan', function(event) {

event.preventDefault();
var sessionid = $(this).attr('data');
window.open(siteRoot + "/pages/backend/sessionview.php?identifier=" + sessionid, '_blank');


})



})

</script>