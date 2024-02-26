<?php
/*
Package: OnAir2
Description: Shows slideshow
Version: 0.0.1
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

if(!function_exists('qantumthemes_showslider')) {
	function qantumthemes_showslider($atts){
		extract( shortcode_atts( array(
			'schedulefilter' => false,
			'tax_filter' => false,
			'quantity' => 5
		), $atts ) );

		$date = current_time("Y-m-d");
		$current_dayweek = current_time("D");
		$tomorrow_dayweek = date('D', time()+86400);//current_time("D"+1);

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
						'terms'    => esc_attr($schedulefilter)
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
		
		if($id_of_currentday != 0){
			ob_start();
			?>
			<!-- SLIDESHOW FULLSCREEN ================================================== -->
			<div id="qtshowslidercontainer" class="qt-slickslider-container">
				<div class="qt-slickslider qt-invisible qt-animated qt-slickslider-single qt-black-bg" data-variablewidth="true" data-arrows="true" data-dots="false" data-infinite="true" data-centermode="true" data-pauseonhover="true" data-autoplay="true" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="false" data-variablewidthmobile="true" data-slidestoshowmobile="1">
					<?php
					$events= get_post_meta($id_of_currentday, 'track_repeatable', true);   
					if(is_array($events)){
						$maximum = $quantity;
						$total = 0;
						foreach($events as $event){ 
							$neededEvents = array('show_id','show_time','show_time_end');
							foreach($neededEvents as $n){
							  if(!array_key_exists($n,$events)){
								  $events[$n] = '';
							  }
							}
							$show_id = $event['show_id'][0];
						

							$qantumthemes_post = get_post($show_id); 
							$qantumthemes_show_time = $event['show_time'];
							$qantumthemes_show_time_end = $event['show_time_end'];
							if($qantumthemes_show_time_end == "00:00"){
								$qantumthemes_show_time_end = "24:00";
							}
							if($now < $qantumthemes_show_time_end && $total < $maximum){
								$total ++;
								// 12 hours format
								if(get_theme_mod('QT_timing_settings', '12') == '12'){
									$qantumthemes_show_time_d = date("g:i a", strtotime($qantumthemes_show_time));
									$qantumthemes_show_time_end_d = date("g:i a", strtotime($qantumthemes_show_time_end));
								} else {
									$qantumthemes_show_time_d = date("H:i", strtotime($qantumthemes_show_time));
									$qantumthemes_show_time_end_d = date("H:i", strtotime($qantumthemes_show_time_end));
								}
								
								?>
								<!-- SLIDESHOW ITEM -->
								<div class="qt-slick-opacity-fx qt-item">
									<div class="qt-part-archive-item qt-part-schedule-onair-large qt-negative">
										<div class="qt-item-header">
											<div class="qt-header-mid qt-vc">
												<div class="qt-vi">
											  		<h5 class="qt-caption-med qt-capfont hide-on-small-and-down">
											  			<?php if($now >  $event['show_time'] && $now < $event['show_time_end']){ ?>
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
														<?php echo esc_attr($qantumthemes_show_time_d); ?> <i class="dripicons-arrow-thin-right"></i> <?php echo esc_attr($qantumthemes_show_time_end_d); ?>
													</p>
													<hr class="qt-spacer-s hide-on-med-and-down">
													<p class="hide-on-med-and-down"><a href="<?php echo get_the_permalink($show_id); ?>" class="qt-btn qt-btn-l qt-btn-primary" tabindex="0"><i class="dripicons-media-play"></i></a></p>
												</div>
											</div>
											<?php if (has_post_thumbnail($show_id)){ ?>
									        <div class="qt-header-bg" data-bgimage="<?php echo get_the_post_thumbnail_url($show_id, 'large' ); ?>">
									        </div>
									     	<?php } ?>
										</div>
									</div>
								</div>
								<!-- SLIDESHOW ITEM END -->
								<?php
							}
							wp_reset_postdata();
						}//foreach
					} else {
						echo esc_attr__("Sorry, there are no shows scheduled on this day","onair2");
					}
					?>
				</div>
			</div>
			<!-- SLIDESHOW FULLSCREEN END ================================================== -->
			<?php
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-showslider","qantumthemes_showslider");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_showslider' );
if(!function_exists('qantumthemes_vc_showslider')){
function qantumthemes_vc_showslider() {
  vc_map( array(
     "name" => esc_html__( "Shows slider", "onair2" ),
     "base" => "qt-showslider",
     "icon" => get_template_directory_uri(). '/img/vc/radio-upcoming-shows-slider.png',
     "description" => esc_html__( "Hero Slider of the upcoming shows of the day", "onair2" ),
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