<?php // Script to connect to database - mysqli_connect.php

DEFINE ('DB_USER_GIEQS', $mysqli_gieqs_db_username);
DEFINE ('DB_PASSWORD_GIEQS',$mysqli_gieqs_db_password);
DEFINE ('DB_HOST_GIEQS',$host_name);
DEFINE ('DB_NAME_GIEQS', $mysqli_gieqs_db_name);

$dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);

if (!$dbc) {
   echo "Error";
    trigger_error ('Could not connect to MySQL: '. mysqli_connect_error ());
} else {
  mysqli_set_charset($dbc, 'utf8');  
}
