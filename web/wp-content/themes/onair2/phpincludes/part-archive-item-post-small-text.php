<?php
/*
Package: OnAir2
Description: Post SMALL TEXT
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST SMALL TEXT ITEM ========================= -->
<div class="qt-part-archive-item qt-part-archive-item-small-text">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<?php the_category('</li><li>'); ?>
				</li>
			</ul>
			<div class="qt-feedback">
	    		<?php 
	    		/**
	    		 *  Display item counters. see functions.php
	    		 */
	    		qantumthemes_item_counters($post->ID, true); 
	    		?>
	    	</div>
	    </div>
		<div class="qt-header-bottom">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="<?php qantumthemes_format_icon_class($post->ID); ?>"></i></a>
		</div>
		<?php 
		/**
		 *
		 *	Featured image background
		 * 
		 */
		if (has_post_thumbnail()){ ?>
	        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'medium' ); ?>">
	            <?php the_post_thumbnail( 'medium',array('class'=>'img-responsive activator') ); ?>
	        </div>
     	<?php } ?>
	</div>
	<h4 class="qt-title">
		<a href="<?php the_permalink(); ?>" class="qt-spacer-s qt-ellipsis-2 qt-t">
			<?php the_title(); ?>
		</a>
	</h4>
</div>
<!-- POST SMALL TEXT ITEM END ========================= -->
