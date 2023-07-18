/*

Endoscopy Wiki video player
Code license David Tate 2019.  All rights reserved.

page requirements

jquery.vimeo.api.min.js

<div class='row'>
	<div class='col-9'>
		<h2 id="pageTitle" style="text-align:left;"><?php echo $general->getVideoTitle($id)?></h2>
	</div>
</div>

<div class='row'>
    <div class='col-9'>

        <p id="tagsDisplay" style="text-align: left;">Ideas in this video</p>
    </div>
    <div class='col-3 yellow-light center'>
        <?php
        //echo $currentUserLevel . 'is current user level';
        if ($currentUserLevel == 1){
        
        echo '<div class="row">';
        echo '<div id="chapterEdit" style="text-align:right;">';
        echo '<span style="font-size: 1em;">';
        echo '<i id="editSuper" class="fas fa-edit"></i>';
        echo '</span>';
        echo '</div>';
        echo '</div>';
        }
        ?>
        <div class='row'>
        <div id='chapterSelector' class="focusify-enable">

            <?php echo '<b>Chapter Control</b> ' . $general->getChapterSelector($id)?>
        </div>
        </div>
        <div id='chapterSelectorMessage'></div>

        <div id='chapterSelectorControl' style='text-align: left; padding:4px; font-size:12px;'>
        <div class='row'>
            <div class='col-4'>
                
            </div>
            <div  class='col-1'>
                <i id='video-back' class="fas fa-step-backward"></i>
            </div>
            <div class='col-1'>
                <i id='video-start-pause' class="fas fa-play"></i>
            </div>
            <div  class='col-1'>
                <i id='video-stop' class="fas fa-stop"></i>
            </div>
            <div class='col-1'>
                <i id='video-forward' class="fas fa-step-forward"></i>
            </div>
            <div class='col-4'>
                
            </div>
        </div>
        <div class='row' style='text-align:right;'>
            <label class="container" style=''>Stop after chapter:
                    <input id="triggerStop" type="checkbox">
                    <span class="checkmark"></span>
                </label>
                
            </div>
        </div>
        <div id='row'>
            <div class='col-3 equalHeight' style='font-size:8px;'>Chapter progress:</div>
            <div class='col-9'>
                <div id="myProgress">
                    <div id="myBar"></div>
                </div>
            </div>
        </div>

    </div>


</div>

<div id="vimeoid" style="display:none;"><?php echo $general->getVimeoID($id);?></div>

<div id="videoChapterData" style="display:none;"><?php echo $general->getVideoAndChapterDatav1($id);?>
</div>

<div id="videoChapterTagData" style="display:none;"><?php echo $general->getVideoAndChapterData($id);?>
</div>

<div id="videoData" style="display:none;"><?php echo $general->getVideoData($id);?></div>


<div class='row' style="margin-top:10px;">

    <div class='col-9'>
        <div id='videoDisplay'>

        </div>

    </div>

    <div class='col-3 black whiteborder center' style="min-height:60%;">

        <div id='chapterInfo'>
            <div id='titleBar' class='gentBlue' style='padding:3px;'>
                <p id='videoTitle'><b></b></p>

                <p id='videoDescription'></p>
                <p id='videoAuthor' style='font-size:12px;'><b></b></p>
            </div>
            <p id='chapterHeading' style='padding:8px;padding-top:15px;'>Chapter information will appear
                here during the video</p>





        </div>

        <div id='buttons'></div>
    </div>
</div>




*/


var imagesPassed = "";

var videoDataDefined;

var vimeoID;

var videoLength;

var currentChapter;

var chapterLength;

var chapterpositon;

var chapterStartTime;

var inChapter = 0;

vimeoID = $("#vimeoid").text();

correctVimeoURL = $("#requiredVimeoURL").text();

encodedcorrectVimeoURL = encodeURI(correctVimeoURL);




if (videoPassed == "") {

	var edit = 0;

	videoDataDefined = 0;

} else {

	var edit = 1;

	//$('#imageUpload').hide();

	videoDataDefined = 1;


	videoDisplay(vimeoID);



	//constructEditTable;

}

try {

	var videoChapterDataText = $("#videoChapterData").text();

	var videoChapterData = $.parseJSON(videoChapterDataText);

} catch (err) {

	////console.log('No video chapter data received');

}

try {

	var videoChapterTagDataText = $("#videoChapterTagData").text();

	var videoChapterTagData = $.parseJSON(videoChapterTagDataText);

} catch (err) {

	////console.log('No video chapter data received');

}

try {

	var TagDataPerChapter = $("#TagDataPerChapter").text();

	var TagDataPerChapter = JSON.parse(TagDataPerChapter);

} catch (err) {

	////console.log('No video chapter data received');

}



try {

	var videoDataText = $("#videoData").text();

	var videoData = JSON.parse(videoDataText);

} catch (err) {

	////console.log('No video data received');

}

var files;

var imageID;

var singleTag;

var images = new Object();

var textAreas = new Object();

var selects = new Object();

var selects2 = new Object();

var selects3 = new Object();

var triggerStop = 0;

var chapterSelected = null;

var previousChapter = null;

var nextChapter = null;

var numberofChapters = videoChapterData.length;

var plays = 0;

var playSelectedChapters = null;

var selectedTag = null;

var requiredChapters = null;

var startedConnectedPlayback = null;

var singleInChapter = null;

var stopclicked = null;

var currentChapter = null;

var currentChapter_lastViewed = null;

var player = null;

