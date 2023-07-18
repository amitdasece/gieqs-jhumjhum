switch (true) {
  case winLocation("gieqs.com"):
    var rootFolder = "https://www.gieqs.com/";
    break;
  case winLocation("localhost"):
    //var rootFolder = "http://localhost:90/dashboard/gieqs/";
    var rootFolder = "http://localhost/gieqs/";
    break;

  // case winLocation("gieqs.co.uk"):
  //   //var rootFolder = "http://localhost:90/dashboard/gieqs/";
  //   var rootFolder = "https://gieqs.co.uk/";
  //   break;
  // case winLocation("gieqs.localhost"):
  //   var rootFolder = "http://localhost/gieqs/";
  //   break;
  default:
    // set whatever you want
    var rootFolder = window.location.origin + "/";
    break;
}

var siteRoot = rootFolder;
console.log(siteRoot);
/* function ensureMenuBarColorCorrect () {
	
	var colorMenuBar = $('.title').css('color');
	
	console.log(colorMenuBar);
	
	var backgroundColor = $('#menu').css('background-color');

	if (backgroundColor == 'rgb(255, 255, 255)'){
		
		$('.title').css('color', 'black');
		
	}
	
} */

function openInNewTab(url) {
  var win = window.open(url, "_blank");
  win.focus();
}

//function for getting bulk data with an optional query string used as the where clause and output as json or a html table
function getDataQuery(table, query, fieldsToGetObject, outputFormat) {
  //outputFormat is 1 JSON 2 Table of HTML

  //ideA TO USE

  /*
		
		hello = new Object;
		
		hello['Identifier'] = 'id';
	
		getDataQuery('tags', '', hello, '1');
	
		
		*/

  uriQuery = encodeURI(query);

  var datastring = "table=" + table;

  datastring = datastring + "&outputFormat=" + outputFormat;

  if (query) {
    datastring = datastring + "&query=" + uriQuery;
  }

  datastring = datastring + "&" + jQuery.param(fieldsToGetObject);

  console.log("Requested data was " + datastring);

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQuery.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "get",
    data: datastring,
  });
}

function getDataQueryLearning(table, query, fieldsToGetObject, outputFormat) {
  //outputFormat is 1 JSON 2 Table of HTML

  //ideA TO USE

  /*
		
		hello = new Object;
		
		hello['Identifier'] = 'id';
	
		getDataQuery('tags', '', hello, '1');
	
		
		*/

  uriQuery = encodeURI(query);

  var datastring = "table=" + table;

  datastring = datastring + "&outputFormat=" + outputFormat;

  if (query) {
    datastring = datastring + "&query=" + uriQuery;
  }

  datastring = datastring + "&" + jQuery.param(fieldsToGetObject);

  console.log("Requested data was " + datastring);

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQueryLearning.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "get",
    data: datastring,
  });
}

function getFormData($form) {
  var unindexed_array = $form.serializeArray();
  var indexed_array = {};

  $.map(unindexed_array, function(n, i) {
    indexed_array[n["name"]] = n["value"];
  });

  return indexed_array;
}

/* function objectifyForm(formArray) {//serialize data function

	var returnArray = {};
	for (var i = 0; i < formArray.length; i++){
	  returnArray[formArray[i]['name']] = formArray[i]['value'];
	}
	return returnArray;
  } */

function getFormDatav2($form, table, identifier, identifierKey, update) {
  var unindexed_array = $form.serializeArray();
  //console.dir(unindexed_array);
  var indexed_array = {};

  indexed_array["table"] = table;
  indexed_array["identifier"] = identifier;
  indexed_array["identifierKey"] = identifierKey;
  indexed_array["update"] = update;

  $.map(unindexed_array, function(n, i) {
    indexed_array[n["name"]] = n["value"];
  });

  //$("#centre").select2('data')
  //FORM
  //0 {selected: false, disabled: false, text: "Thu 08 Oct 2020 Plenary", id: "29", _resultId: "select2-centre-result-j08e-29", …}
  //1 {selected: false, disabled: false, text: "Thu 08 Oct 2020 Complex", id: "30", _resultId: "select2-centre-result-todw-30", …}

  return indexed_array;
}

function getFormDatav3($form, table, identifier, identifierKey, update) {
  //push any data-disabled = true from $form;

  $form = $form.find("input, select, textarea").filter(function() {
    if ($(this).attr("data-disabled") == "true") return false;

    if ($(this).hasClass("select2-searchField") === true) return false;

    return true;
  });

  var formObject = $form.serializeObject();

  formObject.table = table;
  formObject.identifier = identifier;
  formObject.identifierKey = identifierKey;
  formObject.update = update;

  //$("#centre").select2('data')
  //FORM
  //0 {selected: false, disabled: false, text: "Thu 08 Oct 2020 Plenary", id: "29", _resultId: "select2-centre-result-j08e-29", …}
  //1 {selected: false, disabled: false, text: "Thu 08 Oct 2020 Complex", id: "30", _resultId: "select2-centre-result-todw-30", …}

  return formObject;
}

