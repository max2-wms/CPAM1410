<?php
/*
Package: OnAir2
Description: Upcoming shows carousel
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


if(!function_exists('qantumthemes_upcoming_carousel')) {
	function qantumthemes_upcoming_carousel($atts){
		extract( shortcode_atts( array(
			'schedulefilter' => ''
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
		if( isset($schedulefilter) ) {
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
				// setup_postdata( $post );
				/*
				*
				*	Create the array for making the content
				*
				**/
				$tab = array('name' => $the_query_meta->post->post_name,
							'title' => $the_query_meta->post->post_title,
							'id' => $the_query_meta->post->ID);
				/*
				*
				*	Find out if is a day of the calendar
				*
				*/
				$schedule_date = get_post_meta($the_query_meta->post->ID, 'specific_day', true);
				$schedule_week_day = get_post_meta($the_query_meta->post->ID, 'week_day', true);
				/*
				1. Find which is the current day, otherwise random shows will be shown
				*/
				if($schedule_date == $date){
					$id_of_currentday = $the_query_meta->post->ID;
				} else {


					/*
					2. check if is this day of the week
					*/
					if(is_array($schedule_week_day)){
						
						foreach($schedule_week_day as $day){ // each schedule can fit multiple days
							if(strtolower($day) == strtolower($current_dayweek)){
								$id_of_currentday = $the_query_meta->post->ID;

							}
						}
					}
				}
			}
		endwhile;
		

		$qantumthemes_today_name_title = get_the_title($id_of_currentday);//$the_query_meta->post->post_title;

		if($id_of_currentday != 0){
			ob_start();
			$events= get_post_meta($id_of_currentday, 'track_repeatable', true);   
			if(is_array($events)){
				$maximum = 9;
				$total = 1;
				?>
				<div id="qtupcomingshowscarousel" class="qt-slickslider-container qt-slickslider-externalarrows">
					<div class="row">
						<div class="qt-slickslider qt-invisible qt-animated qt-slickslider-multiple qt-slickslider-podcast" 	data-slidestoshow="3" data-variablewidth="false" data-arrows="true" data-dots="false"  data-infinite="true" data-centermode="false" data-pauseonhover="true" data-autoplay="false" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="false" data-slidestoshowmobile="1" data-variablewidthmobile="true" data-infinitemobile="false">
						<?php  
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
							if($now < $qantumthemes_show_time_end && $total <= $maximum){
								$total ++;
								// 12 hours format
								if(get_theme_mod('QT_timing_settings', '12') == '12'){
									$qantumthemes_show_time = date("g:i a", strtotime($qantumthemes_show_time));
								}
								?>
								<div class="qt-item">
									<!-- SHOW UPCOMING ITEM ========================= -->
									<div class="qt-part-archive-item qt-part-archive-item-show qt-content-primary-dark">
										<div class="qt-item-header">
											<div class="qt-header-top">
												<ul class="qt-tags">
													<li>
														<?php  echo qantumthemes_get_the_term_list($show_id, 'genre', '', '</li><li>', '' );  ?>
													</li>
												</ul>
										    </div>
											<div class="qt-header-mid qt-vc">
												<div class="qt-vi">
											  		<h5 class="qt-time"><?php echo esc_attr($qantumthemes_today_name_title.' '.$qantumthemes_show_time); ?></h5>
											  		<h3 class="qt-ellipsis qt-t qt-title qt-capfont">
														<a href="<?php echo get_the_permalink($show_id); ?>" class="qt-text-shadow"><?php echo esc_attr(get_the_title($show_id)); ?></a>
													</h3>
													<p class="qt-small qt-ellipsis"><?php echo esc_attr(get_post_meta($show_id,"subtitle2", true)); ?></p>
												</div>
											</div>
											<div class="qt-header-bottom">
												<a href="<?php echo get_the_permalink($show_id); ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-align-justify"></i></a>
											</div>
											<?php if (has_post_thumbnail($show_id)){ ?>
										        <div class="qt-header-bg" data-bgimage="<?php echo get_the_post_thumbnail_url($show_id, 'medium' ); ?>">
										        </div>
									     	<?php } ?>
										</div>
									</div>
									<!-- SHOW UPCOMING ITEM END ========================= -->
								</div>
								<?php
							}
							wp_reset_postdata();
						}//foreach
						?>
					</div>
				</div>
			</div>
			<?php  
			} else {
				echo esc_attr__("Sorry, there are no shows scheduled on this day","onair2");
			}
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-upcoming","qantumthemes_upcoming_carousel");
}




/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_upcoming_carousel' );
if(!function_exists('qantumthemes_vc_upcoming_carousel')){
function qantumthemes_vc_upcoming_carousel() {
  vc_map( array(
     "name" => esc_html__( "Upcoming Shows Carousel", "onair2" ),
     "base" => "qt-upcoming",
     "icon" => get_template_directory_uri(). '/img/vc/radio-upcoming-shows-carousel.png',
     "description" => esc_html__( "Upcoming Shows Carousel", "onair2" ),
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