function videoDisplay(url) {



	if (isNormalInteger(url) === true) {

		//can use ?muted=1 here if required

		$('#videoDisplay').html('<iframe id=\'videoChapter\' class=\'video\' src=\'' + encodedcorrectVimeoURL + '\' frameborder=\'0\' allow=\'autoplay\' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');

		$('#submitimagefiles').prop('disabled', true);
		$('#video').prop('disabled', true);
		$('#resetVideoSubmit').show();
		$('#videoForm').show();
		$('#url').val(url);

		waitForFinalEvent(function() {
            //alert("Resize...");
                var $window = $(window);
                var $videoWrap = $(document).find('.video-wrap');
                console.log($videoWrap);
                var $video = $(document).find('.video');
                console.log($video);
				var videoHeight = $video.outerHeight();
				$video.css({top: '50%', left: '50%'});

                $window.on('scroll',  function() {
                var windowScrollTop = $window.scrollTop();
                var videoBottom = videoHeight + $videoWrap.offset().top - 200;
                
                if (windowScrollTop > videoBottom) {
					$videoWrap.height(videoHeight);
					$video.addClass('stuck');
					$video.css({top: 'auto', left: 'auto'});
					
                } else {
                    $videoWrap.height('auto');
					$video.removeClass('stuck');
					$video.css({top: '50%', left: '50%'});
                }
				});

				var iframe = document.querySelector('#videoChapter');
				
				player = new Vimeo.Player(iframe);

				player.on('loaded', function(data) {
					addCuePoints();
			
				
				});

            }, 100, 'Wrapper Video');



	} else {


		alert('Invalid vimeo id in record');

	}




}

function getKeyForChapterid(chapterid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = null;

	$(videoChapterData).each(function (i, val) {

		if (val.chapterid == chapterid) {

			//console.log(i);
			requiredReturn = i;

		}



	})

	return requiredReturn;

}

function getChapterid(chapternumber) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = null;

	var arrayPosition = chapternumber - 1;

	$(videoChapterData).each(function (i, val) {

		if (i == arrayPosition) {

			//console.log(i);
			requiredReturn = val.chapterid;

		}



	})

	return requiredReturn;

}

function getChapterFromTime(seconds) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = null;

	$(videoChapterData).each(function (i, val) {

		if (seconds >= val.timeFrom && seconds <= val.timeTo) {

			//console.log(i);
			requiredReturn = val.chapterid;

		}



	})

	return requiredReturn;

}

function getChaptersForGivenTag(tagid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = new Array;

	var x = 0;

	$(videoChapterTagData).each(function (i, val) {

		if (val.tagid == tagid) {

			//console.log(val.chapterid);

			//check that this chapter is not already in the list
			var n = requiredReturn.includes(val.chapterid);

			if (n == false) {
				requiredReturn[x] = val.chapterid;
			}

			x++;

		}



	})

	return requiredReturn;

}

function getTagsGivenChapter(chapterid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = new Array;

	var x = 0;
	var y = 0;

	$(TagDataPerChapter).each(function (i, val) {

		if (val.chapterid == chapterid) {

			//console.log(val.chapterid);

			//check that this chapter is not already in the list
			var n = requiredReturn.includes(val.tagid);

			if (n == false) {
				requiredReturn[x] = val.tagid;
			}

			x++;

		}



	})

	return requiredReturn;

}

function tagExistsInVideo(tagid){


	var requiredReturn = false;

	var x = 0;
	var y = 0;

	$(TagDataPerChapter).each(function (i, val) {

		console.log(val.tagid);

		if (val.tagid == tagid) {

			console.log(val.tagid);

			//check that this chapter is not already in the list
			requiredReturn = true;

		}



	})

	return requiredReturn;

}



function getTagName(tagid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = new Array;

	var x = 0;

	$(videoChapterTagData).each(function (i, val) {

		if (val.tagid == tagid) {

			//console.log(val.chapterid);

			//check that this chapter is not already in the list
			var n = requiredReturn.includes(val.tagName);

			if (n == false) {
				requiredReturn[x] = val.tagName;
			}

			x++;

		}



	})

	return requiredReturn;

}

function getVideoTime(chapterid, type) {

	$("#videoChapter").vimeo("getCurrentTime", function (data) {

		//$('#videoTime').html("<p class='p-2'>Current time is "+data+" seconds</p>");

		if (type == 0) { //from

			$('#chaptertimefrom' + chapterid).val(data);

		} else if (type == 1) { //from

			$('#chaptertimeto' + chapterid).val(data);
		}

		//console.log( "Current time", data ); 
	})





}

function jumpToTime(time) {


	player.setCurrentTime(time);
	
	player.play();

}

function getVideoTags(videoPassed) {


	//event.preventDefault();
	//check videopassed is integer
	
		//get the video start time for this option

		

					try {

						var JSONtoParse = $('#tagsData').text();
						var formData = $.parseJSON(JSONtoParse);

					} catch (error) {

						//console.log ('caught');

					}

					$(formData).each(function (i, val) {

						var id = val.id;
						var tagName = val.tagName;

						$('#tagsDisplay').append('<span class="badge badge-info mx-2 my-0 tagButton" id="tag' + id + '">' + tagName + '</span>');

					})
					//


				



			


		

	}



 //no still used

function getChapterSelectorv2(idSelector, ChapteridSelector) {


	var chapterObject = new Object();

	chapterObject = {
		'id': videoPassed,
	};

	var imagesObject = JSONStraightDataQuery(chapterObject, 'getChapterSelectorAll', 9);

	imagesObject.done(function (data) {

		//console.log(data);

		if (data) {

			if (data) {

				//do the tag thing foreach data

				//console.log(data);

				try {

					var formData = $.parseJSON(data);

				} catch (error) {

					//console.log ('caught');

				}

				var html = "<p>Select Chapter : </p><select id='chapterSelectorVideo" + chapterObject.id + "' class='chapterSelector' style='width:100%;'>";
				html += "<option value hidden selected></option>";

				$(formData).each(function (i, val) {

					var chapterid = val.chapterid;
					var name = val.chaptername;
					var number = val.number;
					//console.log(number + 'is number');
					//var tagName = val.tagName;

					

					html += "<option value='" + chapterid + "'>" + number + " - " + name + "</option>";

					


				})




				html += "</select>";

				$('#chapterSelector').html(html);

				$('#chapterSelectorMessage').html('<p class="small">Showing all chapters');

				$ //(".chapterSelector").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);

				$('body').find("#chapterSelectorVideo" + idSelector + " option[value='" + ChapteridSelector + "']").prop('selected', true).trigger('change');

			} else {

				alert("Error, try again");

				//enableFormInputs("images");

			}



		}


	});




}  //old

