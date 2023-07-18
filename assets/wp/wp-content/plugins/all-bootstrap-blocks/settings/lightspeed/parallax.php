<?php
/*
Name: Parallax
Slug: parallax
Description: Parallax adds the effect of different elements on the page moving at differnt rates as a user scrolls.
Position: 30
Theme: 
*/
$slug = AREOI__PREPEND . ( !empty( $section ) ? '-' . $section : '' )  . '-parallax-';

return array(
	array(
		'label' => 'Include Parallax',
		'name' => $slug . 'parallax',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => null,
		'description' => 'Including parallax will add additional scripts to enable the parallax scrolling effect.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Background',
		'name' => $slug . 'background',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => null,
		'description' => 'If checked background images applied to the following blocks will have a parallax effect: Strip, Content Grid, Post Grid, Banner Item and Media Grid. This can be overidden on a block by block basis.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Components',
		'name' => $slug . 'components',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => null,
		'description' => 'If checked the following components will have a parallax effect: .accordion, .alert, .card, .list-group, .areoi-content-grid-item. This can be overidden on a block by block basis.',
		'allow_reset' => false,
		'options' => array()
	),
	array(
		'label' => 'Patterns',
		'name' => $slug . 'patterns',
		'variable' => '',
		'row' => 'default',
		'input' => 'checkbox',
		'default' => null,
		'description' => 'If checked and you have patterns turned on then the pattern will have the parallax effect applied. This can be overidden on a block by block basis.',
		'allow_reset' => false,
		'options' => array()
	),
);