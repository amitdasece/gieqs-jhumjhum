<?php

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){

    $root = $_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/dashboard/esd/';
    require($_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/includes/config.inc.php');
}else{
    $root = $_SERVER['DOCUMENT_ROOT'].'/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/esd/';

    require($_SERVER['DOCUMENT_ROOT'].'/esd/includes/config.inc.php');

}
$location = $roothttp . 'elearn.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
if (!isset($_SESSION['user_id'])) {

    // Need the functions:
    require ($root . 'includes/login_functions.php');
    redirect_login($location);
}

?> 

<script src="<?php echo $roothttp . 'includes/generaljs.js'; ?>" type="text/javascript"></script>
<script src="<?php echo $roothttp . 'includes/jquery.min.js'; ?>" type="text/javascript"></script>



<?php

$formv1 = new formGenerator;
$general = new general;
$video = new video;
$tagCategories = new tagCategories;

//!change title

$page_title = 'Tag Editor';

// Include the header file:
include($root . '/includes/header.php');
include($root . '/includes/naviCreator.php');

// Page content
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
    <title></title>
</head>

<body>
    <div id="content" class="content">
	    
        <div class="responsiveContainer white">
	        
            <div class="row">
                <div class="col-9">
                    <h2 style='text-align:left;'>Tag Manager</h2>
                </div>

                <div id='messageBox' class="col-3 yellow-light narrow center">
                    <p>Add or Edit Tags</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2"></div>

                <div class="col-8 narrow">
                    <p>Displaying current categories and tags</p>
                </div>

                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-2"></div>

                <div id='tagCategoryDisplayBox' class="col-4 yellow-light narrow center">
                    <p><b>Tag Category</b></p>
                    
                    <br/>

                    <p><?php

                    echo $formv1->generateSelectCustom('Category', 'tagCategory', '', $tagCategories->getAllTagCategories(), 'Category of Tag');
                    ?></p>
					
					<br/>
					
					<p><button id='addTagCategory'>New Tag Category</button></p>
					
					<p><button id='editTagCategory'>Edit Tag Category</button></p>

					
                    <p><button id='deleteTagCategory'>Delete this tag category</button></p>
                </div>

                <div id='tagDisplayBox' class="col-4 yellow-light narrow center">
                    <p><b>Tag</b></p>
                    
                    <br/>

                    <p><?php

                    echo $formv1->generateSelectCustom('Tag', 'tag', '', array('default' => 'first select category'), 'Tag name');


                    ?></p>
                    
                   <br/>
					
					<p><button id='addTag'>New Tag (in selected category)</button></p>
					
					<p><button id='editTag'>Edit Selected Tag </button></p>

					
                    <p><button id='deleteTag'>Delete this tag</button></p>
                </div>

                <div class="col-2"></div>
            </div>

            <div class="row" id='newTagCategory' style='display:none;'>
               
               <div class="col-2"></div>
                <div class="col-8">
                    <fieldset>
                        <form id='tagCategoriesEntryForm' style='text-align:left;'>
                            <?php

                            echo $formv1->generateText('Name of new category:', 'tagCategoryName', null, 'Name of tagCategories, max characters 200');
                            echo '<br>';

                            echo $formv1->generateSelect('Active on Site?', 'active', '', 'Yes_No', 'Is this tagCategories visible on the site');
                            echo '<br>';


                            echo $formv1->generateSubmit('submitList', null, 'Submit', null);






                            ?>
                        </form>
                    </fieldset>
                </div>
                               <div class="col-2"></div>

            </div>
            
            <div class="row" id='newTag' style='display:none;'>
                <div class="col-2"></div>
                <div class="col-8">
                    <fieldset>
                        <form id='tagEntryForm' style='text-align:left;'>
                            <?php

                            echo $formv1->generateText('Name of new tag:', 'tagName', null, 'Name of tag, max characters 200');
                            echo '<br>';

                            

                            echo $formv1->generateSubmit('submitTag', null, 'Submit', null);






                            ?>
                        </form>
                    </fieldset>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-2"></div>

                <div class="col-8" id='videoDisplayContainer'></div>

                <div class="col-2"></div>
            </div>
        </div>
    </div>

<script src="../dist/jquery.vimeo.api.min.js" type="text/javascript"></script>
<script type="text/javascript">


var edit = null;
    
var editTag = null;

var tagCategoriesid = null;

var tagid = null;

var siteRoot = 'http://localhost:90/dashboard/esd/';


$("#tag").prop('disabled', true);


function hideForms () {
	
	$('#newTag').hide();

    $('#newTagCategory').hide();
	
	
}

function refreshTagCategorySelector () {
	
	//disable the selector
	
	$("#tagCategory").prop('disabled', true);
	
	//ajax command to get the data
	
	fields = new Object;
	
	fields['Identifier'] = 'id';
	fields['Tag Name'] = 'tagCategoryName';

	
	
	var selectorObject = getDataQuery('tagCategories', '', fields, '1');
	
	//console.log(selectorObject);
	
	selectorObject.done(function (data){
		
		console.log(data);
		
		var formData = $.parseJSON(data);
		
		$("#tagCategory").find('option').remove().end().append('<option value hidden selected>please select</option>');
        
        var id = null;
        var tagCategoryName = null;
        
	    $.each(formData, function(i,v){
    
	        //console.log ('i is'+i);
			//console.log ('v is'+v);
	        
	        $.each(v, function(i1,v1){
				
				if (i1 == 'id'){
					
					id = v1;
					
				}
				
				if (i1 == 'tagCategoryName'){
					
					tagCategoryName = v1;
					
				}
				
				
			})
		
			$("#tagCategory").find('option').end().append("<option value = " + id + ">" + id + ' - ' + tagCategoryName + "<\/option>");
			
		
		})

		
	});
	
	$("#tagCategory").prop('disabled', false);
	
}

function getTagForCategory() {

    var category = $('#tagCategory').val();

    if (category) {

        $("#tagCategory").prop('disabled', true);
        $("#tag").prop('disabled', true);


        $.ajax({
            url: 'getTagForCategory.php',
            type: 'GET',
            data: 'category=' + category,
            success: function(response) {
                console.log('response is ' + response);

                if (response == 'null') {


                    $("#tag").find('option').remove().end().append("<option>No tags in this category<\/option>");
                    $("#tag").prop('disabled', true);


                } else {

                    var responseObject = $.parseJSON(response);


					$("#tag").find('option').remove();
					
                    $.each(responseObject, function(i, word) {
                        $("#tag").find('option').end().append("<option value = " + i + ">" + i + ' - ' + word + "<\/option>");
                    });


                }

                //use response to update the tag dropdown


            },
            error: function(exception) {
                alert('Submission incomplete, please try again');
            }
        });

        $("#tagCategory").prop('disabled', false);
        $("#tag").prop('disabled', false)

    }

}

function deleteTagCategory() {
    
    var tagCategory = $('#tagCategory').val();
    
    if (confirm('Do you wish to delete this tag category? (This will delete all tags associated with the category)')) {
        if (tagCategory) {
            $("#tagCategory").prop('disabled', true);
            $.ajax({
                url: 'deleteTagCategory.php',
                type: 'GET',
                data: 'tagCategory=' + tagCategory,
                success: function(response) {
                    console.log('response is ' + response);
                    if (response == 1) {
                        alert('Tag Category ' + tagCategory + ' Deleted');
                        location.reload();
                        //re-enable inputs on done
                    }
                    if (response == 0 || response == 2) {
                        alert('Error.  Perhaps the selected tag category contains tags');
                        //re-enable inputs on done
                    }
                },
                error: function(exception) {
                    alert('Error, please try again');
                }
            });
            $("#tagCategory").prop('disabled', false);
        } else {
            $("#messageBox").html('<p>Must select a valid tag</p>');
        }
    }
    
}

function deleteTag() {
	
    var tag = $('#tag').val();
    
    if (confirm('Do you wish to delete this tag?')) {
        if (tag) {
            $("#tag").prop('disabled', true);
            $.ajax({
                url: 'deleteTag.php',
                type: 'GET',
                data: 'tag=' + tag,
                success: function(response) {
                    console.log('response is ' + response);
                    if (response == 1) {
                        alert('Tag ' + tag + ' Deleted');
                        location.reload();
                        //re-enable inputs on done
                    }
                    if (response == 0 || response == 2) {
                        alert('Error.  Please try again');
                        //re-enable inputs on done
                    }
                },
                error: function(exception) {
                    alert('Error, please try again');
                }
            });
            $("#tag").prop('disabled', false);
        } else {
            $("#messageBox").html('<p>Must select a valid tag</p>');
        }
    }
    
}

function submitTagCategoryNew() {

    if (edit === null){

       
        $("#submitList").prop('disabled', true);
        
        var data = pushDataFromForm('tagCategoriesEntryForm', 'tagCategories', '', '', '0');

        $.ajax({
            url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
            type: 'GET',
            data: data,
            success: function(response) {
                console.log('response is ' + response);
                if (response) {

                    //alert('Video Added');

					if (response > 0){

                    $("#messageBox").html('<p>Tag category added.  New tag category id is ' + response + '<\/p>');
                    
                    refreshTagCategorySelector();
                   

					}

                    //set video id to the last insert id

                    //var edit = 1;
                    //re-enable inputs on done

                } else {

                    alert('Error, please reload');

                    //re-enable inputs on done


                }

            },
            error: function(exception) {
                alert('Submission incomplete, please try again');
            }
        });

        $("#submitList").prop('disabled', false);
        
        $('#newTagCategory').hide();

	} else if (edit === 1){
			
		var categorySelectorValue = $('#tagCategory').val();
			
		$("#submitList").prop('disabled', true);
		
		//but this needs to be a join, not in this case
		
		var data = pushDataFromForm('tagCategoriesEntryForm', 'tagCategories', 'id', categorySelectorValue, '1');
		
		$.ajax({
            url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
            type: 'GET',
            data: data,
            success: function(response) {
                console.log('response is ' + response);
                //if (response) {

			            if (response == 1){
				            
				            console.log('Data Updated');
				            responseVariable = 'Tag updated';
				            $("#messageBox").html('<p>' + responseVariable + '<\/p>')

							alert('Tag updated');
							refreshTagCategorySelector ();

           
                    
							//location.reload();
				            
			            } else {
				            
				            console.log('Error, try again');
				            responseVariable = 'Error, try again';
				            $("#messageBox").html('<p>' + responseVariable + '<\/p>')

				            
				            
			            }
			            
			
			            

            },
            error: function(exception) {
                alert('An error occurred, please try again');
            }
            
        });
		
        
        $("#submitList").prop('disabled', false);
        
        $('#newTagCategory').hide();
			
			
	}


}

function submitTagNew() {
		
	var tagCategory = $('#tagCategory').val();

    if (editTag === 1) {


        var categorySelectorValue = $('#tag').val();
			
		$("#submitTag").prop('disabled', true);
		
		//but this needs to be a join, not in this case
		
		var data = pushDataFromForm('tagEntryForm', 'tags', 'id', categorySelectorValue, '1');
		
		$.ajax({
            url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
            type: 'GET',
            data: data,
            success: function(response) {
                console.log('response is ' + response);
                //if (response) {

			            if (response == 1){
				            
				            console.log('Data Updated');
				            responseVariable = 'Tag updated';
				            $("#messageBox").html('<p>' + responseVariable + '<\/p>')

							alert('Tag updated');
							refreshTagCategorySelector ();

							$("#tag").find('option').remove().end().append("<option>First select category</option>");
							$("#tag").prop('disabled', true);
                    
							//location.reload();
				            
			            } else {
				            
				            console.log('Error, try again');
				            responseVariable = 'Error, try again';
				            $("#messageBox").html('<p>' + responseVariable + '<\/p>')

				            
				            
			            }
			            
			
			            

            },
            error: function(exception) {
                alert('An error occurred, please try again');
            }
            
        });
		
        
        $("#submitTag").prop('disabled', false);
        
        $('#newTag').hide();




    } else if (editTag === null) {
        
        $("#submitTag").prop('disabled', true);
	
		var data = pushDataFromForm('tagEntryForm', 'tags', null, null, '0');
		
		$.ajax({
            url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
            type: 'GET',
            data: data + '&category=' +tagCategory,
            sucess: function(response) {
                
                //console.log('response is ' + response);
                //if (response) {

			        if (response > 0){
				            
				            console.log('Data Updated');
				            responseVariable = 'Insert ID =' + response;
				            
				            
                    //$("#submitList").html('Update tag data');


                    alert('Tag added.  New tag id is ' + response);


                    tagid = response;
                    
                    location.reload();
				            
			            } else {
				            
				            console.log('Error, try again');
				            responseVariable = 'Error, try again';
				            
				            
			            }
			            
			
			            

            },
            error: function(exception) {
                alert('An error occurred, please try again');
            }
            
        });
		
        
        $("#submitTag").prop('disabled', false);

        //var edit = 1;

    }

}


$(document).ready(function() {


    /*
    if (videoData != "") {

    $(videoData).each(function(i,val){
    $.each(val,function(k,v){
        $('#'+k).val(v);
        //console.log(k+" : "+ v);
    });

    })};
    */


    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );

    $('#tagCategoriesEntryForm').validate({

        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            console.log('there were ' + errors + 'errors');
            if (errors) {
                var message = errors == 1 ?
                    'You missed 1 field. It has been highlighted' :
                    'You missed ' + errors + ' fields. They have been highlighted';
                $("div.error span").html(message);
                $("div.error").show();
            } else {
                $("div.error").hide();
            }
        },
        rules: {

            tagCategoryName: {
                required: true,
            },



            active: {
                required: true,

            },




        },
        messages: {

            tagCategoryName: {
                required: 'please enter the name of the video',


            },



            active: {
                required: 'Please specify whether this video will be active on the site',

            },




        },

        submitHandler: function(form) {

            if (edit == 1) {
                submitTagCategoryNew();
            }
            if (edit == null) {



                submitTagCategoryNew();


            }




        }




    });
    
    $('#tagEntryForm').validate({

        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            console.log('there were ' + errors + 'errors');
            if (errors) {
                var message = errors == 1 ?
                    'You missed 1 field. It has been highlighted' :
                    'You missed ' + errors + ' fields. They have been highlighted';
                $("div.error span").html(message);
                $("div.error").show();
            } else {
                $("div.error").hide();
            }
        },
        rules: {

            /*tagName: {
                required: true,
            },*/






        },
        messages: {

            /*
            tagName: {
                required: 'please enter the name of the tag',


            },

*/



        },

        submitHandler: function(form) {

            /*if (edit == 1) {
                submitTagCategoryNew();
            }
            if (edit == null) {



                submitTagCategoryNew();


            }
			*/
			submitTagNew();



        }




    });

    $('#content').on("click", "#submitList", (function() {
        $("#tagCategoriesEntryForm").submit();


    }));
    
    $('#content').on("click", "#submitTag", (function() {
       
       $("#tagEntryForm").submit();


    }));

    $('#content').on("change", "#tagCategory", (function() {
        getTagForCategory();
        hideForms ();


    }));

    $('#content').on("click", "#deleteTagCategory", (function() {
        deleteTagCategory();


    }));

    $('#content').on("click", "#deleteTag", (function() {
        deleteTag();


    }));

    $('#content').on("click", "#addTagCategory", (function() {

		edit = null;

		resetFormElements('tagCategoriesEntryForm');

        $('#newTagCategory').show();

        $('#newTag').hide();

        //deleteTag ();


    }));

    $('#content').on("click", "#addTag", (function() {

        var categorySelectorValue = $('#tagCategory').val();

        if (categorySelectorValue) {

			editTag = null;
			
			resetFormElements('tagEntryForm');

			
            $('#newTag').show();

            $('#newTagCategory').hide();

            //deleteTag ();

        } else {

            alert('First select category');


        }


    }));
    
	$('#content').on("click", "#editTagCategory", (function() {

        var categorySelectorValue = $('#tagCategory').val();

            
            if (categorySelectorValue) {
	            
	        edit = 1;
	            
	        getDataForForm('tagCategories', 'id', categorySelectorValue, 
getNamesFormElements('tagCategoriesEntryForm'));

            $('#newTag').hide();

            $('#newTagCategory').show();

            //deleteTag ();

        } else {

            alert('First select category');


        }

    }));    
     
    $('#content').on("click", "#editTag", (function() {

        var tagSelectorValue = $('#tag').val();

        if (tagSelectorValue == 'No tags in this category' || tagSelectorValue == null) {

            alert('First select a tag');

            //deleteTag ();

        } else {

            
            editTag = 1;
            
            getDataForForm('tags', 'id', tagSelectorValue, 
getNamesFormElements('tagEntryForm'));
            
            
            
            $('#newTag').show();

            $('#newTagCategory').hide();


        }


    }));


});

</script>


<?php

    // Include the footer file to complete the template:
    include($root .'/includes/footer.php');




    ?>
</body>
</html>