function getChapterSelector(idSelector, ChapteridSelector) {




	var html = "<p>Select Chapter : </p><select id='chapterSelectorVideo" + videoChapterData.id + "' class='chapterSelector' style='width:100%;'>";
	html += "<option value hidden selected></option>";

	$(videoChapterData).each(function (i, val) {

		var chapterid = val.chapterid;
		var name = val.chaptername;
		var number = val.number;
		//var tagName = val.tagName;

		html += "<option value='" + chapterid + "'>" + number + " - " + name + "</option>";


	})




	html += "</select>";

	$('#chapterSelector').html(html);

	$('#chapterSelectorMessage').html('<p class="small">Showing all chapters');

	$ //(".chapterSelector").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);

	$('body').find("#chapterSelectorVideo" + idSelector + " option[value='" + ChapteridSelector + "']").prop('selected', true);






}  //old

function undoFilterByTag() {

	console.log('Activated UndoFilterByTag');

	startedConnectedPlayback = null;

	playSelectedChapters = null;

	if (!($('.alert').hasClass('d-none'))){

		$('.alert').addClass('d-none');

	}

	$('.tagFilterDisplayArea').removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('text-sm'); //remove and add gentBlue

	$('body').find('.tagFilterDisplayArea').html('');

	$('.chapterSelector').find('option').each(function () {

		//first remove any previous addition

		if (($(this).text()).indexOf(' -- filtered by highlighted tag') >= 0) {

			//remove it 31

			var textToReplace = $(this).text();

			textToReplace = textToReplace.slice(0, -31);

			$(this).text(textToReplace);


		}



	})

	requiredChapters = null;

	//RESET THE CHAPTER ORDER

	selectedTag = null;
	hideTagBar();


		player.getCurrentTime().then(function(currentTime) {

			console.log('Current Time was ' + currentTime);

			var chapterid = getChapterFromTime(currentTime);

		var key = getKeyForChapterid(chapterid);


		//define the data array

		var data2 = {

			data : {

			id: chapterid,

			number: key+1,

			next: getNextChapter(key+1),

			previous: getPreviousChapter(key+1),

			tags: getTagsGivenChapter(chapterid)


			}



		}

		updatePlayer(data2);


		});  


		//construct the same data array as for a chapter cue point first


		//which chapter are we in

		



	//window.localStorage.setItem('selectedTag', null);



}

function filterByTag(requestedTag){

	//restrictTagStatusBar();
	
	undoFilterByTag();

	requiredChapters = null;

	selectedTag = null;
		//remove all selected tags

		player.pause();

		

		

		//add selected tag to the tag with requestedtag data-tag-id

		/* $('body').find('.tagButton').each(function(){

			if ($(this).attr('data-tag-id') == requestedTag){

				$(this).addClass('selectiveTag');

			}else{

				$(this).removeClass('selectiveTag');

			}	
			
		}) */

		//set selected tag as requestedtag


		//does tag exist in video (maybe coming from another page)

		if (tagExistsInVideo(requestedTag)){

		//$("#videoChapter").vimeo("pause");

		//set the play only these chapters tag
		playSelectedChapters = 1;


		//add an identifier that this is the tag we are going to show
		//here this is any tag that is associated with this tag

		


		
		//str = str.substring('tag'.length);
		selectedTag = requestedTag;
		//console.log(selectedTag);

		//WRITE THE SELECTED TAG TO LOCAL STORAGE

		showTagBar(selectedTag);

		//make the selected button green and all others blue

		

		//go through the videoChapterTagData object to identify which of these has the required tag, returning an array of chapter ids

		requiredChapters = getChaptersForGivenTag(selectedTag);

		//console.log(requiredChapters);

		//highlight these in red in the chapter selector

		$('.chapterSelector').find('option').each(function () {

			//first remove any previous addition

			if (($(this).text()).indexOf(' -- filtered by highlighted tag') >= 0) {

				//remove it 31

				var textToReplace = $(this).text();

				textToReplace = textToReplace.slice(0, -31);

				$(this).text(textToReplace);


			}

			//console.log($(this));

			if (requiredChapters.includes($(this).val()) === true) {

				$(this).append(' -- filtered by highlighted tag');

				$(this).attr('data', 'view');

			}


		})

		//some alert to the user that this has happened

		//$('.tagFilterDisplayArea').css('background-color', '#4CAF50');
		$('.tagFilterDisplayArea').addClass('bg-gieqsGold').addClass('text-dark').addClass('text-sm');

		if ($('body').find('.tagFilterDisplayArea').find('#taggedChapterDisplay').length == 0) {

			var tagName = getTagName(selectedTag);

			tagName = tagName.toString().toLowerCase();

			$('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="fas fa-times remove cursor-pointer"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');

		} else {

			var tagName = getTagName(selectedTag);

			tagName = tagName.toString().toLowerCase();

			$('body').find('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="cursor-pointer fas fa-times remove"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');
		}

		//skip the video to the start of the first chapter in the array

		

		var targetChapter = requiredChapters[0];

		//console.log(targetChapter);

		var targetChapterKey = getKeyForChapterid(targetChapter);

		var targetTime = videoChapterData[targetChapterKey].timeFrom;

		startedConnectedPlayback = 1;

		player.setCurrentTime(targetTime);

		var data2 = {

			data : {

			id: targetChapter,

			number: targetChapterKey+1,

			next: getNextChapter(targetChapterKey+1),

			previous: getPreviousChapter(targetChapterKey+1),

			tags: getTagsGivenChapter(targetChapter)


			}



		}

		updatePlayer(data2);
		
		waitForFinalEvent(function(){
			
			
			//$('#video-start-pause').trigger('click');
			player.play();


		  }, 1000, "play selected part of video");

		}
	

}

