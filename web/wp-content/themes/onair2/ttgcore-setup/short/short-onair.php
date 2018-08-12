<?php
/*
Package: OnAir2
Description: Shows slideshow
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


if(!function_exists('qantumthemes_onair')) {
	function qantumthemes_onair($atts){
		extract( shortcode_atts( array(
			'schedulefilter' => '',
			'parallax' => false
		), $atts ) );

		$date = current_time("Y-m-d");
		$current_dayweek = current_time("D");
		$total = 0;
		$tabsArray = array();
		$id_of_currentday = 0;
		$now = current_time("H:i");

		$args = array(
			'post_type' => 'schedule',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order'   => 'ASC',
		);
		if( isset($schedulefilter) ) {
			if($schedulefilter !== ''){
				$args ['tax_query'] = array(
					array(
						'taxonomy' => 'schedulefilter',
						'field'    => 'slug',
						'terms'    => $schedulefilter
					)
				);
			}
		}
		wp_reset_postdata();
		/**
		 * ====================================================================================================
		 * Update from 2017 September 10
		 * adding week-of-the-month filtering if enabled
		 */
		$week_num = qantumthemes_week_number();
		$qt_execute_week_control = get_theme_mod('QT_monthly_schedule', '0' );
		if(get_theme_mod('QT_monthly_schedule', '0' )){
			$week_num = qantumthemes_week_number();
			$args ['meta_key'] = 'month_week';
			$args ['meta_value'] = $week_num;
			$args['meta_compare'] = 'LIKE';
		}

		/* =========================================== update end ===========================================*/

		$the_query_meta = new WP_Query( $args );

		while ( $the_query_meta->have_posts() && $id_of_currentday == 0 ):
			$the_query_meta->the_post();
			$post = $the_query_meta->post;
			setup_postdata( $post );

			/**
			 * ====================================================================================================
			 * Update from 2017 September 10
			 * adding week-of-the-month filtering if enabled
			 */
			$can_display_this_schedule = true;
			if($qt_execute_week_control  == '1'){
				$can_display_this_schedule = false;
		 		$schedule_weeks = get_post_meta( $the_query_meta->post->ID, 'month_week', true );
		 		if(is_array($schedule_weeks)){
		 			foreach ($schedule_weeks as $w){
		 				if($w == $week_num){
		 					$can_display_this_schedule = true;
		 				}
		 			}
		 		}
		 	}
		 	/* =========================================== update end ===========================================*/


		 	if(true === $can_display_this_schedule){ // check added for 2017-09-10 week schedule update

			 	$active = '';
				$maincolor = '';
				$total++;
				/*
				*
				*	Create the array for making the content
				*
				**/
				$tab = array('name' => $post->post_name,
							'title' => $post->post_title,
							'id' => $post->ID);
				/*
				*
				*	Find out if is a day of the calendar
				*
				*/
				$schedule_date = get_post_meta($post->ID, 'specific_day', true);
				$schedule_week_day = get_post_meta($post->ID, 'week_day', true);
				/*
				1. Find which is the current day, otherwise random shows will be shown
				*/
				if($schedule_date == $date){
					$id_of_currentday = $post->ID;
				} else {
					/*
					2. check if is this day of the week
					*/
					if(is_array($schedule_week_day)){
						foreach($schedule_week_day as $day){ 
							if(strtolower($day) == strtolower($current_dayweek)){
								$id_of_currentday = $post->ID;
							}
						}
					}
				}
			}
		endwhile;
		
		if($id_of_currentday != 0){
			ob_start();
			$events= get_post_meta($post->ID, 'track_repeatable', true);   
			if(is_array($events)){
				$maximum = 1;
				$total = 1;
				foreach($events as $event){ 
					$neededEvents = array('show_id','show_time','show_time_end');
					foreach($neededEvents as $n){
					  if(!array_key_exists($n,$events)){
						  $events[$n] = '';
					  }
					}
					$show_id = $event['show_id'][0];
					
					$show_time = $event['show_time'];
					$show_time_end = $event['show_time_end'];
					if($show_time_end == "00:00"){
						$show_time_end = "24:00";
					}
					if($now < $show_time_end && $total <= $maximum){
						$total ++;

						$show_time_d = $show_time;
						$show_time_end_d = $show_time_end;
						// 12 hours format
						if(get_theme_mod('QT_timing_settings', '12') == '12'){
							$show_time_d = date("g:i a", strtotime($show_time_d));
							$show_time_end_d = date("g:i a", strtotime($show_time_end_d));
						}

						?>
						<!-- ON AIR SHOW ========================= -->
						<div id="qtonairhero" class="qt-slick-opacity-fx qt-item qt-content-primary">
							<div class="qt-part-archive-item qt-part-schedule-onair-large qt-negative">
								<div class="qt-item-header">
									<div class="qt-header-mid qt-vc">
										<div class="qt-vi">
									  		<h5 class="qt-caption-med qt-capfont hide-on-small-and-down">
									  			<?php if($now > $show_time && $now < $show_time_end){ ?>
												<span>
													<?php echo esc_attr__("Now On Air","onair2"); ?>
												</span>
												<?php } else { ?>
												<span>
													<?php echo esc_attr__("Upcoming","onair2");  ?>
												</span>
												<?php } ?>
									  		</h5>
											<hr class="qt-spacer-s">
									  		<h1 class="qt-title qt-capfont">
												<a href="<?php echo get_the_permalink($show_id); ?>" class="qt-text-shadow"><?php echo get_the_title($show_id); ?></a>
											</h1>
											<h4 class="qt-capfont">
												<?php echo esc_attr(get_post_meta($show_id,"subtitle", true)); ?>
											</h4>
											<p class="qt-small">
												<?php echo esc_attr($show_time_d); ?> <i class="dripicons-arrow-thin-right"></i> <?php echo esc_attr($show_time_end_d); ?>
											</p>
											<hr class="qt-spacer-s hide-on-med-and-down">
											<p class="hide-on-med-and-down"><a href="<?php echo get_the_permalink($show_id); ?>" class="qt-btn qt-btn-l qt-btn-primary " tabindex="0"><i class="dripicons-media-play"></i></a></p>
										</div>
									</div>
									<?php if (has_post_thumbnail($show_id)){ ?>
							        <div class="qt-header-bg" data-bgimage="<?php echo get_the_post_thumbnail_url($show_id, 'qantumthemes-xl' ); ?>" <?php if($parallax == 'true') : ?> data-parallax="1" data-speed="3" <?php endif; ?> >
							        </div>
							     	<?php } ?>
								</div>
							</div>
						</div>
						<!-- ON AIR SHOW END ========================= -->
						<?php
					}

					wp_reset_postdata();
				}//foreach
			} else {
				echo esc_attr__("Sorry, there are no shows scheduled on this day","onair2");
			}
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-onair","qantumthemes_onair");
}




/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_onair' );
if(!function_exists('qantumthemes_vc_onair')){
function qantumthemes_vc_onair() {
  vc_map( array(
     "name" => esc_html__( "Show on air", "onair2" ),
     "base" => "qt-onair",
     "icon" => get_template_directory_uri(). '/img/vc/radio-show-on-air.png',
     "description" => esc_html__( "Display a hero section of the show actually playing", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(

		array(
			"type" => "checkbox",
			"heading" => esc_html__( "Parallax background effect", "onair2" ),
			"param_name" => "parallax",
			'value'		=> 'true',
			'std'	=> false,
		),	
      	array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by 'schedulefilter' taxonomy", "onair2" ),
           "description" => esc_html__("Insert the slug of a schedulefilter taxonomy for multi-radio websites","onair2"),
           "param_name" => "schedulefilter"
        )
     )
  ) );
}}