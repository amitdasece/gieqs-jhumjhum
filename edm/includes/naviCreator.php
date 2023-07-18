<?php



new users;


echo '<div class="navbar">
 
  <a href="' . $roothttp . 'scripts/forms/creators.php">Creator Menu</a>';
echo '  


  
  
  

  
  
  ';


 echo '<a href="index.php?p=help">Help</a>';
echo '<a style="text-align:right;" href="index.php?p=logout">Logout</a>';

echo "<div id='userDisplay' style='text-align:right;'>";
			 $firstname =  $_SESSION['firstname'];
			 $surname = $_SESSION['surname'];
			 $userid = $_SESSION['user_id'];
echo "<br>User: $firstname $surname </div>";
			 echo "<br>User: $firstname $surname </div>";  
echo "<br>User: $firstname $surname </div>";
echo '<div class="darkClass"></div>';
echo "<div id='userID' style='display:none;'>";
echo $_SESSION['user_id'];
echo "</div>";
echo "</div>";

	