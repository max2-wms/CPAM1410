<?php
/*
Package: OnAir2
Description: Post STICKY
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST STICKY ITEM ========================= -->
<div id="post-<?php the_ID(); ?>" <?php post_class( "qt-part-archive-item qt-featured" ); ?>>
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

		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
				<i class="dripicons-pin qt-icon-featured"></i>
		  		<h2 class="qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow">
						<?php the_title(); ?>
					</a>
				</h2>
			</div>
		</div>

		<div class="qt-header-bottom">
			<?php get_template_part('phpincludes/part-item-metas' ); ?>
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="<?php qantumthemes_format_icon_class($post->ID); ?>"></i></a>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'full' ); ?>">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
     	<?php } ?>
	</div>
	<div class="qt-item-content qt-card qt-the-content">
		<?php the_excerpt(); ?>
	</div>
</div>
<!-- POST STICKY ITEM END ========================= -->
