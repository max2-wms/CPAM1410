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
		), $atts ) );



		
		
		$args = array(
			'post_type' => 'event',
			'posts_per_page' => $quantity,
			'post_status' => 'publish',
			'orderby' => 'meta_value',
			'order'   => 'ASC',
			'meta_key' => 'eventdate',
			'suppress_filters' => false,
			'paged' => 1
		);
		/**
		 *  For events we reorder by date and eventually hide past events
		 */
		$args['meta_query'] = array(
			array(
				'key' => 'eventdate',
				'value' => date('Y-m-d'),
				'compare' => '>=',
				'type' => 'date'
			 )
		);
	

		if( $id ){
			$idarr = explode(",",$id);
			if(count($idarr) > 0){
				$quantity = count($idarr);
				$args = array(
					'post__in'=> $idarr,
					'post_type' => 'event',
					'orderby' => 'post__in',
					'posts_per_page' => -1,
					'ignore_sticky_posts' => 1
				);  
			}
		}
		
	
		ob_start();

		?>
		<!-- ================= QUERY ARGS ========================
		<?php  print_r($atts); ?>
		================= QUERY ARGS ======================== -->

		<!-- ================= QUERY ARGS ========================
		<?php  print_r($args); ?>
		================= QUERY ARGS ======================== -->



		<?php

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
