    
</div>
<script src="dist/jquery.vimeo.api.min.js"></script>
<script src="includes/jquery-ui.js"></script>

<script>
	
   
</script>


<body>   
<div class="content">
	
			<?php    
			;

			/*config variables */
			
			
			$lastPage = 1;
			$userid = $_SESSION['user_id'];
			ini_set('display_errors', -1);
			
			
	
	
	
	
			/*includes for all shows*/
	
			set_include_path("http://www.acestudy.net/esd/");
			
			require_once 'classes/formGenerator.class.php';
			require_once 'classes/slide.class.php';

	
			/*specific class for CSP show */
			require_once 'classes/QuestionsCSP.class.php';
			
				
				
			
			echo "<div id='userID' style='display: none;'>$userid'</div>";
			
			
			$userQuestions = new Questions;
			if (($userQuestions->Load_from_key($userQuestions->defineUser())) === TRUE){
				
				//echo 'User has previously answered questions, get results from class';
				echo '<div id="javaQuestions" style="display:none;">';
				echo $userQuestions->JS_var();
				echo '</div>';
				
			}else {
				
				echo '<div id="javaQuestions" style="display:none;">';
				echo "{\"userid\":$userid, \"question1apre\":null, \"question1bpre\":null, \"question2pre\":null, \"question3apre\":null, \"question3bpre\":null, \"question1apost\":null, \"question1bpost\":null, \"question2post\":null, \"question3apost\":null, \"question3bpost\":null, \"overallPre\":null, \"overallPost\":null}";
				echo '</div>';
				
			}
			
		
	
			echo "<div id='pageShowing' style='display: none;'></div>";
	
			echo "<div id='lastPage' style='display: none;'>$lastPage</div>";
			echo "<div class='darkClass' style='display: none;'></div>";
			echo "<div id='question1preAnswered'>";
	
	
			function generateAudio ($source, $page) {
				echo "<audio class='audio' id='audio$page'><source src='$source'></audio>";
			}
			echo "</div>";
	
	
	
	
	
	/*
	
	Syntax for a new slide
	
	$slidex->defineSlide('x', audiofilename, vimeoURL, 'filename of slide image', 'question number', 'pre or post', variable name of the array with questions of this slide e.g. $questionsSlidex);
	
	where x = number of new slide
	
	the logic presumes a post test slide with question is followed by an explainer slide
	
	*/
	
	//first slide must have intro as the first and be a title slide
	
	$slideIntro = new Slide();
	$slideIntro->defineSlide('intro', NULL, NULL, 'IPB/IPB.jpg', NULL, NULL, NULL, NULL);
	$slideIntro->generateSlide();

	
	$slide1 = new Slide();
	$slide1->defineSlide('1', NULL, 'https://player.vimeo.com/video/258935046', NULL, NULL, NULL, NULL);
	$slide1->generateSlide();
	
	/*
	
	$slide2 = new Slide();
	//questions should be in this format 
	$questionsSlide2 =  array(
				"1a" => array(
					 "text" => "Is this polyp amenable to cold snare polypectomy?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "1"
				),
    			"1b" => array(
					 "text" => "What snare would you select preferentially for cold snare polypectomy of this lesion?",
					 "options" => array(
						"1" => "Thick wire snare",
						"2" => "Thin wire snare",
						"3" => "Snare thickness does not make a difference"
					),
					"correct" => "2"
				)
			);
	$slide2->defineSlide('2', NULL, NULL, 'Slide02.jpg', '1', 'pre', $questionsSlide2);
	$slide2->generateSlide();
	
	$slide3 = new Slide();
	//useful to specify database name here for qs
	$questionsSlide3 =  array(
				"2" => array(
					 "text" => "Based on the image do you believe the lesion has been completely excised?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "1"
				)
			);
	$slide3->defineSlide('3', NULL, NULL, 'Slide03.jpg', '2', 'pre', $questionsSlide3);
	$slide3->generateSlide();
	
	$slide4 = new Slide();
	//useful to specify database name here for qs
	$questionsSlide4 =  array(
				"3a" => array(
					 "text" => "Is the protuberance shown in the image of clinical significance?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "0"
				),
    			"3b" => array(
					 "text" => "Should one resect this protuberance with a hot snare?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "0"
				)
			);
	$slide4->defineSlide('4', NULL, NULL, 'Slide04.jpg', '3', 'pre', $questionsSlide4);
	$slide4->generateSlide();
	
	
	$slide5 = new Slide();
	$slide5->defineSlide('5', 'slide5.mp3', NULL, 'Slide05.jpg', NULL, NULL, NULL);
	$slide5->generateSlide();
	

	
	echo "<div id='6' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide06.jpg' class='slide'>";


	generateAudio ('includes/slide6.mp3', '6');

	echo "</div>";
	
	echo "<div id='7' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide07.jpg' class='slide'>";


	generateAudio ('includes/slide7.mp3', '7');

	echo "</div>";
	
	echo "<div id='8' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide08.jpg' class='slide'>";


	generateAudio ('includes/slide8.mp3', '8');

	echo "</div>";
	
	echo "<div id='9' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide09.jpg' class='slide'>";


	generateAudio ('includes/slide9.mp3', '9');

	echo "</div>";
	
	echo "<div id='10' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide10.jpg' class='slide'>";


	generateAudio ('includes/slide10.mp3', '10');

	echo "</div>";
	
	echo "<div id='11' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide11.jpg' class='slide'>";


	generateAudio ('includes/slide11.mp3', '11');

	echo "</div>";
	
	echo "<div id='12' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide12.jpg' class='slide'>";


	generateAudio ('includes/slide12.mp3', '12');

	echo "</div>";
	
	echo "<div id='13' style='display: none; text-align: center;'>";
	echo "<div class='videoWrapper' style='text-align: centre'><iframe id='video13' src='https://player.vimeo.com/video/231185913' width='700' height='504' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";



	echo "</div>";
	
	echo "<div id='14' style='display: none; text-align: center;'>";
	echo "<div class='videoWrapper' style='text-align: centre'><iframe id='video14' src='https://player.vimeo.com/video/231193422' width='700' height='504' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";


	echo "</div>";
	
	echo "<div id='15' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide15.jpg' class='slide'>";


	echo "</div>";
	
	echo "<div id='16' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide16.jpg' class='slide'>";


		generateAudio ('includes/slide16.mp3', '16');
	echo "</div>";
	
	echo "<div id='17' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide17.jpg' class='slide'>";


	generateAudio ('includes/slide17.mp3', '17');

	echo "</div>";
	
	echo "<div id='18' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide18.jpg' class='slide'>";


	generateAudio ('includes/slide18.mp3', '18');

	echo "</div>";
	
	echo "<div id='19' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide19.jpg' class='slide'>";


		generateAudio ('includes/slide19.mp3', '19');


	echo "</div>";
	
	echo "<div id='20' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide20.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='21' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide21.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='22' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide22.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='23' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide23.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='24' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide24.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='25' style='display: none; position:relative; text-align: center;'>";
	echo "<img src='includes/Slide25.jpg' class='slide'>";


	echo "<div style='position:absolute;right:0px;bottom:100px;width: 50%;overflow: none;z-index:1;'>";
	echo "<div class='videoWrapper' style='text-align: centre'><iframe id='video25' src='https://player.vimeo.com/video/231194101' width='350' height='252' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";
	echo "</div>";
	echo "</div>";
	
	echo "<div id='26' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide26.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='27' style='display: none; position:relative; text-align: center;z-index:2;'>";
	echo "<img src='includes/Slide27.jpg' class='slide'>";


	echo "<div style='position:relative;right:0px;bottom:0px;width: 50%;overflow: none;z-index:1;'>";
	echo "<div class='videoWrapper' style='text-align: centre'><iframe id='video27' src='https://player.vimeo.com/video/231192524' width='350' height='252' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";
	echo "</div></div>";
	
	echo "<div id='28' style='display: none; none; position:relative; text-align: center;'>";
	echo "<img src='includes/Slide28.jpg' class='slide'>";


	echo "<div style='position:relative;right:0px;bottom:0px;width: 50%;overflow: none;z-index:1;'>";
	echo "</div></div>";
	
	echo "<div id='29' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide29.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='30' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide30.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='31' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide31.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='32' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide32.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='33' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide33.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='34' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide34.jpg' class='slide'>";
	echo "</div>";
	
	echo "<div id='35' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide35.jpg' class='slide'>";
	echo "</div>";
	
	
	$slide36 = new Slide();
	//useful to specify database name here for qs
	$questionsSlide36 =  array(
				"1a" => array(
					 "text" => "Is this polyp amenable to cold snare polypectomy?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "1"
				),
    			"1b" => array(
					 "text" => "What snare would you select preferentially for cold snare polypectomy of this lesion?",
					 "options" => array(
						"1" => "Thick wire snare",
						"2" => "Thin wire snare",
						"3" => "Snare thickness does not make a difference"
					),
					"correct" => "2"
				)
			);
	$slide36->defineSlide('36', NULL, NULL, 'Slide36.jpg', '1', 'post', $questionsSlide36);
	$slide36->generateSlide();
	
	
	
	echo "<div id='37' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide37.jpg' class='slide'>";
	echo "</div>";
	
	
	$slide38 = new Slide();
	
	$questionsSlide38 =  array(
				"2" => array(
					 "text" => "Based on the image do you believe the lesion has been completely excised?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "1"
				)
			);
	$slide38->defineSlide('38', NULL, NULL, 'Slide38.jpg', '2', 'post', $questionsSlide38);
	$slide38->generateSlide();
	
	
	
	
	
	
	echo "<div id='39' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide39.jpg' class='slide'>";
	echo "</div>";
	
	$slide40 = new Slide();
	//useful to specify database name here for qs
	$questionsSlide40 =  array(
				"3a" => array(
					 "text" => "Is the protuberance shown in the image of clinical significance?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "0"
				),
    			"3b" => array(
					 "text" => "Should one resect this protuberance with a hot snare?",
					 "options" => array(
						"0" => "No",
						"1" => "Yes"
					),
					"correct" => "0"
				)
			);
	$slide40->defineSlide('40', NULL, NULL, 'Slide40.jpg', '4', 'post', $questionsSlide40);
	$slide40->generateSlide();
	
	
	
	echo "<div id='41' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide41.jpg' class='slide'>";



	echo "</div>";
	
	$slide42 = new Slide();
	$slide42->defineSlide('42', NULL, NULL, NULL, NULL, NULL, NULL);
	$slide42->generateSlide();
	
	
	echo "<div id='43' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide42.jpg' class='slide'>";



	echo "</div>";
	
	echo "<div id='44' style='display: none; text-align: center;'>";
	echo "<img src='includes/Slide43.jpg' class='slide'>";


	echo "<button type='button' class='restartShow'>Restart Learning Tool</button>";

	echo "</div>";*/
	
		?>
		
	
    
    </div>