function getFormDatav2Modifier(
  $form,
  table,
  identifier,
  identifierKey,
  update,
  modifier
) {
  var unindexed_array = $form.serializeArray();
  var indexed_array = {};

  indexed_array["table"] = table;
  indexed_array["identifier"] = identifier;
  indexed_array["identifierKey"] = identifierKey;
  indexed_array["update"] = update;

  $.map(unindexed_array, function(n, i) {
    var modifiedName = n["name"].replace("SI", "");
    indexed_array[modifiedName] = n["value"];
  });

  return indexed_array;
}

function pushFormDataJSON($form, table, identifierKey, identifier, update) {
  //var $form = $(form);
  //var data = getFormDatav2($form, table, identifier, identifierKey, update);	//updated to v3
  var data = getFormDatav2($form, table, identifier, identifierKey, update);

  //TODO add identifier and identifierKey

  console.log(data);

  data = JSON.stringify(data);

  console.log(data);

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQueryJSONv2.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "POST",
    contentType: "application/json",
    data: data,
  });
}

function pushFormDataJSONv2($form, table, identifierKey, identifier, update) {
  //var $form = $(form);
  //var data = getFormDatav2($form, table, identifier, identifierKey, update);	//updated to v3
  var data = getFormDatav3($form, table, identifier, identifierKey, update);

  //TODO add identifier and identifierKey

  console.log(data);

  data = JSON.stringify(data);

  console.log(data);

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQueryJSONv2.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "POST",
    contentType: "application/json",
    data: data,
  });
}

function pushFormDataJSONModifier(
  $form,
  table,
  identifierKey,
  identifier,
  update,
  modifier
) {
  //var $form = $(form);
  var data = getFormDatav2Modifier(
    $form,
    table,
    identifier,
    identifierKey,
    update,
    modifier
  );

  //TODO add identifier and identifierKey

  console.log(data);

  data = JSON.stringify(data);

  console.log(data);

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQueryJSONv2.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "POST",
    contentType: "application/json",
    data: data,
  });
}

function JSONDataQuery(table, dataObject, outputFormat) {
  //uriQuery = encodeURI(query);

  dataObject.table = table;

  dataObject.outputFormat = outputFormat;

  //var datastring = 'table='+ table;

  //datastring = datastring + '&outputFormat=' + outputFormat;

  //datastring = datastring + '&' + jQuery.param(fieldsToGetObject);

  console.log(JSON.stringify(dataObject));

  var datastring = JSON.stringify(dataObject);

  console.log("Requested data was " + datastring);

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQueryJSON.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "POST",
    contentType: "application/json",
    data: datastring,
  });
}

function JSONStraightDataQuery(table, query, outputFormat) {
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
    url: siteRoot + "assets/scripts/masterAjaxDataReturnQueryJSON.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
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

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return false;
}

//function for attaching to a second id with join

