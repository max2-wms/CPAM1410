<?php
/*
Package: OnAir2
Description: Featured event with countdown
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

if(!function_exists('qantumthemes_event_featured')) {
	function qantumthemes_event_featured($atts){

		extract( shortcode_atts( array(
				'onair_elementor' => false,
				'id' => false,
				'include_by_id' => false,
				'label' => "",
				'tax_filter' => false,
				'tax_filter_exc' => false,
				'hideold' => false,
				'countdown' => false,
				'eventtype_filter' => false
		), $atts ) );

		if($include_by_id){
			$id = $include_by_id;
		}

		if(is_numeric($id)){
			/**
			 * We have an ID, only extract that one
			 */
			$args = array(
			'p' => intval($id), // id of a page, post, or custom type
			'post_type' => 'any');

		} else {
			/**
			 * If the ID is not passed via Shortcode, we grab the first event upcoming
			 */
			$args = array(
				'post_type' => 'event',
				'posts_per_page' => 1,
				'post_status' => 'publish',
				'orderby' => 'meta_value',
				'order'   => 'ASC',
				'meta_key' => 'eventdate',
				'suppress_filters' => false
			);

			/**
			 * eventtype_filter
			 */

			if( $eventtype_filter ){
				$args[ 'tax_query'] = array(
					array(
						'taxonomy' 	=> 'eventtype',
						'field' 	=> 'slug',
						'terms' 	=> explode(',', trim($eventtype_filter) ),
						'operator'	=> 'IN' 
					)
				);
			}

			if( $tax_filter || $tax_filter_exc ){
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

				/**
				 * @since 1.7.0.2
				 * Exclude taxonomy
				 * ================================================================================================================================
				 **/

				if( $tax_filter_exc  ){
					$tax_filter_array_exc = explode(',', trim($tax_filter_exc) );
					$tax_atts_exc = array();
					foreach( $tax_filter_array_exc as $var => $val){
						$tax = explode(':', $val);
						if( array_key_exists(1, $tax)){
							$tax_atts_exc[ trim( $tax[0] ) ] [] = trim( $tax[1] );
						}
					}
					foreach( $tax_atts_exc as $taxname => $termslist ){
						$tax_query[] = array(
							'taxonomy' 	=> trim( $taxname ),
							'field' 	=> 'slug',
							'terms'		=> $termslist,
							'operator'	=> 'NOT IN'
						);
					}
				}
				$args[ 'tax_query'] = $tax_query;
			}

			/**
			 *  For events we reorder by date and eventually hide past events
			 */
			
			
			if( ( $onair_elementor && $hideold ) || ( !$onair_elementor && get_theme_mod( 'qt_events_hideold', 0 ) == '1'  ) ){
				$args['meta_query'] = array(
					array(
						'key' => 'eventdate',
						'value' => date('Y-m-d'),
						'compare' => '>=',
						'type' => 'date'
					 )
				);
			}
		}
		ob_start();
		/**
		 * [$wp_query execution of the query]
		 * @var WP_Query
		 */
		$wp_query = new WP_Query( $args );
		if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
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
				<!-- EVENT FEATURED ========================= -->
				<div class="qt-part-event-featured qt-card qt-text-white qt-vertical-padding-l">
					<div class="qt-event-featured-content">
						<?php if($label != ''){ ?>
						<h3 class="qt-title qt-caption-med"><span><?php echo esc_attr($label);  ?></span></h3>
						<?php } ?>
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
						<?php if($countdown){ ?>
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
						<?php } ?>
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
				<!-- EVENT FEATURED END ========================= -->
			<?php
		endwhile; endif;
		wp_reset_postdata();
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-event-featured","qantumthemes_event_featured");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_event_featured' );
if(!function_exists('qantumthemes_vc_event_featured')){
function qantumthemes_vc_event_featured() {
	vc_map( array(
	 "name" => esc_html__( "Featured event", "onair2" ),
	 "base" => "qt-event-featured",
	 "icon" => get_template_directory_uri(). '/img/vc/event-featured.png',
	 "description" => esc_html__( "Display an upcoming event section", "onair2" ),
	 "category" => esc_html__( "Theme shortcodes", "onair2"),
	 "params" => array(
			array(
			   "type" => "textfield",
			   "heading" => esc_html__( "ID", "onair2" ),
			   "description" => esc_html__( "Optional event ID, if not specified will always show the first upcoming event", "onair2" ),
			   "param_name" => "id"
			),
			array(
			   "type" => "textfield",
			   "heading" => esc_html__( "Section title", "onair2" ),
			   "param_name" => "label",
			   'description' => 'Caption of the section'
			),
			array(
			   "type" => "checkbox",
			   "heading" => esc_html__( "Countdown", "onair2" ),
			   "param_name" => "countdown",
			   "description" => esc_html__("Display countdown.", "onair2" )
			),
			array(
			   "type" => "textfield",
			   "heading" => esc_html__( "Event type", "onair2" ),
			   "param_name" => "eventtype_filter",
			   'description' => esc_html__("Filter results by event type. Use the slug of the event type.", 'onair2'),
			),
		)
	));
}}
