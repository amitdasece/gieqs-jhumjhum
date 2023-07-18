<?php
/*
Name: Blocks
Slug: blocks
Description: Specify the templates you would like to use for each block as a default.
Position: 10
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-blocks-';

return array(
	array(
		'label' => 'Header',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Header Template',
		'name' => $slug . 'header',
		'block' => 'header',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),

	array(
		'label' => 'Footer',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Footer Template',
		'name' => $slug . 'footer',
		'block' => 'footer',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),

	array(
		'label' => 'Hero',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'hero',
		'block' => 'hero',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'hero-alternate',
	// 	'block' => 'hero',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Content with Media',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'content-with-media',
		'block' => 'content-with-media',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Alternate Template',
		'name' => $slug . 'content-with-media-alternate',
		'block' => 'content-with-media',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),

	array(
		'label' => 'Content with Items',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'content-with-items',
		'block' => 'content-with-items',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'content-with-items-alternate',
	// 	'block' => 'content-with-items',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Media',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'media',
		'block' => 'media',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'media-alternate',
	// 	'block' => 'media',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Posts',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'posts',
		'block' => 'posts',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'post-grid-alternate',
	// 	'block' => 'posts',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Call to Action',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'call-to-action',
		'block' => 'call-to-action',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'call-to-action-alternate',
	// 	'block' => 'call-to-action',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Next and Previous',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'next-and-previous',
		'block' => 'next-and-previous',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'next-and-previous-alternate',
	// 	'block' => 'next-and-previous',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Logos',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'logos',
		'block' => 'logos',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'logos-alternate',
	// 	'block' => 'logos',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),

	array(
		'label' => 'Contact',
		'name' => '',
		'variable' => '',
		'row' => 'default',
		'input' => 'header',
		'default' => '',
		'description' => '',
		'allow_reset' => true,
		'options' => array()
	),
	array(
		'label' => 'Main Template',
		'name' => $slug . 'contact',
		'block' => 'contact',
		'variable' => '',
		'row' => 'default',
		'input' => 'block-template',
		'default' => 'basic.php',
		'description' => '',
		'allow_reset' => false,
		'options' => array()
	),
	// array(
	// 	'label' => 'Alternate Template',
	// 	'name' => $slug . 'contact-alternate',
	// 	'block' => 'contact',
	// 	'variable' => '',
	// 	'row' => 'default',
	// 	'input' => 'block-template',
	// 	'default' => 'basic.php',
	// 	'description' => '',
	// 	'allow_reset' => false,
	// 	'options' => array()
	// ),
);