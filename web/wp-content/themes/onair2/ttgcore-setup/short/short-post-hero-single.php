<?php
/*
Package: OnAir2
Description: Slideshow shortcode parameters
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

if(!function_exists('qantumthemes_post_hero')) {
	function qantumthemes_post_hero($atts){
		extract( shortcode_atts( array(
				'id' => false,
				'posttype' => 'post',
				'category' => false,
				'category_exclude' => false,
				'orderby' => false,
				'offset' => 0,
				'quantity' => 1
		), $atts ) );


		if(!is_numeric($quantity)){
			$quantity = 1;
		}
		if(!is_numeric($offset)) {
			$offset = 0;
		}


		ob_start();
		/**
		 *  Query for my content
		 */
		
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
				'post_type' => 'post',
				'posts_per_page' => $quantity,
				'post_status' => 'publish',
				'paged' => 1,
				'suppress_filters' => false,
				'offset' => esc_attr($offset),
				'ignore_sticky_posts' => 1
			);
			if($orderby){
				if($orderby == 'rand' || $orderby == 'ID' || $orderby == 'author' || $orderby == 'title' || $orderby == 'date' || $orderby == 'comment_count' || $orderby == 'menu_order' ) {
					$args[ 'orderby'] = esc_attr($orderby);
				}
			}

			/**
			 * Add category parameters to query if any is set
			 */
			$args[ 'tax_query'] = array();
			if (false !== $category && 'all' !== $category) {
				$args[ 'tax_query'][] =	array(					
						'taxonomy' => esc_attr( qantumthemes_get_type_taxonomy( $posttype ) ),
						'field' => 'slug',
						'terms' => explode(',', esc_attr(trim($category))),
						'operator'=> 'IN' //Or 'AND' or 'NOT IN'
					);
			}

			/**
			 * Exclude category
			 */
			if (false !== $category_exclude ) {
				$args[ 'tax_query']['relation'] = 'AND';
				$args[ 'tax_query'][] =	array(
					'taxonomy' => esc_attr( qantumthemes_get_type_taxonomy( $posttype ) ),
					'field' => 'slug',
					'terms' =>  explode(',', esc_attr(trim($category_exclude))),
					'operator'=> 'NOT IN' //Or 'AND' or 'NOT IN'
				);
			}
		}

		/**
		 * [$wp_query execution of the query]
		 * @var WP_Query
		 */
		$wp_query = new WP_Query( $args );
		
		/**
		 * Loop start
		 */
		if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$post = $wp_query->post;
			setup_postdata( $post );
			?>
			
			<div class="qt-slick-opacity-fx qt-item">
				<?php get_template_part (  'phpincludes/part-archive-item-post-hero'); ?>
			</div>
			
			<?php
		endwhile; endif;
		wp_reset_postdata();
		/**
		 * Loop end;
		 */
		
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-post-hero","qantumthemes_post_hero");
}




/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_post_hero' );
if(!function_exists('qantumthemes_vc_post_hero')){
function qantumthemes_vc_post_hero() {
  vc_map( array(
	 "name" => esc_html__( "Post Hero", "onair2" ),
	 "base" => "qt-post-hero",
	 "icon" => get_template_directory_uri(). '/img/vc/post.png',
	 "description" => esc_html__( "Fullwidth post hero list", "onair2" ),
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
		   "heading" => esc_html__( "Filter by category", "onair2" ),
		   "description" => esc_html__("Insert the slug of one or more categories to display, comma separated (,).","onair2"),
		   "param_name" => "category"
		),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Exclude category", "onair2" ),
		   "description" => esc_html__("Insert the slug of one or more categories to exclude, comma separated (,).","onair2"),
		   "param_name" => "category_exclude"
		),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Quantity (number)", "onair2" ),
		   "param_name" => "quantity",
		   "description" => esc_html__( "Number of posts to display", "onair2" )
		),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Offset (number)", "onair2" ),
		   "description" => esc_html__("Number of posts to skip in the database query","onair2"),
		   "param_name" => "offset"
		),
		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Order by", "onair2" ),
		   "param_name" => "orderby",
		   'value' => array(__("Default", "onair2")=>"",
							__("Publish date", "onair2")=>"date",
							// __("Menu order", "onair2")=>"menu_order",
							__("Random", "onair2")=>"rand"
							),
		   "description" => esc_html__( "Change the order of the posts", "onair2" )
		)
	 )
  ) );
}}