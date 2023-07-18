<?php
set_time_limit(0);
require '../../includes/config.inc.php';
var_dump(intval(ob_get_contents()));
ob_start();

echo BASE_URI . "/pages/learning/pages/curriculum/curriculum_generic_esge.php?id=4";
        include(BASE_URI . "/pages/learning/pages/curriculum/curriculum_generic_esge.php?id=4");
        //include(BASE_URI . "/pages/learning/pages/curriculum/test_html.php");
        $page = ob_get_contents();
        
        ob_end_clean();
        ob_flush();

        var_dump($page);

        chmod(BASE_URI . '/pages/learning/pages/curriculum',0755);
        $file = BASE_URI . '/pages/learning/pages/curriculum/curriculum_test_write.php';

        if (!file_exists($file)) {
                touch($file);
            }
        
        $fw = fopen($file, "w") or die ('Unable to open file for writing');
        fputs($fw,$page, strlen($page));
        fclose($fw);        
