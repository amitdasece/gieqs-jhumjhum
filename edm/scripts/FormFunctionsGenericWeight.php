<?php 
       
       //use the passed database values list as text generated from the general class, general must be declared in the parent script
       
       /**
        *must have 
        *$tableNameValues 
		*$tableNameSheet 
        *set in parent script
        */


       // error_reporting(E_ALL);


        function generateSelect($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues, $weight) {
	        
			

            if ($message) {
                echo '<label for="' . $sname . '" title="' . $message . '">' . $stext . '</label>';
                echo '<div class="input-group mb-3">';
                echo '<SELECT name="' . $sname . '" type="text" class="form-control formInputs" id="' . $sname . '">';
                
            } else {
                echo '<label for="' . $sname . '">' . $stext . '</label>';
                echo '<div class="input-group mb-3">';
                echo '<SELECT name="' . $sname . '" type="text" class="form-control formInputs" id="' . $sname . '">';
                
            }
        
            echo "<option disabled hidden selected value></option>";
        
            echo $general->writeSelectWeight($svalue1, $svalue2, $tableNameValues, $weight);
        
            echo "</SELECT>";
            echo "</div>";
            //echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";
        
            //mysqli_free_result($res);
            //mysqli_free_result($res);
        
        }
       
        function errorMessage($errorTag) {
            echo "<td id=".$errorTag." class=\"errorTag\" style=\"max-width:30%;\"></td>\n</tr>\n";
        }
       
      
       
       function generateText($stext, $sname, $stype, $post, $message) {
        if ($message) {
            echo '<label for="' . $sname . '" title="' . $message . '">' . $stext . '</label>';
            echo '<div class="input-group mb-3">';
            if ($stype == 3){
                echo '<input type="date" data-toggle="date" class="form-control formInputs" id="' . $sname . '" name="' . $sname . '" placeholder="' . $stext . '">';
                }else{
                echo '<input type="text" class="form-control formInputs" id="' . $sname . '" name="' . $sname . '" placeholder="' . $stext . '">';
        
                }
            echo '</div>';
            //echo "<tr><td id='" . $sname . "Error' style=\"width:60%;\" title='$message'><div class='tooltip'>" . $stext . " : </div>s</td><td><input type='" . $stype . "' class='formInputs' name='" . $sname . "' id='" . $sname . "' value='";
        } else {
            echo '<label for="' . $sname . '">' . $stext . '</label>';
            echo '<div class="input-group mb-3">';
            if ($stype == 3){
            echo '<input type="date" data-toggle="date" class="form-control formInputs" id="' . $sname . '" name="' . $sname . '" placeholder="' . $stext . '">';
            }else{
            echo '<input type="text" class="form-control formInputs" id="' . $sname . '" name="' . $sname . '" placeholder="' . $stext . '">';
    
            }
            echo '</div>';
        }
        if (isset($post)) {
            echo $post;
        }
       }
        function generateHidden($stext, $sname, $stype, $post) {
           echo "<tr><td id=".$sname."Tag\" style=\"max-width:30%;\"></td><td><input type=".$stype." name=".$sname." id=".$sname." value=";
            if (isset($post)) echo $post;
            echo "></td>\n";   
       }

        function generateTextArea($stext, $sname, $post, $message) {
            if ($message) {
                echo '<label for="' . $sname . '" title="' . $message . '">' . $stext . '</label>';
                echo '<div class="input-group mb-3">';
                echo '<textarea name="' . $sname . '" data-toggle="autosize" class="form-control formInputs" id="' . $sname . '" placeholder="' . $stext . '"></textarea>';
                echo '</div>';
                //echo "<tr><td id='" . $sname . "Error' style=\"width:60%;\" title='$message'><div class='tooltip'>" . $stext . " : </div>s</td><td><input type='" . $stype . "' class='formInputs' name='" . $sname . "' id='" . $sname . "' value='";
            } else {
                echo '<label for="' . $sname . '">' . $stext . '</label>';
                echo '<div class="input-group mb-3">';
                echo '<textarea name="' . $sname . '" data-toggle="autosize" class="form-control formInputs" id="' . $sname . '" placeholder="' . $stext . '"></textarea>';
                echo '</div>';
            }
            
        
            if (isset($post)) {
                echo $post;
            }
            
        }

        function generateChecked ($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues, $weight){


            //echo '<div class="form-check">';
            echo '<div class="form-group mb-3">';
            echo '<label class="form-control">' . $stext . '</label>';
            echo $general->writeCheckedWeight($sname, $svalue1, $svalue2, $tableNameValues, $weight, $stext);
            echo '</div>';
    //echo '</div>';

            /* echo '<div class="input-group mb-3">';
            echo '<div class="custom-control custom-checkbox">';

            echo $general->writeCheckedWeight($sname, $svalue1, $svalue2, $tableNameValues, $weight);
            echo '<label class="custom-control-label" for="' . $sname . '1">' . $stext . '</label>';



            echo '</div>';

            echo '</div>';
 */
          

            
        }
       
       ?>