<?php
/*
Package: OnAir2
Description: Header template for events
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


/**
 * 
 * ===========================================================
 * @since  3.5.0
 * Display revolution slider selected via dropdown
 * ===========================================================
 * 
 */
get_template_part( 'phpincludes/part-revoslider-header'); 
// Revo slider template end.

/**
 * 
 * ===========================================================
 * @since  1.0
 * ===========================================================
 * 
 */


$hidetitle = qantumthemes_hide_title(get_the_ID());
if($hidetitle == 0){
		
	$date = ( get_post_meta(get_the_ID(), 'eventdate', true ) != "")? get_post_meta( get_the_ID(), 'eventdate', true ) : date("Y-m-d") ;
	$d = explode('-',$date);
	$day = date( "d", strtotime( $date ));
	$month = date( "m", strtotime( $date ));
	$year = date( "Y", strtotime( $date ));
	$monthyear = date( "M Y", strtotime( $date ));
	$monthyear=esc_attr(date_i18n("M Y",strtotime($date)));
	$time = get_post_meta( get_the_ID(), 'eventtime', true );

	if(!$time){ $time = '00:00'; }
	$fulldate =  $date.'T'.$time;
	$now =  current_time("Y-m-d").'T'.current_time("H:i");

	?>
	<!-- HEADER CAPTION ========================= -->
	<div class="qt-pageheader qt-negative">
		<div class="qt-container">
			<ul class="qt-tags">
				<li>
				<?php  echo qantumthemes_get_the_term_list( get_the_ID(), 'eventtype', '', '</li><li>', '' );  ?>
				</li>
			</ul>
			<h1 class="qt-caption qt-spacer-s">
				<?php the_title(); ?>
			</h1>
			
			

			<h3 class="qt-spacer-s">
				<?php 
					/**
					 * City and town
					 */
					echo esc_attr(get_post_meta( get_the_ID(), 'qt_location',true)); 

					$city = get_post_meta($post->ID, 'qt_city',true);
					if($city != ''){
						?> [<?php
						echo esc_attr(get_post_meta(get_the_ID(), 'qt_city',true));
						?>]<?php
					}
				?>
			</h3>

			<?php 
		
			if($fulldate > $now) {
				?>
				<hr class="qt-spacer-s">
				<div class="qt-countdown-container qt-s">
					<div id="countdown" class="ClassyCountdownDemo qt-countdown" 
					data-end="<?php esc_attr_e($fulldate); ?>" 
					data-now="<?php esc_attr_e($now); ?>"
					data-dayslabel="<?php esc_attr_e("Days", "onair2"); ?>" 
					data-hourslabel="<?php esc_attr_e("Hours", "onair2"); ?>" 
					data-minuteslabel="<?php esc_attr_e("Minutes", "onair2"); ?>"
					data-secondslabel="<?php esc_attr_e("Seconds", "onair2"); ?>" class="ClassyCountdownDemo qt-countdown"  ></div>
				</div>
				<?php 
			} 

			?>
			
		</div>
		<?php get_template_part('phpincludes/part-background-image-header' ); ?>
	</div>
	<?php /*echo do_shortcode('[qt-sharing style="qt-sharepage-horizontal"]');*/ ?>
	<!-- HEADER CAPTION END ========================= -->
<?php } ?>