<?php

require_once 'DataBaseMysql.class.php';

Class formGenerator {

	private $traineeID; //int(10)

	private $connection;

	public function __construct (){
		$this->connection = new DataBaseMysql();
	}
	
	public function GetValues($column){
		
		$column_t = $column . '_t';
		$values = array();
		$result = $this->connection->RunQuery("SELECT $column, $column_t from `values` WHERE $column IS NOT NULL");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$desiredKey = $row[$column];
				$desiredValue = $row[$column_t];
				$values[$desiredKey] = $desiredValue;
			}
		return $values;
	}
	
	public function GetTagCategories(){
		
		
		$tagCategories = array();
		$result = $this->connection->RunQuery("SELECT id, tagCategoryName from `tagCategories`");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$desiredKey = $row['id'];
				$desiredValue = $row['tagCategoryName'];
				$tagCategories[$desiredKey] = $desiredValue;
			}
		return $tagCategories;
	}
	
	public function generateSelect ($label, $id, $class, $options, $tooltip){
		
		$values = $this->GetValues($options);
		//echo "<div id='".$id."row' class='row'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
	
		echo "<select name='$id' id='$id' class='$class'>";
		echo "<option hidden disabled selected>please select</option>";
		foreach ($values as $key=>$value){
			echo "<option value='$key'>$value</option>";	
		}
		echo "</select><br>";
		//echo "</div>";	
	}
	
	public function generateSelectTagCategories ($label, $id, $class, $tooltip){
		
		$values = $this->GetTagCategories();
		//echo "<div id='".$id."row' class='row'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
	
		echo "<select name='$id' id='$id' class='$class'>";
		echo "<option hidden disabled selected>please select</option>";
		foreach ($values as $key=>$value){
			echo "<option value='$key'>$key - $value</option>";	
		}
		echo "</select><br>";
		//echo "</div>";	
	}
	
	
	//does not use the values table, uses array passed in the $options value
	public function generateSelectCustom ($label, $id, $class, $options, $tooltip){
		
		echo "<div id='".$id."row' class='row'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
		echo "<select name='$id' id='$id' class='$class'>";
		echo "<option hidden disabled selected>please select</option>";
		foreach ($options as $key=>$value){
			echo "<option value='$key'>$value</option>";	
		}
		echo "</select><br>";
		echo "</div>";	
	}
	
	/*old
	public function generateSelectToolTip ($label, $id, $class, $options, $tooltip){
		echo "<div id='row' title='$tooltip'>";
		$this->generateSelect($label, e$id, $class, $options);
		echo "</div>";		
	}*/
	
	public function generateTextOld ($label, $id, $class, $tooltip){
		
		echo "<div id='".$id."row' class='row'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
		echo "<input name='$id' id='$id' class='$class' type='text' size ='50'>";
		echo "</div>";	
		
	}
	
	public function generateText ($label, $id, $class, $tooltip){
		
		//echo "<div id='".$id."row' class='row'>";
		echo "<p class='formRow'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
		echo "<input name='$id' id='$id' class='$class' type='text' size ='50'>";
		echo "</p>";
		//echo "</div>";	
		
	}
	
	public function generatePassword ($label, $id, $class, $tooltip){
		
		echo "<div id='".$id."row' class='row'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
		echo "<input name='$id' id='$id' class='$class' type='password' size ='50'>";
		echo "</div>";	
		
	}
	
	public function generateDate ($label, $id, $class, $tooltip){
		
		echo "<div id='".$id."row' class='row'>";
		echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
		echo "<input name='$id' id='$id' class='$class' type='date'>";
		echo "</div>";	
		
	}
	
	
	public function generateTextArea ($label, $id, $class, $tooltip){
		
		//echo "<div id='".$id."row' class='row'>";
		//echo "<label for='$id' id='".$id."label' title='$tooltip'>$label&nbsp&nbsp</label>";
		echo "<textarea name='$id' id='$id' class='$class' rows='4' cols='30'></textarea>";
		//echo "</div>";	
		
	}
	
	public function generateSubmit ($id, $class, $text, $action){
		
		echo "<div id='".$id."row' class='row'>";
		
		echo "<button type='button' id='$id' class='$class' onclick='$action'>$text</button>";
		
		echo "</div>";	
		
	}
	
	
	
	
    public function generateSelectTable($stext, $sname, $svalue1, $svalue2, $post, $message) {
            //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
            
			if ($message){
			echo "<tr><td style=\"max-width:30%;\" title='$message'><div class='tooltip'>".$stext." : </td></div><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			}else{
				echo "<tr><td style=\"max-width:30%;\">".$stext." : </td><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			}
			
            echo "<option hidden disabled selected value></option>";
            $query = "SELECT `".$svalue1."`, `".$svalue2."` FROM `values` WHERE `".$svalue1."` IS NOT NULL";
            $res = mysqli_query ($dbc, $query);
            while($row = mysqli_fetch_array($res))
            {   
                echo "<option value=".$row[$svalue1];
                if (($row[$svalue1])==$post) {
                    echo " selected = 'selected'";
                }
                echo ">".$row[$svalue1]." ".$row[$svalue2]."</option>"; }
            echo "</select>";
			echo "</td>\n";
            mysqli_free_result($res);
           }
       
       
    public function generateTextTable($stext, $sname, $stype, $post, $message) {
           if ($message){
		   echo "<tr><td id='".$sname."Error\' style=\"max-width:30%;\" title='$message'><div class='tooltip'>".$stext." : </td></div><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";
		   }else{
			echo "<tr><td id='".$sname."Error\' style=\"max-width:30%;\">".$stext." : </td><td><input type='".$stype."' class='formInputs' name='".$sname."' id='".$sname."' value='";   
			   
		   }
            if (isset($post)) echo $post;
            echo "'></td>\n";   
       }
	
	
    public function generateHiddenTable($stext, $sname, $stype, $post) {
           echo "<tr><td id=".$sname."Tag\" style=\"max-width:30%;\"></td><td><input type=".$stype." name=".$sname." id=".$sname." value=";
            if (isset($post)) echo $post;
            echo "></td>\n";   
       }

    public function generateTextAreaTable($stext, $sname, $post, $message) {
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
        
    public function getDatabaseColumns ($table) {
	    
		    $q = "SELECT `COLUMN_NAME` AS `name`, `ORDINAL_POSITION` AS `position`, `CHARACTER_MAXIMUM_LENGTH` AS `length`
	    FROM INFORMATION_SCHEMA.COLUMNS
	            WHERE TABLE_SCHEMA='ESD'
	            AND TABLE_NAME = '$table'";
            
            //echo $q;
            
			$result = $this->connection->RunQuery($q);
			
			if ($result->num_rows > 0){
			
				$columns = array();
			
				while($columns[] = $result->fetch_array(MYSQLI_ASSOC));


	
				
				/*while($row = $result->fetch_array(MYSQLI_ASSOC)){
		
					$columns['name'] = $row['name'];
					$columns['position'] = $row['position'];
					$columns['length'] = $row['length'];
					
		
				}*/
				
			return $columns;	
				
			}else{
				
				return NULL;
				
			}

            
    }
    
    public function getAllDatabaseTables (){
	    
	    $q = "SELECT `TABLE_NAME` AS `table`, `COLUMN_NAME` AS `name`, `ORDINAL_POSITION` AS `position`, `CHARACTER_MAXIMUM_LENGTH` AS `length`
	    FROM INFORMATION_SCHEMA.COLUMNS
	            WHERE TABLE_SCHEMA='esdv1'";
	    
	   	
	   	$result = $this->connection->RunQuery($q);
	   	    
	    if ($result->num_rows > 0){
					
		
				$columns = array();
			
				while($columns[] = $result->fetch_array(MYSQLI_ASSOC));

			
				
			return $columns;	
				
			}else{
				
				echo 'query didn\t work';
				return NULL;
				
			}
	    
	    
    }
       
	/**
	 * @param Type: varchar(50)
	 */
	public function settelephone($telephone){
		$this->telephone = $telephone;
	}

    /**
     * Close mysql connection
     */
	public function endtrainee(){
		$this->connection->CloseMysql();
	}

}
