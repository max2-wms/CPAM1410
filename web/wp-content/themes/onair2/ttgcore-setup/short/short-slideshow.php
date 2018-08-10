<?php
/*
Package: OnAir2
Description: Slideshow shortcode parameters
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

if(!function_exists('qantumthemes_slideshow_single')) {
	function qantumthemes_slideshow_single($atts){

		extract( shortcode_atts( array(
				'id' => false,
				'posttype' => 'post',
				'offset' => 0,
				'orderby' => false,
				'quantity' => 3,
				'category' => false
		), $atts ) );

		if(!is_numeric($quantity)) {
			$quantity = 3;
		}
		if(!is_numeric($offset)) {
			$offset = 0;
		}


		ob_start();
			?>
			<!-- SLIDESHOW FULLSCREEN ================================================== -->
			<div class="qt-slickslider-container">
				<div class="qt-slickslider qt-invisible qt-animated qt-slickslider-single qt-black-bg" data-variablewidth="true" data-arrows="true" data-dots="true" data-infinite="true" data-centermode="true" data-pauseonhover="true" data-autoplay="true" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="true" data-variablewidthmobile="true">
					<?php  
					/**
					 *  Query for my content
					 */
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => esc_attr($quantity),
						'post_status' => 'publish',
						'paged' => 1,
						'suppress_filters' => false,
						'offset' => esc_attr($offset),
						'ignore_sticky_posts' => 1,
					);
					if($orderby){
						if($orderby == 'rand' || $orderby == 'ID' || $orderby == 'author' || $orderby == 'title' || $orderby == 'date' || $orderby == 'comment_count' || $orderby == 'menu_order' ) {
							$args[ 'orderby'] = esc_attr($orderby);
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
					?>
				</div>
			</div>
			<!-- SLIDESHOW FULLSCREEN END ================================================== -->
			<?php
		return ob_get_clean();
	}
}

if(function_exists('ttg_custom_shortcode')) {
	ttg_custom_shortcode("qt-slideshow","qantumthemes_slideshow_single");
}

/**
 *  Visual Composer integration
 */
add_action( 'vc_before_init', 'qantumthemes_vc_slideshow_single' );
if(!function_exists('qantumthemes_vc_slideshow_single')){
function qantumthemes_vc_slideshow_single() {
  vc_map( array(
     "name" => esc_html__( "Post Slideshow", "onair2" ),
     "base" => "qt-slideshow",
     "icon" => get_template_directory_uri(). '/img/vc/slider.png',
     "description" => esc_html__( "Automatic slideshow of posts", "onair2" ),
     "category" => esc_html__( "Theme shortcodes", "onair2"),
     "params" => array(
      	array(
           "type" => "dropdown",
           "heading" => esc_html__( "Quantity", "onair2" ),
           "param_name" => "quantity",
           'value' => array("3", "5", "7"),
           "description" => esc_html__( "Number of posts to display", "onair2" )
        ),
        array(
           "type" => "textfield",
           "heading" => esc_html__( "Filter by category (slug)", "onair2" ),
           "description" => esc_html__("Insert the slug of a category to filter the results","onair2"),
           "param_name" => "category"
        ) ,
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



