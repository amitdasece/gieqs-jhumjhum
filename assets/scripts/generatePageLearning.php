<?php

$openaccess = 1;
//$requiredUserLevel = 4;
require '../../assets/includes/config.inc.php';

require BASE_URI . '/assets/scripts/headerScript.php';

$general = new general;
$programme = new programme;
$userRegistrations = new userRegistrations;
$userFunctions = new userFunctions;

$debug = true;

function SaveFile($filename, $text){
	if(VerifyDirectory()){
		$file = fopen($filename, "w");
		if ($file){

			fwrite($file, $text);
			fclose($file);
			echo 'File written';
		}else{

			echo 'cannot open';

		}
	}
}

function createWritableFolder($folder)
{
	if (file_exists($folder)) {
		echo 'folder exists';
		return is_writable($folder);
	}
	// Folder not exit, check parent folder.
	$folderParent = dirname($folder);
	if($folderParent != '.' && $folderParent != '/' ) {
		if(!createWritableFolder(dirname($folder))) {
			echo 'Failed to create folder ' . $folder;
			return false;
		}
		// Folder parent created.
	}

	if ( is_writable($folderParent) ) {
		echo' Folder parent is writable';
		if ( mkdir($folder, 0777, true) ) {
			echo 'Folder created';
			return true;
		}
		echo 'Failed to create folder';
	}
	echo ' Folder parent is not writable';
	return false;
}

//$print_r()

$data = json_decode(file_get_contents('php://input'), true);

//print_r($data);

$access_level = $data['access_level'];
$title = $data['title'];
$description = $data['description'];
$tagCategories = $data['tagCategories'];
$videos = $data['videos'];

//new methods for options, get from database
//here put your denominator !!EDIT

if ($debug) {
    print_r($tageCategories);
}

//if in options but not in programme [delete]
//if in options and present nothing
//if in options and not present in db add

//define an array of existing connections for this user

if ($debug) {
    print_r($videos);
}

//go through the current submission, add those needed, remove those needed

//if any current connections

//for each in the total select box options
//if in selected array and not present in db ADD
//if not in selected array and present in db DELETE

//TODO make an array here of the actions