function pushDataFromFormJoin(
  form,
  table,
  identifierKey,
  identifier,
  joinIdentifier,
  joinIdentifierKey,
  updateType
) {
  //form is jquery array of form elements
  //need to do the validation prior to this
  //update types
  // update 0 INSERT INTO

  // update 1 UPDATE

  // update 2 DELETE

  var formString = "form#" + form + " :input";

  var responseVariable = null;

  formElements = $(formString).not("button");

  var formElementsReadable = getDataFormElements(form);

  //console.log(formElementsReadable);

  //now need the contents not the names of these elements

  var formData = new Object();

  //here provide the form elements as jquery array

  //update form elements to readable array

  var data =
    "table=" +
    table +
    "&identifierKey=" +
    identifierKey +
    "&identifier=" +
    identifier +
    "&joinIdentifierKey=" +
    joinIdentifierKey +
    "&joinIdentifier=" +
    joinIdentifier +
    "&update=" +
    updateType +
    "&" +
    jQuery.param(formElementsReadable);

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

function pushDataFromForm(form, table, identifierKey, identifier, updateType) {
  //form is jquery array of form elements
  //need to do the validation prior to this
  //update types
  // update 0 INSERT INTO

  // update 1 UPDATE

  // update 2 DELETE

  var formString = "form#" + form + " :input";

  var responseVariable = null;

  formElements = $(formString).not("button");

  var formElementsReadable = getDataFormElements(form);

  //console.log(formElementsReadable);

  //now need the contents not the names of these elements

  var formData = new Object();

  //here provide the form elements as jquery array

  //update form elements to readable array

  var data =
    "table=" +
    table +
    "&identifierKey=" +
    identifierKey +
    "&identifier=" +
    identifier +
    "&update=" +
    updateType +
    "&" +
    jQuery.param(formElementsReadable);

  //console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return data;
}

function pushDataFromFormModifier(
  form,
  table,
  identifierKey,
  identifier,
  updateType,
  modifier
) {
  //form is jquery array of form elements
  //need to do the validation prior to this
  //update types
  // update 0 INSERT INTO

  // update 1 UPDATE

  // update 2 DELETE

  var formString = "form#" + form + " :input";

  var responseVariable = null;

  formElements = $(formString).not("button");

  var formElementsReadable = getDataFormElementsModifier(form);

  //console.log(formElementsReadable);

  //now need the contents not the names of these elements

  var formData = new Object();

  //here provide the form elements as jquery array

  //update form elements to readable array

  var data =
    "table=" +
    table +
    "&identifierKey=" +
    identifierKey +
    "&identifier=" +
    identifier +
    "&update=" +
    updateType +
    "&" +
    jQuery.param(formElementsReadable);

  //console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return data;
}

function pushDataFromFormAJAX(
  form,
  table,
  identifierKey,
  identifier,
  updateType
) {
  //form is jquery array of form elements
  //need to do the validation prior to this
  //update types
  // update 0 INSERT INTO

  // update 1 UPDATE

  // update 2 DELETE

  var formString = "form#" + form + " :input";

  var responseVariable = null;

  formElements = $(formString).not("button");

  var formElementsReadable = getDataFormElements(form);

  console.log(formElementsReadable);

  //now need the contents not the names of these elements

  var formData = new Object();

  //here provide the form elements as jquery array

  //update form elements to readable array

  var data =
    "table=" +
    table +
    "&identifierKey=" +
    identifierKey +
    "&identifier=" +
    identifier +
    "&update=" +
    updateType +
    "&" +
    jQuery.param(formElementsReadable);

  console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return $.ajax({
    url: siteRoot + "assets/scripts/masterClassInteractor.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "get",
    data: data,
  });
}

function pushDataAJAX(
  table,
  identifierKey,
  identifier,
  updateType,
  datainputobject
) {
  //form is jquery array of form elements
  //need to do the validation prior to this
  //update types
  // update 0 INSERT INTO

  // update 1 UPDATE

  // update 2 DELETE

  //here provide the form elements as jquery array

  //update form elements to readable array

  var data =
    "table=" +
    table +
    "&identifierKey=" +
    identifierKey +
    "&identifier=" +
    identifier +
    "&update=" +
    updateType +
    "&" +
    jQuery.param(datainputobject);

  //console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return $.ajax({
    url: siteRoot + "assets/scripts/masterAjaxDatabaseUpdateScript.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "get",
    data: data,
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
  var formData = new Object();

  var data =
    "table=" +
    table +
    "&identifierKey=" +
    identifierKey +
    "&identifier=" +
    identifier +
    "&" +
    jQuery.param(formElements);

  console.log(data);

  request = $.ajax({
    url: siteRoot + "scripts/masterAjaxDataReturn.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "get",
    data:
      "table=" +
      table +
      "&identifierKey=" +
      identifierKey +
      "&identifier=" +
      identifier +
      "&" +
      jQuery.param(formElements),
  });

  request.done(function(response, textStatus, jqXHR) {
    console.log(response);
    if (response) {
      //decode json

      var formData = $.parseJSON(response);

      //write data to form

      $.each(formData, function(k, v) {
        $("#" + k).val(v);
      });
    }
  });
}

function getNamesFormElements(formName) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input:not(button, [data-disabled])";

  $(document)
    .find(formString)
    .not("button")
    .each(function() {
      name = $(this).attr("name");

      names[x] = name;

      x++;
    });

  console.log(names);

  return names;
}

function getDataFormElements(formName) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input";

  $(formString)
    .not("button")
    .each(function() {
      name = $(this).attr("name");

      value = $(this).val();

      names[name] = value;

      x++;
    });

  return names;
}

function getDataFormElementsModifier(formName, modifier) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input";

  $(formString)
    .not("button")
    .each(function() {
      name = modifier + $(this).attr("name");

      value = $(this).val();

      names[name] = value;

      x++;
    });

  return names;
}

function resetFormElements(formName) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input";

  $(formString)
    .not("button")
    .each(function() {
      $(this).val("");

      x++;
    });
}

