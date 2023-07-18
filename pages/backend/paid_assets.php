<?php require '../../assets/includes/config.inc.php';?>

<?php

define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');



require(BASE_URI . '/assets/wp/wp-blog-header.php');

spl_autoload_register ('class_loader');

?>

<?php


//php general variables

//form name

//$formName = 'programme-form';

//database name
//error_reporting(E_ALL);

$databaseName = 'assets_paid';

//identifier

$identifier = 'id';



//javascript general variables
//to be passed via divs on page


?>


<!DOCTYPE html>
<html lang="en">
<meta charset="ISO-8859-1">



<head>

    <?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 3;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;
$videosAccess = new videosAccess;

$timezones = array('Pacific/Midway' => '(UTC-11:00) Midway',
'Pacific/Niue' => '(UTC-11:00) Niue',
'Pacific/Pago_Pago' => '(UTC-11:00) Pago Pago',
'America/Adak' => '(UTC-10:00) Adak',
'Pacific/Honolulu' => '(UTC-10:00) Honolulu',
'Pacific/Johnston' => '(UTC-10:00) Johnston',
'Pacific/Rarotonga' => '(UTC-10:00) Rarotonga',
'Pacific/Tahiti' => '(UTC-10:00) Tahiti',
'Pacific/Marquesas' => '(UTC-09:30) Marquesas',
'America/Anchorage' => '(UTC-09:00) Anchorage',
'Pacific/Gambier' => '(UTC-09:00) Gambier',
'America/Juneau' => '(UTC-09:00) Juneau',
'America/Nome' => '(UTC-09:00) Nome',
'America/Sitka' => '(UTC-09:00) Sitka',
'America/Yakutat' => '(UTC-09:00) Yakutat',
'America/Dawson' => '(UTC-08:00) Dawson',
'America/Los_Angeles' => '(UTC-08:00) Los Angeles',
'America/Metlakatla' => '(UTC-08:00) Metlakatla',
'Pacific/Pitcairn' => '(UTC-08:00) Pitcairn',
'America/Santa_Isabel' => '(UTC-08:00) Santa Isabel',
'America/Tijuana' => '(UTC-08:00) Tijuana',
'America/Vancouver' => '(UTC-08:00) Vancouver',
'America/Whitehorse' => '(UTC-08:00) Whitehorse',
'America/Boise' => '(UTC-07:00) Boise',
'America/Cambridge_Bay' => '(UTC-07:00) Cambridge Bay',
'America/Chihuahua' => '(UTC-07:00) Chihuahua',
'America/Creston' => '(UTC-07:00) Creston',
'America/Dawson_Creek' => '(UTC-07:00) Dawson Creek',
'America/Denver' => '(UTC-07:00) Denver',
'America/Edmonton' => '(UTC-07:00) Edmonton',
'America/Hermosillo' => '(UTC-07:00) Hermosillo',
'America/Inuvik' => '(UTC-07:00) Inuvik',
'America/Mazatlan' => '(UTC-07:00) Mazatlan',
'America/Ojinaga' => '(UTC-07:00) Ojinaga',
'America/Phoenix' => '(UTC-07:00) Phoenix',
'America/Shiprock' => '(UTC-07:00) Shiprock',
'America/Yellowknife' => '(UTC-07:00) Yellowknife',
'America/Bahia_Banderas' => '(UTC-06:00) Bahia Banderas',
'America/Belize' => '(UTC-06:00) Belize',
'America/North_Dakota/Beulah' => '(UTC-06:00) Beulah',
'America/Cancun' => '(UTC-06:00) Cancun',
'America/North_Dakota/Center' => '(UTC-06:00) Center',
'America/Chicago' => '(UTC-06:00) Chicago',
'America/Costa_Rica' => '(UTC-06:00) Costa Rica',
'Pacific/Easter' => '(UTC-06:00) Easter',
'America/El_Salvador' => '(UTC-06:00) El Salvador',
'Pacific/Galapagos' => '(UTC-06:00) Galapagos',
'America/Guatemala' => '(UTC-06:00) Guatemala',
'America/Indiana/Knox' => '(UTC-06:00) Knox',
'America/Managua' => '(UTC-06:00) Managua',
'America/Matamoros' => '(UTC-06:00) Matamoros',
'America/Menominee' => '(UTC-06:00) Menominee',
'America/Merida' => '(UTC-06:00) Merida',
'America/Mexico_City' => '(UTC-06:00) Mexico City',
'America/Monterrey' => '(UTC-06:00) Monterrey',
'America/North_Dakota/New_Salem' => '(UTC-06:00) New Salem',
'America/Rainy_River' => '(UTC-06:00) Rainy River',
'America/Rankin_Inlet' => '(UTC-06:00) Rankin Inlet',
'America/Regina' => '(UTC-06:00) Regina',
'America/Resolute' => '(UTC-06:00) Resolute',
'America/Swift_Current' => '(UTC-06:00) Swift Current',
'America/Tegucigalpa' => '(UTC-06:00) Tegucigalpa',
'America/Indiana/Tell_City' => '(UTC-06:00) Tell City',
'America/Winnipeg' => '(UTC-06:00) Winnipeg',
'America/Atikokan' => '(UTC-05:00) Atikokan',
'America/Bogota' => '(UTC-05:00) Bogota',
'America/Cayman' => '(UTC-05:00) Cayman',
'America/Detroit' => '(UTC-05:00) Detroit',
'America/Grand_Turk' => '(UTC-05:00) Grand Turk',
'America/Guayaquil' => '(UTC-05:00) Guayaquil',
'America/Havana' => '(UTC-05:00) Havana',
'America/Indiana/Indianapolis' => '(UTC-05:00) Indianapolis',
'America/Iqaluit' => '(UTC-05:00) Iqaluit',
'America/Jamaica' => '(UTC-05:00) Jamaica',
'America/Lima' => '(UTC-05:00) Lima',
'America/Kentucky/Louisville' => '(UTC-05:00) Louisville',
'America/Indiana/Marengo' => '(UTC-05:00) Marengo',
'America/Kentucky/Monticello' => '(UTC-05:00) Monticello',
'America/Montreal' => '(UTC-05:00) Montreal',
'America/Nassau' => '(UTC-05:00) Nassau',
'America/New_York' => '(UTC-05:00) New York',
'America/Nipigon' => '(UTC-05:00) Nipigon',
'America/Panama' => '(UTC-05:00) Panama',
'America/Pangnirtung' => '(UTC-05:00) Pangnirtung',
'America/Indiana/Petersburg' => '(UTC-05:00) Petersburg',
'America/Port-au-Prince' => '(UTC-05:00) Port-au-Prince',
'America/Thunder_Bay' => '(UTC-05:00) Thunder Bay',
'America/Toronto' => '(UTC-05:00) Toronto',
'America/Indiana/Vevay' => '(UTC-05:00) Vevay',
'America/Indiana/Vincennes' => '(UTC-05:00) Vincennes',
'America/Indiana/Winamac' => '(UTC-05:00) Winamac',
'America/Caracas' => '(UTC-04:30) Caracas',
'America/Anguilla' => '(UTC-04:00) Anguilla',
'America/Antigua' => '(UTC-04:00) Antigua',
'America/Aruba' => '(UTC-04:00) Aruba',
'America/Asuncion' => '(UTC-04:00) Asuncion',
'America/Barbados' => '(UTC-04:00) Barbados',
'Atlantic/Bermuda' => '(UTC-04:00) Bermuda',
'America/Blanc-Sablon' => '(UTC-04:00) Blanc-Sablon',
'America/Boa_Vista' => '(UTC-04:00) Boa Vista',
'America/Campo_Grande' => '(UTC-04:00) Campo Grande',
'America/Cuiaba' => '(UTC-04:00) Cuiaba',
'America/Curacao' => '(UTC-04:00) Curacao',
'America/Dominica' => '(UTC-04:00) Dominica',
'America/Eirunepe' => '(UTC-04:00) Eirunepe',
'America/Glace_Bay' => '(UTC-04:00) Glace Bay',
'America/Goose_Bay' => '(UTC-04:00) Goose Bay',
'America/Grenada' => '(UTC-04:00) Grenada',
'America/Guadeloupe' => '(UTC-04:00) Guadeloupe',
'America/Guyana' => '(UTC-04:00) Guyana',
'America/Halifax' => '(UTC-04:00) Halifax',
'America/Kralendijk' => '(UTC-04:00) Kralendijk',
'America/La_Paz' => '(UTC-04:00) La Paz',
'America/Lower_Princes' => '(UTC-04:00) Lower Princes',
'America/Manaus' => '(UTC-04:00) Manaus',
'America/Marigot' => '(UTC-04:00) Marigot',
'America/Martinique' => '(UTC-04:00) Martinique',
'America/Moncton' => '(UTC-04:00) Moncton',
'America/Montserrat' => '(UTC-04:00) Montserrat',
'Antarctica/Palmer' => '(UTC-04:00) Palmer',
'America/Port_of_Spain' => '(UTC-04:00) Port of Spain',
'America/Porto_Velho' => '(UTC-04:00) Porto Velho',
'America/Puerto_Rico' => '(UTC-04:00) Puerto Rico',
'America/Rio_Branco' => '(UTC-04:00) Rio Branco',
'America/Santiago' => '(UTC-04:00) Santiago',
'America/Santo_Domingo' => '(UTC-04:00) Santo Domingo',
'America/St_Barthelemy' => '(UTC-04:00) St. Barthelemy',
'America/St_Kitts' => '(UTC-04:00) St. Kitts',
'America/St_Lucia' => '(UTC-04:00) St. Lucia',
'America/St_Thomas' => '(UTC-04:00) St. Thomas',
'America/St_Vincent' => '(UTC-04:00) St. Vincent',
'America/Thule' => '(UTC-04:00) Thule',
'America/Tortola' => '(UTC-04:00) Tortola',
'America/St_Johns' => '(UTC-03:30) St. Johns',
'America/Araguaina' => '(UTC-03:00) Araguaina',
'America/Bahia' => '(UTC-03:00) Bahia',
'America/Belem' => '(UTC-03:00) Belem',
'America/Argentina/Buenos_Aires' => '(UTC-03:00) Buenos Aires',
'America/Argentina/Catamarca' => '(UTC-03:00) Catamarca',
'America/Cayenne' => '(UTC-03:00) Cayenne',
'America/Argentina/Cordoba' => '(UTC-03:00) Cordoba',
'America/Fortaleza' => '(UTC-03:00) Fortaleza',
'America/Godthab' => '(UTC-03:00) Godthab',
'America/Argentina/Jujuy' => '(UTC-03:00) Jujuy',
'America/Argentina/La_Rioja' => '(UTC-03:00) La Rioja',
'America/Maceio' => '(UTC-03:00) Maceio',
'America/Argentina/Mendoza' => '(UTC-03:00) Mendoza',
'America/Miquelon' => '(UTC-03:00) Miquelon',
'America/Montevideo' => '(UTC-03:00) Montevideo',
'America/Paramaribo' => '(UTC-03:00) Paramaribo',
'America/Recife' => '(UTC-03:00) Recife',
'America/Argentina/Rio_Gallegos' => '(UTC-03:00) Rio Gallegos',
'Antarctica/Rothera' => '(UTC-03:00) Rothera',
'America/Argentina/Salta' => '(UTC-03:00) Salta',
'America/Argentina/San_Juan' => '(UTC-03:00) San Juan',
'America/Argentina/San_Luis' => '(UTC-03:00) San Luis',
'America/Santarem' => '(UTC-03:00) Santarem',
'America/Sao_Paulo' => '(UTC-03:00) Sao Paulo',
'Atlantic/Stanley' => '(UTC-03:00) Stanley',
'America/Argentina/Tucuman' => '(UTC-03:00) Tucuman',
'America/Argentina/Ushuaia' => '(UTC-03:00) Ushuaia',
'America/Noronha' => '(UTC-02:00) Noronha',
'Atlantic/South_Georgia' => '(UTC-02:00) South Georgia',
'Atlantic/Azores' => '(UTC-01:00) Azores',
'Atlantic/Cape_Verde' => '(UTC-01:00) Cape Verde',
'America/Scoresbysund' => '(UTC-01:00) Scoresbysund',
'Africa/Abidjan' => '(UTC+00:00) Abidjan',
'Africa/Accra' => '(UTC+00:00) Accra',
'Africa/Bamako' => '(UTC+00:00) Bamako',
'Africa/Banjul' => '(UTC+00:00) Banjul',
'Africa/Bissau' => '(UTC+00:00) Bissau',
'Atlantic/Canary' => '(UTC+00:00) Canary',
'Africa/Casablanca' => '(UTC+00:00) Casablanca',
'Africa/Conakry' => '(UTC+00:00) Conakry',
'Africa/Dakar' => '(UTC+00:00) Dakar',
'America/Danmarkshavn' => '(UTC+00:00) Danmarkshavn',
'Europe/Dublin' => '(UTC+00:00) Dublin',
'Africa/El_Aaiun' => '(UTC+00:00) El Aaiun',
'Atlantic/Faroe' => '(UTC+00:00) Faroe',
'Africa/Freetown' => '(UTC+00:00) Freetown',
'Europe/Guernsey' => '(UTC+00:00) Guernsey',
'Europe/Isle_of_Man' => '(UTC+00:00) Isle of Man',
'Europe/Jersey' => '(UTC+00:00) Jersey',
'Europe/Lisbon' => '(UTC+00:00) Lisbon',
'Africa/Lome' => '(UTC+00:00) Lome',
'Europe/London' => '(UTC+00:00) London',
'Atlantic/Madeira' => '(UTC+00:00) Madeira',
'Africa/Monrovia' => '(UTC+00:00) Monrovia',
'Africa/Nouakchott' => '(UTC+00:00) Nouakchott',
'Africa/Ouagadougou' => '(UTC+00:00) Ouagadougou',
'Atlantic/Reykjavik' => '(UTC+00:00) Reykjavik',
'Africa/Sao_Tome' => '(UTC+00:00) Sao Tome',
'Atlantic/St_Helena' => '(UTC+00:00) St. Helena',
'UTC' => '(UTC+00:00) UTC',
'Africa/Algiers' => '(UTC+01:00) Algiers',
'Europe/Amsterdam' => '(UTC+01:00) Amsterdam',
'Europe/Andorra' => '(UTC+01:00) Andorra',
'Africa/Bangui' => '(UTC+01:00) Bangui',
'Europe/Belgrade' => '(UTC+01:00) Belgrade',
'Europe/Berlin' => '(UTC+01:00) Berlin',
'Europe/Bratislava' => '(UTC+01:00) Bratislava',
'Africa/Brazzaville' => '(UTC+01:00) Brazzaville',
'Europe/Brussels' => '(UTC+01:00) Brussels',
'Europe/Budapest' => '(UTC+01:00) Budapest',
'Europe/Busingen' => '(UTC+01:00) Busingen',
'Africa/Ceuta' => '(UTC+01:00) Ceuta',
'Europe/Copenhagen' => '(UTC+01:00) Copenhagen',
'Africa/Douala' => '(UTC+01:00) Douala',
'Europe/Gibraltar' => '(UTC+01:00) Gibraltar',
'Africa/Kinshasa' => '(UTC+01:00) Kinshasa',
'Africa/Lagos' => '(UTC+01:00) Lagos',
'Africa/Libreville' => '(UTC+01:00) Libreville',
'Europe/Ljubljana' => '(UTC+01:00) Ljubljana',
'Arctic/Longyearbyen' => '(UTC+01:00) Longyearbyen',
'Africa/Luanda' => '(UTC+01:00) Luanda',
'Europe/Luxembourg' => '(UTC+01:00) Luxembourg',
'Europe/Madrid' => '(UTC+01:00) Madrid',
'Africa/Malabo' => '(UTC+01:00) Malabo',
'Europe/Malta' => '(UTC+01:00) Malta',
'Europe/Monaco' => '(UTC+01:00) Monaco',
'Africa/Ndjamena' => '(UTC+01:00) Ndjamena',
'Africa/Niamey' => '(UTC+01:00) Niamey',
'Europe/Oslo' => '(UTC+01:00) Oslo',
'Europe/Paris' => '(UTC+01:00) Paris',
'Europe/Podgorica' => '(UTC+01:00) Podgorica',
'Africa/Porto-Novo' => '(UTC+01:00) Porto-Novo',
'Europe/Prague' => '(UTC+01:00) Prague',
'Europe/Rome' => '(UTC+01:00) Rome',
'Europe/San_Marino' => '(UTC+01:00) San Marino',
'Europe/Sarajevo' => '(UTC+01:00) Sarajevo',
'Europe/Skopje' => '(UTC+01:00) Skopje',
'Europe/Stockholm' => '(UTC+01:00) Stockholm',
'Europe/Tirane' => '(UTC+01:00) Tirane',
'Africa/Tripoli' => '(UTC+01:00) Tripoli',
'Africa/Tunis' => '(UTC+01:00) Tunis',
'Europe/Vaduz' => '(UTC+01:00) Vaduz',
'Europe/Vatican' => '(UTC+01:00) Vatican',
'Europe/Vienna' => '(UTC+01:00) Vienna',
'Europe/Warsaw' => '(UTC+01:00) Warsaw',
'Africa/Windhoek' => '(UTC+01:00) Windhoek',
'Europe/Zagreb' => '(UTC+01:00) Zagreb',
'Europe/Zurich' => '(UTC+01:00) Zurich',
'Europe/Athens' => '(UTC+02:00) Athens',
'Asia/Beirut' => '(UTC+02:00) Beirut',
'Africa/Blantyre' => '(UTC+02:00) Blantyre',
'Europe/Bucharest' => '(UTC+02:00) Bucharest',
'Africa/Bujumbura' => '(UTC+02:00) Bujumbura',
'Africa/Cairo' => '(UTC+02:00) Cairo',
'Europe/Chisinau' => '(UTC+02:00) Chisinau',
'Asia/Damascus' => '(UTC+02:00) Damascus',
'Africa/Gaborone' => '(UTC+02:00) Gaborone',
'Asia/Gaza' => '(UTC+02:00) Gaza',
'Africa/Harare' => '(UTC+02:00) Harare',
'Asia/Hebron' => '(UTC+02:00) Hebron',
'Europe/Helsinki' => '(UTC+02:00) Helsinki',
'Europe/Istanbul' => '(UTC+02:00) Istanbul',
'Asia/Jerusalem' => '(UTC+02:00) Jerusalem',
'Africa/Johannesburg' => '(UTC+02:00) Johannesburg',
'Europe/Kiev' => '(UTC+02:00) Kiev',
'Africa/Kigali' => '(UTC+02:00) Kigali',
'Africa/Lubumbashi' => '(UTC+02:00) Lubumbashi',
'Africa/Lusaka' => '(UTC+02:00) Lusaka',
'Africa/Maputo' => '(UTC+02:00) Maputo',
'Europe/Mariehamn' => '(UTC+02:00) Mariehamn',
'Africa/Maseru' => '(UTC+02:00) Maseru',
'Africa/Mbabane' => '(UTC+02:00) Mbabane',
'Asia/Nicosia' => '(UTC+02:00) Nicosia',
'Europe/Riga' => '(UTC+02:00) Riga',
'Europe/Simferopol' => '(UTC+02:00) Simferopol',
'Europe/Sofia' => '(UTC+02:00) Sofia',
'Europe/Tallinn' => '(UTC+02:00) Tallinn',
'Europe/Uzhgorod' => '(UTC+02:00) Uzhgorod',
'Europe/Vilnius' => '(UTC+02:00) Vilnius',
'Europe/Zaporozhye' => '(UTC+02:00) Zaporozhye',
'Africa/Addis_Ababa' => '(UTC+03:00) Addis Ababa',
'Asia/Aden' => '(UTC+03:00) Aden',
'Asia/Amman' => '(UTC+03:00) Amman',
'Indian/Antananarivo' => '(UTC+03:00) Antananarivo',
'Africa/Asmara' => '(UTC+03:00) Asmara',
'Asia/Baghdad' => '(UTC+03:00) Baghdad',
'Asia/Bahrain' => '(UTC+03:00) Bahrain',
'Indian/Comoro' => '(UTC+03:00) Comoro',
'Africa/Dar_es_Salaam' => '(UTC+03:00) Dar es Salaam',
'Africa/Djibouti' => '(UTC+03:00) Djibouti',
'Africa/Juba' => '(UTC+03:00) Juba',
'Europe/Kaliningrad' => '(UTC+03:00) Kaliningrad',
'Africa/Kampala' => '(UTC+03:00) Kampala',
'Africa/Khartoum' => '(UTC+03:00) Khartoum',
'Asia/Kuwait' => '(UTC+03:00) Kuwait',
'Indian/Mayotte' => '(UTC+03:00) Mayotte',
'Europe/Minsk' => '(UTC+03:00) Minsk',
'Africa/Mogadishu' => '(UTC+03:00) Mogadishu',
'Africa/Nairobi' => '(UTC+03:00) Nairobi',
'Asia/Qatar' => '(UTC+03:00) Qatar',
'Asia/Riyadh' => '(UTC+03:00) Riyadh',
'Antarctica/Syowa' => '(UTC+03:00) Syowa',
'Asia/Tehran' => '(UTC+03:30) Tehran',
'Asia/Baku' => '(UTC+04:00) Baku',
'Asia/Dubai' => '(UTC+04:00) Dubai',
'Indian/Mahe' => '(UTC+04:00) Mahe',
'Indian/Mauritius' => '(UTC+04:00) Mauritius',
'Europe/Moscow' => '(UTC+04:00) Moscow',
'Asia/Muscat' => '(UTC+04:00) Muscat',
'Indian/Reunion' => '(UTC+04:00) Reunion',
'Europe/Samara' => '(UTC+04:00) Samara',
'Asia/Tbilisi' => '(UTC+04:00) Tbilisi',
'Europe/Volgograd' => '(UTC+04:00) Volgograd',
'Asia/Yerevan' => '(UTC+04:00) Yerevan',
'Asia/Kabul' => '(UTC+04:30) Kabul',
'Asia/Aqtau' => '(UTC+05:00) Aqtau',
'Asia/Aqtobe' => '(UTC+05:00) Aqtobe',
'Asia/Ashgabat' => '(UTC+05:00) Ashgabat',
'Asia/Dushanbe' => '(UTC+05:00) Dushanbe',
'Asia/Karachi' => '(UTC+05:00) Karachi',
'Indian/Kerguelen' => '(UTC+05:00) Kerguelen',
'Indian/Maldives' => '(UTC+05:00) Maldives',
'Antarctica/Mawson' => '(UTC+05:00) Mawson',
'Asia/Oral' => '(UTC+05:00) Oral',
'Asia/Samarkand' => '(UTC+05:00) Samarkand',
'Asia/Tashkent' => '(UTC+05:00) Tashkent',
'Asia/Colombo' => '(UTC+05:30) Colombo',
'Asia/Kolkata' => '(UTC+05:30) Kolkata',
'Asia/Kathmandu' => '(UTC+05:45) Kathmandu',
'Asia/Almaty' => '(UTC+06:00) Almaty',
'Asia/Bishkek' => '(UTC+06:00) Bishkek',
'Indian/Chagos' => '(UTC+06:00) Chagos',
'Asia/Dhaka' => '(UTC+06:00) Dhaka',
'Asia/Qyzylorda' => '(UTC+06:00) Qyzylorda',
'Asia/Thimphu' => '(UTC+06:00) Thimphu',
'Antarctica/Vostok' => '(UTC+06:00) Vostok',
'Asia/Yekaterinburg' => '(UTC+06:00) Yekaterinburg',
'Indian/Cocos' => '(UTC+06:30) Cocos',
'Asia/Rangoon' => '(UTC+06:30) Rangoon',
'Asia/Bangkok' => '(UTC+07:00) Bangkok',
'Indian/Christmas' => '(UTC+07:00) Christmas',
'Antarctica/Davis' => '(UTC+07:00) Davis',
'Asia/Ho_Chi_Minh' => '(UTC+07:00) Ho Chi Minh',
'Asia/Hovd' => '(UTC+07:00) Hovd',
'Asia/Jakarta' => '(UTC+07:00) Jakarta',
'Asia/Novokuznetsk' => '(UTC+07:00) Novokuznetsk',
'Asia/Novosibirsk' => '(UTC+07:00) Novosibirsk',
'Asia/Omsk' => '(UTC+07:00) Omsk',
'Asia/Phnom_Penh' => '(UTC+07:00) Phnom Penh',
'Asia/Pontianak' => '(UTC+07:00) Pontianak',
'Asia/Vientiane' => '(UTC+07:00) Vientiane',
'Asia/Brunei' => '(UTC+08:00) Brunei',
'Antarctica/Casey' => '(UTC+08:00) Casey',
'Asia/Choibalsan' => '(UTC+08:00) Choibalsan',
'Asia/Chongqing' => '(UTC+08:00) Chongqing',
'Asia/Harbin' => '(UTC+08:00) Harbin',
'Asia/Hong_Kong' => '(UTC+08:00) Hong Kong',
'Asia/Kashgar' => '(UTC+08:00) Kashgar',
'Asia/Krasnoyarsk' => '(UTC+08:00) Krasnoyarsk',
'Asia/Kuala_Lumpur' => '(UTC+08:00) Kuala Lumpur',
'Asia/Kuching' => '(UTC+08:00) Kuching',
'Asia/Macau' => '(UTC+08:00) Macau',
'Asia/Makassar' => '(UTC+08:00) Makassar',
'Asia/Manila' => '(UTC+08:00) Manila',
'Australia/Perth' => '(UTC+08:00) Perth',
'Asia/Shanghai' => '(UTC+08:00) Shanghai',
'Asia/Singapore' => '(UTC+08:00) Singapore',
'Asia/Taipei' => '(UTC+08:00) Taipei',
'Asia/Ulaanbaatar' => '(UTC+08:00) Ulaanbaatar',
'Asia/Urumqi' => '(UTC+08:00) Urumqi',
'Australia/Eucla' => '(UTC+08:45) Eucla',
'Asia/Dili' => '(UTC+09:00) Dili',
'Asia/Irkutsk' => '(UTC+09:00) Irkutsk',
'Asia/Jayapura' => '(UTC+09:00) Jayapura',
'Pacific/Palau' => '(UTC+09:00) Palau',
'Asia/Pyongyang' => '(UTC+09:00) Pyongyang',
'Asia/Seoul' => '(UTC+09:00) Seoul',
'Asia/Tokyo' => '(UTC+09:00) Tokyo',
'Australia/Adelaide' => '(UTC+09:30) Adelaide',
'Australia/Broken_Hill' => '(UTC+09:30) Broken Hill',
'Australia/Darwin' => '(UTC+09:30) Darwin',
'Australia/Brisbane' => '(UTC+10:00) Brisbane',
'Pacific/Chuuk' => '(UTC+10:00) Chuuk',
'Australia/Currie' => '(UTC+10:00) Currie',
'Antarctica/DumontDUrville' => '(UTC+10:00) DumontDUrville',
'Pacific/Guam' => '(UTC+10:00) Guam',
'Australia/Hobart' => '(UTC+10:00) Hobart',
'Asia/Khandyga' => '(UTC+10:00) Khandyga',
'Australia/Lindeman' => '(UTC+10:00) Lindeman',
'Australia/Melbourne' => '(UTC+10:00) Melbourne',
'Pacific/Port_Moresby' => '(UTC+10:00) Port Moresby',
'Pacific/Saipan' => '(UTC+10:00) Saipan',
'Australia/Sydney' => '(UTC+10:00) Sydney',
'Asia/Yakutsk' => '(UTC+10:00) Yakutsk',
'Australia/Lord_Howe' => '(UTC+10:30) Lord Howe',
'Pacific/Efate' => '(UTC+11:00) Efate',
'Pacific/Guadalcanal' => '(UTC+11:00) Guadalcanal',
'Pacific/Kosrae' => '(UTC+11:00) Kosrae',
'Antarctica/Macquarie' => '(UTC+11:00) Macquarie',
'Pacific/Noumea' => '(UTC+11:00) Noumea',
'Pacific/Pohnpei' => '(UTC+11:00) Pohnpei',
'Asia/Sakhalin' => '(UTC+11:00) Sakhalin',
'Asia/Ust-Nera' => '(UTC+11:00) Ust-Nera',
'Asia/Vladivostok' => '(UTC+11:00) Vladivostok',
'Pacific/Norfolk' => '(UTC+11:30) Norfolk',
'Asia/Anadyr' => '(UTC+12:00) Anadyr',
'Pacific/Auckland' => '(UTC+12:00) Auckland',
'Pacific/Fiji' => '(UTC+12:00) Fiji',
'Pacific/Funafuti' => '(UTC+12:00) Funafuti',
'Asia/Kamchatka' => '(UTC+12:00) Kamchatka',
'Pacific/Kwajalein' => '(UTC+12:00) Kwajalein',
'Asia/Magadan' => '(UTC+12:00) Magadan',
'Pacific/Majuro' => '(UTC+12:00) Majuro',
'Antarctica/McMurdo' => '(UTC+12:00) McMurdo',
'Pacific/Nauru' => '(UTC+12:00) Nauru',
'Antarctica/South_Pole' => '(UTC+12:00) South Pole',
'Pacific/Tarawa' => '(UTC+12:00) Tarawa',
'Pacific/Wake' => '(UTC+12:00) Wake',
'Pacific/Wallis' => '(UTC+12:00) Wallis',
'Pacific/Chatham' => '(UTC+12:45) Chatham',
'Pacific/Apia' => '(UTC+13:00) Apia',
'Pacific/Enderbury' => '(UTC+13:00) Enderbury',
'Pacific/Fakaofo' => '(UTC+13:00) Fakaofo',
'Pacific/Tongatapu' => '(UTC+13:00) Tongatapu',
'Pacific/Kiritimati' => '(UTC+14:00) Kiritimati',);

