//function for getting bulk data with an optional query string used as the where clause and output as json or a html table
function getDataQuery (table, query, fieldsToGetObject, outputFormat){

	//outputFormat is 1 JSON 2 Table of HTML
	
	//ideA TO USE
	
	/*
		
		hello = new Object;
		
		hello['Identifier'] = 'id';
	
		getDataQuery('tags', '', hello, '1');
	
		
		*/
	
	uriQuery = encodeURI(query);
	
	var datastring = 'table='+ table;
	
	datastring = datastring + '&outputFormat=' + outputFormat;
	
	
	if (query){
	
	datastring = datastring + '&query=' + uriQuery;
	
	}
	
	datastring = datastring + '&' + jQuery.param(fieldsToGetObject);
	
	console.log('Requested data was '+datastring);
	
	return $.ajax({
	        url: siteRoot + "scripts/masterAjaxDataReturnQuery.php",
	        type: "get",
	        data: datastring
	
	    });

}

function JSONDataQuery (table, dataObject, outputFormat){

	
	//uriQuery = encodeURI(query);
	
	dataObject.table = table;
	
	dataObject.outputFormat = outputFormat;
	
	//var datastring = 'table='+ table;
	
	//datastring = datastring + '&outputFormat=' + outputFormat;
	
	
	//datastring = datastring + '&' + jQuery.param(fieldsToGetObject);
	
	console.log(JSON.stringify(dataObject));
	
	var datastring = JSON.stringify(dataObject);
	
	//console.log('Requested data was '+datastring);
	
	return $.ajax({
		url: siteRoot + "scripts/masterAjaxDataReturnQueryJSON.php",
		type: "POST",
		contentType: "application/json",
		data: datastring,
	    });

}

function JSONStraightDataQuery (table, query, outputFormat){

	
	//uriQuery = encodeURI(query);
	
	var dataObject = new Object();
	
	dataObject.table = table;
	
	dataObject.outputFormat = outputFormat;
	
	dataObject.query = query;
	
	//var datastring = 'table='+ table;
	
	//datastring = datastring + '&outputFormat=' + outputFormat;
	
	
	//datastring = datastring + '&' + jQuery.param(fieldsToGetObject);
	
	console.log(JSON.stringify(dataObject));
	
	var datastring = JSON.stringify(dataObject);
	
	//console.log('Requested data was '+datastring);
	
	return $.ajax({
		url: siteRoot + "scripts/masterAjaxDataReturnQueryJSON.php",
		type: "POST",
		contentType: "application/json",
		data: datastring,
	    });

}

/*
    request.done(function(response, textStatus, jqXHR) {


        console.log(response);
        if (response) {

            //decode json
            
            if (outputFormat == 1){

            var formData = $.parseJSON(response);
            
            return formData;
            
            console.log(formData);
            }else{
					            
	            //table
	            console.log(response);

	            
            }

            //do something with the parsed respobse

            


        }


    })

}

*/

//function for attaching to a second id with join

function pushDataFromFormJoin (form, table, identifierKey, identifier, joinIdentifier, joinIdentifierKey, updateType){
	
	//form is jquery array of form elements
	//need to do the validation prior to this
	//update types 
	// update 0 INSERT INTO

	// update 1 UPDATE

	// update 2 DELETE
	
	var formString = 'form#' + form + ' :input';
	
	var responseVariable = null;

    formElements = $(formString).not('button');
	
	var formElementsReadable = getDataFormElements(form);
	
	//console.log(formElementsReadable);
	
	//now need the contents not the names of these elements
	
	
	var formData = new Object;
	
	//here provide the form elements as jquery array
	
	//update form elements to readable array
	
	var data = 'table=' + table + '&identifierKey=' + identifierKey + '&identifier=' + identifier + '&joinIdentifierKey=' + joinIdentifierKey + '&joinIdentifier=' + joinIdentifier + '&update=' + updateType + '&' + jQuery.param(formElementsReadable);
	
	//console.log(data);
	
	//disable form elements
	
	//pass this data to a standard ajax
	
	
	return data;

	

	
}

/* standard AJAX to use with above
	
	$.ajax({
            url: siteRoot + "scripts/masterAjaxJoinDatabaseUpdateScript.php",
            type: 'GET',
            data: data,
            success: function(response) {
                console.log('response is ' + response);
                //if (response) {

			            if (response == 1){
				            
				            console.log('Data Updated');
				            responseVariable = 'Data Updated';
				            
			            } 
			            
			            if (response == 0){
				            
				            console.log('Data Unchanged');
				             responseVariable = 'Data Unchanged';
				            
			            }else {
				            
				            console.log('Error, try again');
				            responseVariable = 'Error, try again';
				            
				            
			            }
			            

            },
            error: function(exception) {
                alert('An error occurred, please try again');
            }
            
        });
        
 */



function pushDataFromForm (form, table, identifierKey, identifier, updateType){
	
	//form is jquery array of form elements
	//need to do the validation prior to this
	//update types 
	// update 0 INSERT INTO

	// update 1 UPDATE

	// update 2 DELETE
	
	var formString = 'form#' + form + ' :input';
	
	var responseVariable = null;

    formElements = $(formString).not('button');
	
	var formElementsReadable = getDataFormElements(form);
	
	//console.log(formElementsReadable);
	
	//now need the contents not the names of these elements
	
	
	var formData = new Object;
	
	//here provide the form elements as jquery array
	
	//update form elements to readable array
	
	var data = 'table=' + table + '&identifierKey=' + identifierKey + '&identifier=' + identifier + '&update=' + updateType + '&' + jQuery.param(formElementsReadable);
	
	//console.log(data);
	
	//disable form elements
	
	//pass this data to a standard ajax
	
	
	return data;

	

	
}

function pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType){
	
	//form is jquery array of form elements
	//need to do the validation prior to this
	//update types 
	// update 0 INSERT INTO

	// update 1 UPDATE

	// update 2 DELETE
	
	var formString = 'form#' + form + ' :input';
	
	var responseVariable = null;

    formElements = $(formString).not('button');
	
	var formElementsReadable = getDataFormElements(form);
	
	//console.log(formElementsReadable);
	
	//now need the contents not the names of these elements
	
	
	var formData = new Object;
	
	//here provide the form elements as jquery array
	
	//update form elements to readable array
	
	var data = 'table=' + table + '&identifierKey=' + identifierKey + '&identifier=' + identifier + '&update=' + updateType + '&' + jQuery.param(formElementsReadable);
	
	//console.log(data);
	
	//disable form elements
	
	//pass this data to a standard ajax
	
	
	return $.ajax({
	        url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
	        type: "get",
	        data: data
	
	    });

	

	
}

function pushDataAJAX (table, identifierKey, identifier, updateType, datainputobject){
	
	//form is jquery array of form elements
	//need to do the validation prior to this
	//update types 
	// update 0 INSERT INTO

	// update 1 UPDATE

	// update 2 DELETE
	
	
	
	//here provide the form elements as jquery array
	
	//update form elements to readable array
	
	var data = 'table=' + table + '&identifierKey=' + identifierKey + '&identifier=' + identifier + '&update=' + updateType + '&' + jQuery.param(datainputobject);
	
	//console.log(data);
	
	//disable form elements
	
	//pass this data to a standard ajax
	
	
	return $.ajax({
	        url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
	        type: "get",
	        data: data
	
	    });

	

	
}

/*
	
Standard command

pushDataFromForm('tagCategoriesEntryForm', 'tagCategories', 'id', '11', '1')	
	
*/

/* standard AJAX to use with above
	
	$.ajax({
            url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
            type: 'GET',
            data: data,
            success: function(response) {
                console.log('response is ' + response);
                //if (response) {

			            if (response == 1){
				            
				            console.log('Data Updated');
				            responseVariable = 'Data Updated';
				            
			            } 
			            
			            if (response == 0){
				            
				            console.log('Data Unchanged');
				             responseVariable = 'Data Unchanged';
				            
			            }else {
				            
				            console.log('Error, try again');
				            responseVariable = 'Error, try again';
				            
				            
			            }
			            

            },
            error: function(exception) {
                alert('An error occurred, please try again');
            }
            
        });
        
 */


function getDataForForm(table, identifierKey, identifier, formElements) {

    var formData = new Object;

    var data = 'table=' + table + '&identifierKey=' + identifierKey + '&identifier=' + identifier + '&' + jQuery.param(formElements);

    console.log(data);


    request = $.ajax({
        url: siteRoot + "scripts/masterAjaxDataReturn.php",
        type: "get",
        data: 'table=' + table + '&identifierKey=' + identifierKey + '&identifier=' + identifier + '&' + jQuery.param(formElements)

    });

    request.done(function(response, textStatus, jqXHR) {


        console.log(response);
        if (response) {

            //decode json

            var formData = $.parseJSON(response);

            //write data to form

            $.each(formData, function(k, v) {
                $('#' + k).val(v);

            });



        }


    })


}


function getNamesFormElements(formName) {

    var names = {};

    var x = 0;

    var formString = 'form#' + formName + ' :input';

    $(formString).not('button').each(function() {

        name = $(this).attr("name");

        names[x] = name;

        x++;

    });

    return names;


}

function getDataFormElements(formName) {

    var names = {};

    var x = 0;

    var formString = 'form#' + formName + ' :input';

    $(formString).not('button').each(function() {

        name = $(this).attr("name");
        
        value = $(this).val();


        names[name] = value;

        x++;

    });

    return names;


}

function resetFormElements(formName) {

    var names = {};

    var x = 0;

    var formString = 'form#' + formName + ' :input';

    $(formString).not('button').each(function() {
        
        $(this).val('');

        x++;

    });



}

function disableFormInputs(formName) {

    var names = {};

    var x = 0;

    var formString = 'form#' + formName + ' :input';

    $(formString).each(function() {
        
        $(this).prop('disabled', true);

        x++;

    });



}

function enableFormInputs(formName) {

    var names = {};

    var x = 0;

    var formString = 'form#' + formName + ' :input';

    $(formString).each(function() {
        
        $(this).prop('disabled', false);

        x++;

    });



}

var waitForFinalEvent = (function () {
	  var timers = {};
	  return function (callback, ms, uniqueId) {
	    if (!uniqueId) {
	      uniqueId = "Don't call this twice without a uniqueId";
	    }
	    if (timers[uniqueId]) {
	      clearTimeout (timers[uniqueId]);
	    }
	    timers[uniqueId] = setTimeout(callback, ms);
	  };
	})();	
	
	
function isNormalInteger(str) {
    var n = Math.floor(Number(str));
    return n !== Infinity && String(n) === str && n >= 0;
}

function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}


