<?php
/*
Package: OnAir2
Description: Slideshow shortcode parameters
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

if(!function_exists('qantumthemes_post_cards')) {
	function qantumthemes_post_cards($atts){
		extract( shortcode_atts( array(
				'posttype' => 'post',
				'category' => false,
				'offset' => 0,
				'orderby' => false,
				'order' => false,
				'itemsperrow' => 4,
				'quantity' => 4,
				'class' => ''
		), $atts ) );
		
		if(!is_numeric($quantity)) {
			$quantity = 4;
		}
		if(!is_numeric($offset)) {
			$offset = 0;
		}

		

		ob_start();

		/**
		 *  Query for my content
		 */
		$args = array(
			'post_type' => $posttype,
			'posts_per_page' => $quantity,
			'post_status' => 'publish',
			'paged' => 1,
			'suppress_filters' => false,
			'ignore_sticky_posts' => 1,
			'offset' => esc_attr($offset),
			'meta_key' => '_thumbnail_id'
		);

		if($orderby){
			if($orderby == 'rand' || $orderby == 'ID' || $orderby == 'author' || $orderby == 'title' || $orderby == 'date' || $orderby == 'comment_count' || $orderby == 'menu_order' ) {
				$args[ 'orderby'] = esc_attr($orderby);
			}
		}
		if($order){
			if($order == 'ASC' || $order == 'DESC'){
				$args[ 'order'] = esc_attr($order);
			} 
		}

		/**
		 * Add category parameters to query if any is set
		 */
		if (false !== $category && 'all' !== $category) {
			$args[ 'tax_query'] = array(
					array(
					'taxonomy' => esc_attr( qantumthemes_get_type_taxonomy( $posttype ) ),
					'field' => 'slug',
					'terms' => array(esc_attr($category)),
					'operator'=> 'IN' //Or 'AND' or 'NOT IN'
				)
			);
		}

		/**
		 * [$wp_query execution of the query]
		 * @var WP_Query
		 */
		$wp_query = new WP_Query( $args );

		$classes="s12 m6 l3";
		switch($itemsperrow) {
			case "1":
				$classes="s12 m12";
				break;
			case "2":
				$classes="s12 m6 l6";
				break;
			case "3":
				$classes="s12 m4";
				break;
			case "4":
			default:
				$classes="s12 m6 l3";
				break;
		}



		?><div class="row <?php echo esc_attr($class); ?>"><?php  
		/**
		 * Loop start
		 */
		if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$post = $wp_query->post;
			setup_postdata( $post );

			
			switch ($posttype){
				case "members":
					$template =  'phpincludes/part-archive-item-members';
					break;
				case "podcast":
					$template =  'phpincludes/part-archive-item-podcast';
					break;
				case "radiochannel":
					$template =  'phpincludes/part-archive-item-post-hero';
					break;
				default:
					$template =  'phpincludes/part-archive-item-post-vertical';

			}
			?>
			<div class="col <?php echo esc_attr($classes); ?>">
				<?php 
				get_template_part (  $template); 
				?>
			</div>
			<?php
		endwhile; endif;
		wp_reset_postdata();
		?></div><?php  
		/**
		 * Loop end;
		 */
		
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-post-cards","qantumthemes_post_cards");
}


/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_post_cards' );
if(!function_exists('qantumthemes_vc_post_cards')){
function qantumthemes_vc_post_cards() {
  vc_map( array(
	 "name" => esc_html__( "Post Cards", "onair2" ),
	 "base" => "qt-post-cards",
	 "icon" => get_template_directory_uri(). '/img/vc/post-cards.png',
	 "description" => esc_html__( "Grid of posts", "onair2" ),
	 "category" => esc_html__( "Theme shortcodes", "onair2"),
	 "params" => array(
		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Quantity", "onair2" ),
		   "param_name" => "quantity",
		   "std" => "4",
		   'value' => array("1","2","3","4", "8", "12", "16", "20"),
		   "description" => esc_html__( "Number of posts to display", "onair2" )
		),

		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Items per row", "onair2" ),
		   "param_name" => "itemsperrow",
		   "std" => "4",
		   'value' => array("1","2","3","4"),
		   "description" => esc_html__( "Items per row", "onair2" )
		),
		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Post type", "onair2" ),
		   "param_name" => "posttype",
		   "std" => "post",
		   'value' => array("post","podcast","members"),
		   "description" => esc_html__( "Items per row", "onair2" )
		),

		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "Filter by category (slug)", "onair2" ),
		   "description" => esc_html__("Insert the slug of a category to filter the results","onair2"),
		   "param_name" => "category"
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
		   					__("Menu order", "onair2")=>"menu_order",
		   					__("Random", "onair2")=>"rand"
		   					),
		   "description" => esc_html__( "Change the order of the posts", "onair2" )
		),
		array(
		   "type" => "dropdown",
		   "heading" => esc_html__( "Order", "onair2" ),
		   "param_name" => "order",
		    "std" => "DESC",
		   'value' => array(__("Descending", "onair2")=>"DESC",
		   					__("Ascending", "onair2")=>"ASC"
		   					),
		   "description" => esc_html__( "Change the order of the posts", "onair2" )
		),
		array(
		   "type" => "textfield",
		   "heading" => esc_html__( "CSS Class", "onair2" ),
		   "param_name" => "class"
		),
		
	 )
  ) );
}}