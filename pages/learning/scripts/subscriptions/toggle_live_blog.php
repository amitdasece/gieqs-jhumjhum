<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';

require BASE_URI . '/assets/scripts/interpretUserAccess.php';

$debug = false;

$general = new general;
$users = new users;


error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/settings_manager.class.php');
$settings_manager = new settings_manager;


error_reporting(E_ALL);

$settings_manager->live_blog_toggle();

