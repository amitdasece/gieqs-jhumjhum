
		
		
			<?php

			$openaccess = 0;
			$requiredUserLevel = 1; //superuser only script
			
			require ('../../includes/config.inc.php');		
			
			require (BASE_URI1.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			$formv1 = new formGenerator;
            $general = new general;
            $helpers = new helpers;
			
			
		
		
		
		foreach ($_GET as $k=>$v){
		
			$sanitised = $general->sanitiseInput($v);
			$_GET[$k] = $sanitised;
		
		
		}
		
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
		
		
		
		//TERMINATE THE SCRIPT IF NOT A SUPERUSER
		
		
		
		// Page content
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>Helper for Database Entry</title>  <!-- CHANGE -->
            <style>
               
               .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
.pointer {

	cursor: pointer;
	display: none;
}

                    @media only screen and (max-width: 992px) {
                        
						.pointer {

							display: block;
						}

                        #sticky {

                            
								border: rgb(238, 194, 120), 1px;
							   right: 1%;
								display: none;
							
								z-index: 10;
								
								background-color: #162e4d;
								top: 25%;
								max-width: 50%;
								min-width: 50%;
							
    						

                        }

                    }
					@media only screen and (min-width: 992px) {
                        
						.pointer {

							display: none;
						}

                        #sticky {

                            
								position: fixed;
								display: block;
								top: 25%;
								
    						

                        }

                    }

               

}
            </style>
		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		include(BASE_URI1 . "/includes/topbar.php");
		include(BASE_URI1 . "/includes/naviv2.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer container mb-8'>
                <p class="h5 mt-5">Script to insert new database values</p>
                <form id="rowInsert">
                
                <div class="form-group">
                    <label for="nameValueListDatabase">Database Name</label>
                                                <div class="input-group mb-3">
                                                    <select id="nameValueListDatabase" type="text" data-toggle="select" class="form-control" name="nameValueListDatabase">
                                                    <option value="" selected disabled hidden>please select an option</option>
                                                    <option value="1">POEM</option>
                                                    
                                                    </select>

                      
                                        </div>
                                        <label for="type">Field Type</label>
                                                <div class="input-group mb-3">
                                                    <select id="type" type="text" data-toggle="select" class="form-control" name="type">
                                                    <option value="" selected disabled hidden>please select an option</option>
                                                    <option value="1">INT (11)</option>
                                                    <option value="2">INT (100)</option>
                                                    <option value="3">VARCHAR (11)</option>
                                                    <option value="4">VARCHAR (100)</option>
                                                    <option value="5">VARCHAR (800)</option>
                                                    <option value="6">DATE</option>
                                                    </select>

                      
                                        </div>
                                        
                                        
                                        <label for="position">Position</label>
                                        <div class="input-group mb-3">
                                            <input id="position" type="text" class="form-control" name="position">
                                        </div>
                                        <label for="order">Order</label>
            <div class="input-group mb-3">
                <input id="order" type="text" class="form-control" name="order">
            </div>
           
            <label for="field_type">Type</label>
                                                <div class="input-group mb-3">
                                                    <select id="field_type" type="text" data-toggle="select" class="form-control" name="field_type">
                                                    <option value="" selected disabled hidden>please select an option</option>
                                                    <option value="1">Value List [name will = database name]</option>
                                                    <option value="2">Free text</option>
                                                    <option value="3">Date</option>
                                                    <option value="4">Hidden</option>
                                                    
                                                    </select>

                      
                                        </div>

                                        <div class="input-group mb-3">
                                        <button id="addValueList" class="btn bg-dark text-white">Add Value List Field</button>
                                        <button id="removeValueList" class="btn bg-danger text-white">Remove All</button>
                                        </div>
                                        
                                       
            <label for="text" class="mt-3">Text</label>
            <div class="input-group mb-3">
                <input id="text" type="text" class="form-control" name="text">
            </div>
            <label for="tooltip">ToolTip</label>
            <div class="input-group mb-3">
                <input id="tooltip" type="text" class="form-control" name="tooltip">
            </div>

</div>

<button id="insertDataRow" class="mt-2 btn bg-primary text-white">Insert</button>


            </form>

<div id="result"></div>

               

                






        </div> <!--close container-->
		</div> <!--close content-->

			
		<script>



			

$.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    var siteRoot = rootFolder;
		
	$(document).ready(function(){

        $('#addValueList').prop('disabled', true);
        $('#removeValueList').prop('disabled', true);



        $('#field_type').on('change', function(e){

            //alert($(this).val());

            if ($(this).val() == 1){

                $('#addValueList').prop('disabled', false);

            }else{

                $('#addValueList').prop('disabled', true);

            }

        })

        $('#removeValueList').click(function(e){

            e.preventDefault();

            $('#rowInsert').find('.valueListField').each(function(){

                $(this).parent().parent().remove();

            })

            $(this).prop('disabled', true);

        })

        $('#addValueList').click(function(e){

            e.preventDefault();

            if ($(this).parent().parent().find('.valueListField').length > 0){

                $('#removeValueList').prop('disabled', false);

                var x = $(this).parent().parent().find('.valueListField').length + 1;
                
                $(this).parent().parent().find('.valueListField').last().parent().parent().after("<div class='form-row'><div class='col-md-1 mb-1'><label for='valueListFieldNumber"+x+"'>number</label><input type='text' class='form-control valueListFieldNumber noserialize' id='valueListFieldNumber"+x+"' name='valueListFieldNumber"+x+"'></div><div class='col-md-6 mb-1'><label for='valueListField"+x+"'>value list text</label><input type='text' class='form-control valueListField noserialize' id='valueListField"+x+"' name='valueListField"+x+"'></div></div>");

            }else{

                $('#removeValueList').prop('disabled', false);

                $(this).parent().after("<div class='form-row'><div class='col-md-1 mb-1'><label for='valueListFieldNumber1'>number</label><input type='text' class='form-control valueListFieldNumber noserialize' id='valueListFieldNumber1' name='valueListFieldNumber1'></div><div class='col-md-6 mb-1'><label for='valueListField1'>value list text</label><input type='text' class='form-control valueListField noserialize' id='valueListField1' name='valueListField1'></div></div>");
            }


        })

        $('#insertDataRow').click(function(e){

            e.preventDefault();
            


            var request2 = $.ajax({
            url: siteRoot + "scripts/helpers/insertCommand.php",
            type: "POST",
            contentType: "application/json",
            data: $('#rowInsert').find(":input:not('.noserialize')").serializeObject(),
            });



            request2.done(function (data) {
            // alert( "success" );
            $('#result').html(data);
            
            })


        })



    })
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI1 ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>