?>

    <title>Ghent International Endoscopy Symposium - Backend</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->

    <style>
    .modal-backdrop {
        opacity: 0.75 !important;
    }

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

            font-size: 1em;
        }

        .tiny {
            font-size: 0.75em;

        }

        .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
        }
    }
    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

    </header>







    <div class="container-fluid mx-0 pl-0 pr-0">



        <section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
            style="padding-top: 147.4px;">
            <!-- Header container -->
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class=" col-lg-12">
                        <!-- Salute + Small stats -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">GIEQs Admin Console</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>
                            
                        </div>

                        <!-- Account navigation -->
                        <?php require 'backendNav.php';?>


                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container-fluid px-lg-8">

                <!-- id check-->
                <?php

$formv1 = new formGenerator;

$general = new general;
$userFunctions = new userFunctions;

//error_reporting(E_ALL);

${$databaseName} = new $databaseName;

//eval("\$" . $databaseName . " = new " . $databaseName . ";");

//$programme = new programme;

if (isset($_GET['identifier']) && is_numeric($_GET['identifier'])) {
    $identifierValue = $_GET['identifier'];
    //echo $identifierValue;

} else {

    $identifierValue = null;

}

if ($identifierValue) {

    $sessionIdentifier = $identifierValue;

    $validRecord = ${$databaseName}->matchRecord($sessionIdentifier);

    if ($validRecord === false) {
        echo "No $databaseName with that id exists";
        exit();

    }
}

