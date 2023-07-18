<?php

class Slide {
				
				protected $slideid = NULL;
				
				protected $audioFileName = NULL;
				
				protected $videoVimeoURL = NULL;
				
				protected $slideFileName = NULL;
			
				protected $questionNumber = NULL;
				
				protected $prePost = NULL;

				
				protected $questions = NULL; 
				
				
				function defineSlide ($slideid, $audioFileName, $videoVimeoURL, $slideFileName, $questionNumber, $prePost, array $questions) {
					
					$this->slideid = $slideid;
					$this->audioFileName = $audioFileName;
					$this->videoVimeoURL = $videoVimeoURL;
					$this->slideFileName = $slideFileName;
					$this->questionNumber = $questionNumber;
					$this->questions = $questions;
					$this->prePost = $prePost;
					
				}
				
				function generateAudio (){
					
					echo "<audio class='audio' id='audio$this->slideid'><source src='includes/$this->audioFileName'></audio>";
					
				}
				
				function displaySlide () {
					
					echo "<img src='includes/$this->slideFileName' class='slide'>";
					
				}
				
				function generateVideo () {
					
					echo "<div class='videoWrapper' style='text-align: centre'><iframe id='video$this->slideid' src='$this->videoVimeoURL'  frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";
				}
				
				function generateDropDown () {
					
					echo "<div class='dropdown-content' id='" . $this->prePost. "test$this->questionNumber' style='display: none; text-align: center;'>";
					
					echo "<h3>$this->prePost-test Question $this->questionNumber</h3><br/>";
					echo "<div id='errorq$this->questionNumber' class='error'></div><br/>";
					
					//print_r($this->questions);
					
					foreach ($this->questions as $key => $value) {
						
						//print_r($this->questions);
						
						$questionNumber = $key;
						$text = $value['text'];
						$options = $value['options'];
						$correct = $value['correct'];
						
						echo "<p>Question $key : $text</p>";
						
						echo "<select name='question$questionNumber' id='question" . $questionNumber . $this->prePost . "' class='question'><option hidden selected>";
						
						foreach ($value['options'] as $k => $v){
							
							echo "<option value='$k'>$v</option>";
						
						}
						
					
						echo "</select>";
					}
					
					echo "<br><br><button type='button' class='close'>Close window</button>&nbsp&nbsp&nbsp";
					echo "<button type='button' class='submitQuestion'>Submit Answers</button>";

					echo "</div>";
					
					
				}
				
				
				
				function generateSlide () {
					
				echo "<div id='$this->slideid' style='display: none; text-align: center;'>";
				
					if ($this->audioFileName) {

						$this->generateAudio();

					}
							
					if ($this->videoVimeoURL) {

						$this->generateVideo();

					}
					
					if ($this->slideFileName) {

						$this->displaySlide();

					}
				
					
					if ($this->questions) {

						
						
						
						$this->generateDropDown();
							
						

					}
				
				echo '</div>';
					
				}
					
				
					
					
				}