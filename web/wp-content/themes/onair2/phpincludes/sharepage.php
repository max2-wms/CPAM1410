<?php
/*
Package: OnAir2
Description: SHARE FUNCTIONS
Version: 0.0.1
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


$id = get_the_ID();

// Get the featured image.
if ( has_post_thumbnail() ) {
	$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$thumbnail    = $thumbnail_id ? current( wp_get_attachment_image_src( $thumbnail_id, 'large', true ) ) : '';
} else {
	$thumbnail = null;
}
$title = get_the_title();
$title = urlencode($title);

	// Generate the Twitter URL.
$twitter_url = 'http://twitter.com/share?text=' . $title . '&url=' . get_the_permalink() . '';

// Generate the Facebook URL.
$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&title=' . get_the_title() . '';

// Generate the LinkedIn URL.
$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' .$title . '&title=' . get_the_title() . '';

// Generate the Pinterest URL.
$pinterest_url = 'https://pinterest.com/pin/create/button/?&url=' . get_the_permalink() . '&description=' . get_the_title() . '&media=' . esc_url( $thumbnail ) . '';

// Generate the Tumblr URL.
$tumblr_url = 'https://tumblr.com/share/link?url=' . $title . '&name=' . get_the_title() . '';


$email_url = 'subject='. get_the_title().'&amp;body=' . esc_html__('Check out this site', 'ttg-reaktions'). ' '.get_the_permalink()  ;



?>
<!-- SHARE FUNCTIONS ================================================== -->
<ul class="qt-sharepage qt-sharepage-vertical qt-content-primary">
	<li class="hide-on-med-and-down">
		<i class="qticon-share qt-shareicon qt-content-primary-dark tooltipped"></i>
	</li>
	<li>
		<a class="qt-popupwindow qt-sharelink qt-tooltipped" target="_blank" rel="nofollow"
		data-tooltip="<?php echo esc_attr__("Share on Facebook", "onair2"); ?>" data-position="right" 
		data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $facebook_url ); ?>">
			<i class="qticon-facebook"></i>
		</a>
	</li>
	<li>
		<a class="qt-popupwindow qt-sharelink qt-tooltipped" target="_blank" rel="nofollow" data-tooltip="<?php echo esc_attr__("Share on Twitter", "onair2"); ?>" data-position="right" 
			data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $twitter_url ); ?>">
			<i class="qticon-twitter"></i>
		</a>
	</li>


	<li>
		<a class="qt-popupwindow qt-sharelink qt-tooltipped" target="_blank" rel="nofollow" data-tooltip="<?php echo esc_attr__("Share on Pinterest", "onair2"); ?>" data-position="right" 
			data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $pinterest_url ); ?>">
			<i class="qticon-pinterest"></i>
		</a>
	</li>

	<li>
		<a class="qt-popupwindow qt-sharelink qt-tooltipped" target="_blank" rel="nofollow" data-tooltip="<?php echo esc_attr__("Share on Linkedin", "onair2"); ?>" data-position="right" 
			data-name="<?php echo esc_attr__("Share", "onair2"); ?>" data-width="600" data-height="500" target="_blank" href="<?php echo esc_url( $linkedin_url ); ?>">
			<i class="qticon-linkedin"></i>
		</a>
	</li>

	<li>
		<a class="qt-popupwindow qt-sharelink qt-tooltipped" target="_blank" rel="nofollow" data-tooltip="<?php echo esc_attr__("Send by Whatsapp", "onair2"); ?>" data-position="right" 
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
			<a href="#" class="qt-btn-primary qt-sharelink qt-loveit-link <?php if( true === qtli_hasAlreadyVoted($id) ) { ?>qt-disabled<?php }  ?>  qt-tooltipped" data-tooltip="Love" data-position="right"  data-post_id="<?php echo esc_attr( $id ); ?>"><i class="qticon-heart"></i>
				<span class="qtli count"><?php echo esc_attr($vote_count); ?></span>
			</a>
		</li>
	<?php } ?>
</ul>
<!-- SHARE FUNCTIONS ================================================== -->