?>
<div id="identifier" style="display:none;"><?php echo $identifierValue;?>
</div>
                <div id="data" style="display:none;">
                    <?php

//get an array of the known programmes [first 50]

//echo ${$databaseName}->Load_records_limit_json(50);
?>
                </div>
                <?php

//create a standard form based on the database to be included in modals

?>

                <!--alerts-->

                <div id="topTableAlert" class="alert alert-success alert-flush collapse" role="alert">
                    <span id="topTableSuccess"></span>
                </div>

                <!-- Section title -->
                <div class="actions-toolbar py-2 mb-4">

                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="mb-1"><?php echo 'Paid Assets (Courses, Subscriptions, Collections)';?></h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block">Manage <?php echo $databaseName;?>.</p>
                        </div>
                        <div class="col text-right">
                            <div class="actions">
                                <!-- <a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a> -->
                                <a href="#" id="add<?php echo $databaseName;?>" class="action-item mr-2 active"><i
                                        class="fas fa-plus"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders table -->
                <div class="table-responsive">
                    <table id="dataTable" class="table text-center table-cards align-items-center">
                        <thead>
                            <tr>
                                <!-- EDIT -->
                                <th>id</th>
                                <th>name</th>
                                <th>description</th>
                                <th>asset_type</th>
                                <th>superCategory</th>
                                <th>cost</th>
                                <th>renew_frequency</th>
                                <th>partner</th>
                                <th>sponsor</th>
                                <th>advertise_for_purchase</th>

                                
                                <th></th>

                            </tr>
                        </thead>

                    </table>
                </div>
                <!-- Load more -->
                <!-- <div class="mt-4 text-center">
                    <a href="#" class="btn btn-sm btn-neutral rounded-pill shadow hover-translate-y-n3">Load more
                        ...</a>
                </div> -->
            </div>
        </section>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-row-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                <div class="modal-header">
                    <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                        <div>
                            <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                <img src="../../assets/img/icons/gieqsicon.png">
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="mb-0">Edit <?php echo $databaseName;?></h5>
                            <span class="mb-0"></span>
                        </div>

                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <div>
                                <h6 class="mb-0"></h6>
                                <span id="modalMessageArea" class="mb-0"></span>

                            </div>
                            <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
                                <span id="topModalSuccess"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">

                    <div class="<?php echo $databaseName;?>-body">
                        <form id="<?php echo $databaseName;?>-form">
                            <div class="form-group">
                                <!-- EDIT -->

                                <label for="name">name</label>
                                        <div class="input-group mb-3">
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>

                                        <label for="description">description</label>
                                        <div class="input-group mb-3">
                                            <textarea id="description" type="text" data-toggle="autosize" class="form-control" name="description"></textarea>
                                        </div>

                                        <label for="asset_type">asset_type</label>
                                        <div class="input-group mb-3">
                                            <select id="asset_type" type="text" data-toggle="select" class="form-control" name="asset_type">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="1">Site Wide Subscription</option>
                                            <option value="2">GIEQs Congress</option>
                                            <option value="3">Online Course</option>
                                            <option value="4">Online Video Collection</option>
                                            </select>
                                        </div>

                                        <label for="superCategory">superCategory</label>
                                        <div class="input-group mb-3">
                                            <select id="superCategory" type="text" data-toggle="select" class="form-control" name="superCategory">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <?php 
                                            
                                            $supercategories = $assetManager->getSuperCategories();

                                            foreach ($supercategories as $key=>$value){

                                                echo "<option value='{$value['superCategory']}'>{$value['superCategory_t']}<option>";

                                            }
                                            
                                            //echo $assetManager->getSuperCategories();?>
                                            </select>
                                        </div>


                                        <label for="linked_blog">linked_blog</label>
                                        <div class="input-group mb-3">
                                            <select id="linked_blog" type="text" data-toggle="select" class="form-control" name="linked_blog">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <?php 

                                            global $post;
                                            $args = array( 'category' => 14);
                                            $posts = get_posts($args);
                                            foreach( $posts as $post ) : setup_postdata($post); ?>
                                                <option value="<? echo $post->ID; ?>"><?php the_title(); ?></option>
                                            <?php endforeach; ?>
                                            
                                           
                                            
                                            </select>
                                        </div>

                                        <label for="cost">cost</label>
                                        <div class="input-group mb-3">
                                            <input id="cost" type="text" class="form-control" name="cost">
                                        </div>

                                        <label for="videos">Linked Videos</label>
                                        <div class="input-group mb-3">
                                            <select id="videos" type="text" data-toggle="select" class="form-control videos" name="videos" data-disabled="true">
                                            <!--TODO get centres from AJAX-->
                                            <!--or direct from PHP-->
                                            <?php echo $videosAccess->generateVideoRegistrationOptions();?>

                                            
                                            </select>
                                        </div>

                                        <label for="registrations">Linked Programmes</label>
                                        <div class="input-group mb-3">
                                            <select id="registrations" type="text" data-toggle="select" class="form-control registrations" name="registrations" data-disabled="true">
                                            <!--TODO get centres from AJAX-->
                                            <!--or direct from PHP-->
                                            <?php echo $userFunctions->generateUserRegistrationOptions();?>

                                            
                                            </select>
                                        </div>

                                        <label for="renew_frequency">Length (months), 999 continues indefinitely</label>
                                        <div class="input-group mb-3">
                                            <input id="renew_frequency" type="text" class="form-control" name="renew_frequency">
                                        </div>

                                        <label for="partner">partner organisation</label>
                                        <div class="input-group mb-3">
                                            <select id="partner" type="text" data-toggle="select" class="form-control" name="partner">
                                            <option value="" selected>please select an option</option>
                                            <?php 
                                            
                                            $partners = $assetManager->getPartners();

                                            foreach ($partners as $key=>$value){

                                                echo "<option value='{$value['id']}'>{$value['name']}<option>";

                                            }
                                            
                                            //echo $assetManager->getSuperCategories();?>
                                            
                                            </select>
                                        </div>

                                        <label for="sponsor">content sponsor</label>
                                        <div class="input-group mb-3">
                                            <select id="sponsor" type="text" data-toggle="select" class="form-control" name="sponsor">
                                            <option value="" selected>please select an option</option>
                                            <?php 
                                            
                                            $sponsors = $assetManager->getSponsors();

                                            foreach ($sponsors as $key=>$value){

                                                echo "<option value='{$value['id']}'>{$value['name']}<option>";

                                            }
                                            
                                            //echo $assetManager->getSuperCategories();?>
                                            
                                            </select>
                                        </div>

                                        <label for="advertise_for_purchase">advertise_for_purchase</label>
                                        <div class="input-group mb-3">
                                            <select id="advertise_for_purchase" type="text" data-toggle="select" class="form-control" name="advertise_for_purchase">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                       
                                            </select>
                                        </div>

                                        

                                <!-- <label for="firstname">First Name</label>
                                        <div class="input-group mb-3">
                                            <input id="firstname" type="text" class="form-control" name="firstname">
                                        </div>

                                    <label for="surname">Surname</label>
                                    <div class="input-group mb-3">
                                        <input id="surname" type="text" class="form-control" name="surname">
                                    </div>

                                    <label for="gender">Gender</label>
                                        <div class="input-group mb-3">
                                        <select id="gender" name="gender" class="form-control" data-toggle="select" aria-hidden="true" aria-invalid="false">
                            <option hidden="">select gender
                            </option>  
                            <option value="1">Female</option>
                              <option value="2"> Male</option>
                              <option value="3">Rather not say</option>
                            </select>
                                        </div> -->

                                <!-- <label for="email">email (also user id)</label>
                                    <div class="input-group mb-3">
                                        <input id="email" type="text" class="form-control" name="email">
                                    </div>

                                    <button class="btn bg-warning text-white p-2 m-2 send-welcome-mail">Send GIEQs digital welcome mail</button>

                                    <button class="btn bg-warning text-white p-2 m-2 send-mail">Send Password Reset Mail   </button>
                                    <button class="btn bg-warning text-white p-2 m-2 reset-activity">Fix user login issue   </button>


                                    <br/> -->



                                <!-- <label for="centreName">centreName</label>
                                        <div class="input-group mb-3">
                                            <input id="centreName" type="text" class="form-control" name="centreName">
                                        </div>

                                        <label for="registered_date">registered_date</label>
                                        <div class="input-group mb-3">
                                            <input id="registered_date" data-toggle = "date" type="text" class="form-control" name="registered_date">
                                        </div> -->




                                <!-- <label for="contactPhone">contactPhone</label>
                                        <div class="input-group mb-3">
                                            <input id="contactPhone" type="text" class="form-control" name="contactPhone">
                                        </div>

                                        <label for="centreCity">centreCity</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCity" type="text" class="form-control" name="centreCity">
                                        </div>

                                        <label for="centreCountry">centreCountry</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCountry" type="text" class="form-control" name="centreCountry">
                                        </div>

                                        <label for="trainee">trainee</label>
                                        <div class="input-group mb-3">
                                            <select id="trainee" type="text" data-toggle="select" class="form-control" name="trainee">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                
                                            </select>
                                        </div>
 -->
                                <!--  <label for="emailPreferences">emailPreferences</label>
                                        <div class="input-group mb-3">
                                            <select id="emailPreferences" type="text" data-toggle="select" class="form-control" name="emailPreferences">
                                            <option value="" selected disabled hidden>select</option>
                                            <option value="1">All email ok</option>
                                            <option value="2">Only regarding activities on the site</option>
                                            <option value="3">No email contact</option>
                                            </select>
                                        </div>

                                        <label for="key">key</label>
                                        <div class="input-group mb-3">
                                            <input id="key" type="text" class="form-control" name="key">
                                        </div> -->



                            </div>
                        </form>

                        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                            <p class="text-muted text-sm">Data entered here will change the live site</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>










    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="../../assets/js/purpose.core.js"></script> -->

    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>

    <script>
    var identifier = $('#identifier').text();

    //var dataSet = $.parseJSON($('#data').text());
    var datatable;
    var edit = 0;
    var optionsSelect;
    var lesionUnderEdit = null;
    var loading;
    var externalTest;
    var externalTest2;

    function tableRefresh() {

        //update the div at the top with AJAX

        // refresh the table


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

    var externalFormData;

    function fillForm(idPassed) {


        var stop;

        disableFormInputs("<?php echo $databaseName;?>-form");

        esdLesionRequired = new Object;

        esdLesionRequired = getNamesFormElements("<?php echo $databaseName;?>-form");

        esdLesionString = '`id`=\'' + idPassed + '\'';

        var selectorObject = getDataQueryLearning("<?php echo $databaseName;?>", esdLesionString, getNamesFormElements(
            "<?php echo $databaseName;?>-form"), 1);

        //console.log(selectorObject);

        selectorObject.done(function(data) {

            console.log(data);

            var formData = $.parseJSON(data);

            //externalFormData = formData;

            console.dir(formData);

            //if the user making the edit request is of lower rank than the user to be edited don't respond

            var userAccessLevel = "<?php echo $currentUserLevel;?>";


            externalFormData = userAccessLevel;




            $(formData).each(function(i, val) {

                if (parseInt(val.access_level) < parseInt(userAccessLevel)) {

                    console.log('edit not allowed');
                    //console.log(val.access_level);

                    stop = true;
                    return false;



                }


                $.each(val, function(k, v) {

                    /* if (k == 'access_level'){
                        console.log(v);
                        if (parseInt(v) < parseInt(userAccessLevel)){
                            console.log('edit not allowed');
                            $(document).find('#modal-row-1').modal('hide');
                            return false;
                            
                            
                        } 
                    } */

                    $(document).find("#" + k).val(v);

                    //if a select2, trigger change also required to display the change
                    if ($(document).find("#" + k).hasClass('select2-hidden-accessible') ===
                        true) {

                        $(document).find("#" + k).trigger('change');

                    }

                });

            });




            //$("#messageBox").text("Editing ESD lesion ID "+idPassed);

            //do specifics

            //get array of current registrations





        });

        const dataToSend = {



            assetid: lesionUnderEdit,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/getAssetProgrammes.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {


            data = data.trim();
            console.log(data);
            externalTest = $.parseJSON(data);
            if (data) {

                

                //$(document).find("#registrations").val(2);
                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".registrations").val(externalTest).trigger('change');

                }, 250, 'Wrapper Video');

            } else {

                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".registrations").val('').trigger('change');

                }, 250, 'Wrapper Video 3');

            }

            waitForFinalEvent(function() {
                if (stop === true) {

                    $(document).find('#modal-row-1').modal('hide');
                    resetFormElements("<?php echo $databaseName;?>-form");
                    return;
                }
            }, 500, 'Wrapper Video 2');





        })

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/getAssetVideos.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });

        request2.done(function(data) {


            data = data.trim();
            console.log(data);
            externalTest2 = $.parseJSON(data);
            if (data) {

                

                //$(document).find("#registrations").val(2);
                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".videos").val(externalTest2).trigger('change');

                }, 250, 'Wrapper Video 4');

            } else {

                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".videos").val('').trigger('change');

                }, 250, 'Wrapper Video 5');

            }

            waitForFinalEvent(function() {
                if (stop === true) {

                    $(document).find('#modal-row-1').modal('hide');
                    resetFormElements("<?php echo $databaseName;?>-form");
                    return;
                }
            }, 500, 'Wrapper Video 6');





            })






        enableFormInputs("<?php echo $databaseName;?>-form");

    }

    function sendUserEmail() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form


        //TODO add identifier and identifierKey

        const dataToSend = {

            passedUserid: lesionUnderEdit,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        $('.send-mail').prop('disabled', true);
        $('.send-mail').append('&nbsp&nbsp<i class="fas fa-circle-notch fa-spin"></i>');


        var passwordChange = $.ajax({
            url: siteRoot + "assets/scripts/passwordResetGenerateAdmin.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        passwordChange.done(function(data) {

            if (data) {
                Swal.fire({
                    type: 'info',
                    title: 'Password Reset',
                    text: data,
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',


                }).then((result) => {

                    $('.send-mail').prop('disabled', false);
                    $('.send-mail').find('.fa-spin').remove();

                    /* window.location.href = siteRoot;
                    resetFormElements('NewUserForm');
                    enableFormInputs('NewUserForm'); */
                    //$('#registerInterest').modal('hide');

                })

            }

        })

    }

    function sendUserWelcomeEmail() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form


        //TODO add identifier and identifierKey

        const dataToSend = {

            passedUserid: lesionUnderEdit,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        $('.send-welcome-mail').prop('disabled', true);
        $('.send-welcome-mail').append('&nbsp&nbsp<i class="fas fa-circle-notch fa-spin"></i>');


        var passwordChange = $.ajax({
            url: siteRoot + "assets/scripts/passwordResetGenerateAdminDigital.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        passwordChange.done(function(data) {

            if (data) {
                Swal.fire({
                    type: 'info',
                    title: 'Digital Invite',
                    text: data,
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',


                }).then((result) => {

                    $('.send-welcome-mail').prop('disabled', false);
                    $('.send-welcome-mail').find('.fa-spin').remove();

                    /* window.location.href = siteRoot;
                    resetFormElements('NewUserForm');
                    enableFormInputs('NewUserForm'); */
                    //$('#registerInterest').modal('hide');

                })

            }

        })

    }

    function fixUserLogin() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form


        //TODO add identifier and identifierKey

        const dataToSend = {

            passedUserid: lesionUnderEdit,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        $('.reset-activity').prop('disabled', true);
        $('.reset-activity').append('&nbsp&nbsp<i class="fas fa-circle-notch fa-spin"></i>');


        var userFix = $.ajax({
            url: siteRoot + "assets/scripts/fixUserAccess.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        userFix.done(function(data) {

            if (data) {
                Swal.fire({
                    type: 'info',
                    title: 'User Activity Reset',
                    text: data,
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',


                }).then((result) => {

                    $('.reset-activity').prop('disabled', false);
                    $('.reset-activity').find('.fa-spin').remove();

                    /* window.location.href = siteRoot;
                    resetFormElements('NewUserForm');
                    enableFormInputs('NewUserForm'); */
                    //$('#registerInterest').modal('hide');

                })

            }

        })

    }

    function submit<?php echo $databaseName;?>Form() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        console.log('got to the submit function');

        if (edit == 0) {

            var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "user_id", null, "0"); //insert new object

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    //alert ("New esdLesion no "+data+" created");
                    $('#topTableSuccess').text("New <?php echo $databaseName;?> no " + data + " created");

                    $('#modal-row-1').animate({
                        scrollTop: 0
                    }, 'slow');


                    $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });

                    //edit = 1;

                    //refresh table
                    datatable.ajax.reload();

                    //close modal
                    $('#modal-row-1').modal('hide');





                } else {

                    alert("No data inserted, try again");

                }


            });

        } else if (edit == 1) {


            if (lesionUnderEdit) {

                var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                    "<?php echo $databaseName;?>", "user_id", lesionUnderEdit, "1"); //insert new object

                esdLesionObject.done(function(data) {

                    console.log(data);

                    if (data) {

                        if (data == 1) {

                            $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " +
                                lesionUnderEdit + " saved");

                            $('#modal-row-1').animate({
                                scrollTop: 0
                            }, 'slow');

                            $("#topModalAlert").fadeTo(4000, 500).slideUp(500, function() {
                                $("#topTableAlert").slideUp(500);
                            });



                            //refresh table
                            datatable.ajax.reload();
                            //edit = 1;


                            //edit = 1;

                        } else if (data == 0) {

                            //alert("No change in data detected");
                            $('#modal-row-1').modal('hide');

                        } else if (data == 2) {

                            alert("Error, try again");


                        }



                    }


                });

            }


        }


    }

    //delete behaviour

    <?php if ($isSuperuser){

        if ($isSuperuser == 1){

            ?>

    function deleteRow(id) {

        //esdLesionPassed is the current record, some security to check its also that in the id field

        /* if (esdLesionPassed != $("#id").text()){

            return;

        } */


        if (confirm("Do you wish to delete this <?php echo $databaseName;?>?")) {

            disableFormInputs("<?php echo $databaseName;?>-form");

            var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "user_id", id, "2"
            ); //delete esdLesion //getFormdatav2 is specific for users

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    if (data == 1) {

                        $('#topTableSuccess').text("<?php echo $databaseName;?> deleted");

                        $("#topTableAlert").removeClass("alert-success").addClass("alert-danger").fadeTo(4000,
                            500).slideUp(500, function() {
                            $("#topTableAlert").slideUp(500);
                        });
                        //TODO refresh the table from AJAX
                        //esdLesionPassed = null;
                        //window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
                        //location.reload();
                        datatable.ajax.reload();


                        enableFormInputs("<?php echo $databaseName;?>-form");

                        //go to esdLesion list

                    } else {

                        alert("Error, could not delete.  Please try again");

                        enableFormInputs("<?php echo $databaseName;?>-form");

                    }



                }


            });

        }


    }

    <?php 

        }
    }
    ?>



    $(document).ready(function() {

        //add those which require date pickr



        var options = {
            enableTime: true,
            allowInput: true
        };

        if (identifier != ''){

            var targettd = identifier;
            //console.log(targettd);
            lesionUnderEdit = targettd;
            $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' + lesionUnderEdit);
            $('#modal-row-1').modal('show');
            fillForm(targettd);
            edit = 1;

        }

        $('[data-toggle="date"]').flatpickr(options);

        // add those which require select2 box

        $('[data-toggle="select"]').select2({

            dropdownParent: $(".modal-content"),
            //theme: "bootstrap",

        });

        $('.registrations').select2({

            dropdownParent: $(".modal-content"),
            //tags: true,
            multiple: true,
            /* ajax: {

                url: siteRoot + 'assets/scripts/querySelectProgrammes.php',

            dataType: 'json'
            },
            processResults: function(data) {
                    return {
                      results: data.items
                    };
                  }, */
        })

        $('.videos').select2({

dropdownParent: $(".modal-content"),
//tags: true,
multiple: true,
/* ajax: {

    url: siteRoot + 'assets/scripts/querySelectProgrammes.php',

dataType: 'json'
},
processResults: function(data) {
        return {
          results: data.items
        };
      }, */
})

        $('#user_id').select2({

            dropdownParent: $(".modal-content"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryUserSelect.php',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        $('#asset_id').select2({

            dropdownParent: $(".modal-content"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryAssetSelect.php',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        /* $('#registrations').select2({

            dropdownParent: $(".modal-content"),
            tags: true,


            tokenSeparators: [",", " "],

            multiple: true,
            ajax: {

                url: siteRoot + 'assets/scripts/querySelectProgrammes.php',
            data: function (params) {
                var query = {
                    search: params.term,
                }

                console.log(query);
                return query;
            },
            dataType: 'json'
            } 
           
            

        });*/

        //$(document).find(".registrations").trigger('change');

        //centre.change, submit ajax of the added tag, or remove



        datatable = $('#dataTable').DataTable({

            language: {
                infoEmpty: "There are currently no active <?php echo $databaseName;?>s.",
                emptyTable: "There are currently no active <?php echo $databaseName;?>s.",
                zeroRecords: "There are currently no active <?php echo $databaseName;?>s.",
            },
            autowidth: true,


            ajax: siteRoot +
                'assets/scripts/tableInteractors/refresh<?php echo $databaseName;?>Table.php',
            //TODO all classes need this function


            //EDIT
            columns: [
                
                {data: 'id' },
       {data: 'name' },
       {data: 'description' },
       {data: 'asset_type' },
       {data: 'superCategory' },

       {data: 'cost' },
       {data: 'renew_frequency' },
       {data: 'partner' },

       {data: 'sponsor' },
       {data: 'advertise_for_purchase' },


       

                {
                    data: null,
                    render: function(data, type, row) {
                        return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a class="action-item mr-2 dashboard" data-toggle="tooltip" title="view course dashboard" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <?php if ($isSuperuser == 1){ ?><a class="delete-row dropdown-item"> Delete </a><?php } ?> </div> </div> </div> </div>';
                    }
                }
            ],




        });



        /* datatable = $('#dataTable').DataTable( {

        data: dataSet,
        columns: [
            { data: 'id' },
            { data: 'date' },
            { data: 'title' },
            { data: 'subtitle' },
            { data: 'description' },
            {
            data: null,
            render: function ( data, type, row ) {
                return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
            }
            }
        ],




        } ); */

        $(document).on('click', '#add<?php echo $databaseName;?>', function() {


            $('#modalMessageArea').text('New <?php echo $databaseName;?>');
            $('#modal-row-1').modal('show');
            $(document).find('#<?php echo $databaseName;?>-form').find(':input').val('');
            $(document).find('#<?php echo $databaseName;?>-form').find(':checkbox, :radio').prop(
                'checked', false);
            $(document).find('#<?php echo $databaseName;?>-form').find('select').val('').trigger(
                'change'); //TODO ADD TO ALL PAGES WHERE SELECT2
            $(document).find('#<?php echo $databaseName;?>-form').find('.send-mail').prop('disabled',
                true);
            $(document).find('#<?php echo $databaseName;?>-form').find('.send-welcome-mail').prop(
                'disabled', true);
            $(document).find('#<?php echo $databaseName;?>-form').find('.reset-activity').prop(
                'disabled', true);
            $(document).find('#<?php echo $databaseName;?>-form').find('#registrations').prop(
                'disabled', true);

                $(document).find('#<?php echo $databaseName;?>-form').find('#videos').prop(
                'disabled', true);

            //as per Seauton request

            $(document).find('#<?php echo $databaseName;?>-form').find('#timezone').val(
                'Europe/Brussels').trigger('change');
            $(document).find('#<?php echo $databaseName;?>-form').find('#access_level').val('6')
                .trigger('change');;


            edit = 0;

        })

        $(document).on('click', '.fill-modal', function() {

            var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            lesionUnderEdit = targettd;
            $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' + lesionUnderEdit);
            $('#modal-row-1').modal('show');
            fillForm(targettd);
            edit = 1;

        })

        $(document).on('click', '.delete-row', function() {

            var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td')
                .first().text();
            console.log(targettd);
            //$('#modal-row-1').modal('show');
            deleteRow(targettd);

        })

        $(document).on('click', '.submit-<?php echo $databaseName;?>-form', function() {

            event.preventDefault();
            console.log('clicked');
            console.log($('#<?php echo $databaseName;?>-form').closest());
            $('#<?php echo $databaseName;?>-form').submit();

        })

        $(document).on('click', '.send-mail', function() {

            event.preventDefault();
            sendUserEmail();

        })

        $(document).on('click', '.send-welcome-mail', function() {

            event.preventDefault();
            sendUserWelcomeEmail();

        })

        $(document).on('click', '.reset-activity', function() {

            event.preventDefault();
            fixUserLogin();

        })

        $("#<?php echo $databaseName;?>-form").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field contains errors. It has been highlighted" :
                        +errors + " fields contain errors. They have been highlighted";


                    $('#error').text(message);
                    //$('div.error span').addClass('form-text text-danger');
                    //$('#errorWrapper').show();

                    $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                        $("#errorWrapper").slideUp(500);
                    });
                } else {
                    $('#errorWrapper').hide();
                }
            },
            ignore: [],
            rules: {

                //EDIT










                name:{
                        required : true,

            },

            
              
           description:{
                        required : true,

            },

            
              
           asset_type:{
                        required : true,

            },

            
              
           cost:{
                        required : true,

            },

            renew_frequency:{
                        required : true,

            },







            },
            submitHandler: function(form) {

                //submitPreRegisterForm();

                submit<?php echo $databaseName;?>Form();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        //detect change of multi-select tag box

        $(document).on('change', '.registrations', function() {

            /* alert('change'); */

            //ajax call to update the link

            //$('#registrations').refreshDataSelect2(optionsSelect);

            //get the options to choose from

            if (loading) {
                return;
            }

            var myOpts = [];

            $(".registrations option").each(function() {
                myOpts.push($(this).val());
            });

            const dataToSend = {


                programmeid: $(this).val(),
                assetid: lesionUnderEdit,
                options: myOpts,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/updateAssetProgrammes.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {



                if (data == 'User profile updated') {

                    Swal.fire({
                        title: 'Congratulations',
                        text: 'Your user profile was upgraded to GIEQs Standard',
                        type: 'success',
                        background: '#162e4d',
                        confirmButtonText: 'ok',
                        confirmButtonColor: 'rgb(238, 194, 120)',

                    })
                }

            })





        })

        $(document).on('change', '.videos', function() {

/* alert('change'); */

//ajax call to update the link

//$('#registrations').refreshDataSelect2(optionsSelect);

//get the options to choose from

if (loading) {
    return;
}

var myOpts = [];

$(".videos option").each(function() {
    myOpts.push($(this).val());
});

const dataToSend = {


    videoid: $(this).val(),
    assetid: lesionUnderEdit,
    options: myOpts,

}

const jsonString = JSON.stringify(dataToSend);
console.log(jsonString);



var request = $.ajax({
    url: siteRoot + "assets/scripts/updateAssetVideos.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
});



request.done(function(data) {



    if (data == 'User profile updated') {

        Swal.fire({
            title: 'Congratulations',
            text: 'Your user profile was upgraded to GIEQs Standard',
            type: 'success',
            background: '#162e4d',
            confirmButtonText: 'ok',
            confirmButtonColor: 'rgb(238, 194, 120)',

        })
    }

})





})


$(document).on('click', '.dashboard', function() {

var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
//console.log(targettd);
lesionUnderEdit = targettd;

//load edit form in new window

openInNewTab(siteRoot + 'view-pro-content/'+targettd);


})

    })
    </script>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>