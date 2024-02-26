<?php  
/*
Package: OnAir2
Description: Shortcode now on air
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/



if(!function_exists('qantumthemes_short_nowonair')){
	function qantumthemes_short_nowonair ($atts){
		extract( shortcode_atts( array(
			'title' => '',
			'tag' => false,
			'align' => '',
			'class' => ''
		), $atts ) );

		if(!$tag){
			$tag = 'p';
		}
		ob_start();
		?>
			<?php echo '<'.esc_attr($tag); ?> class="qt-short-nowonairtextual <?php echo esc_attr($class.' '.$align); ?>">
			<?php  echo esc_html($title); ?> <span></span>
			<?php echo '</p'.esc_attr($tag).'>'; ?>
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-nowonair","qantumthemes_short_nowonair");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_short_nowonair_vc' );
if(!function_exists('qantumthemes_short_nowonair_vc')){
function qantumthemes_short_nowonair_vc() {
	vc_map( array(
		 "name" => esc_html__( "Now On Air text", "onair2" ),
		 "base" => "qt-nowonair",
		 "icon" => get_template_directory_uri(). '/img/vc/radio-song-title.png',
		 "description" => esc_html__( "Display the song title if enabled in radio channel", "onair2" ),
		 "category" => esc_html__( "Theme shortcodes", "onair2"),
		 "params" => array(
			array(
				 "type" => "textfield",
				 "heading" => esc_html__( "Title", "onair2" ),
				 "param_name" => "title",
				 'value' => ''
			),	
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Container", "onair2" ),
				"param_name" => "tag",
				'value' => array("p", "H1","H2","H3","H4","H5","H6",),
				"description" => esc_html__( "Container style", "onair2" )
			),	
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Alignment", "onair2" ),
				"param_name" => "align",
				'value' => array("left" => 'qt-left', "center" => 'qt-center',"right" => 'qt-right'),
			),		
			array(
				"type" => "textfield",
				"heading" => esc_html__( "CSS class", "onair2" ),
				"param_name" => "class",
				'value' => ''
			),	
		 )
	) );
}}