if (!empty($tagCategories) && !empty($videos)) {

    echo 'Only select one page type';
    echo 'Aborting';
    exit();

} elseif (empty($tagCategories) && !empty($videos)) {

    //simple page
    if ($debug) {
        print_r('Simple page array present');
    }

    $file_in = "";

    $file_in .= "<!DOCTYPE html>\n";
    $file_in .= "<html lang=\"en\">\n";
    $file_in .= "\n";
    $file_in .= "<?php require '../../includes/config.inc.php';?>\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "

<head>\n";
    $file_in .= "\n";
    $file_in .= " <?php\n";
    $file_in .= "\n";
    $file_in .= "//error_reporting(E_ALL);\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "      //define user access level\n";
    $file_in .= "\n";
    $file_in .= "      //\$openaccess = 0;\n";
    $file_in .= "      \$requiredUserLevel = {$access_level};\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "      require BASE_URI . '/head.php';\n";
    $file_in .= "\n";
    $file_in .= "      \$general = new general;\n";
    $file_in .= "\n";
    $file_in .= "      \$navigator = new navigator;\n";
    $file_in .= "\n";
    $file_in .= "      \$users = new users;\n";
    $file_in .= "\n";
    $file_in .= "      ?>\n";
    $file_in .= "\n";
    $file_in .= "
    <!--Page title-->\n";
    $file_in .= " <title>GIEQs Online Endoscopy Trainer - Polypectomy Videos Preview</title>\n";
    $file_in .= "\n";
    $file_in .= "
    <link rel=\"stylesheet\" href=\"<?php $file_in .= BASE_URL;?>/assets/libs/animate.css/animate.min.css\">\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= " <style>
    \n";
    $file_in .= "       \n";
    $file_in .= "        .gieqsGold {\n";
    $file_in .= "\n";
    $file_in .= "            color: rgb(238, 194, 120);\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "        }\n";
    $file_in .= "\n";
    $file_in .= "        .card-placeholder{\n";
    $file_in .= "\n";
    $file_in .= "            width: 344px;\n";
    $file_in .= "\n";
    $file_in .= "        }\n";
    $file_in .= "\n";
    $file_in .= "        .break {\n";
    $file_in .= "  flex-basis: 100%;\n";
    $file_in .= "  height: 0;\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= ".flex-even {\n";
    $file_in .= "  flex: 1;\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= ".flex-nav {\n";
    $file_in .= "  flex: 0 0 18%;\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "        \n";
    $file_in .= "        .gieqsGoldBackground {\n";
    $file_in .= "\n";
    $file_in .= "background-color: rgb(238, 194, 120);\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= "        .tagButton {\n";
    $file_in .= "\n";
    $file_in .= "            cursor: pointer;\n";
    $file_in .= "\n";
    $file_in .= "        }\n";
    $file_in .= "\n";
    $file_in .= "        \n";
    $file_in .= "\n";
    $file_in .= "        \n";
    $file_in .= "\n";
    $file_in .= "        iframe {\n";
    $file_in .= "  box-sizing: border-box;\n";
    $file_in .= "    height: 25.25vw;\n";
    $file_in .= "    left: 50%;\n";
    $file_in .= "    min-height: 100%;\n";
    $file_in .= "    min-width: 100%;\n";
    $file_in .= "    transform: translate(-50%, -50%);\n";
    $file_in .= "    position: absolute;\n";
    $file_in .= "    top: 50%;\n";
    $file_in .= "    width: 100.77777778vh;\n";
    $file_in .= "}\n";
    $file_in .= ".cursor-pointer {\n";
    $file_in .= "\n";
    $file_in .= "    cursor: pointer;\n";
    $file_in .= "\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= "@media (max-width: 768px) {\n";
    $file_in .= "\n";
    $file_in .= "    .flex-even {\n";
    $file_in .= "  flex-basis: 100%;\n";
    $file_in .= "}\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= "@media (max-width: 768px) {\n";
    $file_in .= "\n";
    $file_in .= ".card-header {\n";
    $file_in .= "    height:250px;\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= ".card-placeholder{\n";
    $file_in .= "\n";
    $file_in .= "    width: 204px;\n";
    $file_in .= "\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "}\n";
    $file_in .= "\n";
    $file_in .= "@media (min-width: 1200px) {\n";
    $file_in .= "        #chapterSelectorDiv{\n";
    $file_in .= "\n";
    $file_in .= "            \n";
    $file_in .= "                \n";
    $file_in .= "                top:-3vh;\n";
    $file_in .= "            \n";
    $file_in .= "\n";
    $file_in .= "        }\n";
    $file_in .= "        #playerContainer{\n";
    $file_in .= "\n";
    $file_in .= "                margin-top:-20px;\n";
    $file_in .= "\n";
    $file_in .= "        }\n";
    $file_in .= "        #collapseExample {\n";
    $file_in .= "\n";
    $file_in .= "            position: absolute; \n";
    $file_in .= "            max-width: 50vh; \n";
    $file_in .= "            z-index: 25;\n";
    $file_in .= "        }\n";
    $file_in .= "\n";
    $file_in .= "        \n";
    $file_in .= "\n";
    $file_in .= "}\n";
    $file_in .= "
    </style>\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "
</head>\n";
    $file_in .= "\n";
    $file_in .= "

<body>\n";
    $file_in .= " <header class=\"header header-transparent\" id=\"header-main\">\n";
    $file_in .= "\n";
    $file_in .= "
        <!-- Topbar -->\n";
    $file_in .= "\n";
    $file_in .= " <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>\n";
    $file_in .= "\n";
    $file_in .= "
        <!-- Main navbar -->\n";
    $file_in .= "\n";
    $file_in .= " <?php require BASE_URI . '/pages/learning/includes/nav.php';?>\n";
    $file_in .= "\n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "
    </header>\n";
    $file_in .= "\n";
    $file_in .= " <?php\n";
    $file_in .= "		if (isset(\$_GET[\"id\"]) && is_numeric(\$_GET[\"id\"])){\n";
    $file_in .= "			\$id = \$_GET[\"id\"];\n";
    $file_in .= "		\n";
    $file_in .= "		}else{\n";
    $file_in .= "		\n";
    $file_in .= "			\$id = null;\n";
    $file_in .= "		\n";
    $file_in .= "		}\n";
    $file_in .= "				    \n";
    $file_in .= "                        \n";
    $file_in .= "                        \n";
    $file_in .= "		\n";
    $file_in .= "        ?>\n";
    $file_in .= " \n";
    $file_in .= "
    <!-- load all video data -->\n";
    $file_in .= "\n";
    $file_in .= " <div id=\"id\" style=\"display:none;\"><?php if (\$id){echo \$id;}?></div>\n";
    $file_in .= "\n";
    $file_in .= "
    <!--- specifiy the tag Categories required for display  CHANGEME-->\n";
    $file_in .= "\n";
    $file_in .= " <?php\n";
    $file_in .= "        \$requiredTagCategories = ['65'];\n";
    $file_in .= "        \$requiredVideos = ['113', '114', '137'];\n";
    $file_in .= "\n";
    $file_in .= "        ?>\n";
    $file_in .= "\n";
    $file_in .= " <div id=\"requiredTagCategories\" style=\"display:none;\"><?php echo json_encode(\$requiredTagCategories);?>
    </div>\n";
    $file_in .= " <div id=\"requiredVideos\" style=\"display:none;\"><?php echojson_encode(\$requiredVideos);?></div>\n";
    $file_in .= "\n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= "
    <!--CONSTRUCT TAG DISPLAY-->\n";
    $file_in .= "\n";
    $file_in .= "
    <!--GET TAG CATEGORY NAME \n";
    $file_in .= "                    \n";
    $file_in .= "                    <?php\n";
    $file_in .= "\n";
    $file_in .= "                    //define the page for referral info\n";
    $file_in .= "\n";
    $file_in .= "                    //\$url =  \"//{\$_SERVER['HTTP_HOST']}{\$_SERVER['REQUEST_URI']}\";\n";
    $file_in .= "                    \$url =  \"{\$_SERVER['REQUEST_URI']}\";\n";
    $file_in .= "\n";
    $file_in .= "                    \$escaped_url = htmlspecialchars( \$url, ENT_QUOTES, 'UTF-8' );\n";
    $file_in .= "\n";
    $file_in .= "                    ?>\n";
    $file_in .= "-->\n";
    $file_in .= "\n";
    $file_in .= " <div id=\"escaped_url\" style=\"display:none;\"><?php echo \$escaped_url;?></div>\n";
    $file_in .= "\n";
    $file_in .= "
    <!--\n";
    $file_in .= "                    \n";
    $file_in .= "                TODO see other videos with similar tags, see videos with this tag, tag jump the video,\n";
    $file_in .= "                list of chapters with associated tags [toggle view by category, chapter]\n";
    $file_in .= "                \n";
    $file_in .= "                -->\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "
    <!-- Omnisearch -->\n";
    $file_in .= " \n";
    $file_in .= " <div class=\"main-content bg-gradient-dark\">\n";
    $file_in .= "\n";
    $file_in .= "
        <!--Header CHANGEME-->\n";
    $file_in .= "\n";
    $file_in .= " <div class=\"d-flex flex-wrap container pt-10 mt-5\">\n";
    $file_in .= " <div class=\"h1 mr-auto\">Colorectal Polypectomy</div>\n";
    $file_in .= "
            <!--  <div class=\"w-50\"><?php //require(BASE_URI . '/pages/learning/pages/account/memberCard.php');?></div> -->\n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= "
        </div>\n";
    $file_in .= " <p class=\"h3 gieqsGold container \">A Primer</p>\n";
    $file_in .= "\n";
    $file_in .= " <div class=\"d-flex align-items-end container\">\n";
    $file_in .= " <p class=\"text-muted pl-4 mt-2\">Below is a selection of lectures and interactive learning tools for
                those taking their first steps in colonoscopic polypectomy.</p>\n";
    $file_in .= "\n";
    $file_in .= " </div>\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "
        <!--Navigation-->\n";
    $file_in .= "\n";
    $file_in .= " <div id=\"navigationZone\">\n";
    $file_in .= " <?php //require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>\n";
    $file_in .= " </div>\n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "
        <!--Video Display-->\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= " <div class=\"container mt-4 pb-6\">\n";
    $file_in .= " <div id=\"videoCards\" class=\"flex-wrap\">\n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= " <div class=\"d-flex align-items-center\">\n";
    $file_in .= " <strong>Loading...</strong>\n";
    $file_in .= " <div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div>\n";
    $file_in .= " </div>\n";
    $file_in .= " \n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= " </div>\n";
    $file_in .= "\n";
    $file_in .= " </div>\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= " \n";
    $file_in .= " \n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= " \n";
    $file_in .= "
    </div>\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= " \n";
    $file_in .= "
    <!-- Modal -->\n";
    $file_in .= " \n";
    $file_in .= "\n";
    $file_in .= " <?php require BASE_URI . '/footer.php';?>\n";
    $file_in .= "\n";
    $file_in .= "
    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->\n";
    $file_in .= "
    <!-- <script src=\"assets/js/purpose.core.js\"></script> -->\n";
    $file_in .= "
    <!-- Page JS -->\n";
    $file_in .= "
    <!-- Google maps -->\n";
    $file_in .= " \n";
    $file_in .= "
    <!-- Purpose JS -->\n";
    $file_in .= " <script src=<?php $file_in .= BASE_URL . \"/assets/js/purpose.js\"?>></script>\n";
    $file_in .= "
    <!-- <script src=<?php $file_in .= BASE_URL . \"/assets/js/generaljs.js\"?>></script> -->\n";
    $file_in .= " <script>
    \
    n ";
    $file_in .= "    var videoPassed = \$(\"#id\").text();\n";
    $file_in .= "
    </script>\n";
    $file_in .= "\n";
    $file_in .= " <script src=<?php $file_in .= BASE_URL . \"/pages/learning/includes/social.js\"?>></script>\n";
    $file_in .= "\n";
    $file_in .= " <script>
    \
    n ";
    $file_in .= "        \n";
    $file_in .= "        //the number that are actually loaded\n";
    $file_in .= "        var loaded = 1;\n";
    $file_in .= "\n";
    $file_in .= "        //the number the user wants\n";
    $file_in .= "        var loadedRequired = 1;\n";
    $file_in .= "\n";
    $file_in .= "        var firstTime = 1; var activeStatus = 1;\n";
    $file_in .= "\n";
    $file_in .= "        var requiredTagCategoriesText = \$(\"#requiredTagCategories\").text();\n";
    $file_in .= "\n";
    $file_in .= "        var requiredTagCategories = JSON.parse(requiredTagCategoriesText);\n";
    $file_in .= "        \n";
    $file_in .= "        var requiredVideosText = \$(\"#requiredVideos\").text();\n";
    $file_in .= "\n";
    $file_in .= "        var requiredVideos = JSON.parse(requiredVideosText);\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "        function refreshNavAndTags(){\n";
    $file_in .= "\n";
    $file_in .= "            var screenTop = \$(document).scrollTop();\n";
    $file_in .= "\n";
    $file_in .= "            //console.log(top);\n";
    $file_in .= "\n";
    $file_in .= "            var tags = [];\n";
    $file_in .= "\n";
    $file_in .= "                \$('.tag').each(function(){\n";
    $file_in .= "\n";
    $file_in .= "                    if (\$(this).is(\":checked\")){\n";
    $file_in .= "                        tags.push(\$(this).attr('data'));\n";
    $file_in .= "                    }\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                })\n";
    $file_in .= "\n";
    $file_in .= "                \n";
    $file_in .= "\n";
    $file_in .= "                //push how many loaded, use loaded variable\n";
    $file_in .= "\n";
    $file_in .= "                console.dir(tags);\n";
    $file_in .= "\n";
    $file_in .= "                /*var key = \$(this).attr('data');\n";
    $file_in .= "\n";
    $file_in .= "				const dataToSend = {\n";
    $file_in .= "\n";
    $file_in .= "					key: key,\n";
    $file_in .= "\n";
    $file_in .= "				}*/var dataToSend = {\n";
    $file_in .= "\n";
    $file_in .= "                    tags: tags,\n";
    $file_in .= "                    requiredTagCategories: requiredTagCategories,\n";
    $file_in .= "                    requiredVideos: requiredVideos,\n";
    $file_in .= "                    active: activeStatus,\n";
    $file_in .= "\n";
    $file_in .= "                    }\n";
    $file_in .= "\n";
    $file_in .= "                    //const jsonString2 = JSON.stringify(dataToSend);\n";
    $file_in .= "\n";
    $file_in .= "				const jsonString = JSON.stringify(dataToSend);\n";
    $file_in .= "				////console.log(jsonString);\n";
    $file_in .= "				//console.log(siteRoot + \"/pages/learning/scripts/getNavv2.php\");\n";
    $file_in .= "\n";
    $file_in .= "				var request2 = \$.ajax({\n";
    $file_in .= "					beforeSend: function () {\n";
    $file_in .= "\n";
    $file_in .=
        "                        \$('#videoCards').html(\"<div class=\\\"d-flex align-items-center\\\"><strong>Loading...</strong><div class=\\\"spinner-border ml-auto\\\" role=\\\"status\\\" aria-hidden=\\\true\\\"></div></div>\");\n";
    $file_in .= "                        //for each tags array push the badges to the tags shown area\n";
    $file_in .= "                        var html = '';\n";
    $file_in .= "                        \$.each(tags, function(k,v){\n";
    $file_in .= "\n";
    $file_in .= "                            //HERE WE HAVE THE TAGID\n";
    $file_in .= "                            \n";
    $file_in .= "                            var tagid = v;\n";
    $file_in .= "\n";
    $file_in .= "                            //get the name and category\n";
    $file_in .= "\n";
    $file_in .=
        "                            var tagName = \$('body').find('#navigationZone').find('#tag'+v).siblings().text();\n";
    $file_in .= "\n";
    $file_in .=
        "                            var tagCategory = \$('body').find('#navigationZone').find('#tag'+v).parent().parent().parent().parent().find('span').text();\n";
    $file_in .= "\n";
    $file_in .=
        "                            html += '<span class=\"badge bg-gieqsGold text-dark mx-2 my-2 tagButton\" data=\"'+v+'\">'+tagCategory+ ' / ' +tagName+' <i style=\"float:right;\" class=\"fas fa-times removeTag cursor-pointer ml-1\" data=\"'+v+'\"></i></span>';\n";
    $file_in .= "\n";
    $file_in .= "                        });\n";
    $file_in .= "                        \$('body').find('#navigationZone').find('#shown-tags').html(html);\n";
    $file_in .= "\n";
    $file_in .= "					},\n";
    $file_in .= "					url: siteRoot + \"/pages/learning/scripts/getNavv2.php\",\n";
    $file_in .= "					type: \"POST\",\n";
    $file_in .= "					contentType: \"application/json\",\n";
    $file_in .= "					data: jsonString,\n";
    $file_in .= "				});\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "				request2.done(function (data) {\n";
    $file_in .= "                    // alert( \"success\" );\n";
    $file_in .= "                    if (data != '[]'){\n";
    $file_in .= "                        var toKeep = \$.parseJSON(data.trim());\n";
    $file_in .= "                        //alert(data.trim());\n";
    $file_in .= "                        console.dir(toKeep);\n";
    $file_in .= "                        \n";
    $file_in .= "                             \n";
    $file_in .= "                            \$('.tag').each(function(){\n";
    $file_in .= "\n";
    $file_in .= "                                var tagid = \$(this).attr('data');\n";
    $file_in .= "\n";
    $file_in .= "                                if (toKeep.indexOf(tagid) > -1){\n";
    $file_in .= "\n";
    $file_in .= "                                    \$(this).attr('disabled', false);\n";
    $file_in .= "\n";
    $file_in .= "                                }else{\n";
    $file_in .= "\n";
    $file_in .= "                                    \$(this).attr('disabled', true);\n";
    $file_in .= "                                }\n";
    $file_in .= "\n";
    $file_in .= "                            })    \n";
    $file_in .= "\n";
    $file_in .= "                      \n";
    $file_in .= "                    }\n";
    $file_in .= "					//\$(document).find('.Thursday').hide();\n";
    $file_in .= "                })\n";
    $file_in .= "                \n";
    $file_in .= "                request2.then(function (data) {\n";
    $file_in .= "                    var tags = [];\n";
    $file_in .= "\n";
    $file_in .= "                    \$('.tag').each(function(){\n";
    $file_in .= "\n";
    $file_in .= "                        if (\$(this).is(\":checked\")){\n";
    $file_in .= "                            tags.push(\$(this).attr('data'));\n";
    $file_in .= "                        }\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                    })\n";
    $file_in .= "\n";
    $file_in .= "                    //TODO ADD ABILITY TO PASS A PARAMETER HERE INDICATING NUMBER LOADED\n";
    $file_in .= "                    //THEN MODIFY LAYOUT AND NUMBER LOADED\n";
    $file_in .= "\n";
    $file_in .= "                    console.dir(tags);\n";
    $file_in .= "\n";
    $file_in .= "                    var dataToSend = {\n";
    $file_in .= "\n";
    $file_in .= "                        tags: tags,\n";
    $file_in .= "                        loaded: loaded,\n";
    $file_in .= "                        loadedRequired: loadedRequired,\n";
    $file_in .= "                        requiredTagCategories: requiredTagCategories,\n";
    $file_in .= "                        requiredVideos: requiredVideos,\n";
    $file_in .= "                        referringUrl: \$('#escaped_url').text(), active: activeStatus,\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                    }\n";
    $file_in .= "\n";
    $file_in .= "                    const jsonString2 = JSON.stringify(dataToSend);\n";
    $file_in .= "\n";
    $file_in .= "                  \n";
    $file_in .= "\n";
    $file_in .= "                    \n";
    $file_in .= "                    const jsonString = JSON.stringify(tags);\n";
    $file_in .= "\n";
    $file_in .= "                    console.dir(jsonString2);\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                    var request3 = \$.ajax({\n";
    $file_in .= "					beforeSend: function () {\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "					},\n";
    $file_in .= "					url: siteRoot + \"/pages/learning/scripts/getVideosSimple.php\",\n";
    $file_in .= "					type: \"POST\",\n";
    $file_in .= "					contentType: \"application/json\",\n";
    $file_in .= "					data: jsonString2,\n";
    $file_in .= "                    });\n";
    $file_in .= "                    request3.done(function (data) {\n";
    $file_in .= "                    // alert( \"success\" );\n";
    $file_in .= "                    if (data){\n";
    $file_in .= "                        //var toKeep = \$.parseJSON(data.trim());\n";
    $file_in .= "                        //alert(data.trim());\n";
    $file_in .= "                        //console.dir(toKeep);\n";
    $file_in .= "\n";
    $file_in .= "                        \$('#videoCards').html(data);\n";
    $file_in .= "                        \$('body').find('#itemCount').each(function(){\n";
    $file_in .= "\n";
    $file_in .= "                            var count = \$('body').find('.individualVideo').length;\n";
    $file_in .= "                            \$(this).text(count);\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                        })\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                        if (firstTime == 1){\n";
    $file_in .= "                        \$('body').on('click', '#loadMore', function () {\n";
    $file_in .= "\n";
    $file_in .= "                        loadedRequired = loadedRequired + 1;\n";
    $file_in .= "\n";
    $file_in .= "            \n";
    $file_in .= "                        refreshNavAndTags();\n";
    $file_in .= "\n";
    $file_in .= "                        })\n";
    $file_in .= "                        }\n";
    $file_in .= "\n";
    $file_in .= "                        \n";
    $file_in .= "\n";
    $file_in .= "                        if (firstTime > 1 && loadedRequired > 1){\n";
    $file_in .= "\n";
    $file_in .= "                                var loadedRequiredMultiple = ((loadedRequired-1) * 10)-3;\n";
    $file_in .= "\n";
    $file_in .= "                                //console.log(loadedRequiredMultiple);\n";
    $file_in .= "\n";
    $file_in .= "                                //scroll to current level\n";
    $file_in .= "\n";
    $file_in .= "                            \n";
    $file_in .= "                                \$(\"body,html\").animate(\n";
    $file_in .= "                                {\n";
    $file_in .=
        "                                    scrollTop: \$('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').offset().top\n";
    $file_in .= "                                },\n";
    $file_in .= "                                2 //speed\n";
    $file_in .= "                                );\n";
    $file_in .= "                        }\n";
    $file_in .= "                       \n";
    $file_in .= "                        \n";
    $file_in .= "                        firstTime = firstTime + 1;\n";
    $file_in .=
        "                        //\$('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').scrollTop(300);\n";
    $file_in .= "                        \n";
    $file_in .= "                        \n";
    $file_in .= "                               \n";
    $file_in .= "\n";
    $file_in .= "                      \n";
    $file_in .= "                    }\n";
    $file_in .= "					//\$(document).find('.Thursday').hide();\n";
    $file_in .= "                })\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "				})\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "        }\n";
    $file_in .= "\n";
    $file_in .= "        \$(document).ready(function () {\n";
    $file_in .= "\n";
    $file_in .= "           \n";
    $file_in .= "\n";
    $file_in .= "            refreshNavAndTags();\n";
    $file_in .= "\n";
    $file_in .= "            \$('#refreshNavigation').click(function(){\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                firstTime = 1;\n";
    $file_in .= "                 //the number that are actually loaded\n";
    $file_in .= "                loaded = 1;\n";
    $file_in .= "\n";
    $file_in .= "                //the number the user wants\n";
    $file_in .= "                loadedRequired = 1;\n";
    $file_in .= "                \n";
    $file_in .= "                \$('.tag').each(function(){\n";
    $file_in .= "\n";
    $file_in .= "                    if (\$(this).is(\":checked\")){\n";
    $file_in .= "                        \n";
    $file_in .= "                        \$(this).prop('checked', false);\n";
    $file_in .= "                    }\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                })\n";
    $file_in .= "\n";
    $file_in .= "                refreshNavAndTags();\n";
    $file_in .= "\n";
    $file_in .= "            })\n";
    $file_in .= "\n";
    $file_in .= "            //on load check if any are checked, if so load the videos\n";
    $file_in .= "\n";
    $file_in .= "            //if none are checked load 10 most recent videos for these categories\n";
    $file_in .= "\n";
    $file_in .= "            \$('.tag').click(function(){\n";
    $file_in .= "\n";
    $file_in .= "                refreshNavAndTags();\n";
    $file_in .= "\n";
    $file_in .= "            })\n";
    $file_in .= "\n";
    $file_in .= "            \$('body').on('click', '.removeTag', function(){\n";
    $file_in .= "\n";
    $file_in .= "                var tagToRemove = \$(this).attr('data');\n";
    $file_in .= "                //remove the check from the tag removed\n";
    $file_in .= "\n";
    $file_in .= "                \$('.tag').each(function(){\n";
    $file_in .= "\n";
    $file_in .= "                if (\$(this).attr(\"data\") == tagToRemove){\n";
    $file_in .= "                    \n";
    $file_in .= "                    \$(this).prop('checked', false);\n";
    $file_in .= "\n";
    $file_in .= "                }\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                })\n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "                refreshNavAndTags();\n";
    $file_in .= "\n";
    $file_in .= "            })\n";
    $file_in .= "            //active behaviour\n";
    $file_in .= "\n";
    $file_in .= "            \$('body').on('change', '#active', function(){\n";
    $file_in .= "\n";
    $file_in .= "                var active = \$(this).children(\"option:selected\").val();\n";
    $file_in .= "                //remove the check from the tag removed\n";
    $file_in .= "\n";
    $file_in .= "                activeStatus = active;\n";
    $file_in .= "\n";
    $file_in .= "                refreshNavAndTags();\n";
    $file_in .= "\n";
    $file_in .= "            })\n";
    $file_in .= "\n";
    $file_in .= "            \n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "           \n";
    $file_in .= "           \n";
    $file_in .= "\n";
    $file_in .= "         \n";
    $file_in .= "\n";
    $file_in .= "\n";
    $file_in .= "        })\n";
    $file_in .= "
    </script>\n";
    $file_in .= "
</body>\n";
    $file_in .= "\n";
    $file_in .= "

</html>";

print_r($file_in);
print_r(createWritableFolder($BASE_URI . "/pages/learning/pages/polyptutor/test"));

SaveFile($BASE_URI . "/pages/learning/pages/polyptutor/test/{$title}Form.php", $file_in);


} elseif (!empty($tagCategories) && empty($videos)) {

//complex page
    if ($debug) {
        print_r('Complex page array present');
    }

} else {

    $file_in .= 'both data arrays empty';
}

$general->endgeneral();
$programme->endprogramme();
$userRegistrations->enduserRegistrations();
