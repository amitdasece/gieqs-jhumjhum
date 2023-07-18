<?php
	
error_reporting(0);
$centre = $_SESSION['centre'];
$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';

$user = new users;
$user->Load_from_key($_SESSION['user_id']);

echo '<div class="navbar">

  
  
  <div class="dropdown">
    <div class="dropbtn">&#9660;&nbsp;Navigation 
      
    </div>
    <div class="dropdown-content">';
      
      
      echo '<a href="'.$folder.'index.php">Dashboard</a>';

      
      echo '<a href="'.$folder.'new.php">Enter new patient</a>';
      
	    
      
    
      
    echo '  
    
    
    
    <a style="align:right;" href="'.$folder.'logout.php">Logout</a>
      
    </div>
  </div>
  
  
  
  
  
  <div class="dropdown">
    <div class="dropbtn">&#9660;&nbsp;Data Management 
      
    </div>
    <div class="dropdown-content">';
    	
    	echo '<a href="'.$folder.'new.php">Enter new patient</a>';
    	
    	echo '<div class="dropdown-2">';
    	
	    	echo '<div class="dropbtn-level2">Patient Management&nbsp&nbsp&#9654;';
	    	
	    	echo '</div>';
		   
			   echo '<div class="dropdown-content-2">';
				   
				   echo '<a href="'.$folder.'tables.php">Patient Manager</a>';
				   
				echo '</div>';
			
		echo '</div>';
		
		echo '<div class="dropdown-2">';
    
	    	echo '<div class="dropbtn-level2">Lesion Management&nbsp&nbsp&#9654;';
	    	
	    	echo '</div>';
		   
			   echo '<div class="dropdown-content-2">';
				   
				   echo '<a href="'.$folder.'scripts/tables/lesionTable.php">Table of Lesions</a>';
				   
				echo '</div>';
				
			
			
		echo '</div>';
		
		echo '<div class="dropdown-2">';
		
			echo '<div class="dropbtn-level2">2 week check&nbsp&nbsp&#9654;';
			
			echo '</div>';
		   
			   echo '<div class="dropdown-content-2">';
				   
				   
				   echo '<a href="'.$folder.'scripts/tables/chaseHistology.php">Histology Chaser</a>';
				   
				   echo '<a href="'.$folder.'scripts/tables/chaseContact.php">14 day check Chaser</a>';
				   
				  
				   
				echo '</div>';
				
			
			
		echo '</div>';
		
		echo '<div class="dropdown-2">';
		
			echo '<div class="dropbtn-level2">Surveillance Manager&nbsp&nbsp&#9654;';
			
			echo '</div>';
		   
			   echo '<div class="dropdown-content-2">';
				   
				  echo '<a href="'.$folder.'scripts/tables/chaseSurveillance.php">Surveillance Chaser</a>';
				  
				  echo '<a href="'.$folder.'scripts/tables/chaseSurveillance.php">Surveillance Chaser</a>';
				  
				  echo '<a href="'.$folder.'scripts/tables/chaseSurveillance.php">Surveillance Chaser</a>';
				   
				echo '</div>';
			
		
		
		echo '</div>';
		
		echo '<div class="dropdown-2">';

		
			echo '<div class="dropbtn-level2">Studies Manager&nbsp&nbsp&#9654;';
			
			echo '</div>';
		   
			   echo '<div class="dropdown-content-2">';
				   
				   
				   
				   
				   
				echo '</div>';
				
			
			
		echo '</div>';
    
                 
      
      
      echo'
    </div>
  </div>
  
  <div class="dropdown">
    <button class="dropbtn">&#9660;&nbsp;Images 
     
    </button>
    <div class="dropdown-content">
      <a href="'.$folder.'../new_images.php">enter new iACE images</a>
      <a href="'.$folder.'../view_images.php">view iACE images</a>';
      
      if ($user->getaccess_level() == 1){
	      
	     echo '<a href="'.$folder.'imageBook.php">iACE image book</a>';

	      
	  }
      
      
    echo '</div>
  </div>';
 error_reporting(0); 
if ($user->getaccess_level() == 1){
   echo '<div class="dropdown">
    <button class="dropbtn">&#9660;&nbsp;Outputs 
      
    </button>
    <div class="dropdown-content">
      <a href="'.$folder.'metrics.php">Metrics</a>
    </div>
  </div>';
}
 
 
echo '
<div class="dropdown">
    <button class="dropbtn">&#9660;&nbsp;Documents 
      
    </button>
    <div class="dropdown-content">
      <a href="'.$folder.'iACEethics.php">Ethics Documents for iACE</a>
      <a href="'.$folder.'PROSPERdocs.php">Ethics Documents for PROSPER</a>
	  <a href="'.$folder.'PROSPER_l.php">PROSPER study description</a>
    </div>
  </div>
  
  
  <div class="dropdown">
    <button class="dropbtn">&#9660;&nbsp;Help 
      
    </button>
    <div class="dropdown-content">
      <a href="'.$folder.'iACEhelp.php">iACE help pages</a>

    </div>
  </div>';
  
  
  
    

  if ($user->getaccess_level() == 1){
  echo '<div class="dropdown">
    <button class="dropbtn">&#9660;&nbsp;Administrator 
      
    </button>
    <div class="dropdown-content">
      <a href="'.$folder.'scripts/tables/adminLesion.php">Lesion table Administration</a>';
      
      echo '<div class="dropdown-2">';
    	
	    	echo '<div class="dropbtn-level2">User Managementt&nbsp&nbsp&#9654;';
	    	
	    	echo '</div>';
		   
			   echo '<div class="dropdown-content-2">';
				   
				   echo '<a href="'.$folder.'scripts/emailResetForm.php">Reset user password</a>';
				   echo '<a href="'.$folder.'scripts/adminGenerateUserEmailResetPassword.php">Generate password reset email</a>';

				echo '</div>';
			
		echo '</div>';
      
      
      echo '<a href="'.$folder.'scripts/tables/adminLesion.php">User Administration</a>
      <a href="'.$folder.'other_studies.php">Other WM Studies</a>
    </div>
  </div>';} 
  
  echo'
  
</div>';
	
	?>