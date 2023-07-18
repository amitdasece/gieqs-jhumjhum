switch (true) {
  case winLocation("gieqs.com"):
    var rootFolder = "https://www.gieqs.com/edm/";
    break;
  // case winLocation('localhost'):
  // var rootFolder = 'http://localhost:90/dashboard/gieqs/edm/';
  // break;
  case winLocation("localhost"):
    //var rootFolder = "http://localhost:90/dashboard/gieqs/";
    var rootFolder = "http://localhost/gieqs/edm";
    break;
  // case winLocation("gieqs.co.uk"):
  //   //var rootFolder = "http://localhost:90/dashboard/gieqs/";
  //   var rootFolder =
  //     "http://alb-gieqs-stage-new-1097212869.eu-west-3.elb.amazonaws.com/edm";
  //   break;
  // case winLocation("gieqs"):
  //   var rootFolder = "http://localhost/gieqs/edm";
  //   break;
  default:
    // set whatever you want
    var rootFolder = window.location.origin + "/edm/";
    break;
}

var siteRoot = rootFolder;

function ensureMenuBarColorCorrect() {
  var colorMenuBar = $(".title").css("color");

  console.log(colorMenuBar);

  var backgroundColor = $("#menu").css("background-color");

  if (backgroundColor == "rgb(255, 255, 255)") {
    $(".title").css("color", "black");
  }
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
    url: siteRoot + "scripts/masterAjaxDataReturnQuery.php",
    type: "get",
    data: datastring,
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

  //console.log('Requested data was '+datastring);

  return $.ajax({
    url: siteRoot + "scripts/masterAjaxDataReturnQueryJSON.php",
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

  console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return $.ajax({
    url: siteRoot + "scripts/masterClassInteractor.php",
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
    url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
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

  var formString = "form#" + formName + " :input";

  $(formString)
    .not("button")
    .each(function() {
      name = $(this).attr("name");

      names[x] = name;

      x++;
    });

  return names;
}

function getDataFormElements(formName) {
  var names = {};

  var x = 0;

  var formString = "form#" + formName + " :input";

  $(formString)
    .not("button")
    .each(function() {
      if ($(this).is(":checkbox")) {
        name = $(this).attr("name");

        if (checkedInputs) {
          console.log("found the checkedInputs array");

          if ($(this).is(":checked")) {
            value = "1";

            //console.log($(this).attr("name") + ' is checked');
          } else {
            console.log($(this).attr("name") + " is NOT checked");

            var stringToSearch = "#" + $(this).attr("id");

            if (checkedInputs.indexOf(stringToSearch) > -1) {
              //console.log($(this).attr("name") + ' WAS checked PREVIOUSLY so value 0');

              value = "0";
            } else {
              value = null; //does not submit the element

              //console.log($(this).attr("name") + ' WAS NOT checked PREVIOUSLY so value NULL');
            }
          }
        } else {
          if ($(this).is(":checked")) {
            value = "1";
          } else {
            value = "0";
          }
        }
      } else {
        name = $(this).attr("name");

        value = $(this).val();
      }

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

  $(formString).each(function() {
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

var waitForFinalEvent = (function() {
  var timers = {};
  return function(callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout(timers[uniqueId]);
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
    url: siteRoot + "logout.php",
    type: "get",
    data: "",
  });

  request.done(function(data) {
    //var siteRootesd = siteRoot.replace('/learning/','');
    console.log(siteRoot + "index.php");
    window.location.href = siteRoot + "index.php";
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

function mobileMenuShow() {
  //check if already clicked

  var alreadyClicked = 0;

  $(".navbar")
    .find(".topnav")
    .each(function() {
      if ($(this).hasClass("responsive") == true) {
        alreadyClicked = 1;
      }
    });

  if (alreadyClicked == 0) {
    $(".navbar").addClass("responsiveToolbar");

    //show the items floated in a new way

    $(".navbar")
      .find(".topnav")
      .each(function() {
        //add the required class
        $(this).addClass("responsive");
        $(this).show();
      });

    $(".navbar")
      .find(".icon")
      .each(function() {
        //add the required class
        $(this).addClass("responsive2");
      });
  } else if (alreadyClicked == 1) {
    $(".navbar").removeClass("responsiveToolbar");

    //show the items floated in a new way

    $(".navbar")
      .find(".topnav")
      .each(function() {
        //add the required class
        $(this).removeClass("responsive");
        $(this).hide();
      });

    $(".navbar")
      .find(".icon")
      .each(function() {
        //add the required class
        $(this).removeClass("responsive2");
      });
  }

  //get items to show (everything with topnav)

  //that way is responsive
}

$(document).ready(function() {
  $("#userDisplay").on("click", ".logout", function(e) {
    e.preventDefault();
    logout();
    return false;
  });

  $("#userDisplay").on("click", ".login", function(e) {
    e.preventDefault();
    showLoginModal();
    return false;
  });

  $(".modalContent").on("click", "#submitLogin", function(e) {
    $("#login").submit();
    return false;
  });

  ensureMenuBarColorCorrect();

  $(".tooltip").on("click", function() {
    var tooltip = $(this)
      .closest("tr")
      .find("td:eq(0)")
      .attr("title");

    //look for a tooltip in the first cell
    //var tooltip = $(this).find('td:eq(0)').attr('title');
    //console.log(tooltip);

    $(this)
      .closest("tr")
      .find("td:eq(2)")
      .each(function() {
        if ($(this).text() == "") {
          $(this).css("fontSize", 10);
          $(this).text(tooltip);
        } else if ($(this).text() == tooltip) {
          $(this).css("fontSize", 16);

          $(this).text("");
        }
      });
  });

  $(".reset").click(function() {
    //console.log('clicked');

    var desired = $(this).prev();

    $(desired).val("");

    //console.log(desired);
  });

  //!login validation
});