function getNextChapter(currentChapterPassed){

	//if playselectedchapters, use requiredChapters array


	if (playSelectedChapters == 1) {


		//try to get next chapter

		var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

		if (positionOfChapter > 0){

			try {
				
				nextChapter = requiredChapters[positionOfChapter + 1];

				
			} catch (error) {

				nextChapter = null;

				
			}
		}else{

			nextChapter = null;
		}

	}else{

		try {
			
			nextChapter = videoChapterData[currentChapterPassed].chapterid;

		} catch (error) {
			
			nextChapter = null;

		}

	}

	return nextChapter;


		

}

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

function getPreviousChapter(currentChapterPassed){

	//if playselectedchapters, use requiredChapters array


	if (playSelectedChapters == 1) {


		//try to get next chapter

		var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

		if (positionOfChapter > 0){

			try {
				
				previousChapter = requiredChapters[positionOfChapter - 1];

				
			} catch (error) {

				previousChapter = null;

				
			}
		}else{

			previousChapter = null;
		}

	}else{

		try {
				
			previousChapter = videoChapterData[currentChapterPassed - 2].chapterid;

		} catch (error) {
			
			previousChapter = null;
		}

	}

	return previousChapter;


		

}

function updateChapterMarkers(currentChapterPassed){

	//when chapter changes or when a tag clicked




	//check if connectedplayback
	//if so make sure to check the other array
	//otherwise set the previousChapter and nextChapter flags

	//if (i > 0) {

		//if the chapter is a skip, skip to next chapter

		//var positionOfChapter = requiredChapters.indexOf(val.chapterid);





		if (playSelectedChapters == 1) {

			//console.log('in the loop');

			var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

			if (positionOfChapter < 0 && startedConnectedPlayback == null) {

				//this chapter is not in the array

				//skip the video to the first chapter of the array

				var targetChapter = requiredChapters[0];

				//console.log('target chapter for previousChapter '+ targetChapter);

				var targetChapterKey = getKeyForChapterid(targetChapter);

				//console.log('target chapter key for previousChapter ' + targetChapterKey);

				var targetTime = videoChapterData[targetChapterKey].timeFrom;

				//console.log('target start time for  previousChapter ' + targetTime);


				startedConnectedPlayback = 1;

				player.setCurrentTime(targetTime);


			}

			if (positionOfChapter >= 0 && startedConnectedPlayback == 1) {

				if (positionOfChapter == 0) {

					previousChapter = null;

				} else {

					//console.log('positionOfChapter chapter for previousChapter ' + positionOfChapter);

					var requiredChapter = requiredChapters[positionOfChapter - 1];

					//console.log('target chapter for previousChapter ' + requiredChapter);

					var targetChapterKey = getKeyForChapterid(requiredChapter);

					//console.log('target chapter key for previousChapter ' + targetChapterKey);

					////console.log('required previous chapter is ' + requiredChapter);

					previousChapter = videoChapterData[targetChapterKey].chapterid;

					//console.log('previous chapter is ' + previousChapter);
				}

			}




		} else {

			try {
				
				previousChapter = videoChapterData[currentChapterPassed - 2].chapterid;

			} catch (error) {
				
				previousChapter = null;
			}


		}

	//} else {

	//	previousChapter = null;
	//xw}

	//if playSelectedChapters == 1 then should select the previous member of the array


	//if playSelectedChapters == null

		if (playSelectedChapters == 1) {

			var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

			if (positionOfChapter < 0 && startedConnectedPlayback == null) {

				//this chapter is not in the array

				//skip the video to the first chapter of the array

				var targetChapter = requiredChapters[0];

				////console.log(targetChapter);

				var targetChapterKey = getKeyForChapterid(targetChapter);

				var targetTime = videoChapterData[targetChapterKey].timeFrom;

				startedConnectedPlayback = 1;

				player.setCurrentTime(targetTime);


			}

			if (positionOfChapter < 0 && startedConnectedPlayback == 1) {

				//this chapter is not in the array

				//skip the video to the first chapter of the array

				if (nextChapter) {

					var targetChapter = nextChapter;

					////console.log(targetChapter);

					var targetChapterKey = getKeyForChapterid(targetChapter);

					var targetTime = videoChapterData[targetChapterKey].timeFrom;

					player.setCurrentTime(targetTime);

				} else {

					player.pause();
				}


			}

			if (positionOfChapter >= 0 && startedConnectedPlayback == 1) {

				//this chapter is in the array and the flag was started for connected playback

				var requiredChapter = requiredChapters[positionOfChapter + 1];

				if (requiredChapter) {

					var targetChapterKey = getKeyForChapterid(requiredChapter);

					////console.log('required next chapter is ' + requiredChapter);

					nextChapter = videoChapterData[targetChapterKey].chapterid;

				} else {

					//there is no next chapter in the array
					nextChapter = null;

					//set a flag that this is the end of the connected playback
				}



			}

		} else {


			try {
				
				nextChapter = videoChapterData[currentChapterPassed].chapterid;

			} catch (error) {
				
				nextChapter = null;
			}

		}

}

function updateChapterView (currentChapter){

	var dataToSend = {

		chapter_id: currentChapter,



	}

	//const jsonString2 = JSON.stringify(dataToSend);

	const jsonString = JSON.stringify(dataToSend);
	//console.log(jsonString);
	//console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

	var request2 = $.ajax({
		beforeSend: function() {


		},
		url: siteRoot + "scripts/user_metrics/updateChapterViews.php",
		type: "POST",
		contentType: "application/json",
		data: jsonString,
	});



	request2.done(function(data) {
		// alert( "success" );
		if (data) {
			//show green tick
			console.log(data);

			


			//$('#notification-services').delay('1000').addClass('is-valid');




		}
		//$(document).find('.Thursday').hide();
		//$(icon).prop("disabled", false);
	})

	return request2;


}

