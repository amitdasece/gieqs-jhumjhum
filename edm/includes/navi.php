<?php
echo '<div class="navbar">
  <a href="index.php?p=home">Home</a>';
echo '  


  
  <div class="dropdown">
    <button class="dropbtn">Learning Modules
     
    </button>
    <div class="dropdown-content">
       <a href="index.php?p=imagingPreEMR">Imaging Prior to Colonic EMR</a>
	  <hr>
	  <a href="index.php?p=introduction">Introduction to Colonic EMR</a>
	  
	  <a href="index.php?p=IPB">Intra-procedural bleeding at EMR</a>
	  <hr>
	  <a href="index.php?p=elearn">Cold Snare Polypectomy</a>
      
    </div>
  </div>
  
  <div class="dropdown">
    <button class="dropbtn">Upcoming Courses 
      
    </button>
    <div class="dropdown-content">
      <a href="">None Yet</a>
    </div>
  </div>
  
  
  ';



 (0); 
/* 
echo '
<div class="dropdown">
    <button class="dropbtn">Documents 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="iACEethics.php">Ethics Documents for iACE</a>
      <a href="PROSPERdocs.php">Ethics Documents for PROSPER</a>
    </div>
  </div>';*/
 
 echo '<a href="index.php?p=help">Help</a>';
echo '<a style="text-align:right;" href="index.php?p=logout">Logout</a>';

echo "<div id='userDisplay' style='text-align:right;'>";
			 $firstname =  $_SESSION['firstname'];
			 $surname = $_SESSION['surname'];
			 $userid = $_SESSION['user_id'];
			 echo "<br>User: $firstname $surname </div>";  
echo '<div class="darkClass"></div>';
echo "<div id='userID' style='display:none;'>";
echo $_SESSION['user_id'];
echo "</div>";
	echo "</div>";

	