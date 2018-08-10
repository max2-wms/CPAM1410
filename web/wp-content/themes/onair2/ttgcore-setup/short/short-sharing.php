<?php  
/*
Package: OnAir2
Description: Shortcode for sharing link
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/



if(!function_exists('qantumthemes_short_sharing')){
	function qantumthemes_short_sharing ($atts){
		extract( shortcode_atts( array(
			'align' => '',
			'class' => '',
			'style' => 'qt-sharepage-vertical'
		), $atts ) );
		ob_start();

		$class = $class.' '.$align.' '.$style;

		?>
			<!-- SHARE FUNCTIONS ================================================== -->
			<div class="qt-short-share ">
				<ul class="qt-sharepage qt-content-primary <?php echo esc_attr($class); ?>">
					<li class="hide-on-med-and-down">
						<i class="qticon-share qt-sharelink qt-shareicon qt-content-primary-dark"></i>
					</li>
					<li>
						<a class="qt-popupwindow qt-sharelink qt-tooltipped" data-tooltip="<?php echo esc_attr__("Share on Facebook", "onair2"); ?>" data-position="right" data-sharetype="facebook" data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="#">
							<i class="qticon-facebook"></i>
						</a>
					</li>
					<li>
						<a class="qt-popupwindow qt-sharelink qt-tooltipped" data-tooltip="<?php echo esc_attr__("Share on Twitter", "onair2"); ?>" data-position="right"  data-sharetype="twitter" data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="#">
							<i class="qticon-twitter"></i>
						</a>
						</li>
					<li>
						<a class="qt-popupwindow qt-sharelink qt-tooltipped" data-tooltip="<?php echo esc_attr__("Share on Google+", "onair2"); ?>" data-position="right"  data-sharetype="google" data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="#">
							<i class="qticon-googleplus"></i>
						</a>
					</li>
					<li>
						<a class="qt-popupwindow qt-sharelink qt-tooltipped" data-tooltip="<?php echo esc_attr__("Share on Pinterest", "onair2"); ?>" data-position="right"  data-sharetype="pinterest" data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="#">
							<i class="qticon-pinterest"></i>
						</a>
					</li>
					<?php  
					/**
					 * Requires QT LoveIt plugin
					 */
					if(function_exists('qtli_post_like')){
						$post_id = get_the_ID();
						$vote_count = get_post_meta($post_id, "qtli_votes_count", true);
						?>
						<li>
							<a href="#" class="qt-btn-primary qt-sharelink qt-loveit-link <?php if( true === qtli_hasAlreadyVoted($post_id) ) { ?>qt-disabled<?php }  ?>  qt-tooltipped" data-tooltip="Love" data-position="right"  data-post_id="<?php echo esc_attr($post->ID); ?>"><i class="qticon-heart"></i>
								<span class="qtli count"><?php echo esc_attr($vote_count); ?></span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
			<!-- SHARE FUNCTIONS ================================================== -->



		<?php
		return ob_get_clean();
	}
}
if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-sharing","qantumthemes_short_sharing");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_short_sharing_vc' );
if(!function_exists('qantumthemes_short_sharing_vc')){
function qantumthemes_short_sharing_vc() {
	vc_map( array(
		 "name" => esc_html__( "Sharing icons", "onair2" ),
		 "base" => "qt-sharing",
		 "icon" => get_template_directory_uri(). '/img/qt-logo.png',
		 "description" => esc_html__( "Add sharing buttons to the page", "onair2" ),
		 "category" => esc_html__( "Theme shortcodes", "onair2"),
		 "params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Alignment", "onair2" ),
				"param_name" => "align",
				'value' => array(esc_html__("left", "onair2") => 'qt-left', esc_html__("center", "onair2") => 'qt-center',esc_html__("right", "onair2") => 'qt-right'),
			),	
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Style", "onair2" ),
				"param_name" => "style",
				'value' => array( esc_html__("vertical", "onair2") => 'qt-sharepage-vertical', esc_html__("horizontal", "onair2") => 'qt-sharepage-horizontal'),
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