function updatePlayer(data, debug=true){

	if (debug){

		console.log('data array given to update player was ');
		console.dir(data);
	}

	//define the chapter number and key for videoChapterData
	var number = data.data.number;
	var key = number - 1;
	var chapterid = data.data.id;
	currentChapter = chapterid;

	//if the chapter changes write the new viewed chapter to the database
	//TODO modify so that some of the chapter must be viewed

	if (currentChapter_lastViewed != currentChapter){

		//update currentChapter_lastViewed

		currentChapter_lastViewed = currentChapter;

		//trigger the call to update the database BACK HERE

		updateChapterView(currentChapter);



	}

	//write the headings to the page 
	var chaptername = videoChapterData[key].chaptername;
	var description = videoChapterData[key].description;
	description.replace(/\n/g, '<br>');

	if (debug){

		console.log('chaptername was ');
		console.log(chaptername);
	}

	

	$('#chapterHeading').html(chaptername);
	$('#chapterDescription').html(description);
	$('#currentChapter').html(number);
	$('#totalChapters').html(numberofChapters);

	$('#chapterHeadingControl').html('Chapter '+number);

	//set timeline colouring

	$(document).find('.cd-date').each(function(){

		if ($(this).attr('data-id') == chapterid){

			$(this).addClass('cd-date-active');

		}else{

			$(this).removeClass('cd-date-active');

		}


	})

	$(document).find('.cd-timeline-content').each(function(){

		if ($(this).attr('data-chapter-id') == chapterid){

			$(this).addClass('timeline-active');

		}else{

			$(this).removeClass('timeline-active');

		}


	})

	//set globals

	if (requiredChapters == null){

		if (debug){

			console.log('no tag filter detected');
			//console.log(chaptername);
		}

		nextChapter = data.data.next;

		previousChapter = data.data.previous;

	}else{

		if (debug){

			console.log('tag filter detected and required chapters were');
			console.log(requiredChapters);
		}

		if (($('.alert').hasClass('d-none'))){
		showAlert('Skipping between tagged chapters (active filter).  <a href=\"javascript:undoFilterByTag();\">Click here to cancel</a>');
		//find the position of this chapter
		}

		var positionInRequiredChapters = requiredChapters.indexOf(chapterid);

		if (positionInRequiredChapters > -1){ //in the required array


			if (debug){

			console.log('this chapter ('+ chapterid +') is in required chapter array at position '+positionInRequiredChapters);

			}

			//if there is a next define it

		try {

			var nextRequiredChapter = positionInRequiredChapters + 1;
			
			var checkNextChapter = requiredChapters[nextRequiredChapter];

			nextChapter = checkNextChapter;
			if (debug){


			console.log('next chapter set successfully');

			}

		} catch (error) {

			nextChapter = null;

			if (debug){
			console.log('next chapter could not be set successfully');

			}

			
		}

		//if there is a previous define it

		try {
			
			var previousRequiredChapter = positionInRequiredChapters - 1;


			var checkPreviousChapter = requiredChapters[previousRequiredChapter];

			previousChapter = checkPreviousChapter;

			console.log('previous chapter set');

		} catch (error) {

			previousChapter = null;
			
		}



		}else{

			console.log('this chapter ('+ chapterid +') is NOT in required chapter array');

			//skip to the next chapter in requiredChapters

			//find the position of this chapter in the whole videoChapterData (key)

			//get the nearest chapter which is in requiredChapters

			var keys = [];
			var x = 0;


			$(requiredChapters).each(function(k,v){

				keys[x] = getKeyForChapterid(v);
				x++;


			})

			console.log(keys);
			console.log('key is ' + key);

			var closest = null;

			var y=0;

			$(keys).each(function(k,v){

				if (y==0){
				if (v > key){

					closest = v;
					y++;

				}
			}

			})

			/* var closest = keys.reduce((a, b) => {
				let aDiff = Math.abs(a - key);
				let bDiff = Math.abs(b - key);
			
				if (aDiff == bDiff) {
					// Choose largest vs smallest (> vs <)
					return a > b ? a : b;
				} else {
					return bDiff < aDiff ? b : a;
				}
			}); */

			console.log(closest);

			/* var closest = keys.reduce(function(prev, curr) {
				return (Math.abs(curr - key) < Math.abs(prev - key) ? curr : prev);
			  }); */

			//closest is the key in videoChapterData to which we need to skip

			console.log('skipping to next chapter ('+ videoChapterData[closest].chapterid +') from videoChapterData array')

			player.setCurrentTime(videoChapterData[closest].timeFrom);





		}



		
		//skip to the next requiredChapters chapter

		
		
	}


	//chapter selector

	$('body').find(".chapterSelector option[value='" + chapterid + "']").prop('selected', true);

	chapterSelected = data.data.id;


	//handle tag changes
	var tags = data.data.tags;

		//handle skip logic
		if (tags.indexOf('254') > -1){

			try {

				var targetTimeSkip = videoChapterData[key+1].timeFrom;

				player.setCurrentTime(targetTimeSkip);
				
			} catch (error) {

				player.pause();
				
			}

			

		}

		//otherwise write tags 

			//clear tagsMirror area

			$('.tagsActive').html('');

			//first write the required tags (max 10) to the tagsMirror area

			var x = 0;

			$(tags).each(function(k,v){

				if (x < 10){
				$('.tagsActive').append('<span class="badge mx-2 mb-1 highlightedTag tagButton tagMirror" data-tag-id="' + v + '">' + getTagName(v) + '</span>');
				x++;
				}

			})
		
		
		//find all the tags on the page

		

			//var tagid = v;

			$(document).find('.tagTagsboxButton').each(function(){

				if (tags.indexOf($(this).attr('data-tag-id')) > -1){
	
					//$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');
					$(this).addClass('highlightedTag').removeClass('selectedTag').removeClass('unhighlightedTag');
	
				}else{
	
					$(this).addClass('unhighlightedTag').removeClass('selectedTag').removeClass('highlightedTag');
	
				}	
				
			})

			$(document).find('.tagTimeline').each(function(){

				if (tags.indexOf($(this).attr('data-tag-id')) > -1){
	
					//$(this).css({background: "#eec278", color: "#162e4d" });
					$(this).addClass('highlightedTag').removeClass('selectedTag').removeClass('unhighlightedTag');
	
				}else{
	
					$(this).addClass('unhighlightedTag').removeClass('selectedTag').removeClass('highlightedTag');
	
				}	
				
			})

			//function to extra highlight the selected tag

			if (selectedTag != null){

				$(document).find('.tagTagsboxButton').each(function(){

					if ($(this).attr('data-tag-id') == selectedTag){
		
						//$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');
						$(this).addClass('selectedTag').removeClass('unhighlightedTag').removeClass('highlightedTag');
		
					}	
					
				})

				$(document).find('.tagTimeline').each(function(){

					if ($(this).attr('data-tag-id') == selectedTag){
		
						//$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');
						$(this).addClass('selectedTag').removeClass('unhighlightedTag').removeClass('highlightedTag');
		
					}	
					
				})

				$(document).find('.tagMirror').each(function(){

					if ($(this).attr('data-tag-id') == selectedTag){
		
						//$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');
						$(this).addClass('selectedTag').removeClass('unhighlightedTag').removeClass('highlightedTag');
		
					}	
					
				})

			}


		//})




	//set text

	//var description = val.description;

			//var stripped = description.replace(/\n/g, '<br>');

			//////console.log(stripped);



			/* $('#chapterHeadingControl').html('Chapter '+val.number);
			
			$('#chapterDescription').html(stripped);

			$('#currentChapter').html(val.number);
			
			$('#totalChapters').html(numberofChapters); */

	//
	
	//change the chapter playing


}

