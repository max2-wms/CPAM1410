<?php
/*
Package: OnAir2
Description: Post list
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST SMALL TEXT ITEM ========================= -->
<div class="qt-part-archive-item qt-part-archive-item-post-list">
	<div class="row">
		<div class="col s3 m3 l3">
			<?php if(has_post_thumbnail()){ ?>
			<a href="<?php the_permalink(); ?>" class="qt-part-archive-item__thumb-squared">
			<?php the_post_thumbnail('thumbnail' ); ?>
			</a>
			<?php } ?>

		</div>
		<div class="col s9 m9 l9 ">
			
			<div class="qt-feedback">
			<?php 
    		/**
    		 *  Display item counters. see functions.php
    		 */
    		qantumthemes_item_counters($post->ID, true);
    		?>
    		</div>
			<h4 class="qt-title">
				<a href="<?php the_permalink(); ?>" class="qt-ellipsis-2 qt-t">
					<?php the_title(); ?>
				</a>
			</h4>

			
		</div>
	</div>
</div>
<!-- POST SMALL TEXT ITEM END ========================= -->
