//social.js
//includes code for likes and favourites

$(document).ready(function() {
  //to include in extra social.js file later

  $(document).on("click", ".action-like", function() {
    //alert('hello');

    var videoid = $(this).attr("data");
    //alert(videoid);
    //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
    //$(this).children('.fa-thumbs-up').removeClass('text-muted');

    //AJAX to add the like

    var icon = $(this).children(".fa-thumbs-up");
    $(icon).prop("disabled", true);

    //change state

    //ajax to a script to update

    if ($(icon).hasClass("gieqsGold")) {
      var liked = 1; // already liked
      /* $(icon).addClass('text-muted');
        $(icon).removeClass('gieqsGold'); */
    } else {
      var liked = 0; // not liked yet
      /* $(icon).removeClass('text-muted');
        $(icon).addClass('gieqsGold'); */
    }

    $(icon).prop("disabled", false);

    if (liked == 0) {
      var type = 1;
    } else if (liked == 1) {
      var type = 2;
    }

    var dataToSend = {
      videoid: videoid,
      type: type,
    };

    //const jsonString2 = JSON.stringify(dataToSend);

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);
    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

    var request2 = $.ajax({
      beforeSend: function() {},
      url: siteRoot + "/pages/learning/scripts/useractions/updateUserLike.php",
      type: "POST",
      contentType: "application/json",
      data: jsonString,
    });

    request2.done(function(data) {
      // alert( "success" );
      if (data == 1) {
        //show green tick

        if (liked == 1) {
          $(icon).addClass("text-muted");
          $(icon).removeClass("gieqsGold");
          $(icon).removeClass("animated");
          $(icon).removeClass("heartBeat");
        } else if (liked == 0) {
          $(icon).removeClass("text-muted");
          $(icon).addClass("gieqsGold");
          $(icon).addClass("animated");
          $(icon).addClass("heartBeat");
        }

        //$('#notification-services').delay('1000').addClass('is-valid');
      }
      //$(document).find('.Thursday').hide();
      $(icon).prop("disabled", false);
    });

    //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
    //remove the check from the tag removed
  });

  $(document).on("click", ".action-favorite", function() {
    //alert('hello');

    var videoid = $(this).attr("data");
    //alert(videoid);
    //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
    //$(this).children('.fa-thumbs-up').removeClass('text-muted');

    //AJAX to add the like

    var icon = $(this).children(".fa-heart");
    $(icon).prop("disabled", true);

    //change state

    //ajax to a script to update

    if ($(icon).hasClass("gieqsGold")) {
      var liked = 1; // already liked
      /* $(icon).addClass('text-muted');
        $(icon).removeClass('gieqsGold'); */
    } else {
      var liked = 0; // not liked yet
      /* $(icon).removeClass('text-muted');
        $(icon).addClass('gieqsGold'); */
    }

    $(icon).prop("disabled", false);

    if (liked == 0) {
      var type = 1;
    } else if (liked == 1) {
      var type = 2;
    }

    var dataToSend = {
      videoid: videoid,
      type: type,
    };

    //const jsonString2 = JSON.stringify(dataToSend);

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);
    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

    var request2 = $.ajax({
      beforeSend: function() {},
      url:
        siteRoot +
        "/pages/learning/scripts/useractions/updateUserFavourite.php",
      type: "POST",
      contentType: "application/json",
      data: jsonString,
    });

    request2.done(function(data) {
      // alert( "success" );
      if (data == 1) {
        //show green tick

        if (liked == 1) {
          $(icon).addClass("text-muted");
          $(icon).removeClass("gieqsGold");
          $(icon).removeClass("animated");
          $(icon).removeClass("heartBeat");
        } else if (liked == 0) {
          $(icon).removeClass("text-muted");
          $(icon).addClass("gieqsGold");
          $(icon).addClass("animated");
          $(icon).addClass("heartBeat");
        }

        //$('#notification-services').delay('1000').addClass('is-valid');
      }
      //$(document).find('.Thursday').hide();
      $(icon).prop("disabled", false);
    });

    //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
    //remove the check from the tag removed
  });
});