function skipToChapter (chapternumber){


	//var targetChapterKey = getKeyForChapterid(option);

	var nextChapterStartTime = videoChapterData[chapternumber - 1].timeFrom;

	player.setCurrentTime(nextChapterStartTime);

	player.play();



}

function showAlert(text){


	//show below the video bar unless the tag bar is fully on screen
	if (!($('#tagBar').hasClass('d-none'))){

		if ($('#tagBar').isInViewport()){

			var $el = $(document).find('#tagBar');

		}else{
			var $el = $(document).find('#videoBar');


		}

	}else{
		var $el = $(document).find('#videoBar');

	}
	var bottom = $el.offset().top + $el.outerHeight(true);

	$el2 = $('#mainContainer');

	var right = $(document).width() - ($el2.offset().left + $el2.width());
	//var right = $el2.offset().left + $el2.width(); 

	bottom = bottom;
	$('.alert').html(text);
	$('.alert').css({right:right+'px', top: bottom+'px'});
	$('.alert').removeClass('d-none');
	$('.alert').fadeIn('slow');
	waitForFinalEvent(function(){
			
			
		$('.alert').fadeOut('slow');
		$('.alert').addClass('d-none');


	  }, 4000, "alert");

}

function addCuePoints(){


	$(videoChapterData).each(function(k,v){


		player.addCuePoint(
			v.timeFrom, 
			
			{id: v.chapterid,

			number: k+1,

			next: getNextChapter(k+1),

			previous: getPreviousChapter(k+1),

			tags: getTagsGivenChapter(v.chapterid)
			}
			
		);

	})

	player.on('cuepoint', function(data) {
		
		console.dir(data)

		updatePlayer(data);

		



	});

	player.on('seeked', function(data) {

		//

		var currentTime = data.seconds;


		//construct the same data array as for a chapter cue point first


		//which chapter are we in

		var chapterid = getChapterFromTime(currentTime);

		var key = getKeyForChapterid(chapterid);


		//define the data array

		var data2 = {

			data : {

			id: chapterid,

			number: key+1,

			next: getNextChapter(key+1),

			previous: getPreviousChapter(key+1),

			tags: getTagsGivenChapter(chapterid)


			}



		}

		updatePlayer(data2);

		




	})

	player.on('play', function(data) {

		//$('#video-start-pause').trigger('click');

		if ($('#video-start-pause').hasClass('fa-play') === true) {


            if (stopclicked == 1){

                stopclicked = null;

            }else{

                $('#video-start-pause').removeClass('fa-play').addClass('fa-pause');
            
            }

		}



	});

	player.on('timeupdate', function(data) {

		var key = getKeyForChapterid(currentChapter);

		var chapterTime = videoChapterData[key].timeTo - videoChapterData[key].timeFrom;

		var currentTime = data.seconds;

		var chapterPercent = ((currentTime - videoChapterData[key].timeFrom) / chapterTime) * 100;

		$('#myBar').css('width', chapterPercent + '%');

		//$('#myBar').text(Math.round(chapterPercent) * 1 + '%');

		chapterLength = chapterTime;

		chapterPosition = currentTime - videoChapterData[key].timeFrom;

		chapterStartTime = videoChapterData[key].timeFrom;

		$('#currentChapterTime').text(Math.round(chapterPercent) * 1 + '%');

	});

}

