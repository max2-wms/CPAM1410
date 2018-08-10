<?php
/*
Package: OnAir2
Description: Carousel of events based on slideshow carousel shortcode
Version: 1.9.9
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


/**
 * ====================================================================================
 *
 *	EVENTS SHORTCODE
 *
 * ====================================================================================
 */


if(!function_exists('qantumthemes_eventscarousel_short')) {
	function qantumthemes_eventscarousel_short($atts){
		ob_start();
		extract( shortcode_atts( array(
			'quantity' => 6,
			'category' => false,
			'orderby' => false
			
		), $atts ) );
		echo do_shortcode('[qt-slideshow-carousel posttype="event" category="'.esc_attr($category).'" orderby="'.esc_attr($orderby).'" quantity="'.esc_attr($quantity).'"]' );
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-slideshow-eventcarousel","qantumthemes_eventscarousel_short");
}


/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_eventcarousel_short' );
if(!function_exists('qantumthemes_vc_eventcarousel_short')){
function qantumthemes_vc_eventcarousel_short() {
  vc_map( array(
     "name" => esc_html__( "Events Carousel", "onair2" ),
     "base" => "qt-slideshow-eventcarousel",
     "icon" => get_template_directory_uri(). '/img/qt-logo.png',
     "description" => esc_html__( "Carousel of events on 3 columns", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
     	

      	array(
           "type" => "dropdown",
           "heading" => esc_html__( "Quantity", "onair2" ),
           "param_name" => "quantity",
           'value' => array("6", "9", "12", "15"),
           "description" => esc_html__( "Number of posts to display", "onair2" )
        ),
        array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by eventtype (slug)", "onair2" ),
           "description" => esc_html__("Insert the slug of an eventtype to filter the results","onair2"),
           "param_name" => "category"
        ),
       
     )
  ) );
}}



