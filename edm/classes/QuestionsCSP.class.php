<?php

require_once 'DataBaseMysql.class.php';

class Questions {
				
				
				
				protected $userid = null;
				
				protected $csp = null;
	
				protected $question1apre = null;
				protected $question1bpre = null;
				protected $question2pre = null;
				protected $question3apre = null;
				protected $question3bpre = null;
				
				protected $question1apost = null;
				protected $question1bpost = null;
				protected $question2post = null;
				protected $question3apost = null;
				protected $question3bpost = null;
	
				protected $overallPre = null;
				protected $overallPost = null;
				protected $changeScore = null;
				protected $percentImprovement = null;
				protected $datecreated = null;
				
				private $connection;

				
				public function __construct (){
					$this->connection = new DataBaseMysql();
					//print_r($this->connection);
				}
				
				public function defineUser () {
					
					$userid = $_SESSION['user_id'];
					$this->userid = $userid;
					return $this->userid;
					
				}
	
				public function Load_from_key($key_row){
					
					$result = $this->connection->RunQuery("SELECT * FROM `csp` WHERE userid = \"$key_row\"");
				    //print_r($result);
					if ($result && $result->num_rows > 0){
						
						
						while($row = $result->fetch_array(MYSQLI_ASSOC)){
						
						$this->csp = $row["csp"];
							
						$this->question1apre = $row["question1apre"];
						$this->question1bpre = $row["question1bpre"];
						$this->question2pre = $row["question2pre"];
						$this->question3apre = $row["question3apre"];
						$this->question3bpre = $row["question3bpre"];
						
						$this->question1apost = $row["question1apost"];
						$this->question1bpost = $row["question1bpost"];
						$this->question2post = $row["question2post"];
						$this->question3apost = $row["question3apost"];
						$this->question3bpost = $row["question3bpost"];

						$this->overallPre = $row['overallPre'];
						$this->overallPost = $row['overallPost'];
						
						$this->datecreated = $row['datecreated'];

							
						}
						
						return TRUE;
						
					} else {
							
							
						return FALSE;
							
						}
						
					}			
				
				
				  // Method returns the user ID:
				  function isAnswered($question) {
					 if ($question == null){
						 return '0';
					 }else{
						 return '1';
					 }
				  }
	
				  public function New_Questions($userid, $question1apre, $question1bpre, $question2pre, $question3apre, $question3bpre, $question1apost, $question1bpost, $question2post, $question3apost, $question3bpost, $overallPre, $overallPost){
					  
					  	$this->userid = $userid;
					  
					  	$this->question1apre = $question1apre;
						$this->question1bpre = $question1bpre;
						$this->question2pre = $question2pre;
						$this->question3apre = $question3apre;
						$this->question3bpre = $question3bpre;
						
						$this->question1apost = $question1apost;
						$this->question1bpost = $question1bpost;
						$this->question2post = $question2post;
						$this->question3apost = $question3apost;
						$this->question3bpost = $question3bpost;
					  
					  	$this->overallPre = $overallPre;
						$this->overallPost = $overallPost;
						
						//$this->datecreated = $datecreated;
					  
					}
	
				public function Save_New_Row(){
					$q = "INSERT INTO `csp`(`userid`, `question1apre`, `question1bpre`, `question2pre`, `question3apre`, `question3bpre`, `question1apost`, `question1bpost`, `question2post`, `question3apost`, `question3bpost`, `overallPre`, `overallPost`) VALUES ('$this->userid', '$this->question1apre','$this->question1bpre','$this->question2pre','$this->question3apre','$this->question3bpre','$this->question1apost','$this->question1bpost','$this->question2post','$this->question3apost','$this->question3bpost','$this->overallPre','$this->overallPost')";
					
					
					echo $q;
					
					$this->connection->RunQuery($q);
					//echo $q;
					$rows = $this->connection->conn->affected_rows;
					
					//print_r($result);
					if ($rows == 1){
						return 1;
					}else{
						
						return null;
					}
				
				
				
				}
	
	
				public function Save_Active_Row(){
					$q = "UPDATE `csp` SET `question1apre`='$this->question1apre', `question1bpre`='$this->question1bpre', `question2pre`='$this->question2pre', `question3apre`='$this->question3apre', `question3bpre`='$this->question3bpre', `question1apost`='$this->question1apost', `question1bpost`='$this->question1bpost', `question2post`='$this->question2post', `question3apost`='$this->question3apost', `question3bpost`='$this->question3bpost', `overallPre`='$this->overallPre', `overallPost`='$this->overallPost', `datecreated`='$this->datecreated' WHERE `userid`=$this->userid";
					
					//echo $q;
					
					$this->connection->RunQuery($q);
					//echo $q;
					$rows = $this->connection->conn->affected_rows;
					
					//print_r($result);
					if ($rows == 1){
						return 1;
					}else{
						
						return null;
					}
				
				
				
				}
				
				  function getUserID() {
					  return $this->userid;
				  }
				
				  function getAnswer($question){
					  return $this->$question;
				  }
	
				  public function JS_var(){
						$result = get_object_vars($this);
					 
						return json_encode($result);
				}
			function getConnectionError() {
				
				return $this->connection->conn->affected_rows;
				
			}
				
				
			}