$(document).ready(function () {

	//getVideoTags(videoPassed);

	
	

    //writes the chapter heading, description and author information
    $(videoData).each(function (i, val) {

		//console.dir(val);

		//$('#videoTitle').html('<p class="veryNarrow" style="font-size:20px;"><b>'+val.name+'</b></p>');

		console.log(val.description);
		$('#videoDescription').append(val.description);

		//$('#videoDescription').html(val.description);

		if (val.centreName == null){
			val.centreName = '';
		}

		//cast centreName to int, if int then don't display TODO

		if (val.centreCountry == null){
			val.centreCountry = '';
		}

		$('#videoAuthor').html('<a class="text-muted" target="_blank" href="'+siteRoot+'pages/account/public-profile.php?id=' + val.authorid + '">' + val.author + ', ' + val.centreName + ', ' + val.centreCountry + '</a>');

	})

    $("body").on('click', '.remove', function () {


		undoFilterByTag();


	})
	
	

	
    
    $("body").on('click', '.tagButton', (function (event) {

		

		if ($(this).hasClass('selectedTag') === true) {

			undoFilterByTag();
			return;


		}
			undoFilterByTag();

			requiredChapters = null;

			selectedTag = null;

			player.pause();

			//set the play only these chapters tag
			playSelectedChapters = 1;


			//add an identifier that this is the tag we are going to show

		

			var str = $(this).attr('data-tag-id');
			//var str = $('.selectiveTag').prop('id');
			//str = str.substring('tag'.length);
			selectedTag = str;
			//console.log(selectedTag);

			window.localStorage.setItem('restricted', true);
			createCookie('restricted', true, '2');

				//$('.expandSearch').text('Expand Search');

				//WRITE THE SELECTED TAG TO LOCAL STORAGE

			showTagBar(selectedTag);

			checkExpandedStatusTagBar();


			//make the selected button green and all others blue

			/* if ($(this).hasClass('tagButton') == true) {

				$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');

			}

			$(this).siblings().each(function () {

				//console.log($(this));

				$(this).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');


			}) */

			//go through the videoChapterTagData object to identify which of these has the required tag, returning an array of chapter ids

			requiredChapters = getChaptersForGivenTag(selectedTag);

			var count = requiredChapters.length;

			var selectedTagName = getTagName(selectedTag);
			
			selectedTagName = selectedTagName[0];

			selectedTagName = selectedTagName.toLowerCase();

			showAlert('Showing ' + count + ' chapter(s) filtered by tag ('+selectedTagName+')<br/><a href=\"javascript:undoFilterByTag();\">Click here to cancel</a>');

			//console.log(requiredChapters);

			//highlight these in red in the chapter selector

			$('.chapterSelector').find('option').each(function () {

				//first remove any previous addition

				if (($(this).text()).indexOf(' -- filtered by highlighted tag') >= 0) {

					//remove it 31

					var textToReplace = $(this).text();

					textToReplace = textToReplace.slice(0, -31);

					$(this).text(textToReplace);


				}

				//console.log($(this));

				if (requiredChapters.includes($(this).val()) === true) {

					$(this).append(' -- filtered by highlighted tag');

					$(this).attr('data', 'view');

				}


			})

			//some alert to the user that this has happened

			//$('.tagFilterDisplayArea').css('background-color', '#4CAF50');
			$('.tagFilterDisplayArea').addClass('bg-gieqsGold').addClass('text-dark').addClass('text-sm');

			if ($('body').find('.tagFilterDisplayArea').find('#taggedChapterDisplay').length == 0) {

				var tagName = getTagName(selectedTag);

				tagName = tagName.toString().toLowerCase();

				$('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="fas fa-times remove cursor-pointer"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');

			} else {

				var tagName = getTagName(selectedTag);

				tagName = tagName.toString().toLowerCase();

				$('body').find('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="cursor-pointer fas fa-times remove"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');
			}

			//skip the video to the start of the first chapter in the array

			//reboot player

			//var currentTime = player.getCurrentTime();


		//construct the same data array as for a chapter cue point first


		//which chapter are we in

		

		//updatePlayer(data2);

			var targetChapter = requiredChapters[0];

			//console.log(targetChapter);

			var targetChapterKey = getKeyForChapterid(targetChapter);

			var targetTime = videoChapterData[targetChapterKey].timeFrom;

			startedConnectedPlayback = 1;

			player.setCurrentTime(targetTime);
			
			var data2 = {

				data : {
	
				id: targetChapter,
	
				number: targetChapterKey+1,
	
				next: getNextChapter(targetChapterKey+1),
	
				previous: getPreviousChapter(targetChapterKey+1),
	
				tags: getTagsGivenChapter(targetChapter)
	
	
				}
	
	
	
			}
	
			updatePlayer(data2);
            
            player.play();


		






    }));
    
    /* $('#triggerStop').change(function () {

		if ($(this).is(':checked')) {

			triggerStop = 1;

			chapterSelected = $('.chapterSelector').val();

		} else {
			triggerStop = 0;
		}

    }); */
    
    $('body').on("click", ".title-fold", (function (event) {

		if ($(this).hasClass('clicked') === false) {

			$(this).addClass('clicked');

			$(this).parent().parent().find('p').each(function () {

				$(this).hide();

			})

			$(this).removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');

		} else {

			$(this).parent().parent().find('p').each(function () {

				$(this).show();

			})

			$(this).removeClass('clicked');

			$(this).removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');

		}


    }))
    
    $('#myProgress').on('click', function (e) {

		var posX = $(this).offset().left;
		var posWithinBar = e.pageX - posX;

		var lengthOfBar = $(this).width();
		var percentageBar = (posWithinBar / lengthOfBar) * 100;
		//alert(percentageBar);

		//seek video to that position

		/*if (videoLength){

			var percentage = videoLength / 100;

			var percentageVideoTarget = percentage * percentageBar;

			jumpToTime(percentageVideoTarget);


		}*/

		//seek to chapter position

		//globals chapterposition (=current time - starttime)
		//globals chapterlength



		if (videoLength && chapterLength && chapterStartTime) {

			//console.log('percentage bar clicked  ' + percentageBar);

			//console.log('video length is ' + videoLength + ' and chapterLength is '+ chapterLength  + ' and chapter start time is '+ chapterStartTime);


			var percentage = chapterLength / 100;

			var percentageVideoTarget = ((percentage * percentageBar) + parseFloat(chapterStartTime));

			//console.log('percentage is ' + percentage + ' and percentageVideoTarget is '+ percentageVideoTarget);

			player.setCurrentTime(percentageVideoTarget);




		}




	});

    $("#videoChapter").on("pause", function () {

        //console.log('detected pause');

        $('#video-start-pause').removeClass('fa-pause').addClass('fa-play');
        
        

	})

	

	
    
    $('#video-back').on('click', function (event) {

		event.preventDefault();

		//get current chapter

		//get start of that chapter

		//jump to that time

		if (previousChapter != null) {

			var previousChapterKey = getKeyForChapterid(previousChapter);

			var previousChapterStartTime = videoChapterData[previousChapterKey].timeFrom;

			//console.log(previousChapterKey);

			var wasChecked = null;

			if ($('#triggerStop').prop('checked') === true) {

				wasChecked = 1;

				$('#triggerStop').prop('checked', false);

				triggerStop = 0;

			}



			player.setCurrentTime(previousChapterStartTime);

			if (wasChecked == 1) {
				$('#triggerStop').prop('checked', true);

				triggerStop = 1;

				chapterSelected = previousChapter;
			}



		}else{

			//alert('no previous chapter');

			if (requiredChapters == null){
				
				player.setCurrentTime(0);

				showAlert('Video Restarted');


			}else{

				var firstChapterRequired = requiredChapters[0];

				var keyForFirstChapterRequired = getKeyForChapterid(firstChapterRequired);


				var timeFirstChapterRequired = videoChapterData[keyForFirstChapterRequired].timeFrom;


				player.setCurrentTime(timeFirstChapterRequired);

				showAlert('First chapter in filtered set. <a href=\"javascript:undoFilterByTag();\">Click here to remove filter</a>');


			}

			//$('.alert').show();
			//waitForFinalEvent

		}

		//if (inChapter == 1){

		//jumpToTime(chapterStartTime);

		//}

		player.play();


	})

	$('#video-start-pause').on('click', function (event) {

		//first time  

		/* if (plays == 0) {
			$('#videoChapter').vimeoLoad();
			plays++;
		} */

		event.preventDefault();

		

		if ($(this).hasClass('fa-pause') === true) {

			//$("#videoChapter").vimeo("pause");
			

			$(this).removeClass('fa-pause').addClass('fa-play');

			player.pause();
			
			return;

		} 

		if ($(this).hasClass('fa-play') === true) {

			//$("#videoChapter").vimeo("play");
			

			$(this).removeClass('fa-play').addClass('fa-pause');

			player.play();

			return;

		}  

		//$('#triggerStop').prop('checked', false);

		//triggerStop = 0;

		plays++;


	})

	$('#video-forward').on('click', function (event) {

		event.preventDefault();

		//get next chapter time

		if (nextChapter != null) {

			var nextChapterKey = getKeyForChapterid(nextChapter);

			var nextChapterStartTime = videoChapterData[nextChapterKey].timeFrom;

			//console.log(nextChapterStartTime);

			var wasChecked = null;

			if ($('#triggerStop').prop('checked') === true) {

				wasChecked = 1;

				$('#triggerStop').prop('checked', false);

				triggerStop = 0;

			}





			player.setCurrentTime(nextChapterStartTime);

			if (wasChecked == 1) {
				$('#triggerStop').prop('checked', true);

				triggerStop = 1;

				chapterSelected = nextChapter;
			}

		}else{

			if (requiredChapters){

				showAlert('Last Chapter containing filtered tag.  <a href=\"javascript:undoFilterByTag();\">Click here to remove filter</a>');

			}else{

				showAlert('Last Chapter in Video');


			}

		}

		//var nextChapterStartTime = Math.round(chapterStartTime) + Math.round(chapterLength);

		//if (inChapter == 1){

			player.play();


		//}


	})

	$('#video-stop').on('click', function (event) {

		event.preventDefault();

		//get next chapter time

        if (startedConnectedPlayback != null || playSelectedChapters != null){

            undoFilterByTag();

        }

        stopclicked = 1;

        var targetTime = videoChapterData[0].timeFrom;
		
        
        player.setCurrentTime(targetTime);

        player.pause();

        
		


    })
    
    $('body').find('.equalHeight').each(function () {

		var height = $(this).siblings().first().height();
		//console.log(height);
		$(this).css('line-height', height + 'px');


    })

    $('body').on("change", ".chapterSelector", (function (event) {

		var option = $(this).val();

		undoFilterByTag();

		if (option != '(not in a chapter)') {

			chapterSelected = $(this).val();

			var targetChapterKey = getKeyForChapterid(option);

			var nextChapterStartTime = videoChapterData[targetChapterKey].timeFrom;

			player.setCurrentTime(nextChapterStartTime);

			player.play();

		}


	}));

	$('body').on("click", ".chapterSkip", (function (event) {

		//event.preventDefault();

		////console.log('changed');

		var option = $(this).attr('data-id');

		undoFilterByTag();

		//if (option != '(not in a chapter)') {

			console.log('changed chapter selected value to ' + $(this).attr('data-id'));
			
			chapterSelected = $(this).attr('data-id');

			var targetChapterKey = getKeyForChapterid(option);

			var nextChapterStartTime = videoChapterData[targetChapterKey].timeFrom;

			player.setCurrentTime(nextChapterStartTime);

			player.play();

		//}

		

		/*
		//get the video start time for this option

		var imagesObject = JSONStraightDataQuery(option, 'getTime', 9);

		imagesObject.done(function (data) {

			////console.log(data);

			if (data) {

				if (data) {

					jumpToTime(data);

				} else {

					alert("Error, try again");

					//enableFormInputs("images");

				}



			}


		});



		//////console.log(tagRow);

		*/


	}));
    
    


})