<div class="navbarLower">
    <div id="newNavPageNo" class='button' style="text-align:left;"></div>
	<div id="newNavPageNavigate" class='buttonCentre' style="text-align:center;"></div>
	<div id="newNavPageAudio" class='buttonRight' style="text-align:right;"></div>

</div>
</body>
<script>


//SET UP VARIABLES taken from the page	
	
var audioStatus = 1;	

//to make audio work in IE

/*var audioEl = document.getElementsByClassName("audio");
	
audioEl.onloadedmetadata = function() {
  audioEl.currentTime = someSeekTime;
};*/
	
var userid = $('#userID').text();
		
var questions = $.parseJSON($('#javaQuestions').text());
	
var resultsPage = 42;
	
//correct answers to questions must be defined here with same names as those in the arrays above
var correctAnswers = {
	 question1a : '1',
	 question1b : '2',
	 question2 : '1',
	 question3a : '0',
	 question3b : '0'	
	}		
	
//for IE to work

if (!String.prototype.startsWith) {
	String.prototype.startsWith = function(search, pos) {
		return this.substr(!pos || pos < 0 ? 0 : +pos, search.length) === search;
	};
}
	
//to id IE
	
if (navigator.userAgent.match(/msie/i) || navigator.userAgent.match(/trident/i) ){
    var browser = 0;
}else{
	var browser = 1;
}


	
function missingErrors (inputArray) {
    
  //not currently used
    var x;
    var errors = 0;
    for (x in inputArray) {
        if ($(inputArray[x]).val() == '' || $(inputArray[x]).val() == null) {
                    errors++;
        }}

	return errors;
        
}; 
		
	
function correctAnswersUser (){
	
	// to determine whether the current contents of the questions array as taken from the page contains correct answers, generates an array called CorrectAnswersUser
	
	var CorrectAnswersUser = [];
	
	$.each(questions, function (indexQ, valueQ){
		
		//console.log('indexQ'+indexQ);
		//console.log('valueQ'+valueQ);

		
		$.each(correctAnswers, function (indexA, valueA){
			
			//console.log('indexA'+indexA);
			//console.log('valueA'+valueA);
			
			if (indexQ.startsWith(indexA) === true) {
				
				console.log('matched'+indexQ+'with'+indexA);
				
				if (+valueQ == +valueA){
					
					CorrectAnswersUser[indexQ] = 1;
					
				} else{
					
					CorrectAnswersUser[indexQ] = 0;
				}
				
			}
			
			
		});
		
		
		
	});
	
	$.each(correctAnswers, function (indexA, valueA){
		
		var preKey = indexA+'pre';
		var postKey = indexA+'post';
		var changeKey = indexA+'change';
		
		
		if ((+CorrectAnswersUser[postKey] - +CorrectAnswersUser[preKey]) == 1){
			
			CorrectAnswersUser[changeKey] = 'improved';
			
		}else if ((+CorrectAnswersUser[postKey] - +CorrectAnswersUser[preKey]) == 0){
			
			CorrectAnswersUser[changeKey] = 'no change';
		
		}else if ((+CorrectAnswersUser[postKey] - +CorrectAnswersUser[preKey]) == -1){
			
			CorrectAnswersUser[changeKey] = 'worsened';
			
		}
			
	});
	
	return CorrectAnswersUser;
	
	
}
	

	
function emptyResponses (questions){
	
	//checks the questions array for empty values for keys containing question
	
	var x = 0;
	
	$.each(questions, function (indexQ, valueQ){
		
		if (indexQ.indexOf('question') >= 0){
			
			if ((valueQ === null) || (valueQ == "")){
				//console.log('determined that '+indexQ+'contains the string question and is empty (contains'+valueQ);	
				x++;
			}
		
		
		}	
		
		
	});
	
	//console.log ('x='+x);
	
	if (x===0){ return false;}
	else {return true;}
	
}	
	
	
function correctIncorrect (question){
	
	//checks the current question and returns text if correct or incorrect
	
	if (question == 1){
		return 'Correct';
	}else if (question == 0){
		return 'Incorrect';
		
	}
	
}	
	
