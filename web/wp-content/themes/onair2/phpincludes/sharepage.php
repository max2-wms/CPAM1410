<?php
/*
Package: OnAir2
Description: SHARE FUNCTIONS
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- SHARE FUNCTIONS ================================================== -->
<ul class="qt-sharepage qt-sharepage-vertical qt-content-primary">
	<li class="hide-on-med-and-down">
		<i class="qticon-share qt-shareicon qt-content-primary-dark tooltipped"></i>
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
<!-- SHARE FUNCTIONS ================================================== -->


