function winLocation(term) {
  var contains = window.location.href.indexOf(term);

  if (contains > 0) {
    return true;
  } else {
    return false;
  }
}
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

switch (true) {
  case winLocation("gieqs.com"):
    var rootFolder = "https://www.gieqs.com/pages/learning/";
    break;
  // case winLocation('localhost'):
  // 	var rootFolder = 'http://localhost:90/dashboard/gieqs/pages/learning/';
  // 	break;
  case winLocation("localhost"):
    //var rootFolder = "http://localhost:90/dashboard/gieqs/";
    var rootFolder = "http://localhost/gieqs/pages/learning/";
    break;
  // case winLocation("gieqs.co.uk"):
  //   //var rootFolder = "http://localhost:90/dashboard/gieqs/";
  //   var rootFolder = "https://gieqs.co.uk/pages/learning/";
  //   break;

  // case winLocation("gieqs.localhost"):
  //   var rootFolder = "http://localhost/gieqs/pages/learning/";
  //   break;
  // case winLocation("gieqs"):
  //   var rootFolder = "http://localhost/gieqs/pages/learning/";
  //   break;

  default:
    // set whatever you want
    var rootFolder = window.location.origin + "/pages/learning/";
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

function mysql_real_escape_string(str) {
  return str.replace(/[\0\x08\x09\x1a\n\r"'\\\%]/g, function(char) {
    switch (char) {
      case "\0":
        return "\\0";
      case "\x08":
        return "\\b";
      case "\x09":
        return "\\t";
      case "\x1a":
        return "\\z";
      case "\n":
        return "\\n";
      case "\r":
        return "\\r";
      case '"':
      case "'":
      case "\\":
      case "%":
        return "\\" + char; // prepends a backslash to backslash, percent,
      // and double/single quotes
    }
  });
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
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
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
    url: siteRoot + "scripts/masterAjaxDataReturnQueryJSON.php",
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

  //console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return $.ajax({
    url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
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

  console.log(data);

  //disable form elements

  //pass this data to a standard ajax

  return $.ajax({
    url: siteRoot + "scripts/masterAjaxDatabaseUpdateScript.php",
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
    url: siteRoot + "/../../../assets/scripts/logout.php",
    crossDomain: true,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
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
    .html("<h3>Login to EndoWiki</h3>");

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

function login() {
  //validate both boxes filled
  //check the login against the databse as per the elearn script
  //reload the page for logged in

  request = $.ajax({
    url: siteRoot + "scripts/login.php",
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

    /*$('.navbar').find('.icon').each(function(){
	    	
	    	//add the required class
	    	$(this).addClass('responsive2');
	   
	   	})*/
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

    /*$('.navbar').find('.icon').each(function(){
	    	
	    	//add the required class
	    	$(this).removeClass('responsive2');
	   
	   	})*/
  }

  //get items to show (everything with topnav)

  //that way is responsive
}

$(document).ready(function() {
  var $loading = $("#loading").hide();
  //Attach the event handler to any element
  $(document)
    .ajaxStart(function() {
      //ajax request went so show the loading image
      $loading.show();
    })
    .ajaxStop(function() {
      //got response so hide the loading image
      $loading.hide();
    });

  $("#navbar-top-main").on("click", "#logout", function(e) {
    e.preventDefault();
    logout();
  });

  $("#userDisplay").on("click", ".login", function(e) {
    e.preventDefault();
    showLoginModal();
    return false;
  });

  $(".content").on("click", ".login", function(e) {
    e.preventDefault();
    showLoginModal();
    return false;
  });

  $(".modalContent").on("click", "#submitLogin", function(e) {
    $("#login").submit();
    return false;
  });

  $(".referencelist").on("click", function() {
    //get the tag name

    var searchTerm = $(this).attr("data");

    console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm);

    PopupCenter(
      "https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
      "PubMed Search (endoWiki)",
      800,
      700
    );
  });

  $(".referencelist").on("mouseenter", function() {
    $(this).css("color", "#e62c45");
    $(this).css("cursor", "pointer");
  });

  $(".referencelist").on("mouseleave", function() {
    $(this).css("color", "white");
    $(this).css("cursor", "default");
  });

  $(".tagLink").on("mouseenter", function() {
    $(this).css("color", "#e62c45");
    $(this).css("cursor", "pointer");
  });

  $(".tagLink").on("mouseleave", function() {
    $(this).css("color", "white");
    $(this).css("cursor", "default");
  });

  $("#resetTable").on("click", function() {
    location.reload();
  });

  $(".navbar").on("click", ".logoLeft", function() {
    window.location = siteRoot + "/index.php";
  });

  $(".navbar").on("mouseenter", ".logoLeft", function() {
    $(this).css("cursor", "pointer");
  });

  $("#hideSearch").on("click", function() {
    $("#searchBox")
      .parent()
      .hide();

    if ($("#messageBox").find("#showSearchBox").length == 0) {
      $("#messageBox").append(
        '<button id="showSearchBox" type="button">Show Search Box</button>'
      );
    }
  });

  $(".content").on("click", "#showSearchBox", function() {
    if ($("#messageBox").find("#showSearchBox").length > 0) {
      $("#messageBox")
        .find("#showSearchBox")
        .remove();
    }

    $("#searchBox")
      .parent()
      .show();
  });

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

  ensureMenuBarColorCorrect();

  //!login validation

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
});