function disableFormInputs(formName) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input";

  $(document)
    .find(formString)
    .each(function() {
      $(this).prop("disabled", true);

      x++;
    });
}

function enableFormInputs(formName) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input";

  $(formString).each(function() {
    $(this).prop("disabled", false);

    x++;
  });
}

/* var waitForFinalEvent = (function () {
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
	})();	 */

function isNormalInteger(str) {
  var n = Math.floor(Number(str));
  return n !== Infinity && String(n) === str && n >= 0;
}

function PopupCenter(url, title, w, h) {
  // Fixes dual-screen position                         Most browsers      Firefox
  var dualScreenLeft =
    window.screenLeft != undefined ? window.screenLeft : window.screenX;
  var dualScreenTop =
    window.screenTop != undefined ? window.screenTop : window.screenY;

  var width = window.innerWidth
    ? window.innerWidth
    : document.documentElement.clientWidth
    ? document.documentElement.clientWidth
    : screen.width;
  var height = window.innerHeight
    ? window.innerHeight
    : document.documentElement.clientHeight
    ? document.documentElement.clientHeight
    : screen.height;

  var left = width / 2 - w / 2 + dualScreenLeft;
  var top = height / 2 - h / 2 + dualScreenTop;
  var newWindow = window.open(
    url,
    title,
    "scrollbars=yes, width=" +
      w +
      ", height=" +
      h +
      ", top=" +
      top +
      ", left=" +
      left
  );

  // Puts focus on the newWindow
  if (window.focus) {
    newWindow.focus();
  }
}

function logout() {
  request = $.ajax({
    url: siteRoot + "/assets/scripts/logout.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "get",
    data: "",
  });

  request.done(function(data) {
    //alert(data);
    //var siteRootesd = siteRoot.replace('/learning/','');
    console.log(siteRoot + "index.php");
    window.location.href = siteRoot;
  });
}

function showLoginModal() {
  $(".modal").show();
  $(".darkClass").show();
  $(".modal").css("max-height", 800);
  $(".modal").css("max-width", 800);
  $(".modal").css("overflow", "scroll");

  $(".modal")
    .find(".modalContent")
    .html("<h3>Login to Endoscopy databases</h3>");

  $(".modal")
    .find(".modalContent")
    .append(
      '<form id="login" method="post"><p>Username: <input type="text" name="username" size="30" maxlength="80"></p><p> Password: <input type="password" name="password" size="30" maxlength="80"<p><br><button id="submitLogin" style="margin-right:5px;margin-left:5px;padding-left:8px;padding-right:8px;margin-bottom:8px;margin-top:8px;">Submit</button></p></form>'
    );
  //$('.modal').find('.modalContent').append('<p>Username: <input type="text" name="email" size="30" maxlength="80"></p>');
  // $('.modal').find('.modalContent').append('></p>');
  //$('.modal').find('.modalContent').append('<p><br><button id="submitLogin" style="margin-right:5px;margin-left:5px;padding-left:8px;padding-right:8px;margin-bottom:8px;">Submit</button></p>');
  //$('.modal').find('.modalContent').append('</form>');

  $(".modal")
    .find(".modalContent")
    .append('<div class="errorTxt" style="font-size:12px;"></div>');

  $(".modal")
    .find(".modalContent")
    .append(
      '<br><button id="signUp" style="margin-right:5px;margin-left:5px;padding-left:8px;padding-right:8px;">Sign Up</button><button id="forgot" style="margin-right:5px;margin-left:5px;padding-left:8px;padding-right:8px;">Forgot Password</button>'
    );

  $("#login").validate({
    invalidHandler: function(event, validator) {
      var errors = validator.numberOfInvalids();
      console.log("there were " + errors + "errors");
      if (errors) {
        var message =
          errors == 1
            ? "You missed 1 field. It has been highlighted"
            : "You missed " + errors + " fields. They have been highlighted";
        $("div.error span").html(message);
        $("div.error").show();
      } else {
        $("div.error").hide();
      }
    },
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      username: {
        required: "please enter your username",
      },
      password: {
        required: "please enter your password",
      },
    },

    errorElement: "div",
    errorLabelContainer: ".errorTxt",
    submitHandler: function(form) {
      login();

      console.log("submitted form");
    },
  });

  return;
}
function winLocation(term) {
  var contains = window.location.href.indexOf(term);

  if (contains > 0) {
    return true;
  } else {
    return false;
  }
}