function displayQuestions (targetPage) {
	
	//if the results page is being displayed then prints a results table if the user has answered all questions
	// results page defined as a variable at the top of script
	
	if (+targetPage == resultsPage){
		
		
	
		var quizResult = "<h2>Results of Pre and Post Test</h2><br/><br><table id='resultsTable'><tr><th>Question</th><th>Pre-test</th><th>Post-test</th><th>Change</th></tr><tbody><tr></tr></tbody></table>";
			
		$('#'+targetPage).html(quizResult);
		
		if (emptyResponses(questions) === true){
			
			$('#'+targetPage).append('<br><br>Please answer all pre and post questions to view results</br></br>');
			return;
			
		}else if (emptyResponses(questions) === false){
		
		var myAnswers = new Object();
		myAnswers = correctAnswersUser();
		
		
		//var resultsTable = new Object();
		//console.log (userAnswers);
		
		$.each (correctAnswers, function (indexCorrectA, valueCorrectA){	
			
			var i=1;
			for (var item in myAnswers){
				
				i++;
				//console.log(item);
				//console.log(valueA);
				
				//console.log('into 2nd array');
				
				if (item.indexOf(indexCorrectA) >= 0) {

					if (item.indexOf('pre') >= 0){
						
						var pre = correctIncorrect(myAnswers[item]);

					}
					else if (item.indexOf('post') >= 0){
						var post = correctIncorrect(myAnswers[item]);	


					}else if (item.indexOf('change') >= 0){
						var change = myAnswers[item];	
						
					}
				
				if (item.indexOf('change') >= 0) { 
				console.log(pre);
				console.log(post);
				console.log(change);

				$('#resultsTable').find('tbody:last').append('<tr><td>'+indexCorrectA+'</td><td>'+pre+'</td><td>'+post+'</td><td>'+change+'</td></tr>');
				}
				
				}
				
				
				
			}
			
		
		});
			
			
	
		
		var pretestScore = 0;
		var posttestScore = 0;
		var total = 0;
		
		for (var item in myAnswers){
			if ((item.indexOf('post')) >= 0){
				total++;
			}
			
			if (((item.indexOf('post')) >= 0) && (+myAnswers[item] == 1)){
				posttestScore++;
			}
			if (((item.indexOf('pre')) >= 0) && (+myAnswers[item] == 1)){
				pretestScore++;
			}
			
		}
		
		var change = posttestScore - pretestScore;
		$('#resultsTable').find('tbody:last').append('<tr><td></td><td></td><td></td><td></td></tr>');
		$('#resultsTable').find('tbody:last').append('<tr><td></td><td>Pre-test Score</td><td>'+pretestScore+'/'+total+'</td><td></td></tr>');
		$('#resultsTable').find('tbody:last').append('<tr><td></td><td>Post-test Score</td><td>'+posttestScore+'/'+total+'</td><td></td></tr>');
		$('#resultsTable').find('tbody:last').append('<tr><td></td><td>Change in Score</td><td>'+change+'</td><td></td></tr>');
		questions['overallPre'] = pretestScore;
		questions['overallPost'] = posttestScore;
		checkSummarySubmit();
		
	}
	}
	
	
	
	
}
	

