<?php
/*
Package: OnAir2
Description: Post HERO
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST HERO ITEM ========================= -->
<div class="qt-part-archive-item qt-part-item-post-hero">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<div class="qt-feedback">
	    		<?php 
	    		/**
	    		 *  Display item counters. see functions.php
	    		 */
	    		qantumthemes_item_counters($post->ID, true); 
	    		?>
	    	</div>
	    </div>
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
				<ul class="qt-tags">
					<li>
						<?php the_category('</li><li>'); ?>
					</li>
				</ul>
		  		<h2 class="qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow qt-ellipsis-2 qt-t">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="qt-the-content qt-spacer-s small hide-on-med-and-down ">
					<p class="qt-spacer-s qt-text-shadow small qt-ellipsis-2">
					<?php echo get_the_excerpt(); ?>
					</p>
					<p><a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-l qt-btn-primary "><i class="<?php qantumthemes_format_icon_class($post->ID); ?>"></i></a></p>
				</div>
			</div>
		</div>
		<?php 
		/**
		 *
		 *	Featured image background
		 * 
		 */
		if (has_post_thumbnail()){ ?>
	        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'large' ); ?>">
	            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive activator') ); ?>
	        </div>
     	<?php } ?>
	</div>
</div>
<!-- POST HERO ITEM END ========================= -->
