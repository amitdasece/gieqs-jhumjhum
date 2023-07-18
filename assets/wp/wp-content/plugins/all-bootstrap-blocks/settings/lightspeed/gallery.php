<?php
/*
Name: Gallery
Slug: gallery
Description: Control how images and videos are displayed ina  gallery.
Position: 20
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-gallery-';

return array(
	array(
		'label' => 'Include Gallery',
		'name' => $slug . 'include',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => false,
		'description' => 'If checked media will display in a full screen gallery when clicked.',
		'allow_reset' => false,
		'options' => array()
	),
);