function checkSummarySubmit () {

//submits results from a page with a question to the database	
		
		request = $.ajax({
				url: "includes/submitAnswers.php",
				type: "post",
				data: questions  	 		
			});

			request.done(function (response, textStatus, jqXHR){
				console.log(response);
				if (response == 0){
					console.log('data not updated');
				}else if (response == 1){
					console.log('data updated');
					
				}
				
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});

}
	
function defineQuestionNumber (targetPage){
	
	//used to determine which question the page should be displaying
	
	var questionNumber = $('#'+targetPage).find('.questionNumber').text();
	return questionNumber;
	
}
	
function printQuestion (questionNumber) {
	
	//currently not used
	
	var question;
	
	switch (questionNumber){
		case 1: 
			question = "<div class='answered1' style='display:none;'></div><div class='dropdown-content' id='pretest1' style='display: none; text-align: center;'><h3>Pre-test Question 1</h3><br/><div id='errorq1' class='error'></div><br/><p>a) Is this polyp amenable to cold snare polypectomy?<br/><br/><form id='pretestForm1'><select name='question1apre' id='question1a' class='question1select'><option hidden selected><option value='0'>No</option><option value='1'>Yes</option></select> </p><p>b) What snare would you select preferentially for cold snare polypectomy of this lesion?<br/><br/><select name='question1bpre' id='question1b' class='question1select'><option hidden selected><option value='1'>Thick wire snare</option><option value='2'>Thin wire snare</option><option value='3'>Wire thickness should not make a difference</option></select></form> </p><br/><br/><button type='button' class='close'>Close window</button>&nbsp&nbsp&nbsp<button type='button' class='submitQuestion1'>Submit Answers</button></div></div>";
			return question;
			break;
		case 2: 
			question = "q2";
			return question;
			break;				  
		case 3: 
			question = "q3";
			return question;
			break;
			
						  }
}
	
