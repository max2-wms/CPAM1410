<?php
/*
Package: OnAir2
Description: SHOW TIMING TABLE
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/


$current_show_ID = get_the_ID();
$show_title = get_the_title($current_show_ID);

?>
<!-- TIMING TABLE ================================================== -->
<div class="qt-showscheduled qt-capfont">
	<div class="qt-content-primary-dark">
		<h2><?php echo esc_attr__("Scheduled on", "onair2"); ?></h2>
	</div>
	<div class="qt-content-primary-light">
		<div class="qt-container">
			<table class="qt-content-primary">
				<tr>
					<td class="qt-content-primary-light"><i class="dripicons-calendar"></i></td>
					<td class="qt-content-primary-light"><i class="dripicons-clock"></i></td>
					<td class="qt-content-primary-light"></td>
					<td class="qt-content-primary-light"><i class="dripicons-stopwatch"></i></td>
				</tr>

				<?php  
				
				wp_reset_query();
				$args = array(
					'post_type' => 'schedule'
					,'posts_per_page' => 200
					,'posts_status' => 'publish'
					,'orderby' => 'menu_order'
                    ,'order'   => 'ASC'
				   );
				$query = new WP_Query( $args );
			
				/**
				 * UPDATED 2017 NOV 12:
				 * Deduplicate for monthly schedule. Save all the HTML in array and render after array_unique
				 */
				
				$array_of_html_rows = array();
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
					$events= get_post_meta( $post->ID, 'track_repeatable', true);   

					if(is_array($events)){
			  			foreach($events as $e){ 
			  				if(array_key_exists('show_id', $e)){
			  					if( $e["show_id"][0] == $current_show_ID){ 
				  					$show_time_d = $e["show_time"];
									$show_time_end_d = $e["show_time_end"];
									// 12 hours format
									if(get_theme_mod('QT_timing_settings', '12') == '12'){
										$show_time_d = date("g:i a", strtotime($show_time_d));
										$show_time_end_d = date("g:i a", strtotime($show_time_end_d));
									}
									ob_start();
				  					?>
				  						<tr>
											<th class="qt-accent"><?php the_title(); ?></th>
											<td><?php echo esc_attr($show_time_d); ?></td>
											<td><i class="dripicons-arrow-thin-right"></i></td>
											<td><?php echo esc_attr($show_time_end_d); ?></td>
										</tr>
				  					<?php 
				  					$array_of_html_rows[] = ob_get_clean(); // array_unique later on
			  					}
			  				}
			  			}
			  		}
				endwhile;  endif; 
				$array_of_html_rows = array_unique($array_of_html_rows);
				foreach($array_of_html_rows as $row){
					echo wp_kses_post($row);
				}
				wp_reset_postdata(); ?>
			</table>
		</div>
	</div>
</div>
<!-- TIMING TABLE END ================================================== -->
