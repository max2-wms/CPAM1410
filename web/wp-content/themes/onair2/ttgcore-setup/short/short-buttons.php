<?php  
/*
Package: onair2
Description: Buttons shortcode
*/

/**
 * 
 * Caption medium
 * =============================================
 */
if(!function_exists('qantumthemes_buttons_shortcode')){
	function qantumthemes_buttons_shortcode ($atts){
		extract( shortcode_atts( array(
			'text' => 'click',
			'link' => '#',
			'size' => 'qt-btn-s',
			'target' => '',
			'style' => 'qt-btn-default',
			'alignment' => '',
			'class' => ''
		), $atts ) );





		ob_start();
		?>
		<?php  
		if($alignment == 'aligncenter'){
			?>
			<p class="aligncenter">
			<?php
		}
		?>
		<a href="<?php echo esc_attr($link); ?>" <?php if($target == "_blank"){ ?> target="_blank" <?php } ?> class="qt-btn qw-disableembedding <?php  echo esc_attr($size.' '.$size.' '.$style.' '.$alignment.' '.$class); ?>"><?php echo esc_attr($text); ?></a>
		<?php  
		if($alignment == 'aligncenter'){
			?>
			</p>
			<?php
		}
		?>
		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-button","qantumthemes_buttons_shortcode");
}

/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_buttons_shortcode' );
if(!function_exists('qantumthemes_vc_buttons_shortcode')){
function qantumthemes_vc_buttons_shortcode() {
  vc_map( array(
	"name" => esc_html__( "Button", "onair2" ),
	"base" => "qt-button",
	"icon" => get_template_directory_uri(). '/img/vc/button.png',
	"description" => esc_html__( "Add a button with link", "onair2" ),
	"category" => esc_html__( "Theme shortcodes", "onair2"),
	"params" => array(
			array(
				'type' => 'textfield',
				'value' => '',
				'heading' => 'Text',
				'param_name' => 'text',
			),
			array(
				'type' => 'textfield',
				'value' => '',
				'heading' => 'Link',
				'param_name' => 'link',
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Link target", "onair2" ),
				"param_name" => "target",
				'value' => array( 
					esc_attr__("Same window","onair2") => "",
					esc_attr__("New window","onair2") => "_blank",
					)			
				),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Size", "onair2" ),
				"param_name" => "size",
				'value' => array("Small" => "qt-btn-s","Medium" => "qt-btn-m","Large" => "qt-btn-l"),
				"description" => esc_html__( "Button size", "onair2" )
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Button style", "onair2" ),
				"param_name" => "style",
				'value' => array( 
					esc_attr__("Default","onair2") => "qt-btn-default",
					esc_attr__("Primary","onair2") => "qt-btn-primary",
					esc_attr__("Secondary","onair2") => "qt-btn-secondary",
					esc_attr__("Ghost","onair2") => "qt-btn-ghost",
					)			
				),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Alignment", "onair2" ),
				"param_name" => "alignment",
				'value' => array( 
								esc_attr__("Default","onair2") => "",
								esc_attr__("Left","onair2") => "alignleft",
								esc_attr__("Right","onair2") => "alignright",
								esc_attr__("Center","onair2") => "aligncenter",
								),
				"description" => esc_html__( "Button style", "onair2" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Class", "onair2" ),
				"param_name" => "class",
				'value' => '',
				'description' => 'add an extra class for styling with CSS'
			)
		)
  	));
}}
