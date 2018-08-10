<?php
/*
Package: OnAir2
Description: Post item normal
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST ITEM ========================= -->
<div class="qt-part-archive-item qt-item-qtvideo">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
             		<?php  echo qantumthemes_get_the_term_list( $post->ID, 'vdl_filters', '', '</li><li>', '' );  ?>
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
		  		<h3 class="qt-ellipsis-2 qt-t qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow">
						<?php the_title(); ?>
					</a>
				</h3>
			</div>
		</div>
		<div class="qt-header-bottom">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-media-play"></i></a>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'large' ); ?>">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
     	<?php } ?>
	</div>
</div>
<!-- POST ITEM END ========================= -->
