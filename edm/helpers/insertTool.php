<?php

//insert new script


//requirements

$namedatabase;
$nameValueListDatabase;
$namePageLayoutDatabase;


//insert a database entry
$database = [ 'name' => '', 'type' => ''];


//insert a matching entry in the page layout
$pageLayout = [ 'name' => '[[from above]]', 'position' => '', 'order' => '', 'type' => '', 'text' => '', 'toolTip' => ''];


//insert, if required a value list entry
$valueList = [ 'name' => '[[from above]]', 'options' => [ '0' => 'option0', '' => '']];

print_r($valueList);

