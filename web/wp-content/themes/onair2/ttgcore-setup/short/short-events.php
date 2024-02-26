<?php
/*
Package: OnAir2
Description: Events list
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
Since 1.6
*/

if(!function_exists('qantumthemes_events_shortcode')) {
	function qantumthemes_events_shortcode($atts){

		extract( shortcode_atts( array(
				'id' => false,
				'quantity' => 3,
				

				'onair_elementor' => false,
				'items_per_page' => false,
				'include_by_id' => false,
				'label' => "",
				'tax_filter' => false,
				'tax_filter_exc' => false,
				'hideold' => false,
				'countdown' => false,
				'eventtype_filter' => false,
				'offset' => false,
		), $atts ) );

		if($items_per_page){
			$quantity = $items_per_page;
		}
		if($include_by_id){
			$id = $include_by_id;
		}

		
		if( $id ){
			if(!is_array($id)){
				$id = explode(",",$id);
			} 
			if(count($id) > 0){
				$args = array(
					'post__in'=> $id,
					'post_type' => 'event',
					'orderby' => 'post__in',
					'posts_per_page' => -1,
					'ignore_sticky_posts' => 1
				);  
			}
		} else {
			/**
			 * If the ID is not passed via Shortcode, we grab the first event upcoming
			 */
			$args = array(
				'post_type' => 'event',
				'posts_per_page' => esc_attr( $quantity ),
				'post_status' => 'publish',
				'orderby' => 'meta_value',
				'order'   => 'ASC',
				'meta_key' => 'eventdate',
				'suppress_filters' => false
			);

			if($offset){
				$args['offset'] = esc_attr( $offset );
			}

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
			
			get_template_part (  'phpincludes/part-archive-item-event' ); 
		endwhile; endif;
		wp_reset_postdata();
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-events","qantumthemes_events_shortcode");
}



/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_events_shortcode_vc' );
if(!function_exists('qantumthemes_events_shortcode_vc')){
function qantumthemes_events_shortcode_vc() {
	vc_map( array(
	 "name" => esc_html__( "Events list", "onair2" ),
	 "base" => "qt-events",
	 "icon" => get_template_directory_uri(). '/img/vc/event.png',
	 "description" => esc_html__( "Display next upcoming events", "onair2" ),
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
			   "heading" => esc_html__( "Quantity", "onair2" ),
			   "param_name" => "quantity",
			   'description' => 'Number of events'
			)
		)
	));
}}
