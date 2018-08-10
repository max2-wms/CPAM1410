<?php
/*
Package: OnAir2
Description: Show item related
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- SHOW RELATED ITEM ========================= -->
<div class="qt-part-archive-item qt-part-archive-item-show qt-negative">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<?php  echo qantumthemes_get_the_term_list( $post->ID, 'genre', '', '</li><li>', '' );  ?>
				</li>
			</ul>
	    </div>
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
		  		<h3 class="qt-ellipsis qt-t qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow"><?php the_title(); ?></a>
				</h3>
				<p class="qt-small qt-ellipsis"><?php echo esc_attr(get_post_meta($post->ID,"subtitle", true)); ?></p>
			</div>
		</div>
		<div class="qt-header-bottom">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-headset"></i></a>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'medium' ); ?>">
            <?php the_post_thumbnail( 'medium' ); ?>
        </div>
     	<?php } ?>
	</div>
</div>
<!-- SHOW RELATED ITEM END ========================= -->
