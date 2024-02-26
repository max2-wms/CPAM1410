<?php
/*
Package: OnAir2
Description: Item of the members archive
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- MEMBER ========================= -->
<div class="qt-part-archive-item qt-item-member">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<?php echo qantumthemes_get_the_term_list( $post->ID, 'membertype', '', '</li><li>', '' );  ?>
				</li>
			</ul>
	    </div>
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
		  		<h4 class="qt-ellipsis qt-title">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow">
						<?php the_title(); ?>
					</a>
				</h4>
			</div>
		</div>
		<div class="qt-header-bottom">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-user"></i></a>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'medium' ); ?>">
            <?php the_post_thumbnail( 'medium' ); ?>
        </div>
     	<?php } ?>
	</div>
	<div class="qt-item-content-xs qt-card">
		<p class="qt-ellipsis-3">
			<?php  
			$short_bio = get_post_meta( $post->ID, 'member_incipit', true );
			if ($short_bio) {
				echo wp_kses_post( $short_bio );
			} else {
				echo get_the_excerpt();
			}
			?>
		</p>
	</div>
</div>
<!-- MEMBER END ========================= -->