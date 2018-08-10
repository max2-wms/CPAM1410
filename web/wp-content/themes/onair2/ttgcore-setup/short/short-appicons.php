<?php  
/*
Package: OnAir2
Description: Shortcode for creating app icons
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/



if(!function_exists('qantumthemes_appicons')){
	function qantumthemes_appicons ($atts){
		extract( shortcode_atts( array(
			'app_android' => '',
			'app_iphone' => '',
			'app_blackberry' => '',
			'app_itunes' => '',
			'app_winphone' => '',
			'app_winamp' => '',
			'app_tunein' => '',
			'app_mediaplayer' => ''
		), $atts ) );
		ob_start();



		?>
			<p class="qt-center">
			<?php 
			foreach ($atts as $var => $val){

				if($val !== '') {
					echo '<a href="'.esc_url($val).'" class="qt-btn qt-btn-primary qt-btn-l qt-appicon"><span class="qt-'.$var.'"></span></a>';
				}
			}  
			?>
			</p>
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-appicons","qantumthemes_appicons");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_appicons' );
if(!function_exists('qantumthemes_vc_appicons')){
function qantumthemes_vc_appicons() {
	vc_map( array(
		 "name" => esc_html__( "App Icons", "onair2" ),
		 "base" => "qt-appicons",
		 "icon" => get_template_directory_uri(). '/img/vc/radio-app-icons.png',
		 "description" => esc_html__( "Create links to external players", "onair2" ),
		 "category" => esc_html__( "Theme shortcodes", "onair2"),
		 "params" => array(

				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "Android", "onair2" ),
					 "param_name" => "app_android",
					 'value' => ''
				),
				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "iPhone", "onair2" ),
					 "param_name" => "app_iphone",
					 'value' => ''
				),
				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "Blackberry", "onair2" ),
					 "param_name" => "app_blackberry",
					 'value' => ''
				),
				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "iTunes", "onair2" ),
					 "param_name" => "app_itunes",
					 'value' => ''
				),
				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "Windows Phone", "onair2" ),
					 "param_name" => "app_winphone",
					 'value' => ''
				),
				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "Media Player", "onair2" ),
					 "param_name" => "app_mediaplayer",
					 'value' => ''
				),
				array(
					 "type" => "textfield",
					 "heading" => esc_html__( "Winamp", "onair2" ),
					 "param_name" => "app_winamp",
					 'value' => ''
				),
				 array(
					 "type" => "textfield",
					 "heading" => esc_html__( "Tunein", "onair2" ),
					 "param_name" => "app_tunein",
					 'value' => ''
				),
				
		 )
	) );
}}