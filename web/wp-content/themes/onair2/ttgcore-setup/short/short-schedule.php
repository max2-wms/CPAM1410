<?php
/*
Package: OnAir2
Description: Schedule shortcode parameters
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

if(!function_exists('qantumthemes_showgrid')) {
	function qantumthemes_showgrid($atts){
		// global $qantumthemes_schedulefilter;
		extract( shortcode_atts( array(
			'schedulefilter' => false,
            'tax_filter' => false,
		), $atts ) );
		ob_start();
        // $qantumthemes_schedulefilter = $schedulefilter;
        $args['schedulefilter'] = $schedulefilter;
        $args['tax_filter'] = $tax_filter;
		get_template_part('phpincludes/part','show-schedule', $args );
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-schedule","qantumthemes_showgrid");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_showgrid' );
if(!function_exists('qantumthemes_vc_showgrid')){
function qantumthemes_vc_showgrid() {
  vc_map( array(
     "name" => esc_html__( "Shows schedule", "onair2" ),
     "base" => "qt-schedule",
     "icon" => get_template_directory_uri(). '/img/qt-logo.png',
     "description" => esc_html__( "Display a hero section of the show actually playing", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
      	array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by 'schedulefilter' taxonomy", "onair2" ),
           "description" => esc_html__("Insert the slug of a schedulefilter taxonomy for multi-radio websites","onair2"),
           "param_name" => "schedulefilter"
        )
     )
  ) );
}}