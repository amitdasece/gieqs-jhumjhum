<?php 
       
        function generateSelect($stext, $sname, $svalue1, $svalue2, $post, $message) 
        {
	        
	        $host = substr($_SERVER['HTTP_HOST'], 0, 5);
            if (in_array($host, array('local', '127.0', '192.1'))) 
            {
                $local = TRUE;
            } else {
                $local = FALSE;
            }
	        
	        if ($local){
            $dbc = mysqli_connect ("localhost", "root", "", "esdv1");
			}else{
			$dbc = mysqli_connect ("localhost", "djt", "nevira1pine", "esdv1");
				
				
			}
			
			if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
	        
            
			if ($message){
			echo "<tr><td style=\"max-width:30%;\" title='$message'><div class='tooltip'>".$stext." : </td></div><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			}else{
				echo "<tr><td style=\"max-width:30%;\">".$stext." : </td><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			}
			
            echo "<option disabled hidden selected value></option>";
            $query = "SELECT `".$svalue1."`, `".$svalue2."` FROM `valuesESD` WHERE `".$svalue1."` IS NOT NULL AND `".$svalue2."` <> ''";
            $res = mysqli_query ($dbc, $query);
            while($row = mysqli_fetch_array($res))
            {   
                echo "<option value=".$row[$svalue1];
                if (($row[$svalue1])==$post) {
                    echo " selected = 'selected'";
                }
                echo ">".$row[$svalue1]." ".$row[$svalue2]."</option>"; }
            echo "</select>"; 
            echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";
			echo "</td><td></td>\n";
            mysqli_free_result($res);
           }
       
      /* function generateSelectRequired($stext, $sname, $svalue1, $svalue2, $post) {
            $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            echo "<tr><td style=\"max-width:30%;\"><sup>*</sup>".$stext." : </td><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
            echo "<option hidden disabled selected value></option>";
            $query = "SELECT `".$svalue1."`, `".$svalue2."` FROM `valuesercp` WHERE `".$svalue1."` IS NOT NULL";
            $res = mysqli_query ($dbc, $query);
            while($row = mysqli_fetch_array($res))
            {   
                echo "<option value=".$row[$svalue1];
                if ((isset($post)) && (($row[$svalue1])==$post)) {
                    echo " selected = 'selected'";
                }
                echo ">".$row[$svalue1]." ".$row[$svalue2]."</option>"; }
            echo "</select></td>\n";
            mysqli_free_result($res);
           }
       */
        function errorMessage($errorTag) {
            echo "<td id=".$errorTag." class=\"errorTag\" style=\"max-width:30%;\"></td>\n</tr>\n";
        }
       
      /* function generateChecked($stext, $sname, $svalue1, $svalue2, $post, $message) {
            $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $query = "SELECT `".$svalue1."`, `".$svalue2."` FROM `valuesercp` WHERE `".$svalue1."` IS NOT NULL";
            $res = mysqli_query ($dbc, $query);
		   
		   echo "<tr><td>".$stext." : </td><td>";
            while($row = mysqli_fetch_array($res))
            {   echo "<input type = 'radio' name = '".$sname."' id = '".$sname.$row[$svalue1]."' class='formInputs' value=".$row[$svalue1];
                if (($row[$svalue1])==$post) {
                    echo " checked = 'checked'";
                }
                echo ">".$row[$svalue1]." ".$row[$svalue2]."&nbsp;"; }
           echo "</td>\n";
            mysqli_free_result($res);
           }*/
       
       function generateText($stext, $sname, $stype, $post, $message) {
           if ($message){
		   echo "<tr><td id='".$sname."Error\' style=\"max-width:30%;\" title='$message'><div class='tooltip'>".$stext." : </td></div><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";
		   }else{
			echo "<tr><td id='".$sname."Error\' style=\"max-width:30%;\">".$stext." : </td><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";   
			   
		   }
            if (isset($post)) echo $post;
            echo "'></td>\n";   
       }
        function generateHidden($stext, $sname, $stype, $post) {
           echo "<tr><td id=".$sname."Tag\" style=\"max-width:30%;\"></td><td><input type=".$stype." name=".$sname." id=".$sname." value=";
            if (isset($post)) echo $post;
            echo "></td>\n";   
       }

        function generateTextArea($stext, $sname, $post, $message) {
            if ($message){
			echo "<tr><td style=\"max-width:30%;\" title='$message'><label><div class='tooltip'>".$stext;
            echo " : </div></td><td><textarea name=".$sname." rows=\"4\" id=".$sname."  class='formInputs' cols=\"30\" value=";
			}else{
			echo "<tr><td style=\"max-width:30%;\"><label>".$stext;
            echo " : </td><td><textarea name=".$sname." rows=\"4\" id=".$sname."  class='formInputs' cols=\"30\" value=";	
				
			}
            if (isset($post)) echo $post;
            echo "/> </textarea></label></td>\n";
            
        }
       
       ?>