function displayQuestionPopUp (targetPage, question) {
	
	//displays the popup of the question on the page when activated in the next or back scripts
	
	
	$('.content').find('#'+targetPage).find('.dropdown-content').show();
	$('.dropdown-content').position({my: "center", at: "center", of: ".content"});
	$('.content').find('#'+targetPage).find('.dropdown-content').find('.question').each(function(){
		
		questionNumber = $(this).attr('id');
		
		$.each(questions, function (index, value){
			if (questionNumber == index){
				$('#'+questionNumber).val(value);
			}
		
		
		});
	});
	
	$('.darkClass').show();	

}
	
function pageQuestionsEmpty (targetPage, questions){
	
	x=0;
	
	$('.content').find('#'+targetPage).find('.dropdown-content').find('.question').each(function(){
		
		questionNumber = $(this).attr('id');
		
		$.each(questions, function (index, value){
			if ((questionNumber == index) && (value === null || value == '')){
				x++;
			}
		
		
		});
	});
	
	if (x==0) {return false;} else{ return true;}
	
}
	
	
//determine if the page contains postTestQuestions
//if so determine if all questions pre are answered
	
function preTestEmpty (questions){
	
	//checks the questions array for empty values for keys containing question and pre
	
	var x = 0;
	
	$.each(questions, function (indexQ, valueQ){
		
		if ((indexQ.indexOf('question')) >= 0 && (indexQ.indexOf('pre') >= 0)){
			
			if ((valueQ === null) || (valueQ == "")){
				//console.log('determined that '+indexQ+'contains the string question and is empty (contains'+valueQ);	
				x++;
			}
		
		
		}	
		
		
	});
	
	//console.log ('x='+x);
	
	if (x===0){ return false;}
	else {return true;}
	
}
	
