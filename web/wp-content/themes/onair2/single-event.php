<?php
/*
Package: OnAir2
Description: Single event
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
	<?php  
	get_template_part ('phpincludes/menu');
	get_template_part ('phpincludes/part-searchbar'); 
	?>
	<div id="maincontent" class="qt-main">
		<?php 
		/**
		 * From V 2.5
		 */
		if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
			<hr class="qt-header-player-spacer">
		<?php } ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				/**
				 * 
				 *
				 * Events data
				 * 
				 */
				$e = array(
				  'id' =>  $post->ID,
				  'date' =>  esc_attr(get_post_meta($post->ID,'eventdate',true)),
				  'dateend' =>  esc_attr(get_post_meta($post->ID,'eventdateend',true)),
				  'time' =>  esc_attr(get_post_meta($post->ID,'eventtime',true)),
				  'location' =>  esc_attr(get_post_meta($post->ID, 'qt_location',true)),
				  'street' =>  esc_attr(get_post_meta($post->ID, 'qt_address',true)),
				  'city' =>  esc_attr(get_post_meta($post->ID, 'qt_city',true)),
				  'country' =>  esc_attr(get_post_meta($post->ID, 'qt_country',true)),
				  'permalink' =>  esc_url(get_permalink($post->ID)),
				  'title' =>  esc_attr($post->post_title),
				  'phone' => esc_attr(get_post_meta($id, 'qt_phone',true)),
				  'website' => esc_attr(get_post_meta($id, 'qt_link',true)),
				  'facebooklink' => esc_attr(get_post_meta($id, 'eventfacebooklink',true)),
				  'coord' => esc_attr(get_post_meta($id,  'qt_coord',true)),
				  'email' => esc_attr(get_post_meta($id,  'qt_email',true))
				  //'thumb' => $thumb
				);

				
				
				?>
				<!-- ======================= HEADER SECTION ======================= -->
				<?php get_template_part( 'phpincludes/part-header-caption-event'); ?>

				<!-- ======================= CONTENT SECTION ======================= -->
				<div class="qt-container qt-vertical-padding-l">
					<div class="row">
						<div class="col s12 m12 l1 qt-pushpin-container">
							<div class="qt-pushpin">
								<?php get_template_part( 'phpincludes/sharepage' ); ?>
							</div>
							 <hr class="qt-spacer-m">
						</div>
						<div class="col s12 m12 l8">
							<h5 class="qt-caption-small"><span><?php echo esc_attr__("Event info","onair2"); ?></span></h5>
							<?php 
							/*
							*
							*
							*   Print the data out
							*
							*
							*/
						
							if(get_theme_mod('QT_timing_settings', '12') == '12'){
								$e['time'] = date("g:i a", strtotime($e['time']));
							}

				
							echo '
							<div class="qt-the-content">
								<table class="table qt-eventtable bordered striped">
									<tbody>
									'.(($e['date']!='') ? '<tr><th>'.esc_attr__("Date","onair2").':</th> <td>'.esc_attr(date_i18n( get_option("date_format", "d M Y"), strtotime( get_post_meta($post->ID, "eventdate", true) ))).'</td></tr>' : '').'

									'.(($e['time']!='') ? '<tr><th>'.esc_attr__("Time","onair2").':</th> <td>'.esc_attr($e['time']).'</td></tr>' : '').'
									'.(($e['location']!='') ? '<tr><th>'.esc_attr__("Location","onair2").':</th> <td>'.esc_attr($e['location']).'</td></tr>' : '').'
									'.(($e['street']!='' || $e['city'] !='') ? '<tr><th>'.esc_attr__("Address","onair2").':</th> <td> '.esc_attr($e['street']).' '.$e['city'].'</td></tr>' : '').'
									'.(($e['phone']!='') ? '<tr><th>'.esc_attr__("Phone","onair2").':</th> <td>'.esc_attr($e['phone']).'</td></tr>' : '').'
									'.(($e['website']!='') ? '<tr><th>'.esc_attr__("Website","onair2").':</th> <td class="qt-break-word"><a href="'.esc_attr($e['website']).'" target="_blank" rel="external nofollow">'.esc_attr($e['website']).'</a>'.'</td></tr>' : '').'
									'.(($e['facebooklink']!='') ? '<tr><th>'.esc_attr__("Event","onair2").':</th> <td class="qt-break-word"><a href="'.esc_attr($e['facebooklink']).'" target="_blank" rel="external nofollow">'.esc_attr($e['facebooklink']).'</a>'.'</td></tr>' : '').'
									</tbody>
								</table>
							</div>';  
							?>

							<?php
							/*
							*
							*   Main content
							*
							*/
							?>
							<h5 class="qt-caption-small"><span><?php echo esc_attr__("Details","onair2"); ?></span></h5>
							<div class="qt-the-content">
								<?php the_content(); ?>
							</div>

							<?php
							/*
							*
							*   Print map if declared
							*
							*/
							?>
							<?php if($e['location'] && $e['coord']!== '' ){ ?>
							<hr class="qt-spacer-m">
							<h5 class="qt-caption-small"><span><?php echo esc_attr__("Location","onair2"); ?></span></h5>
							<div class="qt-map-event qt-spacer-s">
								<div class="qt_dynamicmaps" id="map<?php echo esc_attr($post->ID); ?>" data-colors="QT_map_dark" data-coord="<?php echo esc_attr($e['coord']); ?>" data-locationname="<?php echo esc_attr($e['location']); ?>" data-height="350">
								</div>
							</div>
							<?php } ?>
							<?php
							/*
							*
							*
							*   Print the BUY links
							*
							*
							*/
							$eventslinks= get_post_meta($id,'eventrepeatablebuylinks',true);   

							if(is_array($eventslinks)){
								if(count($eventslinks)>0){
									if($eventslinks[0]['cbuylink_url'] != ''){
										?>
										<div class="qt-card qt-buylink-section">
											<h3><?php echo esc_attr__("Buy tickets","onair2"); ?></h3>
											<p class="qw-buylinks qt-spacer-s">
											<?php  
											foreach($eventslinks as $b){ 
												if(isset($b['cbuylink_url'])){
													if($b['cbuylink_url']!=''){
														echo '
														<a href="'.esc_url($b['cbuylink_url']).'" target="_blank" rel="external nofollow" class="qt-btn  qt-btn-secondary btn waves-effect waves-light accentcolor">
														<i class="fa fa-cart"></i> '.esc_attr($b['cbuylink_anchor']).'</a>';
													}
												}
											}
											?>
											</p>
										</div>
										<?php  
									}
								}
							}
							?>



							<?php  
							$add = get_post_meta( $post->ID, 'addtogooglecal', true );
							$timeend = esc_attr(get_post_meta($post->ID,'eventtimeend',true));


							if($add && $timeend){
								$time = esc_attr(get_post_meta($post->ID,'eventtime',true));
								$timeend = esc_attr(get_post_meta($post->ID,'eventtimeend',true));
								$link = 'https://www.google.com/calendar/render?action=TEMPLATE&text='
								.str_replace(' ','+',get_the_title())
								.'&dates='.str_replace('-','',$e['date']).'T'.str_replace(':','',$time).'00Z/'.str_replace('-','',$e['dateend']).'T'.str_replace(':','',$timeend).'00Z&details=For+details,+link+here:+'.urlencode(get_the_permalink()).'&location='.esc_attr(str_replace(" ", '+',$e['location'])).',+'.esc_attr(str_replace(" ", '+', $e['city'].',+'. $e['street'].',+'. $e['country'] )).'&sf=true&output=xml';
								?>
								<div class="qt-card qt-addtocal qt-spacer-s">
									<h4 class="qt-left"><?php esc_html_e("Add to Google Calendar", 'onair2'); ?></h4>
									<a href="<?php echo esc_attr($link); ?>" class="qt-btn qt-btn-primary qt-btn-xl qt-right" target="_blank"><?php esc_html_e("Add Now", 'onair2'); ?></a>
									<hr class="qt-clearfix">
								</div>
								<?php  
							}
							?>
						</div>
						<div class="qt-sidebar col s12 m12 l3">
							<?php get_template_part (  'phpincludes/sidebar' ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>