<?php  
/*
Package: onair2
*/

/**
 * 
 * Featured list with titles links and bullet list
 * =============================================
 */
if(!function_exists('qantumthemes_tabs_shortcode')){
	function qantumthemes_tabs_shortcode ($atts){
		extract( shortcode_atts( array(
			'class' => '',
			'items' => array(),
		), $atts ) );
		

		if(!function_exists('vc_param_group_parse_atts') ){
			return;
		}
		ob_start();
		if(is_array($atts)){
			if(array_key_exists("items", $atts)){
				$items = vc_param_group_parse_atts( $atts['items'] );
			}
		}
		if(is_array($items)){
			if(array_key_exists("title", $items[0])){
				$id = preg_replace('/[0-9]+/', '', uniqid('qttabs')); 
				?>
				<ul class="tabs qt-tabs qt-content-primary-dark qt-small">
					<?php  
					foreach($items as $item){
						if(array_key_exists("text", $item)){
							?>
							<li class="tab"><a href="#<?php echo esc_attr($id); echo onair2_slugify($item["title"]); ?>"><?php echo esc_html($item["title"]); ?></a></li>
							<?php
						}
					}
					?>
				</ul>
				<?php  
				foreach($items as $item){
					if(array_key_exists("text", $item)){
						?>
						<div id="<?php echo esc_attr($id); echo onair2_slugify($item["title"]); ?>" class="qt-paper">
							<div class="qt-paddedcontainer">
								<?php echo str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $item['text'] ) ); ?>
							</div>
						</div>
						<?php
					}
				}
			}
		}
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("onair2-tabs","qantumthemes_tabs_shortcode");
}







/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_tabs_shortcode_vc' );
if(!function_exists('qantumthemes_tabs_shortcode_vc')){
function qantumthemes_tabs_shortcode_vc() {
  vc_map( array(
	 "name" => esc_html__( "Tabs", "onair2" ),
	 "base" => "onair2-tabs",
	 "icon" => get_template_directory_uri(). '/img/vc/tab-vc-shortcode.png',
	 "category" => esc_html__( "Theme shortcodes", "onair2"),
	 "params" => array(
		array(
			'type' => 'param_group',
			'value' => '',
			'param_name' => 'items',
			'params' => array(
				array(
				   "type" => "textfield",
				   "heading" => esc_html__( "Title", "onair2" ),
				   "param_name" => "title",
				   'value' => ''
				),
				array(
					'type' => 'textarea',
					'value' => '',
					'heading' => 'Content',
					'param_name' => 'text',
				)
			)
		),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Class", "onair2" ),
		   "param_name" => "class",
		   'value' => '',
		   'description' => 'add an extra class for styling with CSS'
		),
	 )
  ) );
}}