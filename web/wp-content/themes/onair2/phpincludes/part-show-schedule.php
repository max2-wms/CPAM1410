<?php
/*
Package: OnAir2
Description: SCHEDULE used in shortcode "showgrid"
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


$date = current_time("Y-m-d");
$current_dayweek = current_time("D");

if(!isset($args)){
	$args = [];
}
extract( shortcode_atts( array(
	'schedulefilter' => false,
    'tax_filter' => false,
), $args ) );


?>
<!-- SCHEDULE ================================================== -->
<div class="qt-show-schedule qt-shows-schedule-refresh">
	<ul id="qwShowSelector" class="tabs hide-on-med-and-down qt-show-schedule-menu ">
		<?php
			wp_reset_postdata();
			$args = array(
				'post_type' => 'schedule',
				'posts_per_page' => 31,
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
			
			$total = 0;
			$tabsArray = array();



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

					/**
					 * 2019 10 21 update
					 * @since  3.6.4
					 */
					if( $id_of_currentday == $post->ID ){
						$active = ' active';
						$maincolor = ' maincolor';
						$tabsArrayTemp["active"] = 'active';
					}

					$tabsArray[] = $tabsArrayTemp;
					?>
					 <li class="tab">
						 <a href="#<?php echo esc_js(esc_attr($post->post_name)); ?>" id="optionSchedule<?php echo esc_js(esc_attr($post->post_name)); ?>" class="<?php echo esc_attr($active.$maincolor);?>">
						 	<?php echo esc_attr($post->post_title); ?>
						 </a>
					 </li>
					 <?php
				}

			endwhile;

			wp_reset_postdata();	
		?>
	</ul>





	<?php
	/*
	*
	*	For mobile // options select instead of tabs // driven by js to click on hidden tabs
	*
	**/
	?>
	<h4 class="hide-on-large-only "><?php echo esc_attr__("Choose a day","onair2"); ?></h4>
	<select class="qt-spacer-s hide-on-large-only" id="qwShowDropdown">
			<?php
				wp_reset_postdata();
				$result = '';
				$args = array(
					'post_type' => 'schedule',
					'posts_per_page' => 31,
					'post_status' => 'publish',
					'orderby' => 'menu_order',
					'order'   => 'ASC'
				);

				if( isset($qantumthemes_schedulefilter) ) {
					if($qantumthemes_schedulefilter !== ''){
						$args ['tax_query'] = array(
							array(
								'taxonomy' => 'schedulefilter',
								'field'    => 'slug',
								'terms'    => $qantumthemes_schedulefilter
							)
						);
					}
				}


				/**
				 * ====================================================================================================
				 * Update from 2017 September 10
				 * adding week-of-the-month filtering if enabled
				 */

				if(get_theme_mod('QT_monthly_schedule', '0' )){
					$week_num = qantumthemes_week_number();
					$args ['meta_key'] = 'month_week';
					$args ['meta_value'] = $week_num;
					$args['meta_compare'] = 'LIKE';
				}

				/* =========================================== update end ===========================================*/


				$the_query_meta = new WP_Query( $args );
				
				$total = 0;
				while ( $the_query_meta->have_posts() ):
					$active = false;
					$maincolor = '';
					$the_query_meta->the_post();
					$total++;
					setup_postdata( $post );


					$schedule_date = get_post_meta($post->ID, 'specific_day', true);
					$schedule_week_day = get_post_meta($post->ID, 'week_day', true);

					if( $id_of_currentday == $post->ID ){
						$active = true;
					}

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

				 	if(true === $can_display_this_schedule){
						?>
					 	<option value="optionSchedule<?php echo esc_js(esc_attr($post->post_name)); ?>" <?php if($active){ ?> selected="selected" <?php } ?>><?php echo esc_attr($post->post_title); ?></option>
					 	<?php
					}
					$active = false;
				endwhile;
				wp_reset_postdata();
			?>
	 </select>
	<hr class="qt-spacer-s">

	<?php
	/*
	*	CONTENT OF THE TABS
	*/
	global $qantumthemes_post;
	global $qantumthemes_tab;
	set_query_var( 'scheduleday_is_active', false );
	foreach($tabsArray as $qantumthemes_tab){ 
		set_query_var( 'id_of_currentday', $id_of_currentday );
		if( $qantumthemes_tab["active"] == 'active' ){
			set_query_var( 'scheduleday_is_active', true );
		} else {
			set_query_var( 'scheduleday_is_active', false );
		}
		?>
			<div id="<?php echo esc_js(esc_attr($qantumthemes_tab['name'])); ?>" class="qt-show-schedule-day qt-isactive-<?php echo esc_attr($qantumthemes_tab["active"]); ?>">
				<?php
				$qantumthemes_post = $qantumthemes_tab["post"];
				get_template_part("phpincludes/part","show-schedule-day");
				?>
			</div>
		<?php 
		$active = '';
	} 
	?>
</div>
<!-- SCHEDULE END ================================================== -->
