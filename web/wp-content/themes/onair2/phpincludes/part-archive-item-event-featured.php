<?php  

$date = ( get_post_meta( get_the_ID(), 'eventdate', true ) != "")? get_post_meta( get_the_ID(), 'eventdate', true ) : date("Y-m-d") ;
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
	
	<div class="qt-part-event-featured qt-card qt-text-white qt-vertical-padding-l">
		<div class="qt-event-featured-content">
			<?php 
			if(isset($label)){
				if($label != ''){ ?>
				<h3 class="qt-title qt-caption-med"><span><?php echo esc_attr($label);  ?></span></h3>
				<?php 
				}
			}
			?>
			<h1 class="qt-title qt-spacer-s"><?php the_title(); ?></h1>
			<h3 class="qt-title">
				<?php 
					/**
					 * City and town
					 */
					echo esc_attr(get_post_meta(get_the_ID(), 'qt_location',true)); 

					$city = get_post_meta(get_the_ID(), 'qt_city',true);
					if($city != ''){
						?> [<?php
						echo esc_attr(get_post_meta(get_the_ID(), 'qt_city',true));
						?>]<?php
					}
				?>
			</h3>
			
			<div class="qt-countdown-container">
				<div id="countdown" 
					data-dayslabel="<?php esc_attr_e("Days", "onair2"); ?>" 
					data-hourslabel="<?php esc_attr_e("Hours", "onair2"); ?>" 
					data-minuteslabel="<?php esc_attr_e("Minutes", "onair2"); ?>" 
					data-secondslabel="<?php esc_attr_e("Seconds", "onair2"); ?>" class="ClassyCountdownDemo qt-countdown" 
					data-end="<?php esc_attr_e($fulldate); ?>" 
					data-now="<?php esc_attr_e($now); ?>"
					></div>
			</div>
			<p class="qt-spacer-s">
			<a href="<?php the_permalink(); ?>" class="qt-btn qt-btn-primary "><?php esc_attr_e("Discover more","onair2"); ?></a>
			</p>
		</div>
		
		<?php if (has_post_thumbnail()){ ?>
		<div class="qt-countdown-background">
			<div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'qantumthemes-full' ); ?>">
				<?php the_post_thumbnail( 'qantumthemes-full' ); ?>
			</div>
		</div>
		<?php } ?>
		
	</div>
	
<?php