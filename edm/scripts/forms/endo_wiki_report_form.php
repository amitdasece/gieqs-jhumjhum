//old version

<?php

//use the passed database values list as text generated from the general class, general must be declared in the parent script

/**
 *must have
 *$tableNameValues
 *$tableNameSheet
 *set in parent script
 */

function generateSelectOld($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues)
{

    if ($message) {
        echo "
            <tr>
            <td style=\"width:60%;\" title='$message'>
                 <div class='tooltip'>" . $stext . " : </div></td>
            <td style=\"width:30%;\"><SELECT name = '" . $sname . "' id='" . $sname . "' class='formInputs' >";

    } else {
        echo "<tr>
                <td style=\"width:60%;\">" . $stext . " : </td>
                <td style=\"width:30%;\"><SELECT name = '" . $sname . "' id='" . $sname . "' class='formInputs'>";
    }

    echo "<option disabled hidden selected value></option>";

    echo $general->writeSelect($svalue1, $svalue2, $tableNameValues);

    echo "</select>";
    echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";
    echo "</td>


            </tr>";
    //mysqli_free_result($res);

}

function generateSelect($stext, $sname, $svalue1, $svalue2, $post, $message, $general, $tableNameValues)
{

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

    echo $general->writeSelect($svalue1, $svalue2, $tableNameValues);

    echo "</SELECT>";
    echo "</div>";
    //echo "<a class='reset' title='reset this field'>&nbsp;&#x2717;</a>";

    //mysqli_free_result($res);

}

function generateChecked($stext, $sname, $message){

echo '<div class="custom-control custom-switch mt-4 mb-4">';

echo '<input type="checkbox" value="1" name="' . $sname . '" class="custom-control-input form-control" id="' . $sname . '">';
echo  '<label class="custom-control-label" for="' . $sname . '">' . $stext . '</label>';
echo '</div>';

}

function errorMessage($errorTag)
{
    echo "<td id=" . $errorTag . " class=\"errorTag\" style=\"max-width:30%;\"></td>\n</tr>\n";
}

function generateTextOld($stext, $sname, $stype, $post, $message)
{
    if ($message) {
        echo "<tr><td id='" . $sname . "Error' style=\"width:60%;\" title='$message'><div class='tooltip'>" . $stext . " : </div>s</td><td><input type='" . $stype . "' class='formInputs' name='" . $sname . "' id='" . $sname . "' value='";
    } else {
        echo "<tr><td id='" . $sname . "Error' style=\"width:60%;\">" . $stext . " : </td><td><input type='" . $stype . "' class='formInputs' name='" . $sname . "' id='" . $sname . "' value='";

    }
    if (isset($post)) {
        echo $post;
    }

    echo "'></td></tr>\n";
}

function generateText($stext, $sname, $stype, $post, $message)
{
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

    //echo "'></td></tr>\n";
}
function generateHidden($stext, $sname, $stype, $post)
{
    echo "<tr><td id=" . $sname . "Tag\" style=\"max-width:30%;\"></td><td><input type=" . $stype . " name=" . $sname . " id=" . $sname . " value=";
    if (isset($post)) {
        echo $post;
    }

    echo "></td>\n";
}

function generateTextAreaOld($stext, $sname, $post, $message)
{
    if ($message) {
        echo "<tr><td style=\"max-width:30%;\" title='$message'><label><div class='tooltip'>" . $stext;
        echo " : </div></td><td><textarea name=" . $sname . " rows=\"4\" id=" . $sname . "  class='formInputs' cols=\"30\" value=";
    } else {
        echo "<tr><td style=\"max-width:30%;\"><label>" . $stext;
        echo " : </td><td><textarea name=" . $sname . " rows=\"4\" id=" . $sname . "  class='formInputs' cols=\"30\" value=";

    }
    if (isset($post)) {
        echo $post;
    }

    echo "/> </textarea></label></td></tr>\n";

}

function generateTextArea($stext, $sname, $post, $message)
{
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