function login() {
  //validate both boxes filled
  //check the login against the databse as per the elearn script
  //reload the page for logged in

  request = $.ajax({
    url: siteRoot + "/scripts/login.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    type: "POST",
    data: $("#login").serialize(),
  });

  request.done(function(data) {
    console.log(data);

    if (data == 1) {
      $(".modal")
        .find(".errorTxt")
        .show()
        .text("Successful Login");
      setTimeout(function() {
        window.location.reload();
      }, 1000);
    } else if (data == 4) {
      $(".modal")
        .find(".errorTxt")
        .show()
        .html(
          "Duplicate login attempt detected, you will be locked out for 15 minutes"
        );
      setTimeout(function() {
        $(".modal")
          .find(".errorTxt")
          .hide();
      }, 2000);
    } else {
      $(".modal")
        .find(".errorTxt")
        .show()
        .html("Unsuccessful Login, try again");
      setTimeout(function() {
        $(".modal")
          .find(".errorTxt")
          .hide();
      }, 2000);
    }

    //alert(data);
  });
}

/* function mobileMenuShow(){
	
	//check if already clicked
	
	var alreadyClicked = 0;
	
	$('.navbar').find('.topnav').each(function(){
	
		if ($(this).hasClass('responsive') == true){
			
			alreadyClicked = 1;
			
		}	
		
	})
	
	if (alreadyClicked == 0){
		
		$('.navbar').addClass('responsiveToolbar');
	
		//show the items floated in a new way
		
		$('.navbar').find('.topnav').each(function(){
	    	
	    	//add the required class
	    	$(this).addClass('responsive');
	    	$(this).show();
		})
		
		$('.navbar').find('.icon').each(function(){
	    	
	    	//add the required class
	    	$(this).addClass('responsive2');
	   
	   	})
		
	}else if (alreadyClicked == 1){
		
		$('.navbar').removeClass('responsiveToolbar');
	
		//show the items floated in a new way
		
		$('.navbar').find('.topnav').each(function(){
	    	
	    	//add the required class
	    	$(this).removeClass('responsive');
	    	$(this).hide();
		})
		
		$('.navbar').find('.icon').each(function(){
	    	
	    	//add the required class
	    	$(this).removeClass('responsive2');
	   
	   	})
		
		
	}
	
	
	//get items to show (everything with topnav)
	
	
	
	
		
	//that way is responsive
	
	
} */

$(document).ready(function() {
  $("#navbar-top-main").on("click", "#logout", function(e) {
    e.preventDefault();
    logout();
  });

  /*
	
	$('#userDisplay').on('click', '.login', function(e){
		
		e.preventDefault(); 
		showLoginModal();
		return false; 
		
	} );
	
	$('.modalContent').on('click', '#submitLogin', function(e){
		
		$('#login').submit();
		return false; 
		
		
	})
	
	ensureMenuBarColorCorrect (); */

  /* $('.tooltip').on('click', function() {	
	
	var tooltip = $(this).closest('tr').find('td:eq(0)').attr('title');
	
	//look for a tooltip in the first cell
	//var tooltip = $(this).find('td:eq(0)').attr('title');
	//console.log(tooltip);
	
    $(this).closest('tr').find('td:eq(2)').each (function() {	
		
		if ($(this).text() == ''){
		$(this).css("fontSize", 10);	
		$(this).text(tooltip);
		}else if ($(this).text() == tooltip){
		$(this).css("fontSize", 16);	

		$(this).text('');
		}

		
	});
}); */

  $(".reset").click(function() {
    //console.log('clicked');

    var desired = $(this).prev();

    $(desired).val("");

    //console.log(desired);
  });

  if ($.validator) {
    // $.validator is defined

    $.validator.setDefaults({
      highlight: function(element) {
        //$(element).closest('.form-control').addClass('bg-gieqsGold').addClass('text-white');
      },
      unhighlight: function(element) {
        //$(element).closest('.form-control').removeClass('bg-gieqsGold').removeClass('text-white');
      },
      errorElement: "div",
      errorClass: "input-group-btn pb-2 text-gieqsGold",
      errorPlacement: function(error, element) {
        if (element.parent(".input-group").length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
    });

    $.validator.addMethod(
      "regex",
      function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
      },
      "Please check your input."
    );

    jQuery.fn.serializeObject = function() {
      var arrayData, objectData;
      arrayData = this.serializeArray();
      objectData = {};

      $.each(arrayData, function() {
        var value;

        if (this.value != null) {
          value = this.value;
        } else {
          value = "";
        }

        if (objectData[this.name] != null) {
          if (!objectData[this.name].push) {
            objectData[this.name] = [objectData[this.name]];
          }

          objectData[this.name].push(value);
        } else {
          objectData[this.name] = value;
        }
      });

      return objectData;
    };
  }

  //!login validation
});
