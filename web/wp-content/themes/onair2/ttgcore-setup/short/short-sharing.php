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
			'e_style' => false,
			'e_alignment' => false,
			'style' => 'qt-sharepage-vertical'
		), $atts ) );
		ob_start();

		if($e_style){
			$style = $e_style;
		}
		if($e_alignment){
			$align = $e_alignment;
		}

		$class = $class.' '.$align.' '.$style;



		$id = get_the_ID();

		// Get the featured image.
		if ( has_post_thumbnail() ) {
			$thumbnail_id = get_post_thumbnail_id( $id );
			$thumbnail    = $thumbnail_id ? current( wp_get_attachment_image_src( $thumbnail_id, 'large', true ) ) : '';
		} else {
			$thumbnail = null;
		}

			// Generate the Twitter URL.
		$twitter_url = 'http://twitter.com/share?text=' . get_the_title() . '&url=' . get_the_permalink() . '';

		// Generate the Facebook URL.
		$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&title=' . get_the_title() . '';

		// Generate the LinkedIn URL.
		$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . get_the_title() . '';

		// Generate the Pinterest URL.
		$pinterest_url = 'https://pinterest.com/pin/create/button/?&url=' . get_the_permalink() . '&description=' . get_the_title() . '&media=' . esc_url( $thumbnail ) . '';

		// Generate the Tumblr URL.
		$tumblr_url = 'https://tumblr.com/share/link?url=' . get_the_permalink() . '&name=' . get_the_title() . '';


		$email_url = 'subject='. get_the_title().'&amp;body=' . esc_html__('Check out this site', 'onair2'). ' '.get_the_permalink()  ;




		?>
			<!-- SHARE FUNCTIONS ================================================== -->
			<div class="qt-short-share ">
				<ul class="qt-sharepage qt-content-primary <?php echo esc_attr($class); ?>">
					<li class="hide-on-med-and-down">
						<i class="qticon-share qt-sharelink qt-shareicon qt-content-primary-dark"></i>
					</li>
					<li>
						<a class="qt-popupwindow qt-sharelink" target="_blank" rel="nofollow"
						data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $facebook_url ); ?>">
							<i class="qticon-facebook"></i>
						</a>
					</li>
					<li>
						<a class="qt-popupwindow qt-sharelink" target="_blank" rel="nofollow" 
							data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $twitter_url ); ?>">
							<i class="qticon-twitter"></i>
						</a>
					</li>


					<li>
						<a class="qt-popupwindow qt-sharelink" target="_blank" rel="nofollow" 
							data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $pinterest_url ); ?>">
							<i class="qticon-pinterest"></i>
						</a>
					</li>

					<li>
						<a class="qt-popupwindow qt-sharelink" target="_blank" rel="nofollow"  
							data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $linkedin_url ); ?>">
							<i class="qticon-linkedin"></i>
						</a>
					</li>

					<li>
						<a class="qt-popupwindow qt-sharelink" target="_blank" rel="nofollow" 
							data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank"  href="https://wa.me/?text=<?php echo urlencode( get_the_title().' - ' ).get_the_permalink(); ?>">
							<i class="qticon-whatsapp"></i>
						</a>
					</li>


					<?php  
					/**
					 * Requires QT LoveIt plugin
					 */
					if(function_exists('qtli_post_like')){
						$vote_count = get_post_meta($id, "qtli_votes_count", true);
						?>
						<li>
							<a href="#" class="qt-btn-primary qt-sharelink qt-loveit-link <?php if( true === qtli_hasAlreadyVoted($id) ) { ?>qt-disabled<?php }  ?>""  data-post_id="<?php echo esc_attr($id); ?>"><i class="qticon-heart"></i>
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