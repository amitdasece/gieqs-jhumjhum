<?php

//all javascript and other for tag tracking behaviour





?>

<script>
var browsingBeforeExpand = readCookie('browsing');

if (browsingBeforeExpand != '99') {
    createCookie('browsing_last', browsingBeforeExpand, '2');
}else{
    createCookie('browsing', '99', '2');


}


//or create 99

var browsing_idBeforeExpand = readCookie('browsing_id');
var browsing_arrayBeforeExpand = $('#browsing_array').text(); //this is written to the page so can't be updated unless AJAX or refresh



//cookie functions

 //new cookie functions

function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else {
            var expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
 }

function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length, c.length);
            }
        }
        return null;
}
function eraseCookie(name) {
        createCookie(name, "", -1);
}


//update the video bar

function updateVideoBar() {

//unused

var restricted = window.localStorage.getItem('restricted');

    if (restricted == 'false' || restricted === null) {

        //alter the video bar

        refreshVideoBar();


    } else if (restricted == 'true') {



    }

}

//check tag filtering

function checkTagFiltering() {

// check tag filtering

var overallTagAvailable = window.localStorage.getItem('selectedTag');

if (overallTagAvailable != 'null') {

    selectedTag = overallTagAvailable;

    showTagBar(overallTagAvailable);

    //and remove the video text if restricted == false



    waitForFinalEvent(function() {
        //alert('Resize...');
        filterByTag(overallTagAvailable);

    }, 200, "filter by overall tag available");



} else {


    //check if there is a recent chapter and jump to it, does nothing if no recent chapter

    //window.localStorage.setItem('selectedTag', null);
    //window.localStorage.setItem('restricted', false);


    waitForFinalEvent(function() {
        //alert('Resize...');
        viewedVideoRecentChapter();

        showAlert(
            'Started from where you finished last time. To <a href=\"javascript:jumpToTime(0);\">restart click here</a>.'
        )

    }, 200, "wait for most recent Video");








    //has user viewed video before, if so which chapter, if not false



}



}

function hideTagBar() {

$('#tagBar').addClass('d-none');
window.localStorage.setItem('selectedTag', null);
createCookie('selectedTag', null, '2');
refreshVideoBar();




}

$(document).ready(function() {

$(document).on('click', '.exitTagNav', function() {

    hideTagBar();
    undoFilterByTag();


})

})

function restrictTagStatusBar() {

var restricted = getCookie('restricted');

if (restricted == 'false') {

    var browsing_last = getCookie('browsing_last');
    createCookie('browsing', browsing_last, '2');

    //put original page values back

    $('#browsing').attr('data-browsing', browsing_last);
    //$('#browsing_id').attr('data-browsing-id', browsing_idBeforeExpand); //need to blank these?
    //$('#browsing_array').text(browsing_arrayBeforeExpand);

    $('.expandSearch').attr('restricted', 1);
    $('.expandSearch').text('Expand Search');

    //put here

    window.localStorage.setItem('restricted', "true");
    createCookie('restricted', 'true', '2');

    showTagBar();

}



}

function checkExpandedStatusTagBar() {


var restricted = window.localStorage.getItem('restricted');
console.log('restricted is ' + restricted);

//$('.expandSearch').removeClass('heartBeat');
//set the cookie 99

if (restricted == "false") {

    console.log('Entered restricted = false loop');

    $('.expandSearch').attr('restricted', 0);
    $('.expandSearch').text('Restrict Search');



} else if (restricted == "true") {


    $('.expandSearch').attr('restricted', 1);
    $('.expandSearch').text('Expand Search');




}

// showTagBar(selectedTag);


//$('.expandSearch').addClass('heartBeat');

}

function toggleExpandedStatusTagBar() {

var restricted = window.localStorage.getItem('restricted');
console.log('restricted is ' + restricted);

$('.expandSearch').removeClass('heartBeat');
//set the cookie 99

if (restricted == "false") {

    console.log('Entered restricted = false loop');


    //put original values back

    //createCookie('browsing', browsingBeforeExpand, '2');
    //createCookie('browsing_id', browsing_idBeforeExpand, '2');
    //createCookie('browsing_array', browsing_arrayBeforeExpand, '2');

    var browsing_last = getCookie('browsing_last');
    createCookie('browsing', browsing_last, '2');

    //put original page values back

    $('#browsing').attr('data-browsing', browsing_last);
    //$('#browsing_id').attr('data-browsing-id', browsing_idBeforeExpand); //need to blank these?
    //$('#browsing_array').text(browsing_arrayBeforeExpand);

    $('.expandSearch').attr('restricted', 1);
    $('.expandSearch').text('Expand Search');

    //put here

    window.localStorage.setItem('restricted', "true");
    createCookie('restricted', 'true', '2');


} else if (restricted == "true") {

    createCookie('browsing', '99', '2');

    $('#browsing').attr('data-browsing', '99');

    //$('#browsing_id').attr('data-browsing-id', ''); //need to blank these?

    //$('#browsing_array').text('');


    $('.expandSearch').attr('restricted', 0);
    $('.expandSearch').text('Restrict Search');

    window.localStorage.setItem('restricted', "false");
    createCookie('restricted', 'false', '2');


} else {

    //first click

    $('.expandSearch').removeClass('heartBeat');
    //set the cookie 99

    createCookie('browsing', '99', '2');

    //update the page references

    $('#browsing').attr('data-browsing', '99');
    //$('#browsing_id').attr('data-browsing-id', ''); //need to blank these?
    //$('#browsing_array').text('');


    $('.expandSearch').attr('restricted', 0);
    $('.expandSearch').text('Restrict Search');
    window.localStorage.setItem('restricted', "false");
    createCookie('restricted', 'false', '2');



}



}

$(document).ready(function() {

$(window).resize(checkResize);


$(document).on('click', '.expandSearch', function() {

    toggleExpandedStatusTagBar();

    showTagBar(selectedTag);


    $('.expandSearch').addClass('heartBeat');

    checkTagFiltering();

        checkExpandedStatusTagBar();

   

})

})

</script>