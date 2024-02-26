<?php
/*
Package: OnAir2
Description: SCHEDULE DAY
Version: 1.2.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

global $qantumthemes_post;
global $qantumthemes_tab;
$id = $qantumthemes_tab['id'];
$isactive = get_query_var( 'scheduleday_is_active', false );



?>
<!-- SCHEDULE DAY ================================================== -->
<div class="qt-show-schedule-day row qt-active-<?php echo esc_attr( $isactive ); ?>">
	<?php
	$events= get_post_meta($id, 'track_repeatable', true);
	if(is_array($events)){
		$n = 0;
		$count = 0;
		foreach($events as $event){ 
			if(array_key_exists('show_id', $event)){
				if(array_key_exists(0, $event['show_id'])){
					if(($event['show_id'][0] !== 0)){
						$show_id = $event['show_id'][0];
						$post = get_post($show_id); 
						if(is_object($post)):
							$count = $count+1;
							$neededEvents = array('show_id','show_time','show_time_end');
							foreach($neededEvents as $n){
							  if(!array_key_exists($n,$events)){
								  $events[$n] = '';
							  }
							}

							setup_postdata($post);
							$show_time_d = $event['show_time'];
							$show_time_end_d = $event['show_time_end'];

							$now = current_time("H:i");


							/**
							 * ===============================================================
							 * Check if this is the current show
							 * @since  3.4.4
							 * // 2 cases:
								// case 1: show started yesterday > Just check if is still on
								// case 2: show starting today > Check also if NOW is > ShowStart
							 * ===============================================================
							 */
							$current_show = false;
							if( $isactive && !$current_show ){
								$found_active_show = false;

								if( $show_time_end_d < $show_time_d ){
									// Show started yesterday
									if( $now < $show_time_end_d ) {
										$current_show = 'qt-part-show-schedule-day-item--active';
									}
								} else {
									// Show started today (same day)
									if(  $now > $show_time_d && $now < $show_time_end_d ) {
										$current_show = 'qt-part-show-schedule-day-item--active';
									}
								}
							}


							if($show_time_d === "24:00"){
								$show_time_d === "00:00";
							}

							if($show_time_end_d === "24:00"){
								$show_time_end_d === "00:00";
							}

							// 12 hours format
							if(get_theme_mod('QT_timing_settings', '12') == '12'){
								$toreplace = array("am", "pm");
								$replacer = array('</span><span class="qt-am">am','</span><span class="qt-am">pm');
								$show_time_d = date('g:i\<\/\s\p\a\n\>\<\s\p\a\n\ \c\l\a\s\s\=\"\q\t\-\a\m\"\>a', strtotime($show_time_d));
							}
							
							/**
							 * 
							 *
							 * 	Custom description
							 * 
							 */
							$custom_desc = get_post_meta($id , 'show_incipit', true);
							if($custom_desc == ''){
								$excerpt = $post->post_content;
								$custom_desc = $excerpt;
								$charlength = 160;
								if ( mb_strlen( $excerpt ) > $charlength ) {
									$subex = mb_substr( $excerpt, 0, $charlength - 5 );
									$exwords = explode( ' ', $subex );
									$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
									if ( $excut < 0 ) {
										$custom_desc = mb_substr( $subex, 0, $excut );
									} else {
										$custom_desc = $subex;
									}
								} else {
									$custom_desc = $excerpt;
								}
								$custom_desc .= '[...]';
							}
							?>
							<!-- SCHEDULE SHOW ========================= -->
							<div class="col s12 m4 l4">
								<div class="qt-part-archive-item qt-part-show-schedule-day-item <?php echo esc_attr( $current_show ); ?>">
									<div class="qt-item-header">
										<div class="qt-header-mid qt-vc">
											<div class="qt-vi">
												<h4 class="qt-item-title qt-title qt-capfont">
													<a href="<?php the_permalink(); ?>" class="qt-ellipsis  qt-t"><?php the_title(); ?></a>
												</h4>
												<p class="qt-item-det">
													<span class="qt-time"><?php echo htmlspecialchars_decode(esc_attr($show_time_d) ); ?></span><span class="qt-day qt-capfont"><?php echo esc_attr($qantumthemes_tab['title']); ?></span>
												</p>
											</div>
										</div>
										<span class="qt-info bottom right"><i class="dripicons-information"></i></span>

										<?php  
										/**
										 * @since  3.4.4
										 * Current show label
										 */
										if( $current_show ){
											?><span class="qt-part-archive-item__badge qt-capfont qt-btn-primary"><?php esc_html_e( 'Current show', 'onair2' ) ?></span><?php
										}

										
										/**
										 * THUMBNAIL
										 */
										if (has_post_thumbnail()){ ?>
											<div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'large' ); ?>">
												<?php the_post_thumbnail( 'qantumthemes-medium' ); ?>
											</div>
										 <?php }
										?>
									</div>
									<div class="qt-overinfo qt-paper">
										<p class="qt-item-det qt-accent">
											<span class="qt-time"><?php echo htmlspecialchars_decode(esc_attr($show_time_d) ); ?></span><span class="qt-day qt-capfont"><?php echo esc_attr($qantumthemes_tab['title']); ?></span>
										</p>
										<div class="qt-more">
											<p class="qt-ellipsis-2"><?php echo wp_strip_all_tags( $custom_desc); ?></p>
											<a href="<?php the_permalink(); ?>"><?php echo esc_attr__("Learn more", "onair2"); ?></a>
										</div>
									</div>
								</div>
							</div>
							<!-- SCHEDULE SHOW END ========================= -->
						<?php endif; 
					}			
				}
				
			} // array_key_exists
		}//foreach
	} else {
		echo esc_attr__("Sorry, there are no shows scheduled on this day","onair2");
	}

	wp_reset_postdata();
	?>
</div>
<!-- SCHEDULE DAY END ================================================== -->