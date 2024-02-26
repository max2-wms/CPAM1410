<?php
/*
Package: OnAir2
Description: Item of the chart archive
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<div class="qt-part-archive-item qt-item-chart">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<?php  echo qantumthemes_get_the_term_list( $post->ID, 'chartcategory', '', '</li><li>', '' );  ?>
				</li>
			</ul>
			<div class="qt-feedback">
	    		<?php 
	    		/**
	    		 *  Display item counters. see functions.php
	    		 */
	    		qantumthemes_item_counters($post->ID, false); 
	    		?>
	    	</div>
	    </div>
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
		  		<h3 class="qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow qt-ellipsis-2 qt-t">
						<?php the_title(); ?>
					</a>
				</h3>
			</div>
		</div>
		<div class="qt-header-bottom">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-view-list"></i></a>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'qantumthemes-squared' ); ?>">
            <?php the_post_thumbnail( 'qantumthemes-squared' ); ?>
        </div>
     	<?php } ?>
	</div>
</div>





