<?php
/**
 * @since  2.4.4
 * @referral http://www.qantumthemes.com/helpdesk/forums/topic/upcoming-events-shortcode-and-hide-current-track-and-artits/
 * @package OnAir2
 * @version 2.4.4
 * @author QantumThemes
 **/


if(!function_exists('qantumthemes_upcomingmini')) {
	function qantumthemes_upcomingmini($atts){
		extract( shortcode_atts( array(
			'schedulefilter' => false,
			'tax_filter' => false,
		), $atts ) );


		ob_start();  

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
		if( $schedulefilter ) {
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

		if( $tax_filter  ){
			$tax_filter_array = explode(',', trim($tax_filter) );
			$tax_atts = array();
			$tax_query = array(
				'relation' => 'AND'
			);
			foreach( $tax_filter_array as $var => $val){
				$tax = explode(':', $val);
				if( array_key_exists(1, $tax)){
					$tax_atts[ trim( $tax[0] ) ] [] = trim( $tax[1] );
				}
			}
			foreach( $tax_atts as $taxname => $termslist ){
				$tax_query[] = array(
					'taxonomy' 	=> trim( $taxname ),
					'field' 	=> 'slug',
					'terms'		=> $termslist,
					'operator'	=> 'IN'
				);
			}
			$args[ 'tax_query'] = $tax_query;
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

		/**
		 * ====================================================================================================
		 * Update from 2019 October 22
		 * Pre parsing to find the actual day and overrid problem of conflict with week days
		 * @since  3.6.4
		 * ====================================================================================================
		 */
		// Reset
		$id_of_currentday = false; 
		$active = '';
		$maincolor = ' ';
		$tabsArrayTemp["active"] = '';
		// Loop to find current day
		while ( $the_query_meta->have_posts() ):
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
		 		$schedule_weeks = get_post_meta( $post->ID, 'month_week', true );
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
				$tabsArrayTemp = array(
					'name' => $post->post_name,
					'title' => $post->post_title,
					'id' => $post->ID,
					'post' => $post,
					'active' => ''
				);
				$schedule_date = get_post_meta($post->ID, 'specific_day', true);
				$schedule_week_day = get_post_meta($post->ID, 'week_day', true);

				/*
				1. check if is a precise date
				*/
				// reset
				if($schedule_date){
					if($schedule_date == $date){
						$id_of_currentday = $post->ID;
						$active = ' active';
						$tabsArrayTemp["active"] = 'active';
						$maincolor = ' maincolor';
					}
				} 
				if(!$id_of_currentday){
					if(is_array($schedule_week_day)){
						foreach($schedule_week_day as $day){ // each schedule can fit multiple days
							
							if(strtolower($day) == strtolower($current_dayweek)){
								$id_of_currentday = $post->ID;
								$active = ' active';
								$maincolor = ' maincolor';
								$tabsArrayTemp["active"] = 'active';
							}
						}
					}
				}
			}

		endwhile;
		/* =========================================== pre-parting - update end ===========================================*/
		
		wp_reset_postdata();
		if($id_of_currentday != 0){
			
			$events= get_post_meta($id_of_currentday, 'track_repeatable', true);   
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
					if($show_time < $now ){
						continue;
					} else {
						if( $total <= $maximum ){
							$total ++;
							$show_time_d = $show_time;
							$show_time_end_d = $show_time_end;
							// 12 hours format
							if(get_theme_mod('QT_timing_settings', '12') == '12'){
								$show_time_d = date("g:i a", strtotime($show_time_d));
								$show_time_end_d = date("g:i a", strtotime($show_time_end_d));
							}
							?>
							<div  class="qt-nowonairmini qt-upcomingmini qt-upcoming-refresh">
								<h6 class="qt-inline-textdeco">
									<span><?php esc_html_e("Upcoming show", "onair2"); ?></span>
								</h6>
								<div class="qt-nowonairmini-cntn">
									<?php if (has_post_thumbnail($show_id)){ ?>
							       		<a href="<?php echo get_the_permalink($show_id); ?>" class="qt-featured qt-left">
							       		<img src="<?php echo get_the_post_thumbnail_url($show_id, 'thumbnail' ); ?>" alt="">
							       		</a>
							     	<?php } ?>
							     	<div class="qt-nowonairmini-content">
							     		<a href="<?php echo get_the_permalink($show_id); ?>"><h4><?php echo get_the_title($show_id); ?></h4></a>
										<h5><?php echo esc_attr($show_time_d); ?> <i class="dripicons-arrow-thin-right"></i> <?php echo esc_attr($show_time_end_d); ?></h5>								
							     	</div>
						     	</div>
						     	<hr class="qt-inline-textdeco">
							</div>
							<?php
							break;
						}
					}
					wp_reset_postdata();
				}//foreach
			} else {
				echo esc_attr__("Sorry, there are no shows scheduled on this day","onair2");
			}
			wp_reset_postdata();
			
		}
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-upcoming-mini","qantumthemes_upcomingmini");
	ttg_custom_shortcode("qt-upcomingmini","qantumthemes_upcomingmini");
}




/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_upcomingmini' );
if(!function_exists('qantumthemes_vc_upcomingmini')){
function qantumthemes_vc_upcomingmini() {
  vc_map( array(
     "name" => esc_html__( "Upcoming show mini", "onair2" ),
     "base" => "qt-upcomingmini",
     "icon" => get_template_directory_uri(). '/img/vc/radio-show-on-air-mini.png',
     "description" => esc_html__( "Tiny widget displaying the upcoming show, if available", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
      	array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by 'schedulefilter' taxonomy", "onair2" ),
           "description" => esc_html__("Insert the slug of a schedulefilter taxonomy for multi-radio websites","onair2"),
           "param_name" => "schedulefilter"
        )
     )
  ) );
}}