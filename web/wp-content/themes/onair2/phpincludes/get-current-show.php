<?php
/**
 * @since  3.4.4
 * // aborted project. 
 * @package  OnAir2
 * Get current show calculating cross midnight
 * 
 */


function onair2_get_current_show($schedulefilter = false){
	ob_start();
	echo 'New schedule test';
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
		'order'   => 'ASC'
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

	/**
	 * 
	 * Query execution
	 * @var WP_Query
	 */
	$the_query_meta = new WP_Query( $args );
	$current_shows_array = array(); // this will contain all of the days and all of the schedules
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

				/**
				 * 	Here the innovation begins
				 *  @since  3.4.4
				 *
				 *
				 *	What we need is the current show and upcoming ones, in an array.
				 *	So we store the shows of each day into an array, then we take 
				 *	the shows that goes beyond midnight, and copy them to the array of the next day.
				 *
				 *  After this, we pick the actual day, and find the actual show
				 *
				 *
				 * 
				 */

				/*
				*
				*	Find out if is a day of the calendar
				*
				*/
				$schedule_date = get_post_meta($post->ID, 'specific_day', true);
				$schedule_week_day = get_post_meta($post->ID, 'week_day', true);
				

				$current_shows_array[$post->ID] = array(
					'title'		=> get_the_title(),
					'monthday' 	=> $schedule_date,
					'weekday'	=> $schedule_week_day,
					'current'	=> 0
					);
				


				/**
				 * Distinguish between shows using day of the week and day of the calendar
				 */
				if($schedule_date == $date){ // specific calendar date
					$id_of_currentday = $post->ID;
					$current_shows_array[$post->ID]['current'] = 1;

				} else {
					/*
					2. check if is this day of the week
					*/
					if(is_array($schedule_week_day)){
						foreach($schedule_week_day as $day){ // each schedule can fit multiple days
							if(strtolower($day) == strtolower($current_dayweek)){
								$id_of_currentday = $post->ID;
								$current_shows_array[$post->ID]['current'] = 1;
							}
						}
					}
				}
			}
		endwhile;
		wp_reset_postdata();


		// THIS IS THE VERY LAST SCHEDULE DAY
		$last_shows_array = end($current_shows_array);
		
		

		foreach( $current_shows_array as $schedule_day_id => $vals ){




			$shows = get_post_meta( $schedule_day_id, 'track_repeatable', true );   
			
			if( !is_array( $shows )){ continue; }
			if( count( $shows ) == 0 ){ continue; }

			$current_shows_array[$schedule_day_id]['shows'] = array();


			/**
			 * Magic
			 * If i have a previous "bring_tomorrow_show"
			 * let's just put it first
			 */
			
			/**
			 * How to:
			 * 1. get previous day (if is last day, get the first)
			 * 2. check if previous day had a cross show
			 * 3. if yes, unshift it
			 */
			
			$current_day_name = $vals['title'];

			// if( $schedule_day_id === key($current_shows_array)

			$prev_day = prev($current_shows_array);
			$prev_day_name = $prev_day['title'];




			// if( $bring_tomorrow_show != null ){
			// 	array_unshift( $shows , $bring_tomorrow_show );
			// }



			

			/**
			 * The regular loop
			 */
			$shows_to_add = array();
			foreach($shows as $show){ 
				$show_id = $show['show_id'][0];
				if(isset( $show['show_id'] )){
					unset($show['show_id']);
				}
				$shows_to_add[$show_id] = $show;
			}

			$current_shows_array[$schedule_day_id]['shows'] = $shows_to_add;


			/**
			 * ===================================================================
			 * This is where we add the new model:
			 * if the end time is smaller than the start time
			 * we take the show to the following schedule day array
			 * ===================================================================
			 * 
			 */
			
			$last_show = end($shows);
			if( $last_show['show_time_end'] == '00:00'){
				$last_show['show_time_end'] = '24:00';
			}

			

		}

		/**
		 * Now we have the total days array, we can't already know which to pick
		 */
		echo '<pre style="font-size: 13px; line-height: 1.2em;">';
		print_r($current_shows_array);
		echo '</pre>';






	return ob_get_clean();
}
add_shortcode( 'currentshow', 'onair2_get_current_show' );