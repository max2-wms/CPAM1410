<?php
/*
Package: OnAir2
Description: Item of the members archive
Version: 1.9.9
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

$date = ( get_post_meta( get_the_ID(), 'eventdate', true ) != "")? get_post_meta( get_the_ID(), 'eventdate', true ) : date("Y-m-d") ;
$d = explode('-',$date);
$day = date( "d", strtotime( $date ));
$monthyear = date( "M Y", strtotime( $date ));
$monthyear=esc_attr(date_i18n("M Y",strtotime($date)));


?>
<!-- MEMBER ========================= -->
<div class="qt-part-archive-item qt-item-member">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<?php echo qantumthemes_get_the_term_list( $post->ID, 'eventtype', '', '</li><li>', '' );  ?>
				</li>
			</ul>
	    </div>
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
		  		<h4 class="qt-ellipsis qt-title ">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow qt-text-white">
						<?php the_title(); ?>
					</a>
				</h4>
				<h5 class="qt-date qt-text-white">
					<span class="qt-day">
						<?php echo esc_attr($day );?>
					</span>
					<span class="qt-month">
						<?php echo esc_attr( $monthyear ); ?>
					</span>
				</h5>
			</div>
		</div>
		<div class="qt-header-bottom">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-calendar"></i></a>
		</div>
		<?php if (has_post_thumbnail()){ ?>
        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'medium' ); ?>">
            <?php the_post_thumbnail( 'medium' ); ?>
        </div>
     	<?php } ?>
	</div>
	<div class="qt-item-content-xs qt-card">
		<p class="qt-ellipsis-3">
			<?php echo get_the_excerpt(); ?>
		</p>
	</div>
</div>
<!-- MEMBER END ========================= -->