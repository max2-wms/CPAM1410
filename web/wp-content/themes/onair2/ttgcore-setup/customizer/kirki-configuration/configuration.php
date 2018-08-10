<?php  
/**
 * Configuration for the Kirki Customizer.
 * @package Kirki
 */


Kirki::add_config( 'qt_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod'
) );



if(!function_exists('qantumthemes_kirki_configuration')){
function qantumthemes_kirki_configuration( $config ) {
	return wp_parse_args( array (
		'disable_loader' => true
	), $config );
}}

add_filter( 'kirki/config', 'qantumthemes_kirki_configuration' );