function pageContainsPostTest (targetPage){
	
	//test if the passed page contains postTestQuestions
	
	x=0;
	
	$('.content').find('#'+targetPage).find('.dropdown-content').find('.question').each(function(){
		
		questionID = $(this).attr('id');
		
		if (questionID.indexOf('post') >= 0){
			
			x++;
			
		}
		
	});
	
	if (x==0) {return false;} else{ return true;}
	
	
}
	
	
//https://stackoverflow.com/questions/11072759/display-a-loading-bar-before-the-entire-page-is-loaded add this loading solution later	
$(document).ready(function() {
		
	
var menuHeight = $('#menu').height();
	
	//modify some attributes from the standard style on the fly
	
	$('.title').css("height",menuHeight);	

	$('footer').css("min-height","2vh");	
	$('footer').css("max-height","2vh");
	$('.content').css("min-height","64vh");
	$('.content').css("padding","0");
	$('.content').css("overflow","hidden");
	$('.content').css("padding-left","20px");
	$('.content').css("padding-right","20px");
	$('.content').css("padding-top","5px");
	$('.content').css("padding-bottom","5px");
	$('.content').css("background-color","black");
	$('.content').css("color","white");
	
	//the navigation bar
	
	$('.navbar').html("<a>Control of intra-procedural bleeding at EMR</a><a href='index.php'>Exit</a>");

	
	
	
	//show the intro page and the navigation bar with a start show button
	
	$('#intro').show();	
	$('#newNavPageNavigate').html("<button type='button' id='startShow'>Start</button>");
	

	//audio to work on ie
	
	
	
	$('.navbarLower').on('click', '.answerQ', function() {
		var targetPage = $('#pageShowing').html();
		var questionNumber = defineQuestionNumber(targetPage);
		var question = printQuestion(questionNumber);
		//burrow down to the target dropdown and popup
		displayQuestionPopUp(targetPage, question);

	})

	$('.navbarLower').on('click', '#startShow', function() {

		$('#intro').hide();
		$('#1').show();
		$('#pageShowing').html('1');
		 $("#video1").vimeo("play");
		$('#newNavPageNavigate').html("<button type='button' class='back'>Previous page</button><button type='button' class='next'>Next page</button>");
		var currentPage = $('#pageShowing').html();
		var lastPage = $('#lastPage').html();
		targetPage = 1;
		$('#newNavPageNo').html('Page '+targetPage+' of '+lastPage);
		var videoHeight = $('.content').height();
			$('#video'+targetPage).css("height",videoHeight);

	})
	
$('.navbarLower').on('click', '.back', function() {
	
	//define the current page which is showing
	var currentPage = $('#pageShowing').html();
	
	//the page to show as a result of back command
	targetPage = currentPage - 1;
	
	
	//define the last page
	var lastPageDisplay = $('#lastPage').html();
	
	//define the final page of the show (+1 due to the intro slide)
	var lastPage = +lastPageDisplay+1;
	
	//for back only.  if the currentPage is a post-test slide and the questions array contains empty questions for that slide skip the next slide
			
			//more difficult requires some thought about how you know, check two back and if empty don't display the page back?
			if ((pageContainsPostTest(currentPage-2) === true) && (pageQuestionsEmpty((currentPage-2), questions) === true)){
				targetPage = currentPage -2;

			}
	
	//position the popup of the question
	
	$('.dropdown-content').position({my: "center", at: "center", of: ".content"});
	$('.dropdown-content').position({my: "center", at: "center", of: ".content"});
	$('.dropdown-content').position({my: "center", at: "center", of: ".content"});
	
	
	//special case for the intro page
	if (targetPage == 0) {
		targetPage = 'intro';
		$('.audio').trigger('pause');
		$('#newNavPageNavigate').html("<button type='button' id='startShow'>Start</button>");

		
		
	} else if ($('#'+targetPage).find($("[class^=q]")).length > 0){
		
		//case if there is a question on this page
		
		//determine if the questions from that page have been answered
		if (pageQuestionsEmpty(targetPage, questions) === true){
			
			//is the page pre or post test?
			if (pageContainsPostTest(targetPage)===true){
				//if a post test page were pre test questions all answered?
				if (preTestEmpty(questions) === true){
					//one or more empty pretest questions, hide the answer button
					$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button>&nbspAnswer Pre-test Questions First&nbsp');	
				} else if (preTestEmpty(questions) === false){
					//display the answer questions button
					
					$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button><button type="button" class="answerQ">Answer Question</button>');
					
				}
					
			}else{
			
			//if pre-test behave normally
			$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button><button type="button" class="answerQ">Answer Question</button>');
				
			}
			
		} else if (pageQuestionsEmpty(targetPage, questions) === false){
			
			$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button>&nbspQuestion answered already&nbsp');
			
		}
			
	} else{
		
		//all other cases
		
		$('#newNavPageNavigate').html("<button type='button' class='back'>Previous page</button><button type='button' class='next'>Next page</button>");
	}
	
	$('.audio').trigger('pause');
	$('#'+currentPage).hide();
	$('#'+targetPage).show();
	
	if($("#audio" + currentPage).length > 0) {
		$('#audio'+currentPage).trigger('pause');
		
		if (browser == 1){
		$('#audio'+currentPage).prop("currentTime",0); //difficult to implement https://stackoverflow.com/questions/11231081/selecting-the-html5-video-object-with-jquery
		}
	}
	
	
	if($("#audio" + targetPage).length > 0) {
		$('#newNavPageAudio').html("Audio Controls:&nbsp&nbsp<button type='button' class='restartAudio'>Restart</button><button type='button' class='play'>&#9658</button><button type='button' class='pause'>&#9616;&#9616;</button><select class='audioStatus'><option value='0'>Audio Disabled</option><option value='1'>Audio Enabled</option></select>");
		
	

	if (audioStatus == '1'){
		$('#audio'+targetPage).trigger('play');
		}
	}else{
		$('#newNavPageAudio').html('');
	}
	
	if($("#video" + currentPage).length > 0) {
		$('#video'+currentPage).vimeo('pause');
	}
	
	
	
	
	
	
	if($("#video" + targetPage).length > 0) {
		
		var videoHeight = $('.content').height();
		var videoWidth = $('.content').width();
		
		if (targetPage < 20){
			$('#video'+targetPage).css("height",videoHeight);
		}else{
			
			$('#video'+targetPage).css("height",(videoHeight/2));
			$('#video'+targetPage).css("width",(videoWidth/2));
			$('#video'+targetPage).position({my: "right bottom", at: "right bottom", of: '.content'});
			$('#newNavPageAudio').html("Video Controls:&nbsp&nbsp<button type='button' class='hideVideo'>Show/Hide Video</button>&nbsp <button type='button' class='maxVideo'>Enlarge/Shrink Video</button>");
			

		}
		//$('.content').css("background-color","black");
		$('#video'+targetPage).vimeo('play');
	}else{
		//$('.content').css("background-color","white");
		//$('.videoWrapper').css('position','absolute');
		//$('#video'+targetPage).css('z-index','2000');
		
	}
	
	displayQuestions(targetPage);
	
	$('#pageShowing').html(targetPage);
	$('#newNavPageNo').html('Page '+targetPage+' of '+lastPageDisplay);
	
	
	
	if (audioStatus=='1'){
		$('.audioStatus option[value=1]').prop('selected', 'selected');
	}
	if (audioStatus=='0'){
		$('.audioStatus option[value=0]').prop('selected', 'selected');
	}
	
	//checkSummarySubmit(+targetPage-1);

})

$('.navbarLower').on('click', '.next', function() {

	var currentPage = $('#pageShowing').html();
	var lastPageDisplay = $('#lastPage').html();
	var lastPage = +lastPageDisplay+1;
	//console.log('Current page defined as'+currentPage);
	targetPage = +currentPage + 1;
	//console.log('Target page defined as'+targetPage);
	//var lastPageDisplay = +lastPage+1;
	
	//for next only.  if the currentPage is a post-test slide and the questions array contains empty questions for that slide skip the next slide
	if ((pageContainsPostTest(currentPage) === true) && (pageQuestionsEmpty(currentPage, questions) === true)){
		targetPage++;
		
	}
	
	if (targetPage == lastPage) {
		alert('End of the Learning Tool.  Please select another link');
		$('.audio').trigger('pause');

		return;
	}
	

	
	$('#'+currentPage).hide();
	$('#'+targetPage).show();
	
	if($("#audio" + currentPage).length > 0) {
	$('#audio'+currentPage).trigger('pause');
	if (browser == 1){
		$('#audio'+currentPage).prop("currentTime",0); //difficult to implement https://stackoverflow.com/questions/11231081/selecting-the-html5-video-object-with-jquery
		}
	}
	
	if($("#audio" + targetPage).length > 0) {
		$('#newNavPageAudio').html("Audio Controls:&nbsp&nbsp<button type='button' class='restartAudio'>Restart</button><button type='button' class='play'>&#9658</button><button type='button' class='pause'>&#9616;&#9616;</button><select class='audioStatus'><option value='0'>Audio Disabled</option><option value='1'>Audio Enabled</option></select>");
		if (audioStatus == '1'){
		$('#audio'+targetPage).trigger('play');
		}
	}else{
		$('#newNavPageAudio').html('');
	}
	
	if ($('#'+targetPage).find($("[class^=q]")).length > 0){
		
		//case if there is a question on this page
		
		//determine if the questions from that page have been answered
		if (pageQuestionsEmpty(targetPage, questions) === true){
			
			//is the page pre or post test?
			if (pageContainsPostTest(targetPage)===true){
				//if a post test page were pre test questions all answered?
				if (preTestEmpty(questions) === true){
					//one or more empty pretest questions, hide the answer button
					$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button>&nbspAnswer Pre-test Questions First&nbsp');	
				} else if (preTestEmpty(questions) === false){
					//display the answer questions button
					
					$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button><button type="button" class="answerQ">Answer Question</button>');
					
				}
					
			}else{
			
			//if pre-test behave normally
			$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button><button type="button" class="answerQ">Answer Question</button>');
				
			}
			
		} else if (pageQuestionsEmpty(targetPage, questions) === false){
			
			$('#newNavPageNavigate').html('<button type="button" class="back">Previous page</button><button type="button" class="next">Next page</button>&nbspQuestion answered already&nbsp');
			
		}
			
	}else{
		
		$('#newNavPageNavigate').html("<button type='button' class='back'>Previous page</button><button type='button' class='next'>Next page</button>");
	}
	
	
	if($("#video" + currentPage).length > 0) {
	$('#video'+currentPage).vimeo('pause');
	}
	
				var videoHeight = $('.content').height();

	if($("#video" + targetPage).length > 0) {
		
		var videoHeight = $('.content').height();
		var videoWidth = $('.content').width();
		
		if (targetPage < 20){
			$('#video'+targetPage).css("height",videoHeight);
		}else{
			
			$('#video'+targetPage).css("height",(videoHeight/2));
			$('#video'+targetPage).css("width",(videoWidth/2));
			$('#video'+targetPage).position({my: "right bottom", at: "right bottom", of: '.content'});
			$('#newNavPageAudio').html("Video Controls:&nbsp&nbsp<button type='button' class='hideVideo'>Show/Hide Video</button>&nbsp <button type='button' class='maxVideo'>Enlarge/Shrink Video</button>");
			

		}
		//$('.content').css("background-color","black");
		$('#video'+targetPage).vimeo('play');
	}else{
		
	}
	
	displayQuestions(targetPage);
	
	$('#pageShowing').html(targetPage);
	$('#newNavPageNo').html('Page '+targetPage+' of '+lastPageDisplay);
	//$('#newNavPageNavigate').html("<button type='button' class='back'>Previous page</button><button type='button' class='next'>Next page</button>");
	
	
	if (audioStatus=='1'){
		$('.audioStatus option[value=1]').prop('selected', 'selected');
	}
	if (audioStatus=='0'){
		$('.audioStatus option[value=0]').prop('selected', 'selected');
	}
	
	
	//checkSummarySubmit(+targetPage-1);

})

	/*
$('.q1').on('click', function() {

	$('.darkClass').show();
	$('#pretest1').show();
	$('.dropdown-content').position({my: "center", at: "center", of: ".content"});


})	*/
	
$('.close').on('click', function() {

	$('.dropdown-content').hide();
	$('.darkClass').hide();


})	
	

$('.content').on('click', '.submitQuestion', function() {


	$(this).closest('.dropdown-content').find('.question').each(function(){
		questionNumber = $(this).attr('id');
		questionAnswer = $(this).val();

	
		
		$.each(questions, function (index, value){
			//console.log(index);
			//console.log(value);
			if (questionNumber == index){
				questions[index] = questionAnswer;
				//$('#'+questionNumber).val(value);
			}
		
		
	});
		
	});
	
	checkSummarySubmit();
	
	
	$('.dropdown-content').hide();
	$('.darkClass').hide();


})	


	
$('.navbarLower').on('click', '.play', function() {

	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	$(audiotoPlay).trigger('play');
	$('.play').prop('disabled = true');
	$('.pause').prop('disabled = false');



})	

$('.navbarLower').on('click', '.pause', function() {
	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	$(audiotoPlay).trigger('pause');
	$('.play').prop('disabled =-false');
	$('.pause').prop('disabled = true');

})		

$('.navbarLower').on('click', '.restartAudio', function() {
	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	$(audiotoPlay).trigger('pause');
	$(audiotoPlay).prop("currentTime",0);
	$('.play').prop('disabled =-false');
	$('.pause').prop('disabled = false');

})	
	
$('.navbarLower').on('change', '.audioStatus', function() {
	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	var audioRequiredStatus = $(this).val();
	if (audioRequiredStatus == '1'){
		audioStatus = '1';
		$(audiotoPlay).trigger('play');
		
	}
	if (audioRequiredStatus == '0'){
		audioStatus = '0';
		$(audiotoPlay).trigger('pause');
	}

})	
	
//Jquery to determine if there is a video and if so display the video toggle option
	
$('.navbarLower').on('click', '.hideVideo', function() {
	var page = $('#pageShowing').html();
	var video = '#video'+page;
	$(video).toggle();
	

})
	
$('.navbarLower').on('click', '.maxVideo', function() {
	var page = $('#pageShowing').html();
	var video = '#video'+page;
	
	//define whether video is showing
	
	if ($('#video'+page).is(":visible") === true){
	
	var contentHeight = $('.content').height();
	var contentWidth = $('.content').width();

	var videoHeight = $('#video'+page).height();
	var videoWidth = $('#video'+page).width();
	
	if(videoHeight === contentHeight) {
		
		
		$('#video'+page).css("height",(contentHeight/2));
		$('#video'+page).css("width",(contentWidth/2));

		$('#video'+page).position({my: "right bottom", at: "right bottom", of: '.content'});
		$('#newNavPageAudio').html("Video Controls:&nbsp&nbsp<button type='button' class='hideVideo'>Show/Hide Video</button>&nbsp <button type='button' class='maxVideo'>Enlarge/Shrink Video</button>");
		
	}else if (videoHeight < contentHeight){

		$('#video'+page).css("height",contentHeight);
		$('#video'+page).css("width",contentWidth);

		$('#video'+page).position({my: "centre", at: "centre", of: '.content'});
		$('#newNavPageAudio').html("Video Controls:&nbsp&nbsp<button type='button' class='hideVideo'>Show/Hide Video</button>&nbsp <button type='button' class='maxVideo'>Enlarge/Shrink Video</button>");


	}
	}
		
})	

$('.restartShow').on('click', function() {
	//$('#pageShowing').html('intro');
	$('#44').hide();
	$('#1').show();
	$('#pageShowing').html('1');
	 $("#video1").vimeo("play");
	$('#newNavPageNavigate').html("<button type='button' class='back'>Previous page</button><button type='button' class='next'>Next page</button>");
	var currentPage = $('#pageShowing').html();
	var lastPage = $('#lastPage').html();
	targetPage = 1;
	$('#newNavPageNo').html('Page '+targetPage+' of '+lastPage);
	var videoHeight = $('.content').height();
		$('#video'+targetPage).css("height",videoHeight);

})	

	
	
	
	
	
	
});
	
	

	
	
    
    


</script>


</html>

