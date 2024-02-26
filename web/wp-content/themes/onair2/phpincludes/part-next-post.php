<?php
/*
Package: OnAir2
Description: Post compact
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
$next_post = get_next_post();
?>
<!-- POST ITEM ========================= -->
<div class="qt-part-archive-item qt-compact">
	<div class="qt-item-header">
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
				<h6 class="qt-text-secondary"><?php echo esc_attr__("Next post", "onair2"); ?></h6>
		  		<h3 class="qt-spacer-s qt-title">
					<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="qt-text-shadow">
						<?php echo get_the_title($next_post->ID); ?>
					</a>
				</h3>
				<hr class="qt-spacer-s">
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="qt-btn qt-btn-primary qt-readmore "><i class="<?php qantumthemes_format_icon_class($post->ID); ?>"></i></a>
			</div>
		</div>
		<?php if (has_post_thumbnail($next_post->ID)){ 
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'large' );
			$picture = $thumb['0'];
			?>
	        <div class="qt-header-bg" data-bgimage="<?php echo esc_url($picture); ?>">
	            <img src="<?php echo esc_url($picture); ?>" width="<?php echo esc_url($thumb['1']); ?>" height="<?php echo esc_url($thumb['2']); ?>" alt="<?php echo esc_attr__("Thumbnail", "onair2"); ?>">
	        </div>
	     <?php } ?>
	</div>
</div>
<!-- POST ITEM END ========================= -->
<?php  
wp_reset_postdata();