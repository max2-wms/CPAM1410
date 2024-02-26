<?php  
/*
Package: OnAir2
Description: Captions and small captions
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


/**
 * 
 * Caption medium
 * =============================================
 */

if(!function_exists('qantumthemes_caption_med')){
	function qantumthemes_caption_med ($atts){
		extract( shortcode_atts( array(
			'title' => '',
			'class' => '',
		), $atts ) );
		ob_start();
		?>
			<h3 class="qt-caption-med qt-capfont <?php echo esc_attr($class); ?>"><span><?php echo esc_attr($title); ?></span></h3>
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-caption-med","qantumthemes_caption_med");
}

/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_caption_med' );
if(!function_exists('qantumthemes_vc_caption_med')){
function qantumthemes_vc_caption_med() {
  vc_map( array(
     "name" => esc_html__( "Caption", "onair2" ),
     "base" => "qt-caption-med",
     "icon" => get_template_directory_uri(). '/img/vc/captions.png',
     "description" => esc_html__( "Section caption", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(

        array(
           "type" => "textfield",
           "heading" => esc_html__( "Text", "onair2" ),
           "param_name" => "title",
           'value' => ''
        )
        ,array(
           "type" => "textfield",
           "heading" => esc_html__( "Class", "onair2" ),
           "param_name" => "class",
           'value' => '',
           'description' => 'add an extra class for styling with CSS'
        )
     )
  ) );
}}

/**
 * 
 * Caption small
 * =============================================
 */
if(!function_exists('qantumthemes_caption_small')){
	function qantumthemes_caption_small ($atts){
		extract( shortcode_atts( array(
			'class' => '',
			'title' => ''
		), $atts ) );
		ob_start();
		?>
			<h5 class="qt-caption-small qt-capfont <?php echo esc_attr($class); ?>"><span><?php echo esc_attr($title); ?></span></h5>
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-caption-small","qantumthemes_caption_small");
}

/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_qantumthemes_caption_small' );
if(!function_exists('qantumthemes_vc_qantumthemes_caption_small')){
function qantumthemes_vc_qantumthemes_caption_small() {
  vc_map( array(
     "name" => esc_html__( "Caption small", "onair2" ),
     "base" => "qt-caption-small",
     "icon" => get_template_directory_uri(). '/img/vc/caption-small.png',
     "description" => esc_html__( "Section caption small", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(

        array(
           "type" => "textfield",
           "heading" => esc_html__( "Text", "onair2" ),
           "param_name" => "title",
           'value' => ''
        )
        ,array(
           "type" => "textfield",
           "heading" => esc_html__( "Class", "onair2" ),
           "param_name" => "class",
           'value' => '',
           'description' => 'add an extra class for styling with CSS'
        )
     )
  ) );
}}


/**
 * 
 * Spacer
 * =============================================
 */
if(!function_exists('qantumthemes_spacer')){
	function qantumthemes_spacer ($atts){
		extract( shortcode_atts( array(
			'size' => 's',
		), $atts ) );
		if($size !== 's' && $size !== 'm' && $size !== 'l') {
			$size = 's';
		}
		ob_start();
		?>
			<hr class="qt-spacer-<?php echo esc_attr($size); ?>">
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-spacer","qantumthemes_spacer");
}


/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_spacer' );
if(!function_exists('qantumthemes_vc_spacer')){
function qantumthemes_vc_spacer() {
  vc_map( array(
     "name" => esc_html__( "Spacer", "onair2" ),
     "base" => "qt-spacer",
     "icon" => get_template_directory_uri(). '/img/vc/spacer.png',
     "description" => esc_html__( "Spacer", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
      	array(
           "type" => "dropdown",
           "heading" => esc_html__( "Size", "onair2" ),
           "param_name" => "size",
           'value' => array("s", "m", "l"),
           "description" => esc_html__( "Empty spacer separator", "onair2" )
        )
     )
  ) );
}}