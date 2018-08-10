<?php  
/**
 * Create sections using the WordPress Customizer API.
 * @package Kirki
 */
if(!function_exists('qantumthemes_kirki_sections')){
function qantumthemes_kirki_sections( $wp_customize ) {
	$wp_customize->add_section( 'qt_header_section', array(
		'title'       => esc_attr__( 'Header', "onair2" ),
		'priority'    => 100
	));
	$wp_customize->add_section( 'qt_social_section', array(
		'title'       => esc_attr__( 'Social networks', "onair2" ),
		'priority'    => 101,
		'description' => esc_attr__( 'Social network profiles', "onair2" ),
	));
	$wp_customize->add_section( 'qt_footer_section', array(
		'title'       => esc_attr__( 'Footer Customization', "onair2" ),
		'priority'    => 102,
		'description' => esc_attr__( 'Footer text and functions', "onair2" ),
	));
	$wp_customize->add_section( 'qt_radioplayer_section', array(
		'title'       => esc_attr__( 'Radio settings', "onair2" ),
		'priority'    => 103,
		'description' => esc_attr__( 'Radio schedule and player settings', "onair2" ),
	));
	$wp_customize->add_section( 'qt_revent_section', array(
		'title'       => esc_attr__( 'Events settings', "onair2" ),
		'priority'    => 104,
		'description' => esc_attr__( 'Manage the way releases are displayed', "onair2" ),
	));
	$wp_customize->add_section( 'qt_dev_section', array(
		'title'       => esc_attr__( 'Developer settings', "onair2" ),
		'priority'    => 999,
		'description' => esc_attr__( 'Extra options for developers', "onair2" ),
	));

	$wp_customize->add_section( 'qt_typography', array(
		'title'       => esc_attr__( 'Typography', "onair2" ),
		'priority'    => 100,
		'description' => esc_attr__( 'Customize font settings', "onair2" ),
	));

	$wp_customize->add_section( 'qt_404', array(
		'title'       => esc_attr__( '404 error page', "onair2" ),
		'priority'    => 100
	));

	$wp_customize->add_section( 'qt_colors_section', array(
		'title'       => esc_attr__( 'Colors customization', "onair2" ),
		'priority'    => 50,
		'description' => esc_attr__( 'Colors of your website', "onair2" ),
	));

}}
add_action( 'customize_register', 'qantumthemes_kirki_sections' );
